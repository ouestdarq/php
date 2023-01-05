## Php

Copy .env.example into .env

```
cp .env.example .env
```

`APP_NAME`, `APP_URL`, and `DB_NAME` are set to default value and can be either left at that or customized at will.
`DB_HOST` is set to db which is default docker mysql service, but can be changed into `127.0.0.1` if using database over local network.

Install composer vendor packages.

```
composer install
```

Finally, install artisan key.

```
artisan key:generate
```

## JavaScript

Install node modules

```
npm install
```

Run vite server

```
npm run dev
```

Compile for production

```
npm run build
```

## Vite

`VITE_` environement variables need to be set in order for https and hmr to work correctly.

`VITE_STEPPATH` serves as the location of `site.crt/site.key` pair for vite-plugin-smallstep.

`VITE_HMR_HOST`, `VITE_HMR_CLIENTPORT` variables to indicate laravel where hmr is coming from.
