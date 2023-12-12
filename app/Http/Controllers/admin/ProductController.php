<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductImage;

  use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
public function index(Request $request)
{
    $products = Product::latest('id')->with('images');

    if (!empty($request->get('keyword'))) {
        $products->where('name', 'like', '%' . $request->get('keyword') . '%');
    }
    $category = Category::all();
   if (!empty($request->get('category'))) {
        $products->whereHas('category', function ($query) use ($request) {
            $query->where('name', $request->get('category'));
        });
    }

    if (!empty($request->get('status'))) {
        $products->where('status', $request->get('status'));
    }

    $data['products'] = $products->get();
    $data['category'] = $category;

    return view('admin.products.list', $data);
}


public function create(){
    $data=[];
    $category=Category::orderBy('name','ASC')->get();
   $data['category']=$category;
    return view ('admin.products.create' , $data);
}
public function insert(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',

        'price' => 'required',
        'compare_price' => 'required',
        'style' => 'required',
        'material' => 'required',
        'description' => 'required',
        'images' => 'required',
        'qty' => 'required',
        'category' => 'required',
        'status' => 'required',

    ]);

    $product = new Product();
    $product->name = $request->input('name');
      $product->slug = Str::slug($request->input('name'));
    $product->description = substr($request->input('description'), 0, 255);
    $product->price = $request->input('price');
    $product->compare_price = $request->input('compare_price');
    $product->style = $request->input('style');
    $product->material = $request->input('material');
    $product->qty = $request->input('qty');
    $product->status = $request->input('status');

    $product->category_id = $request->input('category');

    $product->save();

   if ($request->hasFile('images')) {
    foreach ($request->file('images') as $image) {
        $imageName = $image->getClientOriginalName(); // Use the original name of the file as the image name

        // Ensure the public/uploads directory exists
        $directory = public_path('uploads');
        File::makeDirectory($directory, 0755, true, true);

        // Store the image with the original name in the public/uploads directory
        $imagePath = $image->storeAs('uploads', $imageName, 'public');

        // Create an instance of ProductImage
        $productImage = new ProductImage([
            'image_path' => "uploads/{$imageName}",
        ]);

        // Save the relationship
        $product->images()->save($productImage);
    }
}
    return redirect()->route('product.list')->with('success', 'Product added successfully!');

}
public function edit($productid, Request $request)
{
    $product = Product::find($productid);

    $category = Category::all(); // Fetch all categories
    if (empty($product)) {
        return redirect()->route('products.index');
    }
    // Fetch the product's images
    $productImages = $product->images;

    // Fetch the categories
    $category = Category::orderBy('name', 'ASC')->get();

   return view('admin.products.edit', compact('product', 'productImages', 'category'));

}
public function update(Request $request, $productid)
{
    $product = Product::find($productid);

    if (empty($product)) {
        return redirect()->route('product.list');
    }

  $validatedData = $request->validate([
        'name' => 'required',

        'price' => 'required',
        'compare_price' => 'required',
        'style' => 'required',
        'material' => 'required',
        'description' => 'required',
        'images' => 'required',
        'qty' => 'required',
        'category' => 'required',
        'status' => 'required',
    ]);


    $product->name = $request->input('name');
  $product->slug = Str::slug($request->input('name'));
    $product->description = substr($request->input('description'), 0, 255);
    $product->price = $request->input('price');
    $product->compare_price = $request->input('compare_price');
    $product->style = $request->input('style');
    $product->material = $request->input('material');
    $product->qty = $request->input('qty');
    $product->status = $request->input('status');
    $product->category_id = $request->input('category');
    $product->save();
    // Delete existing images before adding new ones
    $product->images()->delete();
if ($request->hasFile('images')) {
    foreach ($request->file('images') as $image) {
        $imageName = $image->getClientOriginalName();
        // Ensure the public/uploads directory exists
        $directory = public_path('uploads');
        File::makeDirectory($directory, 0755, true, true);
        // Store the image with the original name in the public/uploads directory
        $imagePath = $image->storeAs('uploads', $imageName, 'public');
        // Create an instance of ProductImage
        $productImage = new ProductImage([
            'image_path' => "uploads/{$imageName}",
        ]);
        // Save the relationship
        $product->images()->save($productImage);
    }
}
     return redirect()->route('product.list')->with('success', 'Product updated successfully!');

}
    //DELETE
public function delete($productid)
{
    $product = Product::find($productid);

    if (empty($product)) {
        return redirect()->route('product.list');
    }
    $product->delete();
       return redirect()->route('product.list')->with('danger', 'Product deleted successfully!');
}

}
