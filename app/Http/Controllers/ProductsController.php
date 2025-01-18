<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Product;
use App\Models\Contact;
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
    public function editPr($id)
    {
        $product  = Product::findOrFail($id);
        return view('components/Edit',[
            'product'=>$product
        ]);
    }
    public function updateProduct($id, Request $request){
        $product = Product::findOrFail($id);
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
            return redirect()->route('product.edit',$product->id)->withInput()->withErrors($validator);
        }
        $product->name =$request->name;
        $product->sku =$request->sku;
        $product->price =$request->price;
        $product->description =$request->description;
        $product->save();
        if($request->image !=""){
            // delet old image:
            File::delete(public_path('public/uploads/products/'.$product->image));

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
        return redirect()->route('dashboard')->with('success','Product Updated Successfully.');
    }
    public function deleteProduct($id){
         $product = Product::findOrFail($id);

        //  Delete image 
        File::delete(public_path('uploads/products/'.$product->image));

        // delete product from db:
        $product->delete();
        return redirect()->route('dashboard')->with('success','Product deleted Successfully');
    }
    public function About(){
        return view('About');
    }
    public function Contact(){
        return view('Contact');
    }
    public function contactUs(Request $request){
        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'message' => 'required|min:5'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->route('Contact')->withInput()->withErrors($validator);
        }
        $Contact = new Contact();
        $Contact->name =$request->name;
        $Contact->email =$request->email;
        $Contact->message =$request->message;
        $Contact->save();
        return redirect()->route('Contact')->with('success','Message Sent Successfully.');
    }
    public function showMessages(){
        $messages = Contact::orderBy("created_at",'DESC')->get();
        return view('Messages',['messages'=>$messages]);
    }
    public function deleteMessage($id){
        $message = Contact::findOrFail($id);
        $message->delete();
        return redirect()->route('Messages.show')->with('success','Message deleted successfully');
    }
}
