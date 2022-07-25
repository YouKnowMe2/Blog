<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Twilio\Rest\Client;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return response()->json($categories);
    }
    public function phoneVerify(Request $request){

        $sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create('+88' . $request->phone, "sms");

        return response()->json($verification->status);

    }
    public function phoneVerifyCode(Request $request) {
        $sid = getenv("TWILIO_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($sid, $token);

        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($request->verify_code, // code
                ["to" => "+88" . $request->phone]
            );



        return response()->json($verification->status);
    }
    public function registration(Request $request){
        $info = new Registration();

        $info->name = $request->name;
        $info->dob = $request->dob;
        $info->phone_no = $request->phone_no;
        $info->center_id = $request->center_id;
        $info->diabates = 1;
        $info->upcoming_date = Carbon::now();
        $info->unique_id = rand(1,20000);
        $info->id_no = $request->id_no;
        $info->save();

        return response()->json('done');
    }
}
