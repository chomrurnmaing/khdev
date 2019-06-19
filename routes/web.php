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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('',                                  ['as' => 'front.homepage',               'uses' => 'HomePageController@index']);
Route::get('solutions',                        ['as' => 'front.solutions.index',        'uses' => 'SolutionPageController@index']);
Route::get('solutions/{id}',                   ['as' => 'front.solutions.show',         'uses' => 'SolutionPageController@show']);

Route::get('portfolios',                       ['as' => 'front.portfolios.index',       'uses' => 'PortfolioPageController@index']);
Route::get('portfolios/{id}',                  ['as' => 'front.portfolios.show',        'uses' => 'PortfolioPageController@show']);

Route::get('about-us',                         ['as' => 'front.about-us',               'uses' => 'AboutPageController@index']);
Route::get('contact-us',                       ['as' => 'front.contact-us',             'uses' => 'ContactPageController@index']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::get(  'dashboard',           ['as' => 'admin.dashboard.index',           'uses' => 'DashboardController@index'] );

    Route::get(     'media',                        ['as' => 'admin.media.index',               'uses' => 'MediaController@index'] );
    Route::get(     'media/create',                 ['as' => 'admin.media.create',              'uses' => 'MediaController@create'] );
    Route::post(    'media/store',                  ['as' => 'admin.media.store',               'uses' => 'MediaController@store'] );
    Route::get(     'media/delete-modal/{mediaId}',  ['as' => 'admin.media.deleteModal',         'uses' => 'MediaController@getModalDelete'] );
    Route::get(  'media/delete/{mediaId}',        ['as' => 'admin.media.delete',              'uses' => 'MediaController@destroy'] );

    Route::post(    'api/media/store',                ['as' => 'admin.media.api-store',           'uses' => 'MediaController@apiStore'] );

    Route::get(     'pages',                        ['as' => 'admin.pages.index',               'uses' => 'PagesController@index'] );
    Route::get(     'pages/create',                 ['as' => 'admin.pages.create',              'uses' => 'PagesController@create'] );
    Route::get(     'pages/{pageId}/edit',          ['as' => 'admin.pages.edit',                'uses' => 'PagesController@edit'] );
    Route::put(     'pages/{pageId}/update',        ['as' => 'admin.pages.update',              'uses' => 'PagesController@update'] );
    Route::post(    'pages/store',                  ['as' => 'admin.pages.store',               'uses' => 'PagesController@store'] );
    Route::get(     'pages/delete-modal/{pageId}',  ['as' => 'admin.pages.deleteModal',         'uses' => 'PagesController@getModalDelete'] );
    Route::get(  'pages/delete/{pageId}',        ['as' => 'admin.pages.delete',              'uses' => 'PagesController@destroy'] );

    Route::get(     'sliders',                      ['as' => 'admin.sliders.index',             'uses' => 'SliderController@index'] );
    Route::get(     'sliders/create',               ['as' => 'admin.sliders.create',            'uses' => 'SliderController@create'] );
    Route::post(    'sliders/store',                ['as' => 'admin.sliders.store',             'uses' => 'SliderController@store'] );
    Route::get(     'sliders/{sliderId}/edit',          ['as' => 'admin.sliders.edit',                'uses' => 'SliderController@edit'] );
    Route::put(     'sliders/{sliderId}/update',        ['as' => 'admin.sliders.update',              'uses' => 'SliderController@update'] );
    Route::get(     'sliders/delete-modal/{sliderId}',['as' => 'admin.sliders.deleteModal',       'uses' => 'SliderController@getModalDelete'] );
    Route::get(  'sliders/delete/{sliderId}',      ['as' => 'admin.sliders.delete',            'uses' => 'SliderController@destroy'] );

    Route::get(     'portfolios',                      ['as' => 'admin.portfolios.index',             'uses' => 'PortfolioController@index'] );
    Route::get(     'portfolios/create',               ['as' => 'admin.portfolios.create',            'uses' => 'PortfolioController@create'] );
    Route::post(    'portfolios/store',                ['as' => 'admin.portfolios.store',             'uses' => 'PortfolioController@store'] );
    Route::get(     'portfolios/{id}/edit',               ['as' => 'admin.portfolios.edit',            'uses' => 'PortfolioController@edit'] );
    Route::put(     'portfolios/{id}/update',               ['as' => 'admin.portfolios.update',            'uses' => 'PortfolioController@update'] );
    Route::get(     'portfolios/delete-modal/{portfolioId}',['as' => 'admin.portfolios.deleteModal',       'uses' => 'PortfolioController@getModalDelete'] );
    Route::get(  'portfolios/delete/{portfolioId}',      ['as' => 'admin.portfolios.delete',            'uses' => 'PortfolioController@destroy'] );

    Route::get(     'categories',                      ['as' => 'admin.categories.index',             'uses' => 'CategoryController@index'] );
    Route::get(     'categories/create',               ['as' => 'admin.categories.create',            'uses' => 'CategoryController@create'] );
    Route::post(    'categories/store',                ['as' => 'admin.categories.store',             'uses' => 'CategoryController@store'] );
    Route::get(     'categories/{id}/edit',               ['as' => 'admin.categories.edit',            'uses' => 'CategoryController@edit'] );
    Route::put(     'categories/{id}/update',               ['as' => 'admin.categories.update',            'uses' => 'CategoryController@update'] );
    Route::get(     'categories/delete-modal/{categoryId}',['as' => 'admin.categories.deleteModal',       'uses' => 'CategoryController@getModalDelete'] );
    Route::get(  'categories/delete/{categoryId}',      ['as' => 'admin.categories.delete',            'uses' => 'CategoryController@destroy'] );

    Route::get(     'teams',                      ['as' => 'admin.teams.index',             'uses' => 'TeamController@index'] );
    Route::get(     'teams/create',               ['as' => 'admin.teams.create',            'uses' => 'TeamController@create'] );
    Route::post(    'teams/store',                ['as' => 'admin.teams.store',             'uses' => 'TeamController@store'] );
    Route::get(     'teams/delete-modal/{teamId}',['as' => 'admin.teams.deleteModal',       'uses' => 'TeamController@getModalDelete'] );
    Route::get(  'teams/delete/{teamId}',      ['as' => 'admin.teams.delete',            'uses' => 'TeamController@destroy'] );

    Route::get(     'partners',                      ['as' => 'admin.partners.index',             'uses' => 'PartnerController@index'] );
    Route::get(     'partners/create',               ['as' => 'admin.partners.create',            'uses' => 'PartnerController@create'] );
    Route::post(    'partners/store',                ['as' => 'admin.partners.store',             'uses' => 'PartnerController@store'] );
    Route::get(     'partners/delete-modal/{partnerId}',['as' => 'admin.partners.deleteModal',       'uses' => 'PartnerController@getModalDelete'] );
    Route::get(  'partners/delete/{partnerId}',      ['as' => 'admin.partners.delete',            'uses' => 'PartnerController@destroy'] );

    Route::get(     'clients',                      ['as' => 'admin.clients.index',             'uses' => 'ClientController@index'] );
    Route::get(     'clients/create',               ['as' => 'admin.clients.create',            'uses' => 'ClientController@create'] );
    Route::post(    'clients/store',                ['as' => 'admin.clients.store',             'uses' => 'ClientController@store'] );
    Route::get(     'clients/delete-modal/{partnerId}',['as' => 'admin.clients.deleteModal',       'uses' => 'ClientController@getModalDelete'] );
    Route::get(  'clients/delete/{partnerId}',      ['as' => 'admin.clients.delete',            'uses' => 'ClientController@destroy'] );

    Route::get(     'services',                      ['as' => 'admin.services.index',             'uses' => 'ServiceController@index'] );
    Route::get(     'services/create',               ['as' => 'admin.services.create',            'uses' => 'ServiceController@create'] );
    Route::post(    'services/store',                ['as' => 'admin.services.store',             'uses' => 'ServiceController@store'] );
    Route::get(     'services/{id}/edit',               ['as' => 'admin.services.edit',            'uses' => 'ServiceController@edit'] );
    Route::put(     'services/{id}/update',               ['as' => 'admin.services.update',            'uses' => 'ServiceController@update'] );
    Route::get(     'services/delete-modal/{serviceId}',['as' => 'admin.services.deleteModal',       'uses' => 'ServiceController@getModalDelete'] );
    Route::get(  'services/delete/{serviceId}',      ['as' => 'admin.services.delete',            'uses' => 'ServiceController@destroy'] );

    Route::get(     'positions',                      ['as' => 'admin.positions.index',             'uses' => 'PositionController@index'] );
    Route::post(    'positions/store',                ['as' => 'admin.positions.store',             'uses' => 'PositionController@store'] );
    Route::get(     'positions/delete-modal/{positionId}',['as' => 'admin.positions.deleteModal',       'uses' => 'PositionController@getModalDelete'] );
    Route::get(  'positions/delete/{positionId}',      ['as' => 'admin.positions.delete',            'uses' => 'PositionController@destroy'] );
});

