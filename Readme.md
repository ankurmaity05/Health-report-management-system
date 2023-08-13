//Health Report System

//Screenshots of the project is available in the screenshots folder.
//Sample video showing the working of the project is available in the sample video link.

NOTE "Some images and link might not work so give the relative path after opening the project in VSCode"

Download and setup xampp from : https://www.apachefriends.org/download.html

Install both apache server and MYSQL under xampp.

After completion open xampp control panel and start Apache Server and Mysql.

under the C:\xampp\htdocs, copy the extracted file given in zip.

open the zip file in VSCode.

Goto admin page of Mysql from the xampp control panel and create a new database name 'user1855'

In the tables section, create the table 'users' with following columns:
        sno int(20) Primary key,
        name varchar(30),
        age int(30),
        weight int(30),
        email varchar(40) Unique key,
        pass varchar(40),
        pdf varchar(500),
        date date

after successfull completion of table go to http://localhost/UserRegistration/signin.php

click on signUp and enter the require details with the health pdf and then click on submit.
The data will store in the database.

Go to signIn page again and login with the credentials.

From there download or read the pdf as required. 

click on the link given at last to logout from the page.