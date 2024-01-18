<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ShowProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        Log::info("open show product page");
        return view('products.show', ['product' => Product::query()->findOrFail($id)]);
    }
}
