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

})->name("home");


Route::prefix('admin')->group(function () {
    
    Route::get('/', function () {
        //return str_replace( "/public", "", $_SERVER['DOCUMENT_ROOT'] . '/home');
        //return redirect(str_replace( "/public", "", $_SERVER['DOCUMENT_ROOT'] . '/home'));
        //return redirect()->route('admin.home');
        return("Hello! It's demo page, go to Home!");
    });
    
    Route::get('/home', function () {
        return view('admin.index');
    
    })->name("admin.home");

    Route::get('/stuff/', function () {
        return view('admin.com_stuff.index');
    })->name("admin.stuff");

    Route::prefix('stuff')->group(function () {

        Route::get('/speakers/', function () {
            return view('admin.com_stuff.stuff_speakers.speakers');
        })->name("admin.stuff.speakers");

        Route::get('/productors/', function () {
            return view('admin.com_stuff.stuff_productors.productors');
        })->name("admin.stuff.productors");
    });  


    Route::prefix('users')->group(function () {

        Route::get('/', function () {
            return view('admin.com_users.index');
        })->name("admin.users");

        Route::get('/userlist/', function () {
            return view('admin.com_users.userslist');
        })->name("admin.users.userlist");

        Route::get('/usereditor/', function () {
            return view('admin.com_users.usereditor');
        })->name("admin.users.usereditor");
    });

    Route::prefix('apps')->group(function () {

        Route::get('/', function () {
            return view('admin.com_applications.index');
        })->name("admin.apps");

        Route::get('/splmodule/', function () {
            return view('admin.com_applications.splmodule');
        })->name("admin.apps.splmodule");
    });


    Route::get('/info/', function () {
        return view('admin.com_info.index');
    })->name("admin.info");

    Route::get('/admins/', function () {
        return view('admin.com_admins.index');
    })->name("admin.admins");
});



