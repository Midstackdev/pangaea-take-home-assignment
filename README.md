## About Laravel live notifications

This is a real time notification server backend built with laravel.

## Features 

- Laravel 8.
- Laravel websockets 


## Instalation

- Clone the repo
- Copy .env.example to .env and set with your database settings
```
BROADCAST_DRIVER=pusher
PUSHER_APP_ID=local
PUSHER_APP_KEY=local
PUSHER_APP_SECRET=local
```
- Run composer install
```bash
    composer install
```
- Generate app key
```bash
    php artisan key:generate
```
- Run migrations and seeder
```bash
    php artisan migrate --seed
```
- Serve the application
```bash
    php artisan serve
```
- Serve the realtime server
```bash
    php artisan websockets:serve
```
- Visit the realtime dashboard in browser
> http://laravel-pangaea.test/laravel-websockets or http://your-app-home/laravel-websockets


## Testing features
- The application is seeded with 10 users with ids from 1-10
- The application is seeded with five topics
> laravel, php, javascript, nodejs, express
- Random users have been subcribed to different topics during seeding.
- Test realtime notificatioons with postman.
> POST api/publish/{topic} topic is any of the five topics to http://laravel-pangaea.test/api/publish/{topic} or http://your-app-home/api/publish/{topic} with the json data below
```
    {
		"data":{"msg": "hello"}
	}
```
- The subscribed users to the topic gets realtime notification, view result in the browser dahboard mentioned above.
- The subscribed users when logged into a javascript client configured to receive the notifications will see them with the sent data.
