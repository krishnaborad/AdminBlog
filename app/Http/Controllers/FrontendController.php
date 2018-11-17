<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\state;
use App\University;
use App\product;
class FrontendController extends Controller
{
    public function index_uni()
    {
      $states = state::all();
      $universities = University::all();
      return view('universities', compact('state','universities'));
    }
    public function index_products()
    {
      $products = product::all();
      return view('products',compact('products'));
    }
    public function product_buy($id)
    {
      $products = product::find($id);
      return view('buy',compact('products'));
    }
}
