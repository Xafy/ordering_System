# Ordering_system_task 

## roles
- cutomers (role_id = 3) can only use the api routes 
- service providers (role_id = 2) can only use the web routes and can (update their informations, show services , create and update services, show orders)
- admins (role_id = 1) can only use the web routes and can ( view and delete users[all users, service providers] ,
view and delete orders, activate and deactivate service providers) 

## api end points 
- opened for all :
    - api/login
    
    - api/regiter
    
- only for customers : 
    - api/update/{user_id}
    
    - api/orders   => "GET",
                      "Authorization Bearer token must be added",
                      "Accept : application/json
    
    - api/orders   => "POST",
                      "Authorization Bearer token must be added",
                      "Accept : application/json,
                      "body : service_id[] = the services id you want to order"
                      
    - api/orders/{order_id}   => "POST",
                                 "Authorization Bearer token must be added",
                                 "Accept : application/json,
                                 

## to run the app 

- in the cmd run "composer install"
- update the database keys in the the .env file to what suits you
- in the cmd run "php artisan migrate"
- in the cmd run "php artisan serve"
- assign an admin from the database "give the user role_id = 1"
