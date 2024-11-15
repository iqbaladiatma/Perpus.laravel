<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Halamanbuku;
use App\Livewire\Halamanmember;
use App\Livewire\Halamanpinjam;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/buku', Halamanbuku::class)->middleware('auth')->name('buku');
Route::get('/member', Halamanmember::class)->middleware('auth')->name('member');
Route::get('/pinjam', Halamanpinjam::class)->middleware('auth')->name('pinjam');
