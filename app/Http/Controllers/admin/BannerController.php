<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function list()
    {
        $banners = Banners::all();
        return view('admin.frontend.list', ['banners' => $banners]);
    }

    public function create()
    {
        return view('admin.frontend.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = $image->getClientOriginalName();
            $directory = public_path('uploads');
            File::makeDirectory($directory, 0755, true, true);
            $image->move($directory, $imageName);

            Banners::create([
                'image_path' => "uploads/{$imageName}",
            ]);
        }

        return redirect()->route('home.list');
    }
    public function edit($id, Request $request)
    {
        $banners = Banners::find($id);
        if (empty($banners)) {
            return redirect()->route('home.list');
        }
        return view('admin.frontend.edit', compact('banners'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $banner = Banners::find($id);

        if (empty($banner)) {
            return redirect()->route('home.list');
        }

        // Update banner fields except for the image
        $banner->update($request->except('image_path'));

        if ($request->hasFile('image_path')) {
            // Delete old image if it exists
            if ($banner->image_path) {
                Storage::delete($banner->image_path);
            }

            // Upload and save new image
            $image = $request->file('image_path');
            $imageName = $image->getClientOriginalName();
            $directory = public_path('uploads');
            File::makeDirectory($directory, 0755, true, true);
            $image->move($directory, $imageName);
            $banner->image_path = "uploads/{$imageName}";
        }

        $banner->save();

        return redirect()->route('front.index')->with('success', 'Banner Updated Successfully!');
    }

    public function delete($id)
    {
        $banners = Banners::find($id);

        if (empty($banners)) {
            return redirect()->route('home.list');
        }

        $banners->delete();

        return redirect()->route('home.list')
            ->with('danger', 'Banners Deleted Successfully');
    }

}
