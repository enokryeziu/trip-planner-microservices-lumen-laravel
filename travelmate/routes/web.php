<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('trip','TripController@store');
Route::post('tripPlaces','TripController@storePlaces');

Route::get('/', function () {
     return view('home');
});

Route::get('/tours', function () {
    return view('tours');
});

Route::get('/trips',function(){
    return view('dashboard.trips');
});

Route::get('/planner', function () {
    return view('planner');
});

Route::get('/profile',function(){
    return view('dashboard.profile');
});

Route::get('/trips' , 'TripController@index');
Route::get('/trips/{id}' , 'TripController@show');

$router->group(['prefix' => 'trip'], function($app)
{
	$app->get('','TripController@tripPlannerByCity');
    $app->get('filter','TripController@filter');
	//$app->post('add','PlacesController@create');
	//$app->put('edit/{id}','PlacesController@update');
	//$app->delete('delete/{id}','PlacesController@destroy');
	//$app->get('index','PlacesController@index');
    //$app->get('bycityid/{id}','PlacesController@getPlacesByCityId');
    //$app->get('bycityname/{name}','PlacesController@getPlacesByCityName');

});
Route::get('/about',function(){
    return view('about');
});


Route::resource('/contact', 'ContactMessageController');

Route::get('/contact',function(){
    return view('contact');
});

Route::get('/profile', 'ProfileController@index');

Route::get('/insurance',function(){
    return view('insurance');
});

Route::get('/dashboard',function(){
    return view('dashboard');
});



// Route::get('/login',function(){
//     return view('login');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index');
// Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

// Route::prefix('admin')->group(function() {
//   Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//   Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
//   Route::get('/', 'AdminController@index')->name('admin.dashboard');
//   Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


// //Password Reset routes

//     Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
//     Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
//     Route::post('/password/email','Auth\AdminResetPasswordController@reset');
//     Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset'); 
//     // 'admin.password.reset' is placed into AdminResetPasswordController, function 'toMail' , argument 'route'
// });

Auth::routes();

//Route::get('/home', 'HomeController@index');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login'); 
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});
?>
