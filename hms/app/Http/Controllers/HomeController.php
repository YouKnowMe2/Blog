<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            return redirect('home');
        }
        else{
            $doctor = Doctor::latest()->get();

            return view('user.home',[
                'doctor' => $doctor
            ]);
        }

    }
    public function myAppointment(){

        if(Auth::id()){
            $user_id = Auth::user()->id;
            $appointment = Appointment::where('user_id',$user_id)->get();
            return view('user.my_appointment',[
                'appointment' => $appointment
            ]);

        }else{
            return redirect()->back();
        }
    }
    public function appointment(Request $request){
        $data = new Appointment();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->number;
        $data->doctor = $request->doctorname;
        $data->message = $request->message;
        $data->date = $request->date;
        $data->status = 'in Progress';
        if(Auth::id()){

            $data->user_id = Auth::user()->id;
        }else{
            $data->user_id = '1';
        }
        $data->save();
        return redirect()->back();
    }
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype == '0'){
                $doctor = Doctor::latest()->get();
                return view('user.home',[
                    'doctor' => $doctor
                ]);

            }else{
                return view('admin.home');
            }
        }
        else{
            return $this->redirect()->back();
        }
    }

    public function delete($id){
        $data = Appointment::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }



}
