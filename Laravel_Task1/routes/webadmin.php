<?php
Route::group(['prefix'=>'admin' , 'namespace'=>'admin'] ,function(){

	Route::get('/login','AdminAuth@login');
	Route::post('login','AdminAuth@loginaction');
	Route::get('forgotpassword','AdminAuth@forgot_password');
	Route::post('forgotpassword','AdminAuth@forgot_password_post');
	Route::get('reset/password/{token}','AdminAuth@reset_password');
	Route::post('reset/password/{token}','AdminAuth@reset_password_final');
	
	Route::group(['middleware'=>'admin:admin'] , function(){
		Route::get('/',function(){

			return view('admin.home');

		});
		Route::get('setting',function(){

			return view('admin.setting');

		});
		Route::get('addcategory',function(){

			return view('admin.add_category');

		});
		Route::post('addcategory','CategoryController@add_cat');
		Route::get('edit_category/{id}','CategoryController@show_edit');
		Route::post('edit_category/{id}','CategoryController@editCategory');
		Route::get('delete_category/{id}','CategoryController@deleteCategory');
		Route::get('show_category/{id}','CategoryController@showCategory');
		Route::get('index_categories','CategoryController@Allcategories');
		Route::post('edit_category','CategoryController@editCategory');
		Route::post('setting','SettingController@inserte');
		Route::any('logout','AdminAuth@logout');
		// Route::get('change_password','AdminAuth@change_password');
		// Route::post('change_password','AdminAuth@change_password_action');
	});
});

