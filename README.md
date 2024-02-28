# Laravel Application

> Author's NOTES:
> PHP offers great documentation in an evolving ecosystem that has multiple functionalities, albeit dynamiclly typed and interpreted language.
> Regardless of it's stigma and/or limitations the language offers intuitive and strightforeward ways to write code and achieve tasks.
> `Laravel` framework and its ecosystem inherit the latter, making `backend` infrastructure implementation very concice; marking a starting point
> for any idea.
>
> This infrastructure, for now, manages `authentication` (whom is who) as well as serves the application's resources through
> various end-points as a (Json only) `programming application interface` or `API`. The `authrization` logic (whom is served what) is left to the `API`.
> We'll discuss briefly, later on, the adoption of well crafted components for future use and how to adjust for growth.
>
> The `frontend` managment and logic is left to browser-native technologies (i.e. javascript, html, css).
> Using Node as runtime and NPM to deliver packages; most notably `Vite`, `Vue`, and `Sass`;
> which (at the moment) satisfy most of the frontend needs and should deliver a browser-native "compiled" product (more on that...).
>
> We'll try to refrain and include as less javascript as possible (or any other language for that matter)
> and include only the necessary packages within their respective package manager configuration file.
> Excempt for a few instructions probably on how to install and use, there should not be that much `mixing`.

## Table of contents

-   [Authentication (thephpleague/oauth2-server)]()
    -   [Passport]()
    -   [Vue]()
    -   Notes and discussion
-   [Asset Bundling (Vite)]()
-   [API (laravel-json-api/laravel)]
    -   Notes and discussion

## Authentication ([thephpleague/oauth2-server](https://github.com/thephpleague/oauth2-server))

[ThePHPLeague](https://github.com/thephpleague) `oauth2-server` provides the infrastructure for our `authentication` stack.
Per the [documentation](https://oauth2.thephpleague.com/), laravel's `Passport` is marked as the official framework implementation.

\*\* Further research will have to be made on this subject.
Please check (Symphony) [thephpleague/oauth2-server-bundle](https://github.com/thephpleague/oauth2-server-bundle)

### Passport ([laravel/passport](https://github.com/laravel/passport))

(BACKUP reminder) If project template is being dowloaded of the first time then we'll have to run:

```
php artisan passport:keys
```

Public client will have to be created as well with the following command:

```
php artisan passport:client --public
```

Note the `Client ID` value as it will be important for the future.There is no `secret` for this client method.

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
