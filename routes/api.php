<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\PricingController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\AuditLogController;

Route::prefix('inventory')->group(function () {
    Route::get('/', [InventoryController::class, 'index']);
    Route::get('/{id}', [InventoryController::class, 'show']);
    Route::put('/update/{id}', [InventoryController::class, 'updateQuantity']);
});

Route::get('/pricing/{id}', [PricingController::class, 'calculatePrice']);
Route::post('/transaction', [TransactionController::class, 'process']);


Route::prefix('audit-logs')->group(function () {
    Route::get('/', [AuditLogController::class, 'index']);
    Route::get('/transaction/{transactionId}', [AuditLogController::class, 'showByTransaction']);
});
