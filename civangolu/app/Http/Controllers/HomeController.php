<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function home(){
        $latest_properties = Property::latest()->get()->take(4);
        $locations =Location::all();

        return view('welcome',['latest_properties' => $latest_properties,'locations' => $locations]);
    }
    public function currency($code){
        Cookie::queue('currency',$code, 3600);
        return back();
    }
}
