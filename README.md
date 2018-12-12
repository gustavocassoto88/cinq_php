#start
Before start to use the application you must clone this repo, after that go to project root folder and run the command "composer update" it will install all the components necessary for the application.

#database
If you want to have a local database, you should install mysql server at your machine, than create a schema with the name “cinq_php” and open the file localized at “database->cinq-database.sql” and execute the sql file to generate the tables.

Remote database details:
database host - cinq_php.mysql.dbaas.com.br
databse schema - cinq_php
database user - cinq_php
database password - cinq@2018

#endpoints
Here you can find all the endpoints and what they are used for:

/products/list - here you can see all the products in the database
/products/create - here you can insert the products in the database (you must have some retailer before insert the product)
/retailer/list - here you can see all the retailers in the database
/retailer/create - here you can insert the retailers in the database

/ - list of products - here you will be able to see all the products as the e-commerce view
/{slug} - product - here you can see all the product information also send the link for a friend
/retailer/{slug} - retailer and his products - here is a filter that you can see all products for specific retailer

#api Endpoints
/api/product-list - product list - api list of products
/api/product/{id} - product detail - api product detail
/api/retailer/{id} - retailer and his products - api reatailer and products














