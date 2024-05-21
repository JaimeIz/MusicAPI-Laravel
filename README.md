# Simple Api for Music

## Configuration

Set the dotenv file

```dotenv
APP_NAME=MusicAPI
APP_ENV=dev
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=maria_db
DB_PORT=3306
DB_DATABASE=musicapi
DB_USERNAME=username
DB_PASSWORD=passwd
```

## Usage

### Manual

!TODO: start app with artisan

### Docker

Build docker compose

```console
$> docker compose build
```

Start docker compose

```console
$> docker compose up -d
```

Install deps

```console
$> docker compose exec musicapi composer install
```

Generate encription key for laravel

Install deps

```console
$> docker compose exec musicapi php artisan key:generate
```

Initiate database

```console
$> docker compose exec musicapi php artisan migrate
```

### Create User

```console
$> docker compose exec musicapi php artisan tinker
tinker> DB::table('users')->insert(['name'=>'username','email'=>'email@example.com','password'=>Hash::make('passwd')])

```

## Refereces used

[DigitalOcean Docker setup](https://www.digitalocean.com/community/tutorials/how-to-containerize-a-laravel-application-for-development-with-docker-compose-on-ubuntu-18-04)