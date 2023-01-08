# FazWaz - Full Stack Developer Test

## User Story
Given **I am a user running the application,** when **I load the index page** then **I want to see a list of 25 properties that are for sale and unsold**.

### Acceptance Criteria

- Frontend should be coded in Vue.js
- The properties should include all the relevant data provided in the `properties.json` file.
- There should be pagination links at the bottom to navigate further down the records.
- There should be a search box to query the database for properties based on title or location.
- Dynamic routing with **provinces** should result in a list of properties provided in `properties.json` file (eg. https://localhost/bangkok/) otherwise 404.

## Setup
Clone the repository
```
git clone https://github.com/MgHtinLynn/fazwaz-test.git
```
And Switch to the repo folder
```
cd fazwaz-test
```
Install all the dependencies using composer and npm
```
composer install
npm install && npm run build
```
Copy the example env file and make the required configuration changes in the .env file
```
cp .env.example .env
```
Generate a new application key
```
php artisan key:generate
```
if you are already install Sail Cli, can use this
```
sail up -d
```
Server Up using Laravel Sail
```
./vendor/bin/sail up -d
```
Go Into docker container for running migration and seeding
```
docker exec -it fazwaz-laravel bash
```
And then
```
php artisan migrate --seed
```

After setting up for dev server, you can go to access with these URL
http://localhost/
OR
http://localhost/bangkok

## For TDD
you can run
```
php artisan test
```
