A.  Instructions for installing the system 
Firstly, you need to unzip the provided source code. Your computer should have xampp to run the program. Also you can more easily access the code over github. To clone the project, first you need to install git After install git, you need to run this code on the terminal:
 ## git clone https://github.com/RasimCem/Web-Based-Discussion-Forum.git
After that, to run the Laravel project we have to install composer. To install composer run this code on the terminal:
 ## composer global require laravel/installer
Finally to run the program, you just need to run this code:
 ## php artisan serve
Also, without database tables, system is not going to work properly. To add database tables:
##  php artisan migrate
