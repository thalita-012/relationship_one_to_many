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
        $data = $products->map(function ($p) {
            return $this->transformProduct($p);
        });
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $product = Product::create([
            'name' => $request->name,
            'image' => $request->image,
            'price' => $request->price,
            'stock' => $request->stock,
            'isActive' => $request->has('isActive') ? $request->isActive : true,
            'category_id' => $request->category_id,
        ]);
        $product->load('category');
        return response()->json([
            'success' => true,
            'data' => $this->transformProduct($product)
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
            'data' => $this->transformProduct($product)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::find($id);
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
        $product->load('category');
        return response()->json([
            'success' => true,
            'data' => $this->transformProduct($product)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::find($id);
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

    /**
     * Transform product model to API shape.
     */
    private function transformProduct(Product $p)
    {
        $category = null;
        if ($p->relationLoaded('category') && $p->category) {
            $category = [
                'id' => $p->category->id,
                'name' => $p->category->name,
                'description' => $p->category->description,
                'is_active' => (bool) $p->category->isActive,
            ];
        }

        return [
            'id' => $p->id,
            'category_id' => $p->category_id,
            'name' => $p->name,
            'image' => $p->image,
            'image_url' => $p->image ? asset('storage/' . $p->image) : null,
            'price' => is_numeric($p->price) ? (float) $p->price : $p->price,
            'stock' => $p->stock,
            'is_active' => (bool) $p->isActive,
            'created_at' => $p->created_at ? $p->created_at->toJSON() : null,
            'updated_at' => $p->updated_at ? $p->updated_at->toJSON() : null,
            'category' => $category,
        ];
    }
}
