## About 

This is a simple google auth and lastfm integration webapp, to run the project

- download source code
- run composer install
- create a database named zatec
- run php artisan migrate to import databases
- run php artisan serve --port=8003
 * your project will be running on this url http://127.0.0.1:8003
- start surfing and enjoy


## Images
Images used where taken from sevveral websites and are not mine

## Google callbck url 
is matching the one set at  endpoint http://127.0.0.1:8003/auth/google/callback, for google to work, it should  be simmilar port 8003
