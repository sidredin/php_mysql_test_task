# Docker environment with PHP 8.0, MySQL 8.0, Nginx and some other services

## Requirements

- Docker
- Docker compose v1 or v2

or

- PHP ^8.0
- Composer

## Running the project with Docker Compose

### After cloning the repository from gitHub:

Copy .env.example (if `.env` file not exists):

```bash
cp .env.example .env
```

and set some parameters in `.env` file,
for example, `FORWARD_DB_PORT`, `FORWARD_REDIS_PORT`, `DB_PASSWORD`, `DB_HOST` etc,
if needed!

Then run:

```bash
#Docker compose v1 commands
docker-compose build 
docker-compose up -d

#Docker compose v2 commands
docker compose build 
docker compose up -d
```
