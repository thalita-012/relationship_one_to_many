<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    //
    public function index()
    {
        // $products = Product::all(); // still work
        $products = Product::with('category')->get();  //use to reduce query
        return view('product.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store()
    {
        Product::create([
            'name' => request()->name,
            'price' => request()->price,
            'stock' => request()->qty,
            'category_id' => request()->category_id,
            'image' => 'default.png' // Added default value
        ]);
        return redirect('/product');
    }
    public function update($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('product.update', compact('product', 'categories'));
    }
    public function save($id)
    {
        $products = Product::find($id);
        $products->update([
            'name' => request()->name,
            'price' => request()->price,
            'stock' => request()->qty,
            'category_id' => request()->category_id,
            'image' => $products->image ?? 'default.png' // Maintain existing or use default
        ]);
        return redirect('/product');
    }
    public function delete($id)
    {
        Product::find($id)->delete();
    }
}
