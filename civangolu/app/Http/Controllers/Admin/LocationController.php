<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Property;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations =Location::all();
        return view('admin.locations.index',['locations' => $locations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.locations.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,FlasherInterface $flasher)
    {
        $location = new Location();
        $location->name = $request->name;
        $location->save();
        $flasher->addSuccess('Location has been saved');
        return redirect(route('dashboard-locations.index'));
    }
    public function add(){

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.locations.edit',['locations' => $location]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,FlasherInterface $flasher)
    {
        $location = Location::findOrFail($id);

        $location->name = $request->name;
        $location->save();
        $flasher->addSuccess('Location has been updated');
        return redirect(route('dashboard-locations.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,FlasherInterface $flasher)
    {
        $property = Property::all();
        $location = Location::findOrFail($id);

        foreach ($property as $property){
            if($property->location_id === $location->id){
                $property->delete();
            }
        }


            $location->delete();

        $flasher->addSuccess('Location has been deleted');
        return back();
    }
}
