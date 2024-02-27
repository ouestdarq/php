# Laravel API

## Passport Authentication/Authorization

The default authentification package for managing requests is [Laravel Passport]().

Changes to this package have been made that we have yet to explore. In the meantime,
these are the compliments to make the package work done so far.

`routes/login.php` file registers the routes for the `/login` view `get` and `post` routes.
Loaded by `App/Providers/RouteServiceProvider` with `web (middleware)`.
`post` route logic is managed by `App\Http\Controllers\Auth\AuthenticationController` login method.

`routes/login.php` purpose will change in the future to a more vast functionality.

`resources/views/login.blade` is an HTML layout that includes in the document head

```
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name') }}</title>

@vite('resources/js/login.js')
```

and mounts a Vue "app" in `body#app` that has at the moment only two components. The login form and the login view.

Inside `vite.config.js` we have

```
laravel({
    input: [
        // path.resolve(__dirname, "./resources/js/app.js"),
        path.resolve(__dirname, "./resources/js/login.js"),
    ],
    refresh: true,
}),
```
