<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('orders/{id}', [OrderController::class, 'detail'])->name('orders.detail');
