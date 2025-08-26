<?php

use App\Livewire\About\About;
use App\Livewire\Contact\ContactMe;
use App\Livewire\Post\PostAll;
use App\Livewire\Post\PostDetails;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/post/{id}/details', PostDetails::class)->name('post.details');
Route::get('/postAll', PostAll::class)->name('post.all');
Route::get('/contactMe', ContactMe::class)->name('contact.me');
Route::get('/about', About::class)->name('about');
