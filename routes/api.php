<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\WalletController;

Route::post('transfer/internal', [TransferController::class, 'internal']);
Route::apiResource('wallets', WalletController::class);