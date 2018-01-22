<?php

// Home module
Route::group(['namespace' => 'Home'], function() {

	//home
    Route::get('/', 'HomeController@index')->name('home');

});

// Admin module
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

	Route::get('geetest','HomeController@getGeetest');

	//Admin login view
	Route::get('login',['as'=>'login','uses'=>'HomeController@index']);

	//Admin login post
	Route::post('login',['as'=>'checklogin','uses'=>'HomeController@login']);

	//Admin login out
	Route::post('logout',['as'=>'logout','uses'=>'HomeController@loginOut']);

	//system form
	Route::get('setting',['as'=>'system','uses'=>'SystemController@index']);

	//system update
	Route::post('setting/update',['as'=>'system_update','uses'=>'SystemController@update']);

	//system clear cache
	Route::get('setting/clear-cache',['as'=>'system.clear-cache','uses'=>'SystemController@clearCache']);

	
	//users resource
	Route::resource('users','UserController');
	Route::get('users/{user}/delete',['as'=>'user.delete','uses'=>'UserController@destroy']);
	Route::get('users/{user}/active',['as'=>'users.active','uses'=>'UserController@active']);
	Route::post('user/add',['as'=>'user.add','uses'=>'UserController@add']);
	Route::get('users-list',['as'=>'users.list','uses'=>'UserController@lists']);
	Route::delete('user/{id}',['as'=>'user.del','uses'=>'UserController@delete']);

	Route::get('system/log',['as'=>'user.log','uses'=>'UserController@log']);
	Route::get('system/clear-log',['as'=>'user.logdel','uses'=>'UserController@logdel']);

	Route::resource('roles','RoleController');
	Route::get('roles/{role}/delete',['as'=>'roles.delete','uses'=>'RoleController@destroy']);

	Route::resource('permission','PermissionController');
	Route::get('permission/{permission}/delete',['as'=>'permission.delete','uses'=>'PermissionController@destroy']);



	//regsiter export to excel
	//Route::get('course/{id}/export',['as'=>'course.excel','uses'=>'CourseController@exportExcel']);


	//customers resourse route
	Route::resource('customer', 'CustomerController');
	Route::get('customer-list', 'CustomerController@lists')->name('customer.list');
	Route::post('customer-search', 'CustomerController@search')->name('customer.search');
	Route::get('customer-daozhen', 'CustomerController@dzlist')->name('customer.daozhen');
	Route::post('customer-dz', 'CustomerController@dianzhen')->name('customer.dz');

	//customer route
	Route::post('order-search', 'OrderController@search')->name('customer.order-search');

	//orders resourse route
	Route::resource('order', 'OrderController');

	//follow resourse route
	Route::resource('follow', 'FollowController');

	Route::post('follow-search','FollowController@search')->name('customer.follow-search');

	//result resourse route
	Route::resource('result', 'ResultController');

	//disease resourse route
	Route::resource('disease', 'DiseaseController');

	//doctor resourse route
	Route::resource('doctor', 'DoctorController');

	//客户数据交接
	Route::post('data-copy','UserController@dataCopy')->name('customer.data-copy');


	Route::get('config',['as'=>'admin.config','uses'=>'HomeController@config']);


});