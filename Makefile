DOCKER_COMPOSE = "docker-compose"
DOCKER = "docker"

# Docker compose > Init
docker-init:
	$(DOCKER) volume create svj_db

# Docker compose > Development > Build
docker-dev-build:
	$(DOCKER_COMPOSE) -f docker-compose.yml -f docker-compose.dev.yml build

# Docker compose > Development > Start
docker-dev-start:
	$(DOCKER_COMPOSE) -f docker-compose.yml -f docker-compose.dev.yml up -d

# Docker compose > Development > Stop
docker-dev-stop:
	$(DOCKER_COMPOSE) -f docker-compose.yml -f docker-compose.dev.yml down

# PHP Code sniffer
phpcs:
	docker exec svj_php vendor/bin/phpcs --standard=phpcs.xml src --error-severity=0
	docker exec svj_php vendor/bin/phpcs --standard=phpcs.xml src --warning-severity=0
phcbf:
	docker exec svj_php vendor/bin/phpcbf --standard=phpcs.xml src --error-severity=0
	docker exec svj_php vendor/bin/phpcbf --standard=phpcs.xml src --warning-severity=0
phpstan:
	docker exec svj_php vendor/bin/phpstan analyse
