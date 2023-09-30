<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\FileController;
use Illuminate\Http\Request;

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

use App\Http\Controllers\Auth;
use App\Http\Controllers\Printing;

Route::get('/', [Auth::class, 'showLoginForm'])->name('login');
Route::post('/login', [Auth::class, 'login'])->name('login');
Route::post('/user-register', [Auth::class, 'register']);
Route::get('/logout', [Auth::class, 'logout']);

Route::get('/user/{data}', function ($url) {
    $url = [
        'page' => str_replace('-', '.', $url),
        'user' => auth()->user()
    ];

    return (
        view('theme.header') .
        view('theme.sidemenu')->with($url) .
        view('index')->with($url) .
        view('theme.footer')
    );
});

Route::post('/employee-register',  [DataController::class, 'registerEmployee']);

Route::view('/upload', 'upload-form');
Route::post('/process-file', [FileController::class, 'processFile'])->name('processFile');
Route::post('/process-file1', [FileController::class, 'processFile1'])->name('processFile1');

Route::get('/dtr', [Printing::class, 'print']);
Route::get('/generate-pdf', [Printing::class, 'generatePDF']);