<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PerbaikanController;
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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/asset/select', 'AssetController@select')->name('asset.select');
Route::get('search', 'AssetController@search')->name('search');

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::middleware('auth')->group(function() {
    Route::resource('basic', BasicController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('asset', AssetController::class);

    Route::get('/asset/perbaikan/{assets}', 'AssetController@perbaikan')->name('asset.perbaikan');
    Route::get('/asset/perbaikancreate/{assets}', 'AssetController@perbaikancreate')->name('asset.perbaikancreate');
    Route::post('/asset/perbaikanstore', 'AssetController@perbaikanstore')->name('asset.perbaikanstore');
    Route::get('/asset/{asset}/perbaikanedit', 'AssetController@perbaikanedit')->name('asset.perbaikanedit');
    Route::put('/asset/perbaikanupdate/{assets}', 'AssetController@perbaikanupdate')->name('asset.perbaikanupdate');
    Route::delete('/asset/perbaikan/{assets}', 'AssetController@perbaikandestroy')->name('asset.perbaikandestroy');

    Route::get('/asset/penyusutan/{assets}', 'AssetController@penyusutan')->name('asset.penyusutan');

    Route::get('/asset/lokasi/{assets}', 'AssetController@lokasi')->name('asset.lokasi');

    Route::get('/qrcode', 'AssetController@qrcode')->name('asset.qrcode');
});
