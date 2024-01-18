<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShowProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        return view('products.show', ['product' => Product::query()->findOrFail($id)]);
    }
}
