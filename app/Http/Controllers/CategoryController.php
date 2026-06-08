<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();
        return view('category.index', compact('categories'));
    }

    
    public function create()
    {
        return view('category.create');
    }

   
    public function store()
    {
        Category::create([
            'name' => request()->name,
            'description' => request()->description
        ]);

        return redirect('/category');
    }

   
    public function show($id)
    {
        
        $category = Category::with('products')->find($id);
        return view('category.show', compact('category'));
    }

    
    public function delete($id)
    {
        $category = Category::find($id);

        $category->products()->delete(); 
        $category->delete();

        return redirect('/category');
    }
}

