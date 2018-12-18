<h2>#Requirements:</h2>

To run this project you must have:

    - php 5.6 or latest version
    
    - MySql Server (if you wish to run it locally)
    
    - php_gd2 extension enabled (just remove the ";" before the line ;extension=php_gd2.dll on your php.ini) it is used to handle the images when upload it.
    
<h2>#Start:</h2>

Before start to use the application you must clone this repo, after that go to project root folder and run the command "composer update" it will install all the components necessary for the application.

<h2>#Database:</h2>

If you want to have a local database, you should install mysql server at your machine, than create a schema with the name “cinq_php” and open the file localized at “database->cinq-database.sql” and execute the sql file to generate the tables.

<h2>#Remote database details:</h2>

database host - cinq_php.mysql.dbaas.com.br
databse schema - cinq_php
database user - cinq_php
database password - cinq@2018

<h2>#Endpoints:</h2>

Here you can find all the endpoints and what they are used for:

/products/list - here you can see all the products in the database
/products/create - here you can insert the products in the database (you must have some retailer before insert the product)
/retailer/list - here you can see all the retailers in the database
/retailer/create - here you can insert the retailers in the database

/ - list of products - here you will be able to see all the products as the e-commerce view
/{slug} - product - here you can see all the product information also send the link for a friend
/retailer/{slug} - retailer and his products - here is a filter that you can see all products for specific retailer

<h2>#API Endpoints</h2>

/api/product-list - product list - api list of products
/api/product/{id} - product detail - api product detail
/api/retailer/{id} - retailer and his products - api reatailer and products


<h2>#Tests</h2>

I Haven't done it yet..  still in progress  :(











