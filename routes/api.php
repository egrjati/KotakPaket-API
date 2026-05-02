<?php

use App\Http\Controllers\Api\NotifikasiController;
use App\Http\Controllers\Api\PesananController;
use Illuminate\Support\Facades\Route;

// Pesanan routes
Route::get('/pesanan', [PesananController::class, 'index']);
Route::post('/pesanan', [PesananController::class, 'store']);
Route::get('/pesanan/{id}', [PesananController::class, 'show']);
Route::put('/pesanan/{id}/status', [PesananController::class, 'updateStatus']);
Route::post('/pesanan/upload-image', [PesananController::class, 'uploadImage']);
Route::delete('/pesanan/{id}', [PesananController::class, 'destroy']);

// Notifikasi routes
Route::get('/notifikasi', [NotifikasiController::class, 'index']);
Route::get('/notifikasi/unread', [NotifikasiController::class, 'unread']);
Route::post('/notifikasi', [NotifikasiController::class, 'store']);
Route::put('/notifikasi/read-all', [NotifikasiController::class, 'markAllRead']);
Route::put('/notifikasi/{id}/read', [NotifikasiController::class, 'markRead']);
