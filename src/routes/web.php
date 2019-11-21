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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/bootstrap', 'BootstrapController@index')->name('bootstrap');
Route::get('/bootstrap-container', 'BootstrapController@container');
Route::get('/bootstrap-grid', 'BootstrapController@grid');

Route::post('/pay', 'PaymentController@pay');

//検索機能
Route::get('/paginate', 'SearchController@index')->name('search.index');
Route::get('/paginateSimple', 'SearchController@indexSimple')->name('search.index');

// elastic search
use App\Articles\ArticlesRepository;

Route::get('/articles', function () {
    return view('articles.index', [
        'articles' => App\Article::all(),
    ]);
});

Route::get('/articles/search', function (ArticlesRepository $repository) {
    $articles = $repository->search((string) request('q'));

    return view('articles.index', [
        'articles' => $articles,
    ]);
});
