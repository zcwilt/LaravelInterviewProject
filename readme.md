# Laravel Interview Project

## Quick Installation

    git clone https://github.com/laravel/quickstart-basic quickstart

    cd quickstart

    composer install

    php artisan migrate

    php artisan serve

# Requirements

1. Add user authentication
   1. Ensure all routes other than auth routes are protected against unauthorised users
   1. Add controllers, routes, models and views as appropriate to allow new users to be created. 
   No other user management is required for this project. Assume that any existing user may add another user.
1. Tasks are to be associated with a user account.
1. Allow tasks to be categorised as "Low priority", "Medium priority" and "High priority"
   1. Make modifications to routes, controllers, views and models as necessary.
1. Create a new set of views, routes and controllers to display *only* "High Priority" tasks _from all users_ using scopes.
1. Other than "High Priority" tasks, tasks should be visible only to the user who created them.
1. Adhere to PSR1/2 style guidelines
1. Within the constraints of the requirements, adhere to current best practice in developing a secure Laravel application.