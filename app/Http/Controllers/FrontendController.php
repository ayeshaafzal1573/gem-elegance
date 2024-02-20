<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banners;

class FrontendController extends Controller
{
    public function index()
    {
        $banners = Banners::all();
        return view('front.index', ['banners' => $banners]);
    }
    public function newarrival()
    {
        $banners = Banners::all();
        $latestWomenProduct = Product::whereHas('category', function ($query) {
            $query->where('slug', 'women-rings');
        })->latest()->first();


        $latestMenProduct = Product::whereHas('category', function ($query) {
            $query->where('slug', 'men-necklace');
        })->latest()->first();

        return view('front.new-arrivals', [
            'latestWomenProduct' => $latestWomenProduct,
            'latestMenProduct' => $latestMenProduct,
            'banners' => $banners
        ]);
    }

    public function about()
    {
        $banners = Banners::all();
        return view('front.about', compact('banners'));
    }
    //Category
    public function showMen()
    {
        $banners = Banners::all();
        $maleData = Category::where("gender", "LIKE", "Male")->get();

        return view('front.categories', compact('maleData', 'banners'));
    }

    public function showWomen()
    {
        $banners = Banners::all();
        $femaleData = Category::where("gender", "LIKE", "Female")->get();

        return view('front.categories', compact('femaleData', 'banners'));
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
