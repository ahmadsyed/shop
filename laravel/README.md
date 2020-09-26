# RouterAPI

Notes for testing:

1. You may find triangle design by vising home page of API (File- Welcom.blade.php)
2. Installed Oauth2 that I have implimented via react UI with this API server from another repo in the mail.
3. All Logics are in controller named RouterController.php using (api.php route file)
4. Adding random records is implimented via command , you may Run php artisan:router add ,This will ask for number of record to insert and will make new records accordingly. 
5. UI amd AJAX part I am attaching in saprate folder with saprate readme.

API is created in laravel framework , Our UI repo using API's from this repo, I have used Passport authorization(Based on Oauth2)

Installation- 

1. clone,
2. navigate to laravel folder,
3. composer install
4. php artisan passport:install
5. php artisan migrate (After setting db valuse in .env)

Note- To work with our reactJs UI , Please host above installation either at some server on make a virtualhost , point this virtual host in our UI (step mentioned in UI readme).

For localhost if needed please install cors extension in browser.