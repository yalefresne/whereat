DOCKER_COMP = docker-compose
EXEC_PHP    = $(DOCKER_COMP) exec -T php
EXEC_JS     = $(DOCKER_COMP) run --rm node
SYMFONY     = $(EXEC_PHP) bin/console
COMPOSER    = $(DOCKER_COMP) run --rm composer
YARN        = $(EXEC_JS) yarn
BASH_PHP    = $(DOCKER_COMP) exec php bash
BASH_JS     = $(EXEC_JS) sh

COMMANDS_W_ARGS = add addev update require reqdev
SUPPORTS_MAKE_ARGS = $(findstring $(firstword $(MAKECMDGOALS)), $(COMMANDS_W_ARGS))
ifneq ($(SUPPORTS_MAKE_ARGS), "")
  COMMAND_ARGS = $(wordlist 2,$(words $(MAKECMDGOALS)),$(MAKECMDGOALS))
  $(eval $(COMMAND_ARGS):;@:)
endif

.DEFAULT_GOAL := help
help: ## Outputs this help screen
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help

.env.local: .env
	@if [ -f .env.local ]; then \
		echo '\033[1;41mYour .env.local file may be outdated because .env has changed.\033[0m';\
		echo '\033[1;41mCheck your .env.local file, or run this command again to ignore.\033[0m';\
		touch .env.local;\
		exit 1;\
	else\
		cp .env .env.local;\
	fi

## —— Initialize Project 🚀 ————————————————————————————————————————————————————
init: gc up install ynstall ## Initialize the project

## —— Docker 🐳 ————————————————————————————————————————————————————————————————
up: docker-compose.yaml ## Start the docker hub
	$(DOCKER_COMP) up -d

docker-build: docker-compose.yaml ## UP+rebuild the application image
	$(DOCKER_COMP) up -d --build

down: docker-compose.yaml ## Stop the docker hub
	$(DOCKER_COMP) down --remove-orphans

## —— Composer 🧙‍♂️ ————————————————————————————————————————————————————————————
install: composer.lock ## Install vendors according to the current composer.lock file
	$(COMPOSER) install --no-progress --no-suggest --prefer-dist --optimize-autoloader

update: composer.json ## Update vendors according to the composer.json file
	$(COMPOSER) update $(COMMAND_ARGS)

require: ## Followed by package name to add it.
	$(COMPOSER) require $(COMMAND_ARGS)

reqdev: ## Followed by package name to add it in require-dev.
	$(COMPOSER) require --dev $(COMMAND_ARGS)

## —— Yarn 🧶 ——————————————————————————————————————————————————————————————————
ynstall: ## Install node modules according to current package.json file
	$(YARN) install

add: ## Followed by package name to add it.
	$(YARN) add $(COMMAND_ARGS)

addev: ## Followed by package name to add it in devDependencies.
	$(YARN) add $(COMMAND_ARGS) --dev

## —— Symfony 🎵 ———————————————————————————————————————————————————————————————
sf: ## List all Symfony commands
	$(SYMFONY)

cc: ## Clear the cache
	$(SYMFONY) cache:clear

warmup: ## Warmup the cache
	$(SYMFONY) cache:warmup

purge: ## Purge cache and logs
	rm -rf var/cache/* var/logs/*

## —— Doctrine ▶️ ———————————————————————————————————————————————————————————————
dgm: ## Generate a blank migration class
	$(SYMFONY) doctrine:migrations:generate
dmm: ## Execute migrations
	$(SYMFONY) doctrine:migrations:migrate

## —— Coding standards ✨ ——————————————————————————————————————————————————————
cs: ## Executes php cs fixer
	$(EXEC_PHP) bash -c "vendor/bin/php-cs-fixer --no-interaction --diff -v fix"

## —— Config Github ⚙️ ——————————————————————————————————————————————————————————
gc: ## Config path to Github hook
	git config core.hooksPath .github/hooks

## —— Tools 🔧 —————————————————————————————————————————————————————————————————
bp: ## Bash into php container
	$(BASH_PHP)

bn: ## Bash into node container
	$(BASH_JS)
