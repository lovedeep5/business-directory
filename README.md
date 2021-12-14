# business-directory
This is a basic templated website, you can install it on your local server or the live server.

###Requirments
Hosting Server (For local machine, you need xampp, Working internet is must for this).

###Instructions
Download all the files, unzip and move to the root folder, of your server.
open phpmyadmin and create a database and update the database details /api/db.php file, You just need to create a database and update the details in the files, tables will be created automatically.

Table containes the following fields:
id (Primary and uniqueue key for database)
Name
Email
Company Name
Company Details
Password
TimeStamp

###Menu
From the menubar in the header user can navigate to diffrent pages.
Home (Page with the basic business details, I have added dummy content and the dummy images, you can change the links easily).
About (Static page with compnay Info)
Search (User can view all the companies and filter them by using search bar, any word from company name or company detail can be searched, Only logged in user will be able to edit their own details)
Login (User can login by using their email and password, it will show proper error/success messages on the screen, after that it will redirect to the next page.)
Signup (User can create their  account by filing the basic info, JS validation added for this form Name length should be minimum 3, company name should be 5 letters, both password fields should be same, password should be at least 5 characters)
Logout (User will see this button in the menu, only if they are logged in, and they can logout by click on this)
