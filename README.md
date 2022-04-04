# LSG Ticket management backend

This is the backend repository for the [ticket management app](https://github.com/lsglab/ticket-management), essentially a small server running a SQL database and exposing it to the clients via an API for synchonisation.

## Technologies

### Framework / Wrapper
+ Laravel PHP Framework for creating a REST API service
+ Sail (Laravel) Docker environment
+ Sanctum (Laravel) Authentication (built in)

## Future

+ Laravel Passport + OAuth 2.0

### Development Tools
+ git for version control
+ `php artisan` (Laravel CLI) for application building
+ composer for php dependency management

## Development
```sh
git clone https://github.com/lsglab/ticket-management-backend
```
Install dependencies (this gegnerates the missing `/vendors` directory)
```sh 
composer install
```
Generate a `.env` file for your clone of this project by using the example file.
Have artisan generete a unique key and make sure to **fill in the missing data** in your new config.
```sh
cp .env.example .env
php artisan key:generate
```
Optional shell alias for convenience
```sh
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```
Build the image and run the containers in detatched mode
```
sail build && sail up -d
```

## Deployment
+ Docker image deployed in local network or cloudspace
