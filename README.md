## Php

### Install composer packages

```
composer install
```

## JavaScript

### Install node modules

```
npm install
```

### Start development server

```
npm run dev
```

### Compile for production

```
npm run build
```

## Vite

`VITE_SERVER_` environement variables need to be set in order for https, hmr, and vite-plugin-restart to work correctly.

`VITE_SERVER_KEY` and `VITE_SERVER_CERT` point to the ssl/tls certificate key pair location.

`VITE_SERVER_CERT` serves also as the location set to watch changes and restart whenever certificates are updated via the vite-plugin-restart.

`VITE_SERVER_HMR` ¡Important! Laravel only. Serves to indicate laravel where hmr is coming from.
