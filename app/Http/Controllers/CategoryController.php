<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'categories' => Category::all(),
            'products' => Product::with('galleries')->paginate(32)
        ];
        return view('pages.category', $data);
    }

    public function detail(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $data = [
            'categories' => Category::all(),
            'category' => $category,
            'products' => Product::where('categories_id', $category->id)->with('galleries')->paginate(32)
        ];
        return view('pages.category', $data);
    }
}
