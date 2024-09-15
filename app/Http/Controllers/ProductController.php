<?php

namespace App\Http\Controllers;

use App\Models\Product; // Jangan lupa untuk mengimpor model Product
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::withRelations()->paginate(10);

        return view('products.index', compact('products'));
    }
}
