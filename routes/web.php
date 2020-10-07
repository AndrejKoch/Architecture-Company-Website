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

Route::get('/', 'FrontEndController@index'); {

    Route::resource('/user', 'UserController');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/static_page', 'StaticPageController');
    Route::resource('/services', 'ServicesController');
    Route::resource('/slider','SliderController');
    Route::resource('/projects','ProjectsController');
    Route::resource('/partners','PartnersController');
    Route::resource('/gallery','GalleryController');
    Route::resource('/settings','SettingsController');

};

Auth::routes();

Route::get('/home', 'HomeController@index')->name('dashboard');
Route::get('/project/{project_slug}', 'FrontEndController@project')->name('project.index');
Route::get('/projects', 'FrontEndController@projects');
Route::get('/category/{category_slug}', 'FrontEndController@category');
Route::get('/categories-all', 'FrontEndController@categories');
Route::get('/service', 'FrontEndController@service');
Route::post('/send-message', 'EmailController@sendContact');


