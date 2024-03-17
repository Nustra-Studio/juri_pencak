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
    return redirect()->route('admin.panel.arena');
});
Route::get('/score',function(){
    return view('loginscore');
})->name('score');
Route::get('/timeradmin','AdminController@timer');
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/login-juri', function(){
    return view('jurilogin');
});
Route::get('/timer',function(){
    return view('timer');
});
Route::get('/redirect','AdminController@redirect');

    Route::prefix('admin')->group(function () {
        Route::post('/juri','AdminController@juri')->name('admin.juri');
        Route::post('/add-excel','AdminController@excel');
        Route::resource('/panel',AdminController::class);
        Route::prefix('panels')->group(function () {
            Route::get('/kelas', function () {
                $status = 'admin';
                return view('admin.kelas',compact('status'));
            });
            Route::get('/perserta', function () {
                $status = 'admin';
                return view('admin.perserta',compact('status'));
            });
            Route::get('/kontigen', function () {
                $status = 'admin';
                return view('admin.kontigen',compact('status'));
            });
            Route::get('/juri', function () {
                $status = 'admin';
                return view('admin.juri',compact('status'));
            });
            Route::get('/arena', function () {
                $status = 'admin';
                return view('admin.arena',compact('status'));
            })->name('admin.panel.arena');
            Route::get('/category', function () {
                $status = 'admin';
                return view('admin.category',compact('status'));
            });
        });
        Route::post('/arena-store','AdminController@arenastore')->name('arena.store');
        Route::get('/arena', 'AdminController@arena');
    });
    Route::prefix('tanding')->group(function () {
        Route::resource('juri', JuriController::class);
        Route::resource('dewan', DewanController::class);
        Route::get('/', function () {
            return view('penilaian.score');
        });
    });
    Route::prefix('seni')->group(function () {
        Route::resource('juri-seni',JuriSeniController::class);
        Route::resource('dewan-seni',DewanSeniController::class);
        Route::get('/', function () {
            return view('seni.score');
        });
        Route::get('/juri-solo', function () {
            return view('seni.ganda.juri');
        });
        Route::get('/juri-tunggal', function () {
            return view('seni.tunggal.juri');
        });
        Route::get('/dewan-solo', function () {
            return view('seni.ganda.dewan');
        });
        Route::get('/dewan-tunggal', function () {
            return view('seni.tunggal.dewan');
        });
    });
Route::get('/sse', 'JuriController@stream');
Route::get('/call-data','JuriController@data');
Route::get('/call-data/seni','JuriController@dataseni');
