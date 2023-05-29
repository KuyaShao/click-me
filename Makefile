setup:
	@make build
	@make up 
	@composer-update
build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
up:
	docker-compose up -d

composer-update:
	docker exec clickme-laravel sh -c "composer update"

fresh-data:
	docker exec clickme-laravel sh -c "php artisan migrate:fresh"

data:
	docker exec clickme-laravel sh -c "php artisan migrate"
	docker exec clickme-laravel sh -c "php artisan db:seed"