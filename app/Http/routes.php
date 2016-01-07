<?php

Route::get('/', function(){
	return 'Home page';
});

Route::group(['middleware' => 'web'], function () {
Route::get('/home', 'HomeController@index');
// Route::get('about', ['middleware' => 'auth', function()
// 	{
// 		return 'this page will only be shown if the user is logged in. Route level middleware!';
// 	}]);
// Route::get('contact', 'PagesController@contact');

// Route::get('articles', 'ArticlesController@index');
// Route::get('articles/create', 'ArticlesController@create');
// //When you want to be more explicit, make sure you always put important routes above 'wildcards' like the one below. 
// Route::get('articles/{id}', 'ArticlesController@show');
// Route::post('articles', 'ArticlesController@store');

Route::resource('articles', 'ArticlesController');
Route::auth();




Route::get('foo', ['middleware' => ['auth', 'manager'], function(){ 

	return 'this page can only be viewed by managers'; 

}]);

});