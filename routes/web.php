<?php

Route::get('/', ['as' => 'main', 'uses' => "ReservationController@index"]);
Route::get('match/{matchId}', ['as' => 'match', 'uses' => "ReservationController@match"]);
Route::get('match/{matchId}/sector/{sector}', ['as' => 'sector', 'uses' => 'ReservationController@sector']);
Route::get('match/{matchId}/sector/{sector}/row/{row}/place/{place}', ['as' => 'reservation.in_process', 'uses' => 'ReservationController@reservation']);
Route::get('reservation/{reservation}', ['as' => 'reservation.detail', 'uses' => 'ReservationController@detailForm']);
Route::post('reservation/{reservation}', ['as' => 'reservation.final', 'uses' => 'ReservationController@finalReservation']);
