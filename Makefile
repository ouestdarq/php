all:

php-laravel:
	php-laravel-artisan php-laravel-npm
	
php-laravel-artisan:
	docker build -t proxymurder:php:laravel ./Dockerfile

php-laravel-npm:
	docker build -t proxymurder:php:npm ./Dockerfile.js