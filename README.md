# 92Code.pl app for microcompany-mangement

## Instalation

```
./vendor/bin/sail up
```

### Snippets

Make factory & seeder

```bash
./vendor/bin/sail artisan make:factory UserFactory --model=User
./vendor/bin/sail artisan make:seeder UserSeeder


```

Seed fresh

```bash
./vendor/bin/sail artisan migrate:fresh --seed --drop-tables
./vendor/bin/sail artisan migrate:fresh --seed
```

Enter to the shell

```bash
./vendor/bin/sail shell
```

php-cs fixer

```bash
mkdir --parents tools/php-cs-fixer

composer require --working-dir=tools/php-cs-fixer friendsofphp/php-cs-fixer

#use in project folder
tools/php-cs-fixer/vendor/bin/php-cs-fixer fix app
```

Make controller

```
php artisan make:controller Api/DocumentApiController
```

# Project Plan

## Static Version

To create the static version of the website, you will need to follow these steps:

-   Create the necessary views and routes for the website. This involves defining the different pages and their corresponding URLs.
-   Style the website using CSS and HTML. You can use frameworks like Bootstrap to access pre-defined CSS design patterns that work well on desktops, tablets, and mobile devices.
-   Add content to the website, such as text, images, and videos. This can be done by writing HTML code and embedding the necessary media files.
-   Test the website to ensure it functions correctly. This involves checking for any broken links, verifying that the pages load properly, and testing any interactive elements.

## REST API

To create a REST API for your website, you will need to follow these steps:

-   Create models and migrations for the necessary database tables. This involves defining the structure of your data and setting up the necessary relationships between tables.
-   Define the API endpoints and routes using a framework like Laravel's resource controllers. This allows you to specify the URLs and HTTP methods for interacting with your API.
-   Implement the necessary CRUD (Create, Read, Update, Delete) operations for each API endpoint. This involves writing the logic to handle requests and perform the corresponding actions on the database.
-   Test the API endpoints using tools like Postman or cURL. This allows you to send requests to your API and verify that the responses are correct.

## Integration with vite.js

To integrate your website with vite.js, you will need to follow these steps:

-   Install vite.js by running the necessary commands in your project directory. You can refer to the vite.js documentation for the specific installation instructions.
-   Configure vite.js to work with your existing project. This may involve setting up the necessary build configurations and specifying the entry point for your application.
-   Update your views and routes to use the vite.js build output. This involves updating the script and link tags in your HTML files to point to the generated JavaScript and CSS files.
-   Test the integration to ensure that your website functions correctly with vite.js. This involves checking that the pages load properly and any JavaScript functionality is working as expected.

## Additional Task

The additional tasks you mentioned, such as creating a printable version for documents, importing invoices from fakturownia.pl, and making your own invoice template, will require specific implementation steps based on the tools and technologies you are using. It would be helpful to provide more details about the technologies and frameworks you are working with so that I can provide more specific guidance.
