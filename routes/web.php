<?php
Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index');

Route::get('/resultados', 'ResultController@index')->name('resultados');
Route::get('/calendario', 'CalendarController@index')->name('calendario');
Route::get('/posiciones', 'PositionController@index')->name('posiciones');
Route::get('/equipos', 'TeamController@index')->name('equipos');
Route::get('/porristas', 'CheerleaderController@index')->name('porristas');
Route::get('/contacto/{id}', 'ContactInformationController@getContact')->name(
  'contacto'
);

Route::post('resultados/filtro', 'ResultController@useFilters')->name(
  'resultados/filtro'
);
Route::post('calendario/filtro', 'CalendarController@useFilters')->name(
  'calendario/filtro'
);
Route::post('posiciones/filtro', 'PositionController@useFilters')->name(
  'posiciones/filtro'
);
