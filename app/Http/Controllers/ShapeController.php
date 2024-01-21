<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShapeController extends Controller
{
    public function index()
    {
        return view('shapes.index');
    }

    public function calculate(Request $request)
    {
        $shape = $request->input('shape');

        if ($shape == 'circle') {
            $radius = $request->input('radius');
            $area = pi() * $radius * $radius;
        } elseif ($shape == 'rectangle') {
            $length = $request->input('length');
            $width = $request->input('width');
            $area = $length * $width;
        } elseif ($shape = 'triangle') {
            $base = $request->input('base');
            $height = $request->input('height');
            $area = ($height * $base) / 2;
        }
          else {
            $area = 'Invalid shape selected';
        }

        return view('shapes.result', ['area' => $area]);
    }
}
