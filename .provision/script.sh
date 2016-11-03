
# Updating repository

sudo apt-get -y update

# Installing Apache

#sudo apt-get -y install apache2
sudo add-apt-repository ppa:ondrej/apache2
sudo apt-get update
sudo apt-get -y install apache2 

# Installing MySQL and it's dependencies, Also, setting up root password for MySQL as it will prompt to enter the password during installation

sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password rootpass'
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password rootpass'
sudo apt-get -y install mysql-server libapache2-mod-auth-mysql 

sudo add-apt-repository -y ppa:ondrej/mysql-5.6
sudo apt-get update
sudo apt-get -y install mysql-server-5.6

# Installing PHP and it's dependencies
sudo apt-get -y install libapache2-mod-php7.0 php7.0-mysql php7.0-curl php7.0-json php7.0-mysqlnd

sudo add-apt-repository ppa:ondrej/apache2
sudo apt-get update
sudo apt-get -y install apache2

# install ansible and its dependencies
sudo apt-get update
sudo apt-get -y install software-properties-common
sudo apt-add-repository ppa:ansible/ansible
sudo apt-get update
sudo apt-get -y install ansible 

# clean /var/www
sudo rm -Rf /var/www

# symlink /var/www => /vagrant
ln -s /vagrant /var/www