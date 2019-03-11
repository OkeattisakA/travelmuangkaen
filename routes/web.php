<?php

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

use App\Place;
use App\Wisdom;


//Login Route
Auth::routes();
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');


//Index
Route::get('/', function () {
    $places = Place::where('place_status',1)->where('place_switch',1)->get();
    $wisdoms = Wisdom::where('wisdom_status',1)->where('wisdom_switch',1)->get();
    return view('index',compact('places','wisdoms'));
});



//Maps
Route::resource('maps', 'MapController');
Route::get('placesjson', 'PlaceController@placesjson');
Route::get('wisdomsjson', 'WisdomController@wisdomsjson');


//Places

Route::resource('places', 'PlaceController');
Route::get('places/{place_id}/search', 'PlaceController@placesearch');
Route::get('places/{id}/pdf','PlaceController@pdf');
Route::resource('placereviews', 'PlacereviewController');
//Wisdoms
Route::resource('wisdoms', 'WisdomController');
Route::get('wisdoms/{wisdom_id}/search', 'WisdomController@wisdomsearch');
Route::get('wisdoms/{id}/pdf','PlaceController@pdf');
Route::resource('wisdomreviews', 'WisdomreviewController');



Route::resource('userprofiles', 'UserProfileController');


//Admin
Route::middleware(['admin'])->group(function () {
    Route::resource('admin/dashboards', 'Admin\DashboardController');
    Route::resource('admin/users', 'Admin\UserController');
    Route::resource('admin/roles', 'Admin\RoleController');
    Route::resource('admin/permissions', 'Admin\PermissionController');
    Route::resource('admin/abilities', 'Admin\AbilityController');
    Route::resource('admin/settings', 'Admin\SettingController');
    Route::resource('admin/activitylog', 'Admin\ActivityController');

    Route::get('admin/reports/places', 'Admin\ReportController@places');
    Route::get('admin/reports/wisdoms', 'Admin\ReportController@wisdoms');

    Route::get('admin/reports/placeroutelogs', 'Admin\ReportController@placeroutelogs');
    Route::get('admin/reports/wisdomroutelogs', 'Admin\ReportController@wisdomroutelogs');

//Place
    Route::resource('admin/places', 'Admin\PlaceController');
    Route::get('admin/places/approve/{place_id}', 'Admin\PlaceController@approve');

    Route::get('admin/places/switch/1/{place_id}/', 'Admin\PlaceController@swshow');
    Route::get('admin/places/switch/0/{place_id}/', 'Admin\PlaceController@swnotshow');
//Place Photo
    Route::resource('admin/placephotos', 'Admin\PlacephotoController');
    Route::get('admin/placephotos/create/{id}','Admin\PlacephotoController@create');
//Place Review
    Route::resource('admin/placereviews', 'Admin\PlacereviewController');
    Route::get('admin/placereviews/approve/{place_id}/{placereview_id}', 'Admin\PlacereviewController@approve');

//Wisdom
    Route::resource('admin/wisdoms', 'Admin\WisdomController');
    Route::get('admin/wisdoms/approve/{wisdom_id}', 'Admin\WisdomController@approve');

    Route::get('admin/wisdoms/switch/1/{wisdom_id}/', 'Admin\WisdomController@swshow');
    Route::get('admin/wisdoms/switch/0/{wisdom_id}/', 'Admin\WisdomController@swnotshow');

//Wisdom Photo
    Route::resource('admin/wisdomphotos', 'Admin\WisdomphotoController');
    Route::get('admin/wisdomphotos/create/{id}','Admin\WisdomphotoController@create');
//Wisdom Review
    Route::resource('admin/wisdomreviews', 'Admin\WisdomreviewController');
    Route::get('admin/wisdomreviews/approve/{wisdom_id}/{wisdomreview_id}', 'Admin\WisdomreviewController@approve');



    Route::get('admin/reports/place_pdf/download','Admin\ReportController@place_pdf');

//Place Top Read
    Route::get('admin/reports/place_top_read/download','Admin\ReportController@place_top_read');
//Place Top Review
    Route::get('admin/reports/place_top_review/download','Admin\ReportController@place_top_review');
//Place Top Search
    Route::get('admin/reports/place_top_search/download','Admin\ReportController@place_top_search');

//Wisdom Top Read
    Route::get('admin/reports/wisdom_top_read/download','Admin\ReportController@wisdom_top_read');
//Wisdom Top Review
    Route::get('admin/reports/wisdom_top_review/download','Admin\ReportController@wisdom_top_review');
//Wisdom Top Search
    Route::get('admin/reports/wisdom_top_search/download','Admin\ReportController@wisdom_top_search');


    Route::get('admin/reports/places/mpdf','Admin\ReportController@report_place_mpdf');
});


Route::middleware(['member'])->group(function () {
//Member

    Route::resource('member/dashboards', 'Member\DashboardController');

    Route::resource('member/places', 'Member\PlaceController');
    Route::resource('member/placephotos', 'Member\PlacephotoController');
    Route::get('member/placephotos/create/{id}','Member\PlacephotoController@create');

    Route::resource('member/wisdoms', 'Member\WisdomController');
    Route::resource('member/wisdomphotos', 'Member\WisdomphotoController');
    Route::get('member/wisdomphotos/create/{id}','Member\WisdomphotoController@create');
});


Route::get('autocomplete-search', 'SearchController@search');
Route::get('search','SearchController@showVueSearch');

Route::post('placessearch','SearchController@getPlaceSearch');
Route::post('wisdomssearch','SearchController@getWisdomSearch');

Route::resource('routelogs', 'RoutelogController');

Route::resource('placeroutelogs', 'PlaceroutelogController');
Route::resource('wisdomroutelogs', 'WisdomroutelogController');

Route::get('place/mpdf/{place_id}','PlaceController@mpdf');





