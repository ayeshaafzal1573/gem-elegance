<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        return view('front.index');
    }
    public function newarrival()
    {
        return view('front.new-arrivals');
    }
    public function about()
    {
        return view('front.about');
    }
    //Category
    public function showMen()
    {
        $maleData = Category::where("gender", "LIKE", "Male")->get();

        return view('front.categories', compact('maleData'));
    }

    public function showWomen()
    {
        $femaleData = Category::where("gender", "LIKE", "Female")->get();

        return view('front.categories', compact('femaleData'));
    }
    //Products
    public function Products($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->first();
        if (!$category) {
            abort(404);
        }
        $products = Product::with('category')->whereHas('category', function ($query) use ($categorySlug) {
            $query->where('slug', $categorySlug);
        })->get();

        return view('front.products', ['products' => $products, 'selectedCategory' => $category->name]);
    }

    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->with('images')->first();

        if ($product == null) {
            abort(404);
        }

        return view('front.detail', compact('product'));
    }



}
