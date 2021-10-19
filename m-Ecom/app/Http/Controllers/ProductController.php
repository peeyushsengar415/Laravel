<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;

class ProductController extends Controller
{
    function index()
    {
        //return "Hello  from product page";
       // return Product::all();
       $data=Product::all();
        return view('product',['products'=>$data]);
    }
    function detail($id)
    {
        $data=Product::find($id);
        return view('details',['product'=>$data]);
    }
    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart=new Cart;
            $cart->user_id=session()->get('user')['id'];
            $cart->products_id=$req->products_id;
            $cart->save();
            return redirect('/');
        }
        else
        {
            return redirect('login');
        }
    }
    static function cartItem()
    {
        $userId=Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    function cartlist()
    {
        //return "Hello";
        $userId=session()->get('user')['id'];

        $products=DB::table('carts')
        ->join('products','carts.products_id','=','products.id')
        ->where('carts.user_id',$userId)
         ->select('products.*','carts.id as cart_id')
        ->get();
       // ->join('products','carts.products_id','carts.id')
       // ->where('carts.user_id',session()->get('user')['id'])
       // ->select('carts.*','carts.id as cart_id')
       // ->get();
        
        return view('cartlist',['products'=>$products]);
    }
    
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }
    function ordernow()
    {
         $userId=session()->get('user')['id'];

        $total=DB::table('carts')
        ->join('products','carts.products_id','=','products.id')
        ->where('carts.user_id',$userId)
         ->select('products.*','carts.id as cart_id')
        ->sum('products.price');
        return view('ordernow',['total'=>$total]);

    }
    function orderplace(Request $req)
    {
         $userId=session()->get('user')['id'];
          $allcart=Cart::where('user_id',$userId)->get();
        foreach($allcart as $cart)
        {
            $order=new Order;
            $order->product_id=$cart['products_id'];
            $order->user_id=$cart['user_id'];
            $order->status="Pending";
            $order->payment_method=$req->payment;
            $order->payment_status="Pending";
            $order->address=$req->address;
            $order->save();
            Cart::where('user_id',$userId)->delete();


        }

       // return $req->input();
        return redirect('/');
    }
    function myorder()
    {
        $userId=session()->get('user')['id'];

        $orders=DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->get();

        return view('myorder',['orders'=>$orders]);
         //->select('products.*','carts.id as cart_id')
        //->sum('products.price');
        //return view('ordernow',['total'=>$total]);
    }

}
