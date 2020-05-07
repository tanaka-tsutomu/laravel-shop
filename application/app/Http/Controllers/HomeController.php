<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use phpDocumentor\Reflection\DocBlock\Tag;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = ProductCategory::all();
        $productCategory = $request->get('product_category', 'all');
        $pageUnit = $request->get('page_unit', 4);
        $query = Product::query()->orderBy('id', 'DESC');
        $products = $query->paginate($pageUnit);

        return view('home',
            compact('categories', 'products', 'productCategory', 'pageUnit'));
    }
}
