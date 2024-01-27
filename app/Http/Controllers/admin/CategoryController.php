<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

class CategoryController extends Controller
{
    
public function index(Request $request)
{
    // Start with a query to get all categories ordered by the latest
    $category = Category::latest();

    // Check if the 'keyword' parameter is present in the request
    if ($request->has('keyword')) {
        // If 'keyword' is present, filter categories based on the 'name' column
        $category->where('name', 'like', '%' . $request->get('keyword') . '%');
    }

    // Execute the query to get the filtered and ordered categories
    $category = $category->get();

    // Pass the categories to the view
    return view('admin.category.list', compact('category'));
}


    public function create(Request $request){
return view('admin.category.create');
    }

public function insert(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'slug' => 'required',
        'image' => 'image',
        'status' => 'required',
        'show' => 'required',
        'gender' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->route('category.list')->withErrors($validator)->withInput();
    }

    $category = new Category();
    $category->name = $request->input('name');
    $category->slug = $request->input('slug');
    $category->status = $request->input('status');
    $category->show = $request->input('show');
    $category->gender = $request->input('gender');

    $category->save(); // Save the category to get an ID

    if ($request->hasFile('image')) {
        // Delete old image if it exists

        // Upload and save new image
        $image = $request->file('image');
        $newImageName = $category->id . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('public/uploads', $newImageName);
        $category->image = $imagePath;
    }

    // Save the updated category
    $category->save();

    return redirect()->route('category.list')->with('success', 'Category added successfully');
}


public function edit($categoryId,Request $request){

   $category=Category::find($categoryId);
   if(empty($category)){
   return redirect()->route('category.index');
}
        return view('admin.category.edit',compact('category'));
    }
public function update(Request $request, $categoryId)
{
   $validator = Validator::make($request->all(), [
    'name'   => 'required',
    'slug'   => 'required',
    'image'  => 'image', // Make sure the image rule is correct
    'status' => 'required',
    'show'   => 'required',
    'gender'   => 'required',
]);

if ($validator->fails()) {
return redirect()->back()->withErrors($validator)->withInput();

}


    $category = Category::find($categoryId);

    if (empty($category)) {
        return redirect()->route('category.list');
    }

    $category->name   = $request->input('name');
    $category->slug   = $request->input('slug');
    $category->status = $request->input('status');
    $category->show   = $request->input('show');
    $category->gender   = $request->input('gender');

    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($category->image) {
            Storage::delete($category->image);
        }

        // Upload and save new image
        $image       = $request->file('image');
        $newImageName = $category->id . '.' . $image->getClientOriginalExtension();
        $imagePath    = $image->storeAs('public/uploads', $newImageName);
        $category->image = $imagePath;
    }

    $category->save();

return redirect()->route('category.list')->with('success','Category Updated Successfully!');

}
public function delete($categoryId)
{
    $category = Category::find($categoryId);

    if (empty($category)) {
        return redirect()->route('category.list');
    }

    $category->delete();

        return redirect()->route('category.list')
        ->with('danger', 'Category Deleted Successfully');
}


}
