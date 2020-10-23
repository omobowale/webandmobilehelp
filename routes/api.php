<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->resource('/user', function (Request $request) {
//     return $request->user();
// });


Route::resource('corevalues', 'APICoreValuesController')->middleware('auth:api');

Route::resource('pagescontent', 'APIPageGeneralContentController')->middleware('auth:api');

Route::resource('homecontent', 'APIHomeContentController')->middleware('auth:api');
Route::resource('aboutcontent', 'APIAboutContentController')->middleware('auth:api');
Route::resource('servicescontent', 'APIServicesContentController')->middleware('auth:api');
Route::resource('portfoliocontent', 'APIPortfolioContentController')->middleware('auth:api');
Route::resource('contactcontent', 'APIContactContentController')->middleware('auth:api');
Route::resource('commoncontent', 'APICommonContentController')->middleware('auth:api');

Route::resource('contacts', 'APIContactsController')->middleware('auth:api');

Route::resource('services', 'APIServicesController')->middleware('auth:api');

Route::resource('portfolio', 'APIPortfolioController')->middleware('auth:api');

Route::resource('categories', 'APICategoriesController')->middleware('auth:api');

Route::resource('team_members', 'APITeamsController')->middleware('auth:api');

Route::resource('blog', 'APIBlogController')->middleware('auth:api');
Route::resource('comment', 'APICommentController')->middleware('auth:api');

Route::resource('blogcategory', 'APIBlogCategoryController')->middleware('auth:api');
Route::resource('tag', 'APITagController')->middleware('auth:api');

Route::resource('logo', 'APILogoController')->middleware('auth:api');

Route::resource('settings', 'APISettingsController')->middleware('auth:api');

Route::resource('footer', 'APIFooterController')->middleware('auth:api');

Route::resource('enquiry', 'APIEnquiryController')->middleware('auth:api');

Route::resource('quoterequest', 'QuoteRequestController')->middleware('auth:api');
