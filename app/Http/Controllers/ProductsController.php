<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        return view('components/Create');
    }
    public function storeProduct(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric'
        ];
        if($request->image != ""){
            $rules['image'] = 'image';
        }
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->route('Product.Add')->withInput()->withErrors($validator);
        }
        $product = new Product();
        $product->name =$request->name;
        $product->sku =$request->sku;
        $product->price =$request->price;
        $product->description =$request->description;
        $product->save();
        if($request->image !=""){
            // here we will store image
            $image= $request->image;
            $ext = $image->getClientOriginalExtension();
            $ImageName =time().'.'.$ext; //Unique img name

            //Save Image to products dir
            $image->move(public_path('uploads/products'),$ImageName);

            // Save IMG name in DB:
            $product->image =$ImageName;
            $product->save();
        }
        return redirect()->route('dashboard')->with('success','Product Added Successfully.');
    }
    public function editProduct(Product $product)
    {
        // Your logic to show the edit form for a specific product
        // return view('components/Edit', compact('product'));
        // return view('components/Edit');
        return redirect()->route('products.edit', ['product' => $product->id]);
    }
    
}
