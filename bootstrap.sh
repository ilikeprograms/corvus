#!/usr/bin/env bash

MYSQL_ROOT_PASSWORD="ROOTPASSWORD"

# Update
sudo apt-get update 2> /dev/null

# Install Apache2 and Openssl and enable mod_rewrite
sudo apt-get install -y apache2 2> /dev/null
sudo apt-get install -y openssl 2> /dev/null
sudo a2enmod rewrite

# Change the User/Group to Vagrant
APACHEUSR=`grep -c 'APACHE_RUN_USER=www-data' /etc/apache2/envvars`
APACHEGRP=`grep -c 'APACHE_RUN_GROUP=www-data' /etc/apache2/envvars`
if [ APACHEUSR ]; then
    sed -i 's/APACHE_RUN_USER=www-data/APACHE_RUN_USER=vagrant/' /etc/apache2/envvars
fi
if [ APACHEGRP ]; then
    sed -i 's/APACHE_RUN_GROUP=www-data/APACHE_RUN_GROUP=vagrant/' /etc/apache2/envvars
fi

# Make vagrant own the Lock files for Apache2?
sudo chown -R vagrant:vagrant /var/lock/apache2

# Allow the mysql setup to be skipped
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password ${MYSQL_ROOT_PASSWORD}"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password ${MYSQL_ROOT_PASSWORD}"

# Install the mysql client and server
sudo apt-get install -y mysql-server 2> /dev/null
sudo apt-get install -y mysql-client 2> /dev/null

# Create the DB for Corvus and set the Password, to whatever was in corvusdb.yml
if [ ! -f /var/log/dbinstalled ];
then
    echo "CREATE DATABASE $1" | mysql -u root -p"${MYSQL_ROOT_PASSWORD}"
    echo "UPDATE mysql.user SET Password=PASSWORD('$2') WHERE User='root';" | mysql -u root -p"${MYSQL_ROOT_PASSWORD}"
    echo "FLUSH PRIVILEGES" | mysql -u root -p"${MYSQL_ROOT_PASSWORD}"
    touch /var/log/dbinstalled
fi

# Install PHP and all the PHP extensions which are awesome pants
sudo apt-get install -y php5 php-pear php5-dev php5-gd php5-curl php5-mcrypt php5-mysql 2> /dev/null

echo "Setting Up Web Directory for Corvus"

# If the /var/www folder is not symlinked
if [ ! -h /var/www ];
then
    # Remove the Folder and Symlink it to the /vagrant folder
    rm -rf /var/www
    ln -fs /vagrant /var/www

    sudo a2enmod rewrite 2> /dev/null

    # Set the Vhost document root to /var/www/web (Symfony/Corvus Web director)
    sudo sed -i "s:/var/www:/var/www/web:" /etc/apache2/sites-available/default
    
    # AllowOverride All on the /var/www/web dir
    sudo sed -i "0,/AllowOverride None/! {0,/AllowOverride None/ s/AllowOverride None/AllowOverride All/}" /etc/apache2/sites-available/default

    # Make sure Apache will loud the sites-available directory
    echo "Include sites-available/" >> /etc/apache2/apache2.conf

    # Directory index so PHP will serve pages (with app*.php for Symfony support)
    echo "Setting DirectoryIndex to server app.php/app_dev.php"
    sudo tee /etc/apache2/httpd.conf <<EOT
    <IfModule mod_dir.c>
        DirectoryIndex app.php app_dev.php index.php index.html index.cgi index.pl index.php index.xhtml index.htm
    </IfModule>
EOT
    # Find the Server name, and set it to the IP address of the Guest (Vagrant instance)
    SERVER_IP=$(ifconfig eth1 | grep 'inet addr:' | awk '{ print $2 }' | cut -d ':' -f 2)

    # Set the ServerName of the Server to the IP address
    echo "Setting ServerName"
    echo 'ServerName ' ${SERVER_IP} | sudo tee -a /etc/apache2/httpd.conf 1> /dev/null

    # Now restart Apache to make sure our changes have been applied
    sudo service apache2 restart 2> /dev/null

    # Run the DB migrations
    cd /vagrant && php app/console doctrine:migrations:migrate -n
fi