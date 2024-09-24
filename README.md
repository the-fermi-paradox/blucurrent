## Age of Empires II Control Panel

Type `make help` for a list of commands.

Live deployment currently [here](http://joshgundy.com).

### Deployment (Production)
To deploy the project to production, follow these steps on a Debian-based Linux distribution:
1. `sudo apt install git docker docker-compose`
2. `git clone https://github.com/the-fermi-paradox/blucurrent.git`
3. download data files `releases.json, empires.json` into `/storage/app/private/`
4. `make fresh-prod`

### Deployment (Development - Docker)
To deploy the project for development with docker, follow these steps on a Debian-based Linux distribution:
1. `sudo apt install git docker docker-compose`
2. `git clone https://github.com/the-fermi-paradox/blucurrent.git`
3. download data files `releases.json, empires.json` into `/storage/app/private/`
4. `make fresh`

### Deployment (Development)
To deploy the project for development, follow these steps:
1. `git clone https://github.com/the-fermi-paradox/blucurrent.git`
2. download data files `releases.json, empires.json` into `/storage/app/private/`
3. `composer update`
4. `npm install`
5. `cp .env.example.local .env`
6. `touch database/database.sqlite`
7. `php artisan key:generate`
8. `php artisan migrate:fresh --seed`
9. `npm run build`
10. `php artisan serve`

### Features
#### Web Routes
- `GET /empire` : renders a Blade template with all available empires
- `GET /empire/{id}` : renders a Blade template displaying the queried empire
- `GET /empire/sort/{col?}/{order?}` : renders a Blade template with all empires sorted by `col` in `order` order
- `DELETE /empire/delete/{id}` : deletes the empire at the id
- `GET /empire/update/{id}` : renders a Blade template displaying the update form for the id
- `PUT /empire/update/{id}` : updates the empire at the id
- `GET /empire/create/` : renders a Blade template displaying the create form for a new empire
- `POST /empire/create/` : creates a new empire based on the form data

#### API Routes
- `GET /api/empires` : returns JSON serialization of empires table
- `GET /api/releases` : returns JSON serialization of releases table
