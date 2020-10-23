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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/foo', function () {
    Artisan::call('storage:link');
});


Auth::routes();

Route::get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

Route::group(['prefix' => '', "middleware"=>'auth'], function () {


    Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.upload');

    Route::post('ckeditor/upload2', 'CKEditorController@upload2')->name('ckeditor.upload2');
    
    Route::resource('service', 'AllServicesController');

    Route::resource('test', 'APIBlogController');

    Route::resource('services', 'APIServicesController');

    Route::resource('portfolio', 'PortfolioController');

    Route::resource('category', 'CategoriesController');

    Route::resource('admin', 'AdminsController');
    
    Route::resource('team', 'TeamMembersController');
    
    Route::resource('page', 'AllPagesController');

    Route::resource('contact', 'ContactsController');

    Route::resource('content', 'ContentController');

    Route::resource('homepage', 'HomeContentController');
    Route::resource('aboutpage', 'AboutContentController');
    Route::resource('servicespage', 'ServicesContentController');
    Route::resource('portfoliopage', 'PortfolioContentController');
    Route::resource('contactpage', 'ContactContentController');
    Route::resource('commons', 'CommonContentController');
    Route::resource('blogpage', 'BlogContentController');

    Route::resource('blogcategory', 'BlogCategoryController');
    
    Route::resource('blog', 'BlogController');
    Route::resource('apiblog', 'APIBlogController');
    Route::resource('comments', 'CommentsController');
    Route::get('update-comment-status/{id}', 'CommentsController@updateCommentStatus');

    Route::resource('showcontent', 'ShowContentController');
    
    Route::resource('logo', 'LogoController');

    Route::resource('settings', 'SettingsController');
    
    Route::resource('enquiry', 'EnquiryController');

    // Route::get('check', 'EnquiryController@getContactables');

    Route::resource('footer', 'FooterController');
    
});

