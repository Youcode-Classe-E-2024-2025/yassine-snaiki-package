PACKAGE MANAGER
backend application for js packages management using php tailwind and postgresql database;

Features
well structured project files.
dynamically created database tables with application start.
TailwindCSS based styling.
single page handled forms with javascript.

Prerequisities
PHP localhost : start server with the command PHP localhost:8888 or some empty port number.
PostgreSQL: Postgresql database have to be installed.

Installation Setup
You can skip step 2 if you don't want to create the database manually.

Clone the project using this url :
git clone https://github.com/Youcode-Classe-E-2024-2025/yassine-snaiki-package.git


Set up the database
open command line or some terminal and type "create database packagesdb".
//tabled are automatically created with localhost start and fake data is automatically inserted//


database connection details:
$host = 'localhost';  
$port = '8885';  //or the port on which postgres is hosted.
$dbname = 'packagesdb';  //have to be.
$user = 'postgres'; //default user of postgresql database or the one that is defined. 
$password = '';  //your database password

Start the PHP server
have to be positionned in the project in the terminal and type php -S localhost:'8885' or the defined port number

./diagrams: ER Diagram and usecase uml diagram.
