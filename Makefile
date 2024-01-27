init:
	docker-compose build
	docker-compose run --rm laravel composer install
	docker-compose up -d

db-start:
	./db start
db-stop:
	./db stop

test-db:
	docker-compose exec db mysql -h localhost -udocker -pdocker test

up:
	docker-compose up -d

down:
	docker-compose down

exec:
	docker-compose exec nginx bash