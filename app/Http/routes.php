<?php

Route::post('person/store', 'PersonController@store');
Route::post('car/store', 'CarController@store');

Route::get('/', 'CarController@datos');

Route::post('/', 'CarController@buscar');

Route::get('/restPersonCar/{horainicio}/{horafin}/{calle}/{callea}/{calleb}', 'PersonController@restPerson');


Route::get('/excel/{nombre}/{category}', 'CarController@downloadExcel');
