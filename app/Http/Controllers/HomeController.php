<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Services\PaymentService;
use Stripe;
use Session;




class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype','user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $delivered = Order::where('status','delivered')->get()->count();
        return view('admin.index',compact('user','product','order','delivered'));
    }

    public function home()
    {
        $products = Product::all();
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }
        else{
            $count = '';
        }

        return view('home.index',compact('products','count'));
    }

    public function home_login()
    {
        $products = Product::all();
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.index',compact('products','count'));
    }

     public function product_details($id)
     {
        $product = Product::find($id);
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.product_details',compact('product','count'));
     }

     public function add_cart($id)
     {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;

        $cart = new Cart();
        $cart->product_id = $product_id;
        $cart->user_id = $user_id;
        $cart->save();
        toastr()->timeOut(10000)->closeButton()->success('Cart added successfully');
        return redirect()->back();
     }

     public function mycart()
     {
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
            return view('home.mycart', compact('count', 'cart'));
        } else {
            return redirect('login');
        }
     }

     public function remove_cart($id)
    {
        if(Auth::id()){
            $user = Auth::user();
            Cart::where('user_id', $user->id)->where('id', $id)->delete();
            return redirect()->back()->with('success', 'Item removed from cart successfully');
        } else {
            return redirect('login');
        }

    }

    public function comfirm_order(Request $request)
    {
        // dd($request->all());
        $name = $request->name;
        $address = $request->rec_address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $carts = Cart::where('user_id',$userid)->get();
        foreach($carts as $cart){
            $order = new Order();
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $cart->product_id;
            $order->save();
        }
        $cart_remove = Cart::where('user_id', $userid)->get();
        foreach($cart_remove as $remove){
           $cart = Cart::find($remove->id);
           $cart->delete();
        }
        return redirect()->back()->with('success', 'Order placed successfully');
    }

    public function myorders()
    {
        $user = Auth::user()->id;
        $count  = Order::where('user_id', $user)->count();
        $order = Order::where('user_id', $user)->get();
        return view('home.order',compact('count','order'));
    }

    public function stripe($value)
    {
        return view('home.stripe',compact('value'));
    }

    public function stripePost(Request $request, $value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "INR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose",
        ]);

        //  Session::flash('success', 'Payment Successfull!');
        $name = Auth::user()->name;
        $address = $request->rec_address;
        $phone = Auth::user()->phone;
        $userid = Auth::user()->id;
        $carts = Cart::where('user_id',$userid)->get();
        foreach($carts as $cart){
            $order = new Order();
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $cart->product_id;
            $order->payment_status = 'paid';
            $order->save();
        }
        $cart_remove = Cart::where('user_id', $userid)->get();
        foreach($cart_remove as $remove){
           $cart = Cart::find($remove->id);
           $cart->delete();
        }
        return redirect()->back()->with('success', 'Order placed successfully');
        return redirect('mycart');
    }

    public function shoptp()
    {
        $products = Product::all();
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }
        else{
            $count = '';
        }

        return view('home.shoptp',compact('products','count'));
    }

    public function whyus()
    {

        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }
        else{
            $count = '';
        }

        return view('home.whyus',compact('count'));
    }

    public function testimonial()
    {

        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }
        else{
            $count = '';
        }

        return view('home.testimonial',compact('count'));
    }

    public function contact()
    {

        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }
        else{
            $count = '';
        }

        return view('home.contact',compact('count'));
    }
}
