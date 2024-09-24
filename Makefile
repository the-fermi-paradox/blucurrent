.PHONY: help ps build build-prod up up-prod fresh fresh-prod stop restart destroy \
	cache cache-clear migrate migrate migrate-fresh tests tests-html

CONTAINER_PHP=php
CONTAINER_DATABASE=database

help: ## Print help.
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n\nTargets:\n"} /^[a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-10s\033[0m %s\n", $$1, $$2 }' $(MAKEFILE_LIST)

ps: ## Show containers.
	@docker ps

build: ## Build all containers for DEV
	@docker-compose -f compose-local.yml build

build-prod: ## Build all containers for PROD
	@docker-compose -f compose-prod.yml build

rebuild: ## Hard rebuild for DEV
	@docker-compose -f compose-local.yml build --no-cache

rebuild-prod: ## Hard rebuild for PROD
	@docker-compose -f compose-prod.yml build --no-cache

up: ## Start all containers for DEV
	@docker-compose -f compose-local.yml up --force-recreate -d

up-prod: ## Start all containers for PROD
	@docker-compose -f compose-prod.yml up --force-recreate -d

fresh:  ## Destroy & recreate all using dev containers.
	make destroy
	make build
	make up

fresh-prod: ## Destroy & recreate all using prod containers.
	make destroy
	make build-prod
	make up-prod

stop: ## Stop all containers
	@docker-compose -f compose-local.yml stop
	@docker-compose -f compose-prod.yml stop

restart: stop up ## Restart all containers

destroy: ## Stop all containers and remove them
	@docker-compose -f compose-local.yml down
	@docker-compose -f compose-prod.yml down

bash: ## go into PHP container
	docker exec -it ${CONTAINER_PHP} bash

install: ## Run composer install
	docker exec ${CONTAINER_PHP} composer install

migrate: ## Run migration files
	docker exec ${CONTAINER_PHP} php artisan migrate

migrate-fresh: ## Clear database and run all migrations
	docker exec ${CONTAINER_PHP} php artisan migrate:fresh

webpack: ## Rebundle web assets
	docker exec ${CONTAINER_PHP} npm run build
