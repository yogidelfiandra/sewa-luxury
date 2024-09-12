<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
	public function index()
	{
		$categories = Category::all();
		$latest_products = Product::latest()->take(4)->get();
		$random_product = Product::inRandomOrder()->take(6)->get();
		return view('front.index', compact('categories', 'latest_products', 'random_product'));
	}
}
