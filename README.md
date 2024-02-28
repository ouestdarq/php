# Laravel Application

> Author's NOTES:
> PHP offers great documentation in an evolving ecosystem that has multiple functionalities, albeit dynamiclly typed and interpreted language.
> Regardless of it's stigma and/or limitations the language offers intuitive and strightforeward ways to write code and achieve tasks.
> `Laravel` framework and its ecosystem inherit the latter, making `backend` infrastructure implementation very concice; marking a starting point
> for any idea.
>
> This infrastructure, for now, manages `authentication` (whom is who) as well as serves the application's resources through
> various end-points as a (Json only) `programming application interface` or `API`. The `authrization` logic (whom is served what) is left to the `API`.
> We'll discuss briefly, later on, the adoption of well crafted components for future use and how to adjust for growth on this `API` ecosystem.
>
> The `frontend` managment and logic is left to browser-native technologies (i.e. javascript, html, css).
> Using Node as runtime and NPM to deliver packages; most notably `Vite`, `Vue`, and `Sass`;
> which (at the moment) satisfy most of the frontend needs and should deliver a browser-native "compiled" product [more on that...]().
>
> We'll try to refrain and include as less javascript as possible (or any other language for that matter)
> and include only the necessary packages within their respective package manager configuration file.
> Excempt for a few instructions probably on how to install and use, there should not be that much **mixing**.

## Table of contents

-   [Authentication (thephpleague/oauth2-server)]()
    -   [Passport](#passport-laravelpassport)
        -   [Passport Vue Components](#passport-vue-components)
    -   Notes and discussion
-   [Asset Bundling (Vite)]()
-   [API (laravel-json-api/laravel)]
    -   Notes and discussion

## Authentication ([thephpleague/oauth2-server](https://github.com/thephpleague/oauth2-server))

[ThePHPLeague](https://github.com/thephpleague) `oauth2-server` provides the infrastructure for the `authentication` stack.
Per the [documentation](https://oauth2.thephpleague.com/), laravel's `Passport` is marked as the official framework implementation.

Recomendations of dropping `password grant` are addressed and all documentation on the topic will be ignored and efforts no longer pursued.

Implementation of `PKCE` is _server only_. Client side is, in this case left to the client side to implement [more on that]()

\*\* Further research will have to be made on this subject.
Please check (Symphony) [thephpleague/oauth2-server-bundle](https://github.com/thephpleague/oauth2-server-bundle)

### Passport ([laravel/passport](https://github.com/laravel/passport))

(BACKUP reminder) If project template is being dowloaded for the first time then we'll have to run:

```
php artisan passport:keys
```

Public client will have to be created as well with the following command:

```
php artisan passport:client --public
```

Please note `Client ID` value for future reference; no `secret` is provided for this client method.

#### Usage remarks

`App/Providers/RouteServiceProvider` is currently registering `routes/oauth.php` file which has the records for required routes. These routes are mostly a mimic of the implementation done by the upstream `Passport` repository with minor syntax tweaks which serve no purpose other than to proceed with further testing of the `guard` clause, which at the moment of writing this, rest inconclusive.

However, file also registers the routes for `/login` as `get` (view) and `post` routes.

-   `login` view, `get` method retrieves resides within `resources/views/oauth` directory.
-   `login` method, `post` route follows is in `App\Http\Controllers\OAuth\AuthenticationController`.

### Passport Vue Components

`resources/views/oauth/authenticate.blade` initial DOM from which the javascript takes over.

```
<!DOCTYPE html>
...
<head>
...
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/js/login.js')
</head>
...
<body id="app">
</body>
</html>
```

The previous code snippet shows only one way to do this.
Since at that point of execution we're still in the domain of PHP, the csrf_token can be passed as a prop,
TODO:

```
<!DOCTYPE html>
...
<head>
...
    @vite('resources/js/login.js')
</head>
...
<body id="app">
    <login-view :csrf-token-prop="{{ csrf_token() }}"
</body>
</html>
```

None of the above seem to differ in any way other than semantics but testing has yet to prove that. Yet the ilustrate the broader area
being explored, the questions mainly remain. Is it worth breaking out of blade so quickly or could I have better results in the long run?
Can I never use blade (now that I think about it)? Security issues? Scalability issue just to mention a few of the wide area concerns.

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
