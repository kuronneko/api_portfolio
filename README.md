# PortfolioGestor 9000

This project provides a small CMS/API for personal portfolio data. It includes a simple Vue-based admin UI and a REST API secured with Laravel Passport. The API can return a JSON representation of a Persona which you can consume from any static site.

## Minimum requirements

Make sure your development machine meets these minimums:

- PHP 7.4+ (PHP 8.x recommended)
- Composer 2.x
- Node.js 14+ and npm or Yarn
- MySQL 5.7+ / MariaDB 10.2+ or PostgreSQL
- Git
- For Docker/Sail: Docker 20.10+ and Docker Compose v2 (or Docker Desktop)
- Common PHP extensions: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML

## Features

- Manage Personas, Projects, Skills, Social links and Details
- Relational database design for portfolio entities
- RESTful API endpoints
- API authentication using Laravel Passport
- Vue.js admin UI (SPA) with Bootstrap 5
- Validation (Vuelidate), friendly alerts (SweetAlert2), and loaders
- Seeders to populate demo data

The `app/Models` directory contains the main entities: `User`, `Persona`, `Project`, `Skill`, `Social`, `Type`, `Country`, `City`, `Detail`.

## Tech stack / Libraries

- Backend: Laravel (see composer.json for exact version)
- Frontend (admin): Vue.js, Bootstrap 5
- Auth/API: Laravel Passport
- Build tools: npm, Laravel Mix

## Preview

<p> <img src="https://github.com/kuronneko/kuronneko.github.io/blob/master/assets/img/portfolioapi.png" width="450"> </p>

Database design (ER diagram):

<p> <img src="https://raw.githubusercontent.com/kuronneko/kuronneko.github.io/master/assets/img/portfoliodb.png" width="450"> </p>

## Installation — Normal / Local development

Follow these steps to run the app locally without Docker:

1. Clone the repo and enter the directory

```bash
git clone <repo-url>
cd portfolio
```

2. Copy the environment file and install PHP dependencies

```bash
cp .env.example .env
composer install --no-interaction --prefer-dist
```

3. Generate app key

```bash
php artisan key:generate
```

4. Configure your `.env` database connection (MySQL/Postgres) and other variables.

5. Run migrations and seeders

```bash
php artisan migrate --seed
```

6. Install Passport (API authentication)

```bash
php artisan passport:install --force
```

7. Install frontend dependencies and build assets (optional for API-only)

```bash
npm install
npm run dev   # or `npm run prod` for production
```

8. Start the local server

```bash
php artisan serve
# Visit http://127.0.0.1:8000
```

Demo credentials (if seeds are included):

- Email: `admin@gmail.com`
- Password: `12345678`

## Installation — Docker (Laravel Sail)

If you prefer Docker, Laravel Sail offers an easy local Docker environment.

1. Ensure Docker and Docker Compose are installed and running.

2. From the project root, install Sail (if not already present) and publish docker resources:

```bash
composer require laravel/sail --dev
php artisan sail:install --with=mysql,redis
```

3. Start Sail

```bash
./vendor/bin/sail up -d
# or if you added the sail alias: sail up -d
```

4. Once containers are up, run the setup inside the Sail container:

```bash
./vendor/bin/sail composer install
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
./vendor/bin/sail artisan passport:install --force
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

5. Access the app via the forwarded port (usually http://localhost)

Notes:
- If this project includes a `docker-compose.yml` already, you can use it directly (`docker compose up -d`) — inspect that file to confirm services and ports.

## Environment variables

Check `.env.example` for the required environment variables. Typical important entries:

- APP_NAME, APP_ENV, APP_KEY, APP_URL
- DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
- MAIL settings (if used)

After editing `.env`, run `php artisan config:clear` and `php artisan cache:clear` if needed.

## Database

Migrations are in `database/migrations/`. Seeders are available in `database/seeders/DatabaseSeeder.php`.

To reset and seed the DB locally:

```bash
php artisan migrate:fresh --seed
```

Or with Sail:

```bash
./vendor/bin/sail artisan migrate:fresh --seed
```

## Usage

- Create an account using the admin UI.
- Create Persona records and add Skills, Projects and Social links.
- Use the top-right controls in the admin UI to obtain the JSON endpoint and token information for consumption by static sites.

API endpoints are defined under `routes/api.php` — use Postman or curl to explore them. Authentication uses Passport (OAuth2 personal access tokens).

Example: request a personal access token (if you have credentials)

```bash
curl -X POST "http://localhost/oauth/token" \
	-H "Content-Type: application/json" \
	-d '{"grant_type":"password","client_id":1,"client_secret":"<secret>","username":"admin@gmail.com","password":"12345678","scope":""}'
```

Replace `<secret>` with the password of the password-client created by `php artisan passport:install`.

## API routes

Below is a summary of the main API endpoints found in `routes/api.php`. Routes marked with (auth) require an authenticated user (Passport personal access token).

- Auth
	- POST /register — Register a new user (public)
	- POST /login — Login and receive credentials (public)
	- POST /logout — Logout (auth)
	- POST /oauth/token — OAuth token endpoint (Passport)

- Persona
	- GET /persona — List personas (auth)
	- POST /persona — Create persona (auth)
	- GET /persona/{persona} — Get persona (auth)
	- PUT /persona/{persona} — Update persona (auth)
	- DELETE /persona/{persona} — Delete persona (auth)
	- PUT /persona/status/{persona} — Toggle or update persona status (auth)
	- GET /persona/get/{uuid} — Get active persona by UUID (public)
	- GET /projects/{persona} — Get projects for a persona (auth)
	- GET /socials/{persona} — Get socials for a persona (auth)
	- GET /skills/{persona} — Get skills for a persona (auth)

- Project
	- GET /project — List projects (auth)
	- POST /project — Create project (auth)
	- GET /project/{project} — Get project (auth)
	- PUT /project/{project} — Update project (auth)
	- DELETE /project/{project} — Delete project (auth)
	- PUT /project/status/{project} — Toggle or update project status (auth)
	- GET /project/details/{project} — Get details for a project (auth)

- Skill
	- GET /skill — List skills (auth)
	- POST /skill — Create skill (auth)
	- GET /skill/{skill} — Get skill (auth)
	- PUT /skill/{skill} — Update skill (auth)
	- DELETE /skill/{skill} — Delete skill (auth)
	- GET /skill/get/types — Get skill types (auth)

- Social
	- GET /social — List socials (auth)
	- POST /social — Create social (auth)
	- GET /social/{social} — Get social (auth)
	- PUT /social/{social} — Update social (auth)
	- DELETE /social/{social} — Delete social (auth)

- City
	- GET /city — List cities (auth)
	- POST /city — Create city (auth)
	- GET /city/{city} — Get city (auth)
	- PUT /city/{city} — Update city (auth)
	- DELETE /city/{city} — Delete city (auth)

- Detail
	- GET /detail — List details (auth)
	- POST /detail — Create detail (auth)
	- GET /detail/{detail} — Get detail (auth)
	- PUT /detail/{detail} — Update detail (auth)
	- DELETE /detail/{detail} — Delete detail (auth)

Notes:

- Replace `{persona}`, `{project}`, `{skill}`, `{social}`, `{city}`, `{detail}` with the numeric ID or UUID the application expects (check model route binding in controllers).
- The `POST /oauth/token` endpoint is used by Passport to exchange credentials for tokens; for password grants you need the client id/secret created by `php artisan passport:install`.
- To call protected routes, include the access token in the Authorization header: `Authorization: Bearer <access_token>`.


## Running tests

Run the test suite with PHPUnit or Artisan:

```bash
php artisan test
# or
./vendor/bin/phpunit
```

With Sail:

```bash
./vendor/bin/sail test
```

## Troubleshooting

- Permissions: if you see errors writing to `storage` or `bootstrap/cache`, run:

```bash
sudo chown -R $USER:www-data storage bootstrap/cache
chmod -R ug+rwx storage bootstrap/cache
```

- Composer memory errors: try `COMPOSER_MEMORY_LIMIT=-1 composer install`.
- If migrations fail, double-check DB credentials in `.env` and that the DB service is running.

## Contributing

Contributions are welcome. Suggested small improvements:

- Add/update `.env.example` with required variables
- Add API documentation (OpenAPI/Swagger)
- Improve seeders and add more tests

Please open issues or submit pull requests.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
