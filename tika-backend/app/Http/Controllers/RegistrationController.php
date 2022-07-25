<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Twilio\Rest\Client;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = Registration::paginate();
        return  view('registration.index',[
            'registrations' => $registrations,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {

        $current = Carbon::now()->toDateString();
        $vaccine01 = Carbon::now()->addDays(7)->toDateString();
        $vaccine02 = Carbon::now()->addDays(37)->toDateString();
        $message = 'Your first vaccine date is '.$vaccine01 . ' and Your second vaccine date is ' . $vaccine02;

        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_FROM");

        $client = new Client($account_sid, $auth_token);
        $client->messages->create('+88'.$registration->phone_no, [
            'from' => $twilio_number,
            'body' => $message]);





        return  view('registration.edit',[
            'registration' => $registration,
            'current' => $current,
            'vaccine01' => $vaccine01,
            'vaccine02' => $vaccine02,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        $info= Carbon::now();
        $info2= Carbon::now();
        $registration->v1_date = $info->addDays(7);
        $registration->v2_date = $info2->addDays(37);
        $registration->save();
        return redirect('/registration');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
