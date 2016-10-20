#!/usr/bin/env bash

# nginx
#sudo apt-get -y install nginx
#sudo service nginx start

# set up nginx server
#sudo cp /vagrant/.provision/nginx/nginx.conf /etc/nginx/sites-available/site.conf
#sudo chmod 644 /etc/nginx/sites-available/site.conf
#sudo ln -s /etc/nginx/sites-available/site.conf /etc/nginx/sites-enabled/site.conf
#sudo service nginx restart

# clean /var/www
#sudo rm -Rf /var/www

# symlink /var/www => /vagrant
#ln -s /vagrant /var/www

# Updating repository

sudo apt-get -y update

# Installing Apache

sudo apt-get -y install apache2

# Installing MySQL and it's dependencies, Also, setting up root password for MySQL as it will prompt to enter the password during installation

sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password rootpass'
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password rootpass'
sudo apt-get -y install mysql-server libapache2-mod-auth-mysql #php5-mysql

sudo add-apt-repository -y ppa:ondrej/mysql-5.6
sudo apt-get update
sudo apt-get install mysql-server-5.6

# Installing PHP and it's dependencies
#sudo apt-get -y install php5 libapache2-mod-php5 php5-mcrypt
sudo apt-get install libapache2-mod-php7.0 php7.0-mysql php7.0-curl php7.0-json

#sudo add-apt-repository ppa:ondrej/apache2
#sudo apt-get update
#sudo apt-get install apache2 -y

# install ansible and its dependencies
sudo apt-get update
sudo apt-get install software-properties-common
sudo apt-add-repository ppa:ansible/ansible
sudo apt-get update
sudo apt-get install ansible -y

# clean /var/www
sudo rm -Rf /var/www

# symlink /var/www => /vagrant
ln -s /vagrant /var/www