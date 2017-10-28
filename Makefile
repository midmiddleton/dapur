dev-run: dev-build 
	docker-compose -f resources/docker/docker-compose.yml up -d

dev-build: dev-purge
	docker-compose -f resources/docker/docker-compose.yml build

dev-run-interactive: dev-build
	docker-compose -f resources/docker/docker-compose.yml up

dev:
	docker-compose -f resources/docker/docker-compose.yml run --rm --p 3000:3000 -p 80:3000 dcg-cinema-web-app npm run dev

dev-app-build:
	docker-compose -f resources/docker/docker-compose.yml run --rm dcg-cinema-web-app npm run build

dev-app-test:
	docker-compose -f resources/docker/docker-compose.yml run --rm dcg-cinema-web-app npm run test

dev-purge:
	docker-compose -f resources/docker/docker-compose.yml stop
	docker-compose -f resources/docker/docker-compose.yml rm -vf

rancher-run:
	rancher-compose -f resources/rancher/docker-compose.yml --url http://46.101.21.96 --access-key 8E544F07409386F16BDB  --secret-key WVzZdjT3o7bVcSWBmdhMTBCg4peKgpy5h6kH5gq3 -p dapur up -d

rancher-remove:
	rancher-compose -f resources/rancher/docker-compose.yml --url http://46.101.21.96 --access-key 8E544F07409386F16BDB  --secret-key WVzZdjT3o7bVcSWBmdhMTBCg4peKgpy5h6kH5gq3 -p dapur rm

# Helper to just clear all docker containers and images
clear-docker-images:
	docker rm $$(docker ps -a -q) -f
	docker rmi $$(docker images -q) -f
