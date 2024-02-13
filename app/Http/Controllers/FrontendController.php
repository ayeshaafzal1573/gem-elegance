<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
     public function showMen()
    {
        $maleData = Category::where("gender","LIKE","Male")->get();

        return view('front.categories', compact('maleData'));
    }

    public function showWomen()
    {
        $femaleData = Category::where("gender", "LIKE", "Female")->get();

        return view('front.categories', compact('femaleData'));
    }


    public function index()
    {
        return view('front.index');
    }

    public function showProducts(Request $request, $gender, $type = 'women')
    {
        $products = Product::latest('id')->with('images');

        if (!empty($request->get('category'))) {
            $products->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->get('category'));
            });
        }

        $data['category'] = Category::all();

        // Filter products based on gender and type
        if ($gender === 'women') {
            $this->filterWomenProducts($products, $type);
        } elseif ($gender === 'men') {
            $this->filterMenProducts($products, $type);
        }

        $data['products'] = $products->get();

        return view('front.' . $type, $data);
    }

    private function filterWomenProducts($products, $type)
    {
        switch ($type) {
            case 'earrings':
                $products->where('category_id', 5);
                break;
            case 'rings':
                $products->where('category_id', 4);
                break;
            case 'necklace':
                $products->where('category_id', 6);
                break;
            // Add more cases as needed
        }
    }


    private function filterMenProducts($products, $type)
    {
        switch ($type) {
            case 'watch':
                $products->where('category_id', 1);
                break;
            case 'rings':
                $products->where('category_id', 3);
                break;
            case 'necklace':
                $products->where('category_id', 2);
                break;
        }
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
    public function womennecklace(Request $request)
    {
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

    public function womenrings(Request $request)
    {
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

    public function menwatch(Request $request)
    {
        $products = Product::latest('id')->with('images');

        if (!empty($request->get('category'))) {
            $products->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->get('category'));
            });
        }

        $data['products'] = $products->get();
        $data['category'] = Category::all();

        return view('front.men-watch', $data);
    }
    public function mennecklace(Request $request)
    {
        $products = Product::latest('id')->with('images');

        if (!empty($request->get('category'))) {
            $products->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->get('category'));
            });
        }

        $data['products'] = $products->get();
        $data['category'] = Category::all();
        return view('front.men-necklace', $data);
    }
    public function menrings(Request $request)
    {
        $products = Product::latest('id')->with('images');

        if (!empty($request->get('category'))) {
            $products->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->get('category'));
            });
        }

        $data['products'] = $products->get();
        $data['category'] = Category::all();
        return view('front.men-rings', $data);
    }
    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->with('images')->first();

        if ($product == null) {
            abort(404);
        }

        return view('front.detail', compact('product'));
    }
    public function newarrival()
    {
        return view('front.new-arrivals');
    }
    public function about()
    {
        return view('front.about');
    }

}
