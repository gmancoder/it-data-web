<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('inbound_packages', 'InboundPackageAPIController');

Route::resource('inbound_package_logs', 'InboundPackageLogAPIController');

Route::resource('website_categories', 'WebsiteCategoryAPIController');



Route::resource('websites', 'WebsiteAPIController');

Route::resource('language_categories', 'LanguageCategoryAPIController');

Route::resource('development_case_studies', 'DevelopmentCaseStudyAPIController');

Route::resource('news_feeds', 'NewsFeedAPIController');

Route::resource('last_runs', 'LastRunAPIController');

Route::resource('servers', 'ServerAPIController');

Route::resource('file_backup_locations', 'FileBackupLocationAPIController');

Route::resource('download_items', 'DownloadItemAPIController');

Route::resource('television_shows', 'TelevisionShowAPIController');

Route::resource('television_show_episodes', 'TelevisionShowEpisodeAPIController');