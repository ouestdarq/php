all: docker-php-service
	
docker-php-service:
	docker build -t proxymurder/php:latest -f Dockerfile ./