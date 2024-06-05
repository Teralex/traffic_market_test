ROOT_DIR = $(shell dirname $(realpath $(lastword $(MAKEFILE_LIST))))

SHELL ?= /bin/bash
ARGS = $(filter-out $@,$(MAKECMDGOALS))

BUILD_ID ?= $(shell /bin/date "+%Y%m%d-%H%M%S")

.SILENT: ;               # no need for @
.ONESHELL: ;             # recipes execute in same shell
.NOTPARALLEL: ;          # wait for this target to finish
.EXPORT_ALL_VARIABLES: ; # send all vars to shell
Makefile: ;              # skip prerequisite discovery

# Run make help by default
.DEFAULT_GOAL = help

ifneq ("$(wildcard ./VERSION)","")
VERSION ?= $(shell cat ./VERSION | head -n 1)
else
VERSION ?= 0.0.1
endif

%.env:
	cp $@.dist $@

# Public targets
.PHONY: .title
.title:
	$(info $(APP_NAME) v$(VERSION))

.PHONY: up
up:
	docker-compose up -d

.PHONY: down
down: ## Stop and kill containers
	docker-compose down

.PHONY: bash
bash: ## Run app container bash
	docker-compose exec app bash

.PHONY: prune
prune: ## Prune docker volumes and system
	docker-compose down -v

.PHONY: reset
reset: prune up ## Prune and up

.PHONY: start
start: ## Start containers.
	docker-compose start

.PHONY: stop
stop: ## Stop containers.
	docker-compose stop

.PHONY: migrate
migrate:
	docker-compose exec app php artisan migrate

.PHONY: seed
seed:
	docker-compose exec app php artisan db:seed
