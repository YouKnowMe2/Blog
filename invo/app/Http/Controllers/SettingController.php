<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index(){
        return view('settings');
    }
    public function update(Request $request)
    {
        // validation
        $request->validate([
            'name'        => ['required', 'max:255', 'string'],
            'email'       => ['required', 'max:255', 'string'],
        ]);

        try {
            // get current user
            $user = User::find(Auth::id());

            // get default thumbnail
            $thumb = $user->thumbnail;

            // upload new thumbnail
            if (!empty($request->file('thumbnail'))) {
                Storage::delete('public/uploads/' . $thumb);
                $filename = strtolower(str_replace(' ', '-', $request->file('thumbnail')->getClientOriginalName()));
                $thumb    = time() .  '-'  . $filename;
                $request->file('thumbnail')->storeAs('public/uploads', $thumb);
            }

            $invoice = $user->invoice_logo;
            // upload new invoice logo
            if (!empty($request->file('invoice_logo'))) {
                $invoice = time() . '-invoice.png';
                $request->file('invoice_logo')->storeAs('public/uploads', $invoice);
            }

            // update user data
            $user->update([
                'name'        => $request->name,
                'email'       => $request->email,
                'thumbnail'   => $thumb,
                'invoice_logo'   => $invoice,
            ]);

            // return response
            return redirect()->route('settings.index')->with('success', 'User Updated!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('settings.index')->with('error', $th->getMessage());
        }
    }
}
