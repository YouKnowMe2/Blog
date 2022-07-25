<?php

namespace Database\Seeders;

use App\Models\Bogi;
use App\Models\Schedule;
use App\Models\Seat;
use App\Models\Station;
use App\Models\Train;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Sm';
        $user->email = 'sm20@sm.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('sm20@sm.com');
        $user->remember_token = Str::random(10);
        $user->save();

        foreach (ticket_stations() as $item){
            $station = new  Station();
            $station->name =  $item['name'];
            $station->lat =  $item['lat'];
            $station->lon =  $item['lon'];
            $station->address =  $item['address'];
            $station->save();
        }
        foreach (ticket_trains() as $item){
            $train = new Train();
            $train->name = $item['name'];
            $train->date = date('Y-m-d',strtotime($item['date']));
            $train->home_station_id = $item['home_station_id'];
            $train->start_time =date('h:i:s',strtotime( $item['start_time']));
            $train->save();

            foreach (ticket_bogis() as $bogis){
                $bogi = new Bogi();
                $bogi->name = $bogis;
                $bogi->train_id = $train->id;
                $bogi->save();

                for ($i = 0; $i<=30; $i++){
                    $seat = new Seat();
                    $seat->name = $bogi->name.'='.$i;
                    $seat->bogi_id = $bogi->id;
                    $seat->type = rand(0,1);
                    $seat->train_id = $train->id;
                    $seat->save();
                }

            }
        }
        $schedule = new Schedule();
        $schedule->train_id = 1;
        $schedule->station_id = 2;
        $schedule->time = '10:00';
        $schedule->snigdha_price =10;
        $schedule->shovon_price =120;
        $schedule->f_chair_price =10;
        $schedule->save();


    }
}
