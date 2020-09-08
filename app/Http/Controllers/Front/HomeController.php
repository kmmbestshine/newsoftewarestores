<?php

namespace App\Http\Controllers\Front;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {

        $products = Product::inRandomOrder()->take(8)->get();

        return view('front.index', compact('products'));
    }
    public function moredetails() {
    	$input = \Request::all();
        $products = Product::where('id', $input['id'])->get();
        foreach ($products as $product) {
            $mul_images=$product->mul_images;
        }
        $temp = explode('|',$mul_images );
        return view('front.moredetails', compact('products','temp'));
    }
}
