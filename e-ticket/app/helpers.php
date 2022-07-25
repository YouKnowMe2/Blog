<?php

function ticket_stations(){
    return [
        [
            'name' => 'Dhaka',
            'lat' => '98.5555',
            'lon' => '92.5555',
            'address' => 'Dhaka',
        ],
        [
            'name' => 'Dhaka Binamondor',
            'lat' => '98.43255',
            'lon' => '92.32455',
            'address' => 'Binamondor',
        ],

        [
            'name' => 'Khulna',
            'lat' => '98.2423',
            'lon' => '92.647',
            'address' => 'Khulna',
        ],


    ];

}

function ticket_trains(){
    return [
      [
          'name' => 'Suborno Express',
          'date' => '2022-04-16',
          'home_station_id' => 1,
          'start_time' => '06.00'
      ],
        [
            'name' => 'Chitra Express',
            'date' => '2022-04-16',
            'home_station_id' => 1,
            'start_time' => '08.00'
        ],
    ];
}
function ticket_bogis(){
    return ['KA','KHA'];
}

function type_number_by_name(){
    return [
        1 => 'shovon',
        2 => 'shovon chair',
    ];
}
