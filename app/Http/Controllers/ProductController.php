<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(){

        return view('product.create');

    }

    public function store(Request $request){

        Product::create($request->all());

        // Esto hace que la pantalla regrese al formulario después de guardar
        return redirect('product/create');

    }
}