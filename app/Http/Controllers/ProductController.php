<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Product $product, StoreProductRequest $request)
    {
        $validatedData = $request->validated();
        $product->create($validatedData);

        return to_route('products.index')->with('success', 'Product is successfully saved');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Product $product, StoreProductRequest $request)
    {
        $validatedData = $request->validated();
        $product->update($validatedData);

        return to_route('products.index')->with('success', 'Product is successfully updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
