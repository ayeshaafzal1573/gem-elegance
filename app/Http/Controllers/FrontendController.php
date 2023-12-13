<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class FrontendController extends Controller
{
    public function index(){
   return view('front.index');
    }
    public function women(){
            $category = Category::where('gender', 'Female')->latest()->get();
    return view ('front.women' , compact('category'));
    }
public function womenearings(Request $request)
{
    $products = Product::latest('id')->with('images');

    if (!empty($request->get('category'))) {
        $products->whereHas('category', function ($query) use ($request) {
            $query->where('name', $request->get('category'));
        });
    }

    $data['products'] = $products->get();
    $data['category'] = Category::all();

    return view('front.women-earrings', $data);
}
    public function womennecklace(Request $request){
    $products = Product::latest('id')->with('images');

    if (!empty($request->get('category'))) {
        $products->whereHas('category', function ($query) use ($request) {
            $query->where('name', $request->get('category'));
        });
    }

    $data['products'] = $products->get();
    $data['category'] = Category::all();
    return view('front.women-necklace', $data);
}

public function womenrings(Request $request){
    $products = Product::latest('id')->with('images');

    if (!empty($request->get('category'))) {
        $products->whereHas('category', function ($query) use ($request) {
            $query->where('name', $request->get('category'));
        });
    }

    $data['products'] = $products->get();
    $data['category'] = Category::all();
    return view('front.women-rings', $data);
}

    public function men(Request $request){
          $category = Category::where('gender', 'Male')->latest()->get();
    return view('front.men' , compact('category'));
    }
    public function menwatch(Request $request){
  $products = Product::latest('id')->with('images');

    if (!empty($request->get('category'))) {
        $products->whereHas('category', function ($query) use ($request) {
            $query->where('name', $request->get('category'));
        });
    }

    $data['products'] = $products->get();
    $data['category'] = Category::all();

    return view('front.men-watch' ,$data);
    }
    public function mennecklace(Request $request){
      $products = Product::latest('id')->with('images');

    if (!empty($request->get('category'))) {
        $products->whereHas('category', function ($query) use ($request) {
            $query->where('name', $request->get('category'));
        });
    }

    $data['products'] = $products->get();
    $data['category'] = Category::all();
    return view('front.men-necklace',$data);
    }
    public function menrings(Request $request){
          $products = Product::latest('id')->with('images');

    if (!empty($request->get('category'))) {
        $products->whereHas('category', function ($query) use ($request) {
            $query->where('name', $request->get('category'));
        });
    }

    $data['products'] = $products->get();
    $data['category'] = Category::all();
    return view('front.men-rings',$data);
    }
public function detail($slug)
{
    $product = Product::where('slug', $slug)->with('images')->first();

    if ($product == null) {
        abort(404);
    }

    return view('front.detail', compact('product'));
}
public function newarrival(){
return view('front.new-arrivals');
}
public function about(){
return view('front.about');
}

}
