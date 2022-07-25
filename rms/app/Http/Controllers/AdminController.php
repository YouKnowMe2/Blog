<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users(){
        $users = User::all();
        $chef = Chef::all();
        return view('admin.users',[
            'users' => $users,
            'chef' => $chef
        ]);
    }

    public function foodMenu(){
        $foods = Food::all();
        return view('admin.foodMenu',[
            'foods' => $foods
        ]);
    }
    public function viewChef(){
        $chefs = Chef::all();
        return view('admin.chef',[
            'chefs' => $chefs
        ]);
    }
    public function editChef($id){
        $chef = Chef::findOrFail($id);
        return view('admin.editchef',[
            'chef'=> $chef
        ]);
    }
    public function editedChef(Request $request,$id){
        $chef= Chef::findOrFail($id);
        $image = $request->file;
        if($image){
            $imagename = time().'-'.$image->getClientOriginalName();
            $request->file ->move('chefImage',$imagename);
            $chef->image = $imagename;

        }

        $chef->name = $request->name;
        $chef->speciality = $request->speciality;


        $chef->save();
        return redirect()->back();
    }
    public function upload_chef(Request $request){
        $chef = new Chef();
        $image = $request->file;
        if($image){
            $imagename = time().'-'.$image->getClientOriginalName();
            $request->file ->move('chefImage',$imagename);
            $chef->image = $imagename;

        }

        $chef->name = $request->name;
        $chef->speciality = $request->speciality;


        $chef->save();
        return redirect()->back();

    }
    public function upload_food(Request $request){
        $food = new Food();
        $food->title = $request->title;
        $food->price = $request->price;
        $food->description = $request->description;
        //image Upload
        $image = $request->file;


        $imagename = time().'-'.$image->getClientOriginalName();
        $request->file ->move('foodImage',$imagename);
        $food->image= $imagename;
        //end of image upload
        $food->save();
        return redirect()->back();
    }
    public function viewFood($id){
        $food = Food::findOrFail($id);
        return view('admin.updateFood',[
            'food'=> $food
        ]);
    }
    public function updateFood(Request $request,$id){
        $food = Food::findOrFail($id);

        $food->title = $request->title;
        $food->price = $request->price;
        $food->description = $request->description;
        //image Upload

        $image = $request->file;
        if($image){
            $imagename = time().'-'.$image->getClientOriginalName();
            $request->file ->move('foodImage',$imagename);
            $food->image= $imagename;
        }


        //end of image upload
        $food->save();
        return redirect()->back();

    }
    public function reservation(Request $request){
        $reserve = new Reservation();
        $reserve->name = $request->name;
        $reserve->phone = $request->phone;
        $reserve->email = $request->email;
        $reserve->guest = $request->guest;
        $reserve->date = $request->date;
        $reserve->time = $request->time;
        $reserve->message = $request->message;

        $reserve->save();
        return redirect()->back();

    }

    public function viewReservation(){
        $reserve = Reservation::all();
        return view('admin.reservation',[
            'reserve' =>$reserve
        ]);
    }

    public function orders(){
        $data = Order::all();
        return view('admin.orders',[
            'data' => $data
        ]);
    }

    public function search(Request $request){
        $search = $request->search;
        $data = Order::where('name','Like','%'.$search.'%')->get();
        return view('admin.orders',[
            'data' => $data
        ]);
    }
    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();

    }
    public function deleteFood($id){
        $food = Food::findOrFail($id);
        $food->delete();
        return redirect()->back();

    }
    public function deleteReservation($id){
        $reserve = Reservation::findOrFail($id);
        $reserve->delete();
        return redirect()->back();
    }
    public function deleteChef($id){
        $chef = Chef::findOrFail($id);
        $chef->delete();
        return redirect()->back();

    }
}
