<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::with('category')->get();
        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $product = Product::with('category')->create([
            'name' => $request->name,
            'image' => $request->image,
            'price' => $request->price,
            'stock' => $request->stock,
            'isActive' => $request->has('isActive') ? $request->isActive : true,
            'category_id' => $request->category_id,
        ]);
        return response()->json([
            'success' => true,
            'data' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
       $product = Product::with('category')->find($id);
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Found'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::with('category')->find($id);
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Found'
            ], 404);
        }
        $product->update([
            'name' => $request->name,
            'image' => $request->image,
            'price' => $request->price,
            'stock' => $request->stock,
            'isActive' => $request->has('isActive') ? $request->isActive : $product->isActive,
            'category_id' => $request->category_id,
        ]);
        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::with('category')->find($id);
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Found'
            ], 404);
        }
        $product->delete();
        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully',
        ]);
    }

  
   
}
