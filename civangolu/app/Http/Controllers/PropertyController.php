<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function single($id)
    {
        $property = Property::findOrFail($id);
        return view('property.single',['property' => $property]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $latest_properties = Property::latest();

        if(!empty($request->sale)) {
            $latest_properties = $latest_properties->where('sale', $request->sale);
        }

        if(!empty($request->type)) {
            $latest_properties = $latest_properties->where('type', $request->type);
        }

        if(!empty($request->price)) {
            //$latest_properties = $latest_properties->where('bedrooms', $request->bedrooms);
            if($request->price == '500000+') {
                $latest_properties = $latest_properties->where('price', '>', 500000);
            }
            else if($request->price == '500000') {
                $latest_properties = $latest_properties->where('price', '>', 400000)->where('price', '<=', 500000);
            }else if($request->price == '400000') {
                $latest_properties = $latest_properties->where('price', '>', 300000)->where('price', '<=', 400000);
            }else if($request->price == '300000') {
                $latest_properties = $latest_properties->where('price', '>', 200000)->where('price', '<=', 300000);
            }else if($request->price == '200000') {
                $latest_properties = $latest_properties->where('price', '>', 100000)->where('price', '<=', 200000);
            }else if($request->price == '100000') {
                $latest_properties = $latest_properties->where('price', '<=', 100000);
            }
        }

        if(!empty($request->bedrooms)) {
            $latest_properties = $latest_properties->where('bedrooms', $request->bedrooms);
        }
        if(!empty($request->location)) {
            $latest_properties = $latest_properties->where('location_id', $request->location);
        }
        if(!empty($request->property_name)) {
            $latest_properties = $latest_properties->where('name', 'LIKE', '%'. $request->property_name .'%');
        }


        $latest_properties = $latest_properties->paginate(12);
        $locations =Location::select('id','name')->get();


        return view('property.index', [
            'latest_properties' => $latest_properties,
            'locations' => $locations
        ]);
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
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
