<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Http\Controllers\CommissionController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\EmployeController;

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

Route::get('/',AdminController::class . '@index')->name('index');

Route::get('/admin',AdminController::class . '@index')->name('index');

Route::get('/accueil-admin',AdminController::class . '@accadmin')->name('accueil-admin');

Route::get('/accueil-employe',EmployeController::class . '@accemploye')->name('accueil-employe');

Route::get('/employe',EmployeController::class . '@index')->name('index');



// Fonction get generalisee
Route::get('/{controller}/{method}/{param?}', function ($controller, $method, $param = null) {
    $controller = app()->make("App\\Http\\Controllers\\{$controller}Controller");
    if ($param) {
        return $controller->$method($param);
    } else {
        return $controller->$method();
    }
})->where('param', '(.*)');


// Fonction post generalisee
Route::post('/{controller}/{method}', function ($controller, $method, Request $request) {
    $controller = app()->make("App\\Http\\Controllers\\{$controller}Controller");
    return $controller->$method($request);
});

