<?php

Route::group(['namespace' => 'Marvision\ImagesGenerate\Controllers','prefix' => 'ImagesGenerate'],function(){
	Route::get('/','ImagesGenerateController@index')->name('ImagesGenerate_home_path');
});