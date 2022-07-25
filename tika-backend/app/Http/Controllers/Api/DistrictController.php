<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Upazila;
use App\Models\VaccinationCenter;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function divisions(){
        $division = Division::where('enabled',1)->get();
        return response()->json($division);
    }
    public function index(Request $request){
        $districts = District::where('enabled',1)->where('division_id',$request->division_id)->get();
        return response()->json($districts);
    }

    public function upzillas(Request $request){
        $upzillas = Upazila::where('enabled',1)->where('district_id',$request->district_id)->get();
        return response()->json($upzillas);
    }
    public function centers(Request $request){
        $centers = VaccinationCenter::where('upazila_id',$request->upazila_id)->get();
        return response()->json($centers);
    }

}
