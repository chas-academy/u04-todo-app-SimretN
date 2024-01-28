[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-24ddc0f5d75046c5622901739e7c5dd533143b0c8e959d652212380cedb1ea36.svg)](https://classroom.github.com/a/TzQAt-j8)

# Todo project in PHP and Docker with MariaDB


this project uses Docker to creat an invironment to run my TOdo project along with MariaDB as the Database and Adminer for database administration.See the steps down bellow.


1. Docker installed on your computer.
2. clone the project.<br> 
[git clone] (https://github.con/din-anvander/ditt-projekt.git)


 **configure the database**

 open docker -compose.yml and other passwords and other installations according to your need under services  mariadb environment


   1. start docker
   2. reopen container
   3. start the server with php -S localhost:80
   4. open the web page at localhost:8080/index.php after these steps ,you can add, update, delete and read the information you added.
   
   
   ![Alt text](image.png)  this is how  adminer looks


   ![Alt text](image-1.png)   this is how  todo list look 


   ![Alt text](image-2.png)  the logga in the password is Mariadb.


   ![Alt text](image-3.png) information how to logga in på server or adminer.