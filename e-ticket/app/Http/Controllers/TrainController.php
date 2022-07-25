<?php

namespace App\Http\Controllers;

use App\Models\Bogi;
use App\Models\Seat;
use App\Models\Train;
use Flasher\Laravel\Facade\Flasher;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function trains(){
        $trains = Train::paginate(30);
        return view('trains.index',[
            'trains' => $trains
        ]);
    }
    public function addTrain(){
        return view('trains.add');
    }
    public function saveTrain(Request $request,FlasherInterface $flasher){
        $request->validate([
            'name' => 'required',
            'home_station_id' => 'required|integer',
            'date' => 'required|date',
            'start_time' => 'required',
        ]);
        $train = new Train();
        $train->name = $request->name;
        $train->home_station_id = $request->home_station_id;
        $train->date = $request->date;
        $train->start_time = $request->start_time;
        $train->save();
        $flasher->addSuccess('Train added');
        return redirect()->back();
    }
    public function editTrain($id){
        $train = Train::findOrFail($id);
        return view('trains.edit',[
            'train' => $train
        ]);
    }
    public function deleteBogi($id){
        $bogi = Bogi::findOrFail($id);
        $bogi->delete();
        return redirect()->back();
    }
    public function deleteSeat($id){
        $seat = Seat::findOrFail($id);
        $seat->delete();
        return redirect(route('trains'));
    }
}
