# PHP-Ecommerce-Website
 This project takes products from a database and displays them to mutliple pages. The product page will display all products and then the user will be able to view single products and add them to a shopping cart. 

#Lengend

- Description
- Installation
- Credits
- Live Demo


## Description
This is a mock up of an ecommerce website that pulls its the product catelogue from the database and displays each item on the product page. Shopping cart functionality uses sessions to store the users items added to their cart, which will display the quantity, price and total price. There is an option to remove all items from the cart and place order on the shopping cart page. For this project, I wanted to keep in mind an MVC structure and push my understanding of OOP with PHP. 

## Installation
#### Database
In order this application to run, you will need to connect to a MySQL server. MAMP is suggested. Once you've created the database, use the included sql file to set up the structure of your database. You can add or remove products to fit yoru needs for testing.

### Connections
In order to connect to your database, you will need to add your credentials to `in/config.php`. Make all variables match your development environment.