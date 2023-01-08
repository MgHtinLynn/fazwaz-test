# FazWaz - Full Stack Developer Test

## <a name="task">Task requirements</a>

Feel free to spend as much or as little time on the exercise as you like as long as the following requirements have been met. However, we understand people have busy lives and would guide you to spend no more than 3 hours on a submission. We also take into consideration the `Answers to technical questions.md` file and what you would like to have added if you had more time. You should look at this as the complete solution, it's much quicker to explain what you would like to have done than code it.

- Please complete the user story below.
- Your code should be deployable via Laravel Sail (aka Docker).
- You **must** include Unit tests.
- Forked repo with full Git log of your process.
- The design of the frontend is not important and is not judged in this test
- A database that stores the JSON file in a well-formed way, with appropriate indexes.
- A README to explain how to boot and run the end result.

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