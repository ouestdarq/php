all: php
	
php:
	docker build -t proxymurder/php:latest -f Dockerfile ./