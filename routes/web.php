<?php

use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;

Route::get("/", [Home::class, "home"])->name("home");