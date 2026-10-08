<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return Product::all();
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'name'=>'required',
            'price'=>'required|integer',
            'description'=>'required'
        ]);


        return Product::create($data);

    }


    public function show(Product $product)
    {
        return $product;
    }


    public function update(Request $request, Product $product)
{
    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
    ]);

    return response()->json($product);
}


    public function destroy(Product $product)
    {
        $product->delete();
        return ["message" => "deleted"];
    }

    public function bulkStore(Request $request)
    {
        $products = $request->validate([
            '*.name' => 'required',
            '*.price' => 'required|numeric',
            '*.description' => 'required'
        ]);

        foreach ($products as $product) {
            Product::create($product);
        }

        return response()->json([
            'message' => 'Bulk insert berhasil',
            'total' => count($products)
        ], 201);
    }
}
