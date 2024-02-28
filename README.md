# Laravel Application

> PHP offers great documentation and an evolving ecosystem that has a lot to offer, albeit dynamiclly typed and interpreted language.
> Regardless of it's stigma and/or limitations the language offers intuitive and strightforeword ways to write code and achieve tasks.
> Laravel framework and its ecosystem inherit the latter, making backend infrastructure implementation very concice; marking the starting point
> of any idea.
>
> The frontend managment and logic is left to native browser technologies (i.e. javascript, html, css). Project uses Node as runtime and NPM to deliver
> packages; most notably `VITE`, VUE, sass, and bootstrap-scss. The latter satisfy most of the frontend needs (at the moment).
> We'll try and refrain to include as much javascript (or any other language for that matter) and include only the necessary packages in their
> respective package manager. Excempt for a few instructions probably on how to install them, there should not be that much "mixing".

Laravel application, at the moment, serves two purposes. `Authentication` and (JSON only) application programming interface `(API)`.
Both of these functionalities are made possible with the assistance of one or more packages. Most notably we have:

-   Laravel's (own) [Passport](https://github.com/laravel/passport) for `authentication`, which seems to be the official implementation of
    [thephpleague/oauth2-server](https://github.com/thephpleague/oauth2-server).
-   [Laravel JSON API](https://github.com/laravel-json-api/laravel) package for (JSON only) `API`.

\*\* Further research has to be made on these packages. Check [oauth2-server-bundle](https://github.com/thephpleague/oauth2-server-bundle)

## Passport Authentication/Authorization

Changes to this package have been made that we have yet to explore.

However thus far, we've encountered that there is a change in the way passport is registering their routes.

Before, we had more methods available to call the routes since we could register:

```
Passport::routes(
    function ($router) {
        $router->forAuthorization();
        $router->forAccessTokens();
        $router->forTransientTokens();
    }
);
```

These are no longer available and have been replaced by `Passport::registerRoutes` which registers routes contained within
`vendor/laravel/passport/routes/web.php` if `Passport::$registersRoutes` is false which can be accomplished by declaring either
of the following on the `boot` method of `app/Providers/AppServiceProvider`.

```
Passport::ignoreRoutes();
Passport::$registersRoutes = false;
```

\*\* I fail to see what is the use behind having a static method `Passport::registerRoutes` that both changes the `public static variable ($registersRoutes)` to `false` and returns a `new static (Passport::class)` rathen than just changing the static variable value.

Same thing can be said for methods like:

-   `Passport::hashClientSecrets`
-   `Passport::ignoreMigrations`

\*\* fail to understand as well why is it that we are returning a `new static` instead of `$this` for example.

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
