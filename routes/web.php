<?php
use App\Models\Produkt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduktControler;
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
Route::get('/zad1/dodajlosowe/{liczba}', [ProduktControler::class , 'index' ]);
Route::get('/zad1/lista/{fraza}', [ProduktControler::class , 'index1' ]);
Route::get('/zad6', [ProduktControler::class , 'index3' ]);
Route::get('/baza', [ProduktControler::class , 'index4' ]);
