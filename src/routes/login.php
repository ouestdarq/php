<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticationController;

/*
/--------------------------------------------------------------------------
/ Login Routes
/--------------------------------------------------------------------------
/
/ Here are registered the login routes for the project. These
/ routes are loaded by the RouteServiceProvider and all of them will
/ be assigned to the "web" middleware group.
/ 
/ Name of the file is most likely to change due to the demand of 
/ what ever will happen next. For now we're keeping it like this for 
/ readability.
*/

Route::view('login', 'login');

Route::name('login')
    ->middleware('guest')
    ->post('/login', [
        AuthenticationController::class,
        'login',
    ]);
