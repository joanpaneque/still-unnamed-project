<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Boilerplate page
Route::get('/', function () {
    return Inertia::render('Index');
});
