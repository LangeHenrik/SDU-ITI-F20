# Assignment 2

## Task

Deadline: TBA

Assignment 2 criteria:
* [] Move functionality to MVC
* [] Make API
* [] GET localhost:8080/xx/mvc/public/api/users (API)
* * Returns json containing “user_id” and “username” of all users

* [] GET localhost:8080/xx/mvc/public/api/pictures/user/2 (API)
* * Returns json containing “image_id”, “title”, “description” and “image” for all user 2’s images

* [] POST localhost:8080/xx/mvc/public/api/pictures/user/2 (API)
* * $_POST[‘json’] will contain json which has “image” in base64 format, “title”, “description”, “username” & “password”
* * Returns the “image_id”

* []


From Assignment 1, its criteria:
* [X] Should contain login and registration form
* [X] Sign up page: Username, fullname, Email address, Password, Repeat Password
* [X] Sanitize all user input on server side
* [X] Upload an image with a title and description
* [X] Imagefeed shows all images, titlees and descriptions, from any user, along with their username
* [X] Search for pictures by username on imagefeed page with ajax
* [X] Site must be to some extend responsive.
* [X] Must contain one AJAX call
* [X] Migrations SQL file with initial data, follow proper naming convention
* [X] Protect against XSS (cross-site scripting) & SQL injection
* [X] Data sent from client to server is sent using the proper HTTP method
* [X] Passwords are stored properly in the database, password hash (bcrypt)
* [X] The server cleans any input before examining it: String sanitize
* [X] Ajax to get the userlist for userlist page

## Software required and recommended

* PHP 7.3 (PHP server)
* MariaDB (For database)
* Browsers, chrome, firefox, edge (To test, and to check css part of the requirments)
* Postman and soapUI (For API tests)