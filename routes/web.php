<?php

use App\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');
Route::get('/empresa', 'PagesController@empresa')->name('empresa');
Route::get('/film-stretch', 'PagesController@filmStrech')->name('filmStrech');
Route::get('/film-stretch/{producto}', 'PagesController@productoFilmStrech')->name('productoFilmStrech');
Route::get('/film-termocontraible', 'PagesController@filmTermocontraible')->name('filmTermocontraible');
Route::get('/film-de-alimentos', 'PagesController@filmAlimentos')->name('filmAlimentos');
Route::get('/film-de-alimentos/{producto}', 'PagesController@productoFilmAlimentos')->name('productoFilmAlimentos');

Route::get('/calidad', 'PagesController@calidad')->name('calidad');
Route::get('/solicitar-presupuesto', 'PagesController@solicitarPresupuesto')->name('solicitar-presupuesto');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');
Route::post('enviar-cotizacion', 'MailController@quote')->name('send-quote');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');

Route::get('/ficha-tecnica/{id}', 'PagesController@fichaTecnica')->name('ficha-tecnica');
Route::get('/ficha-tecnica-categoria/{id}', 'PagesController@fichaTecnicaCategoria')->name('ficha-tecnica-categoria');
Route::get('/ficha-tecnica-content/{id}', 'PagesController@fichaTecnicaContent')->name('ficha-tecnica-content');
Route::get('/ficha-tecnica-content/{id}/{campo}', 'PagesController@fichaTecnicaPolitica')->name('ficha-tecnica-politica');
Route::delete('/ficha-tecnica/{id}', 'PagesController@borrarFichaTecnica')->name('borrar-ficha-tecnica');

Route::middleware('auth')->prefix('admin')->group(function () {
    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@storeHomeGenericSection')->name('home.content.generic-section.store');
    Route::post('home/content/store', 'HomeController@store')->name('home.content.store');
    Route::post('home/content/update', 'HomeController@update')->name('home.update');
    Route::post('home/content/generic-section/update', 'HomeController@updateHomeGenericSection')->name('home.content.generic-section.update');
    Route::delete('home/content/{id}', 'HomeController@destroyHomeGenericSection')->name('home.content.destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/
    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/content/update-ribbon', 'CompanyController@updateRibbon')->name('company.content.updateRibbon');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::post('company/content/generic-section/update', 'CompanyController@updateHomeGenericSection')->name('company.content.generic-section.update');
    Route::delete('company/content/{id}', 'HomeController@destroyHomeGenericSection')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    /** Fin company*/
    /** Page Category */
    Route::get('category/content', 'CategoryController@content')->name('category.content');
    Route::post('category/content/create', 'CategoryController@create')->name('category.content.create');
    Route::post('category/content', 'CategoryController@update')->name('category.content.update');
    Route::get('category/content/find/{id?}', 'CategoryController@find')->name('category.content.find');
    Route::delete('category/content/{id}', 'CategoryController@destroy')->name('category.content.destroy');
    Route::get('category/content/get-list', 'CategoryController@getList');
    /** Fin category*/
    /** Page Category */
    Route::get('sub-category/content', 'SubCategoryController@content')->name('sub-category.content');
    Route::post('sub-category/content/create', 'SubCategoryController@create')->name('sub-category.content.create');
    Route::post('sub-category/content', 'SubCategoryController@update')->name('sub-category.content.update');
    Route::get('sub-category/content/find/{id?}', 'SubCategoryController@find')->name('sub-category.content.find');
    Route::delete('sub-category/content/{id}', 'SubCategoryController@destroy')->name('sub-category.content.destroy');
    Route::get('sub-category/content/get-list', 'SubCategoryController@getList');
    /** Fin category*/
    /** Page Product */
    Route::get('product/content', 'ProductController@content')->name('product.content');
    Route::get('product/content/create', 'ProductController@create')->name('product.content.create');
    Route::post('product/content/store', 'ProductController@store')->name('product.content.store');
    Route::get('product/content/{id}/edit', 'ProductController@edit')->name('product.content.edit');
    Route::put('product/content', 'ProductController@update')->name('product.content.update');
    Route::delete('product/content/{id}', 'ProductController@destroy')->name('product.content.destroy');
    Route::get('product/content/get-list', 'ProductController@getList')->name('product.content.get-list');
    Route::get('product/content/find-product/{id?}', 'ProductController@find')->name('product.content.find');
    /** Fin product*/
    /** Page Product variable */
    Route::post('variable-product/content/store', 'VariableProductController@store')->name('variable-product.content.store');
    Route::post('variable-product/content', 'VariableProductController@update')->name('variable-product.content.update');
    Route::delete('variable-product/content/{id}', 'VariableProductController@destroy')->name('variable-product.content.destroy');
    /** Fin product variable*/
    /** Page Product Picture */
    Route::delete('product-picture/content/destroy/{id}', 'ProductPictureController@destroy')->name('product-picture.content.destroy');
    /** Fin product picture*/

    /** Page company */
    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    /** Fin company*/

    /** Page Company */
    Route::get('quality/content', 'QualityController@content')->name('quality.content');
    Route::post('quality/content/store-slider', 'QualityController@storeSlider')->name('quality.content.storeSlider');
    Route::post('quality/content/update-slider', 'QualityController@updateSlider')->name('quality.content.updateSlider');
    Route::post('quality/content/update-ribbon', 'QualityController@updateRibbon')->name('quality.content.updateRibbon');
    Route::post('quality/content/update-info', 'QualityController@updateInfo')->name('quality.content.updateInfo');
    Route::post('quality/content/generic-section/update', 'QualityController@updateHomeGenericSection')->name('quality.content.generic-section.update');
    Route::delete('quality/content/{id}', 'HomeController@destroyHomeGenericSection')->name('quality.content.destroy');
    Route::delete('quality/politic-delete/{column}/{id}', 'QualityController@politicDestroy')->name('quality.politic.destroy');
    Route::get('quality/content/slider/get-list', 'QualityController@sliderGetList')->name('quality.slider.get-list');
    /** Fin company*/


    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
