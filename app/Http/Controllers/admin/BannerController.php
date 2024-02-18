<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function list()
    {
        $banners = Banners::all();
        return view('admin.frontend.list');
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

        return redirect()->route('front.index');
    }
}
