<?php

use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\ApproveAuthorizationController;
use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController;
use Laravel\Passport\Http\Controllers\ClientController;
use Laravel\Passport\Http\Controllers\DenyAuthorizationController;
use Laravel\Passport\Http\Controllers\ScopeController;
use Laravel\Passport\Http\Controllers\TransientTokenController;

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

Route::view('login', 'oauth/authenticate');

Route::name('authenticate')
    ->middleware('guest')
    ->post('/login', [
        AuthenticationController::class,
        'login',
    ]);

Route::name('token')
    ->middleware('throttle')
    ->post('/token', [
        AccessTokenController::class,
        'issueToken'
    ]);

Route::name('authorizations.authorize')
    ->get('/authorize', [
        AuthorizationController::class,
        'authorize',
    ]);

$guard = config('passport.guard', null);

Route::middleware([$guard ? 'auth:' . $guard : 'auth'])
    ->group(function () {
        Route::name('authorizations.approve')
            ->post('/authorize', [
                ApproveAuthorizationController::class,
                "approve",
            ]);

        Route::name('authorizations.deny')
            ->delete('/authorize', [
                DenyAuthorizationController::class,
                "deny",
            ]);

        Route::name('token.refresh')
            ->post('/token/refresh', [
                TransientTokenController::class,
                "refresh",
            ]);

        Route::name('tokens.index')
            ->get('/tokens', [
                AuthorizedAccessTokenController::class,
                "forUser",
            ]);

        Route::name('tokens.destroy')
            ->delete('/tokens/{token_id}', [
                AuthorizedAccessTokenController::class,
                "destroy",
            ]);

        Route::name('clients.index')
            ->get('/clients', [
                ClientController::class,
                "forUser",
            ]);

        Route::name('clients.store')
            ->post('/clients', [
                ClientController::class,
                "store",
            ]);

        Route::name('clients.update')
            ->put('/clients/{client_id}', [
                ClientController::class,
                "update",
            ]);

        Route::name('clients.destroy')
            ->delete('/clients/{client_id}', [
                ClientController::class,
                "destroy",
            ]);

        Route::name('scopes.index')
            ->get('/scopes', [
                ScopeController::class,
                "all",
            ]);
    });
