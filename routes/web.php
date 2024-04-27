<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HasilpanenController;
use App\Http\Controllers\LinkdeviceController;
use App\Http\Controllers\ManagedeviceController;
use App\Http\Controllers\ManageuserController;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('guest')->group(
    function () {
        Route::get('/', function () {
            return view('welcome');
        })->name('welcome');
        Route::controller(AuthController::class)->group(
            function () {
                Route::get('/login', 'login')->name('login');
                Route::get('/register', 'register')->name('register');
                Route::post('/login', 'onlogin')->name('onlogin');
                Route::post('/register', 'onregister')->name('onregister');
            }
        );
    }
);
Route::middleware('auth')->group(
    function () {
        Route::controller(AuthController::class)->group(
            function () {
                Route::get('/logout', 'onlogout')->name('logout');
            }
        );
        Route::get('/dashboard', function () {
            return view('Pages.Dashboard.main.index');
        })->name('dashboard');
        Route::controller(ManageuserController::class)->group(
            function () {
                Route::get('/manageuser', 'index')->name('manageuser');
                Route::get('/manageuser/edit', 'edit')->name('manageuser/edit');
                Route::post('/manageuser/update', 'update')->name('manageuser/update');
            }
        );
        Route::controller(ManagedeviceController::class)->group(
            function () {
                Route::get('/managedevice', 'index')->name('managedevice');
                Route::post('/managedevice/add', 'add')->name('managedevice/add');
                Route::post('/managedevice/edit', 'edit')->name('managedevice/edit');
            }
        );
        Route::controller(HasilpanenController::class)->group(function () {
            Route::get('/hasilpanen', 'index')->name('hasilpanen');
        });
        Route::controller(LinkdeviceController::class)->group(function () {
            Route::get('/linkdevice', 'index')->name('linkdevice');
            Route::post('/linkdevice/add', 'add')->name('linkdevice/add');
            Route::get('/linkdevice/getuseranddevice', 'getuseranddevice')->name('linkdevice/getuseranddevice');
        });
    }
);
