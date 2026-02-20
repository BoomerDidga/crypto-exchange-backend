<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransferController;

Route::post('/transfer/internal', [TransferController::class, 'internal']);

Route::get('/', function () {
    return view('welcome');
});
