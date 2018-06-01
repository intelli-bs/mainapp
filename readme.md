# Application

## Before you start project:
* Install php (PHP >= 7.1.3),Apache web server, Apache web server, MySQL, composer, git
OR install Homestead - server from Laravel (for it you need Virtual Box + Vagrant)

* Install composer (Homestead includes it)
> php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
>  php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
>  php composer-setup.php
>  php -r "unlink('composer-setup.php');
* 

## To start project:
* Clone repo
> git clone https://github.com/intelli-bs/mainapp.git

* Run in terminal
> composer install
> php artisan migrate

* Create local env in .env file