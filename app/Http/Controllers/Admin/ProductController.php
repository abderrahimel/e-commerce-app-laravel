<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        return view('admin.product.index', compact('products'));
    }

    public function add()
    {   
        $categorie = Category::all();
        return view('admin.product.add', compact('categorie'));
    }

    public function insert(Request $request)
    {   
        $product = new Product();
        // 
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('assets/uploads/products/', $filename);
                $product->image = $filename;
            }
        }
        // 
        $product->cate_id = $request->cate_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->tax = $request->tax;
        $product->qty = $request->qty;
        $product->status = $request->status == TRUE ? '1':'0';
        $product->trending = $request->trending == TRUE ? '1':'0';
        $product->meta_title = $request->meta_title;
        $product->meta_keywords = $request->meta_keywords;
        $product->meta_description = $request->meta_descrip;
        $product->save();
        return redirect('products')->with('status', "Product Added Successfully");
    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update($id, Request $request){
        // dd($request->all());
        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('assets/uploads/products/', $filename);
                $product->image = $filename;
            }
        }
        // 
        // $product->cate_id = $request->cate_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->tax = $request->tax;
        $product->qty = $request->qty;
        $product->status = $request->status == TRUE ? '1':'0';
        $product->trending = $request->trending == TRUE ? '1':'0';
        $product->meta_title = $request->meta_title;
        $product->meta_keywords = $request->meta_keywords;
        $product->meta_description = $request->meta_descrip;
        $product->save();
        return redirect('products')->with('status', "Product Updated Successfully");
       
    }

    public function claude(){
       return view('admin.claudetwo.claude');
    }
}