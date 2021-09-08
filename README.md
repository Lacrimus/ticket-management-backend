# LSG Ticket management backend

This is the backend repository for the [ticket management app](https://github.com/lsglab/ticket-management), essentially a small server running a SQL database and exposing it to the clients via an API for synchonisation.

## Technologies

### Framework / Wrapper
+ Laravel PHP Framework for creating a REST API service
+ Sail (Laravel) Docker environment
+ Sanctum (Laravel) Authentication (built in)

### Development Tools
+ git for version control
+ `php artisan` (Laravel CLI) for application building
+ composer for php dependency management

## Development
+ `git clone https://github.com/lsglab/ticket-management-backend`
+ `composer install` (generates `/vendor` directory)
+ `alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'` (set a bash alias for convenience)
+ `sail build && sail up -d` (build the image and run the containers in detatched mode)

## Deployment
+ Docker image deployed in local network or cloudspace
