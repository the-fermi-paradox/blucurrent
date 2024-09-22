## Age of Empires II Control Panel

### Deployment
To deploy the project to production, follow these steps on a Debian-based Linux distribution:
1. `sudo apt install git docker docker-compose`
2. `git clone https://github.com/the-fermi-paradox/blucurrent.git`
3. `cd blucurrent`
4. download data files (releases.json, empires.json) into `/storage/app/private/data`
5. create `.env` file in project, be sure to use port 3306 for MySQL
6. `docker-compose up --build -d`

### Features
#### View Routes
- `GET "/" `: renders a Blade template with all available empires
- `GET "/{col?}"` : renders a Blade template with all empires sorted by `col`
- `DELETE "/empire/delete/{id}"` : deletes the empire at the id
- `GET "/empire/update/{id}"` : renders a Blade template displaying the update form for the id
- `PUT "/empire/update/{id}"` : updates the empire at the id
- `GET "/empire/create/"` : renders a Blade template displaying the create form for a new empire
- `POST "/empire/create/"` : creates a new empire based on the form data

### API Routes
- `GET "/api/empires"` : returns JSON serialization of empires table
- `GET "/api/releases"` : returns JSON serialization of releases table
