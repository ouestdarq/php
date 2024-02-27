# Laravel API

## Passport Authentication/Authorization

The default authentification package for managing requests is [Laravel Passport]().

Changes to this package have been made that we have yet to explore. In the meantime,
these are the compliments to make the package work done so far.

`routes/oauth.php` file registers the routes for the `/login` view `get` and `post` routes.
Loaded by `App/Providers/RouteServiceProvider` with `web (middleware)`.
`post` route logic is managed by `App\Http\Controllers\Auth\AuthenticationController` login method.

`resources/views/login.blade` is an HTML layout that includes in the document head

```
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name') }}</title>

@vite('resources/js/login.js')
```

and mounts a Vue "app" in `body#app` that has at the moment only two components. The login form and the login view. That should take care of the front-end logic (only).

Inside `vite.config.js` we declare within the plugins the correct js that will be executing this task as well.

```
laravel({
    input: [
        path.resolve(__dirname, "./resources/js/login.js"),
    ],
}),
```

### Installation

If project template is being used of the first time then we'll have to run:

```
php artisan passport:keys
```

Public client will have to be created as well with the following command:

```
php artisan passport:client --public
```

Note the client ID as it will be important for the future.There is no Client Secret for this auth method.
