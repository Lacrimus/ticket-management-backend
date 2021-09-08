For internal reference:
`alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'` Setting sail alias 
`sail up` or `sail down` Control docker container
`sail shell` Enter interactive shell on a running laravel sail container (required for other commands as the system shell lacks mysql drivers)
`sail root-sheel` Shell with elevated permissions (needed for squashing migrations via `php artisan schema:dump`)
`php artisan up` or `php artisan down` Suspend or wake the application into maintenance mode
`php artisan test` Run unit and feature tests

-Run from sail shell-
`php artisan db:seed` Seed db with dummy data (for testing)
`php artisan sail:publish` Publish docker image from `/vendor/laravel/sail/runtimes` to `/docker`
`php artisan migrate` Perform db migration

Debugging commands:
`sail php artisan cache:clear`
`sail php artisan config:clear`

`docker volume prune --filter filter` Remove unused volumes
`docker system prune --volume volume` Remove unused volume data