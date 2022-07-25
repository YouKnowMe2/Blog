<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\myFirstNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function addView(){
        return view('admin.add_doctor');
    }
    public function update(Request $request){

            $doctor = new Doctor();
            $image=$request->file;
            $imagename= time().'.'.$image->getClientOriginalName();
            $request->file->move('doctorimage',$imagename);


            $doctor->image= $imagename;
            $doctor->name= $request->name;
            $doctor->phone= $request->number;
            $doctor->speciality= $request->speciality;
            $doctor->room= $request->room;
            $doctor->save();
            return redirect()->back()->with('message','Info has been submited');
    }
    public function showAppointment(){

            $appointment = Appointment::all();


        return view('admin.showAppointment',[
            'appointment' => $appointment
        ]);
    }
    public function approve($id){
        $data = Appointment::findOrFail($id);
        $data->status = 'Approved';
        $data->save();
        return redirect()->back();
    }
    public function cancel($id){
        $data = Appointment::findOrFail($id);
        $data->status = 'Cancled';
        $data->save();
        return redirect()->back();
    }
    public function showDoctor(){
        $doctors = Doctor::all();
        return view('admin.showDoctor',[
            'doctors' => $doctors
        ]);
    }
    public function delete($id){
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->back();
    }
    public function updateDoctor($id){
        $data = Doctor::findOrFail($id);

        return view('admin.updateDoctor',[
            'data' => $data
        ]);
    }
    public function edit(Request $request,$id){
        $doctor = Doctor::find($id);
        $image=$request->file;
        if($image){
            $imagename= time().'.'.$image->getClientOriginalName();
            $request->file->move('doctorimage',$imagename);
            $doctor->image= $imagename;
        }




        $doctor->name= $request->name;
        $doctor->phone= $request->number;
        $doctor->speciality= $request->speciality;
        $doctor->room= $request->room;
        $doctor->save();
        return redirect()->back();
    }
    public function emailView($id){
        $data = Appointment::find($id);
        return view('admin.emailView',[
            'data' => $data
        ]);
    }
    public function send(Request $request,$id)
    {
        $data = Appointment::find($id);
        $details = [
          'greeting'  => $request->greeting,
          'message'  => $request->message,
          'actionText'  => $request->actionText,
          'actionUrl'  => $request->actionUrl,
          'endPart'  => $request->endPart

        ];
        Notification::send($data, new myFirstNotification($details));

        return redirect()->back();
    }
}
