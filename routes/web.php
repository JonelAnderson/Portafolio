<?php

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

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/main', function () {
        return view('admin.desktop');
    });
    Route::resource('/home', App\Http\Controllers\Admin\HomeController::class);
    Route::resource(
        '/about',
        App\Http\Controllers\Admin\AboutController::class
    );
    Route::resource(
        '/education',
        App\Http\Controllers\Admin\EducationController::class
    );
    Route::resource(
        '/experience',
        App\Http\Controllers\Admin\ExperienceController::class
    );
    Route::resource(
        '/portafolio',
        App\Http\Controllers\Admin\PortafolioController::class
    );
    //Rutas para el correo
    Route::resource(
        '/correo',
        App\Http\Controllers\Admin\CorreoController::class
    );

    Route::get('/services', 'App\Http\Controllers\Admin\ConfigController@Service')->name('service.config');
    Route::post('/services', 'App\Http\Controllers\Admin\ConfigController@save_cambios')->name('save_cambios.config');
});

//Rutas publicas
Route::get('/download-pdf', [
    'as' => 'generate.invoice.pdf',
    'uses' => 'App\Http\Controllers\PDFController@generateInvoicePDF',
]);

Route::post('/contacto', [App\Http\Controllers\FrontController::class, 'send']);
Route::get('/skills', [App\Http\Controllers\FrontController::class, 'index']);
