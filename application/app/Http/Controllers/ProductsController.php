<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductReview;

class ProductsController extends Controller
{
    public function show(Request $request, Product $product)
    {
        $categories = ProductCategory::all();
        $query = Product::query();
        $productCategory = $request->get('product_category', 'all');
        $products = Product::all();

        return view('show', ['product' => $product],
            compact('categories', 'productCategory', 'products'));
    }



    public function products(Request $request, Product $product)
    {
        $categories = ProductCategory::all();
        $query = Product::query();
        $productCategory = $request->get('product_category', 'all');
        $keyword = $request->get('name', null);
        $pageUnit = $request->get('page_unit', 10);

        if ($keyword != null) {
            $query->where('name','like',"%$keyword%");
        }

        if ($productCategory != "all") {
            $query = $query->where('product_category_id', $productCategory);
        }

        return view('show', ['product' => $product],
            compact('categories', 'productCategory', 'products'));
    }



    public function create(Request $request, Product $product)
    {
        $categories = ProductCategory::all();
        $keyword = $request->get('keyword', null);
        $productCategory = $request->get('product_category', 'all');
        $products = Product::all();

        return view('reviews_create',['product' => $product],
            compact('keyword', 'categories', 'productCategory', 'products'));
    }

    public function store(Request $request)
    {
        $inputs = $request->all();

        $rules = [
            'title' => 'required',
            'body' => 'required'
        ];

        $message = [
            'name.required' => 'タイトルは、必ず指定してください。',
            'body.required' => '本文は、必ず指定してください。',
        ];

        $validation = \Validator::make($inputs, $rules, $message);

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

//        $product_review = new ProductReview();
//        $product_review->title = $request->title;
//        $product_review->body = $request->body;
//        $product_review->rank = $request->rank;
//        $product_review->save();
//
//        return redirect("http://localhost/products/$product_review->id");
    }
}
