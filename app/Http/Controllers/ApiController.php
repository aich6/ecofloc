<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function Products(){

        return Product::all();
         
    }
}
