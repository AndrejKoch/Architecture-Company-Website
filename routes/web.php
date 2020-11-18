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
Auth::routes();

Route::group(['middleware' => ['web', 'auth', 'check.user:Admin']], function () {
    {
    Route::get('/home', 'HomeController@index')->name('dashboard');
    Route::resource('/user', 'UserController');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/static_page', 'StaticPageController');
    Route::resource('/services', 'ServicesController');
    Route::resource('/slider','SliderController');
    Route::resource('/projects','ProjectsController');
    Route::resource('/partners','PartnersController');
    Route::resource('/gallery','GalleryController');
    Route::resource('/settings','SettingsController');
    Route::resource('/team','TeamController');
    Route::resource('/counter','CounterController');
    }
});

Route::get('/', 'FrontEndController@index')->name('home');
Route::get('/project/{project_slug}', 'FrontEndController@project')->name('project');
Route::get('/ads-single/{service_slug}', 'FrontEndController@services')->name('ads-single');
Route::get('/ads', 'FrontEndController@ads')->name('ads');
Route::get('/projects-all', 'FrontEndController@projects')->name('projects-all');
Route::get('/category/{category_slug}', 'FrontEndController@category');
Route::get('/categories-all', 'FrontEndController@categories')->name('categories-all');
Route::get('/about-us', 'FrontEndController@about')->name('about-us');
Route::post('/send-message', 'EmailController@sendContact');



