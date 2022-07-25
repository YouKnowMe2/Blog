<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\District;
use App\Models\Division;
use App\Models\People;
use App\Models\Upazila;
use App\Models\User;
use App\Models\VaccinationCenter;
use App\Models\Vaccine;
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
        People::factory(30)->create();

        $user = new User();
        $user->name = 'Sm';
        $user->email = 'sm20@sm.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('sm20@sm.com');
        $user->remember_token = Str::random(10);
        $user->save();

        //created Division



        foreach (bd_tika_divisions() as $division){
            $divisionModel = new Division();
            $divisionModel->name = $division['name'];
            $divisionModel->save();
        }

        //created District



        foreach (bd_tika_districts() as $district){
            $districtModel = new District();
            $districtModel->name = $district['name'];
            $districtModel->division_id = $district['division_id'];
            $districtModel->save();
        }


        //created Upzillas


        foreach (bd_tika_upzillas() as $upazila){
            $upazilaModel = new Upazila();
            $upazilaModel->name = $upazila['name'];
            $upazilaModel->district_id = $upazila['district_id'];
            $upazilaModel->save();
        }

        //created categories

        foreach (tika_bd_categories() as $category){
            $categoryModel = new Category();
            $categoryModel->name = $category['name'];
            $categoryModel->min_age = $category['min_age'];
            $categoryModel->save();
        }

        //created vaccince

        $avaliable_vaccines = ['Pfizar', 'Moderna', 'AstraZeneca','Sinopharm','Sputnik V'];

        foreach ($avaliable_vaccines as $vaccine){
            $vaccineModel = new Vaccine();
            $vaccineModel->name = $vaccine;
            $vaccineModel->save();
        }
        VaccinationCenter::factory(100)->create();

    }
}
