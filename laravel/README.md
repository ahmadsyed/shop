# shopAPI

API is created in laravel framework , Our UI repo using API's from this repo, I have used Passport authorization(Based on Oauth2)

Installation- 

1. clone,
2. navigate to laravel folder,
3. composer install
4. php artisan passport:install
5. php artisan migrate (After setting db valuse in .env)
6. Php artisan db:seed

Note- To work with our reactJs UI , Please host above installation either at some server on make a virtualhost , point this virtual host in our UI (step mentioned in UI readme).

For localhost if needed please install cors extension in browser.
