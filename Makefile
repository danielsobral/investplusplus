.PHONY: up down migrate model migrate_create migrate_alter seed

up:
	docker compose up -d

down:
	docker compose down -v

migrate:
	docker compose exec -it laravel sh -c "php artisan migrate"

model:
	docker compose exec -it laravel sh -c "php artisan make:model $(name)"

migrate_create:
	docker compose exec -it laravel sh -c "php artisan make:migration create_$(name)_table"

migrate_alter:
	docker compose exec -it laravel sh -c "php artisan make:migration alter_$(name)_table_$(action) --table=$(name)"

migrate_refresh:
	docker compose exec -it laravel sh -c "php artisan migrate:refresh"

seed:
	docker-compose exec -it laravel sh -c "php artisan db:seed"

help:
	@echo "Available commands:"
	@echo ""
	@echo "up		Inicia os containers"
	@echo "down		Para os containers"
	@echo "migrate		php artisan migrate"
	@echo "migrate_create		name='nome_da_tabela'"
	@echo "migrate_alter		name='nome_da_tabela' action='add_column_slug'"
	@echo "migrate_refresh		php artisan migrate:refresh"
	@echo "help		Exibe esta ajuda"
