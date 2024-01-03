<?php

use Illuminate\Support\Facades\Route;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Facades\Pdf;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pdf', function () {
    return Pdf::view('pdf')
        ->withBrowsershot(function (Browsershot $browsershot) {
            $browsershot->setNodeBinary('/home/athphane/.nvm/versions/node/v18.19.0/bin/node');
            $browsershot->setNpmBinary('/home/athphane/.nvm/versions/node/v18.19.0/bin/npm');
            $browsershot->noSandbox();
        })
        ->format('a4')
        ->footerView('footer')
    ->download('cert');
});
