<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        if(Auth::id()){
            return $this->redirects();
        }
        else
        $foods = Food::all();
        $chef = Chef::all();
        return view('home',[
            'foods' => $foods,
            'chef' => $chef
        ]);
    }
    public function redirects(){
        $chef = Chef::all();
        $usertype = Auth::user()->usertype;

        if($usertype == '1'){

            return view('admin.home');

        }else{
            $foods = Food::all();

            $user_id = Auth::id();
            $count = cart::where('user_id',$user_id)->count();
            return view('home',[
                'foods' => $foods,
                'chef' => $chef,
                'count' => $count

            ]);
        }
    }
    public function addCart(Request $request,$id){
        if(Auth::id()){
            $user_id = Auth::id();
            $foodid = $id;
            $quantity = $request->quantity;

            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->food_id = $foodid;
            $cart->quantity = $quantity;
            $cart->save();

            return redirect()->back();
        }else{
            return redirect('/login');
        }
    }

    public function showCart($id){

        $data =Cart::select('*')->where('user_id','=',$id)->get();
        $cart = Cart::where('user_id',$id)->join('food','carts.food_id', '=', 'food.id')->get();
        $user_id = Auth::id();
        $count = cart::where('user_id',$user_id)->count();
        return view('showCart',[
            'cart' => $cart,
            'data' => $data,
            'count' => $count
        ]);
    }
    public function removeCart($id){
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->back();
    }
    public function order_confirm(Request $request){
        foreach($request->foodname as $key => $foodname){
            $data = new Order();
            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;

            $data->save();
        }
        return redirect()->back();
    }
}
