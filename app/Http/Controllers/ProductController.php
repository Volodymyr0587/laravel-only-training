<?php

namespace App\Http\Controllers;

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

    public function store(Product $product, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);
        $product->create($validatedData);

        return to_route('products.index')->with('success', 'Game is successfully saved');
    }
}
