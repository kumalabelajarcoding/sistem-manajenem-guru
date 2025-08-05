<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;

Route::get('/', function () {
    return redirect('/guru');
});

Route::resource('guru', GuruController::class);
