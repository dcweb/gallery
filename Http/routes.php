<?php



Route::group(['middleware' => ['web']], function () {

	Route::group( array("prefix" => "admin"), function() {

    	Route::group(['middleware' => 'auth:dcms'], function() {

    		//GALLERY
    		Route::group( array("prefix" => "gallery"), function() {
    			Route::any('api/table', array('as'=>'admin/gallery/api/table', 'uses' => 'GalleryController@getDatatable'));
    		});
    		Route::resource('gallery','GalleryController');
    });
  });
});



 ?>
