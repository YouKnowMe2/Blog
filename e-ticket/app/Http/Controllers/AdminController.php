<?php

namespace App\Http\Controllers;

use App\Models\Bogi;
use App\Models\Seat;
use App\Models\Train;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }

}
