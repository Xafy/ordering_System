# Ordering_system_task 

## roles
- cutomers can only use the api routes 
- service providers can only use the web routes and can (update their informations, show services , create and update services, show orders)
- admin can only use the web routes and can ( view and delete users[all users, service providers] , view and delete orders, activate and deactivate service providers) 


## to run the app 

- in the cmd run "composer install"
- update the database keys in the the .env file to what suits you
- in the cmd run "php artisan migrate"
- in the cmd run "php artisan serve"
