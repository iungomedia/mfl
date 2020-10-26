<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index');

Route::get('/resultados', 'ResultController@index')->name('resultados');
Route::get('/calendario', 'CalendarController@index')->name('calendario');
Route::get('/posiciones', 'PositionController@index')->name('posiciones');
Route::get('/equipos', 'TeamController@index')->name('equipos');
Route::get('/porristas', 'CheerleaderController@index')->name('porristas');
Route::get('/contacto/{id}', 'ContactInformationController@getContact')->name('contacto');

Route::get('/calendario/equipo/{team_id}', 'CalendarController@teamFilter')->name('calendario/equipo');
Route::get('/calendario/categoria/{category_id}', 'CalendarController@categoryFilter')->name('calendario/categoria');
Route::get('/calendario/jornada/{journey_id}', 'CalendarController@journeyFilter')->name('calendario/jornada');

Route::post('resultados/filtro', 'ResultController@useFilters')->name('resultados/filtro');
Route::post('posiciones/filtro', 'PositionController@useFilters')->name('posiciones/filtro');
