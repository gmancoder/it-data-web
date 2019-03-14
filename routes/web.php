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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('inboundPackages', 'InboundPackageController');

Route::resource('inboundPackageLogs', 'InboundPackageLogController');

Route::resource('websiteCategories', 'WebsiteCategoryController');



Route::resource('websites', 'WebsiteController');

Route::resource('languageCategories', 'LanguageCategoryController');

Route::resource('developmentCaseStudies', 'DevelopmentCaseStudyController');

Route::resource('newsFeeds', 'NewsFeedController');

Route::resource('lastRuns', 'LastRunController');

Route::resource('servers', 'ServerController');

Route::resource('fileBackupLocations', 'FileBackupLocationController');

Route::resource('downloadItems', 'DownloadItemController');

Route::resource('televisionShows', 'TelevisionShowController');

Route::resource('televisionShowEpisodes', 'TelevisionShowEpisodeController');