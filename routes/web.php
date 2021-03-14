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

// Route::get('/', function () {
//     // return view('welcome');
// });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('/', 'HomeController@index')->name('home');

Route::get('/reasons-to-work-with-us', 'AboutController@reasonsToWorkWithUs')->name('reasons_to_work_with_us');
Route::get('/areas-of-use', 'AboutController@areasOfUse')->name('areas_of_use');
Route::get('/licenses-and-certificates', 'CertificateController@index')->name('licenses_certificates');

Route::get('/vacancies', 'VacancyController@all')->name('vacancies');


Route::post('/get-subcatalog', 'CatalogController@getSubcatalog')->name('getSubcatalog');

Route::post('/get-industry', 'CatalogController@getIndustry')->name('getIndustry');


Route::get('/vacancies/{id}', 'VacancyController@index')->name('vacancy');

Route::get('/production', 'ProductionController@index')->name('production');
Route::get('/maps', 'MapController@index')->name('maps');

Route::get('/blogs', 'NewsController@all')->name('news');
Route::get('/blogs/{id}', 'NewsController@index')->name('inner_news');

Route::get('/catalogs', 'CatalogController@all')->name('catalogs');

Route::get('/catalogs/search', 'SearchController@index')->name('catalogsSearch');

Route::get('/catalogs/{id}/{subcategory_id?}', 'CatalogController@catalog')->name('catalog');
Route::get('/catalogs/{id}/{industry_id?}', 'CatalogController@catalog')->name('catalog');
Route::get('/catalogs/{id}/{manufacturer_id?}', 'CatalogController@catalog')->name('catalog');
Route::get('/manufacturer/{id}', 'CatalogController@manufacturer')->name('manufacturer');
Route::post('/catalogs/filter', 'CatalogController@filter')->name('filter');
Route::get('/product/{id}', 'ProductController@index')->name('product');

Route::get('/services', 'ServiceController@index')->name('services');
Route::get('/partners', 'PartnerController@index')->name('partners');
Route::get('/projects', 'ProjectController@index')->name('projects');

Route::get('/download-center', 'DownloadCenterController@index')->name('download_center');
Route::get('/contacts', 'ContactController@index')->name('contact');
Route::get('/contacts-us', 'FeedbackController@index')->name('contact-us');
Route::post('/feedback', 'FeedbackController@request')->name('feedback');


//Route::get('/search', 'SearchController@index')->name('search');
Route::get('/sitemap','HomeController@sitemap');
