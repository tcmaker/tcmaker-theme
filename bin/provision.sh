#!/bin/bash

if [ -f /root/.already_provisioned ]; then
  echo "VM is already provisioned."
  exit 0
fi

if [ `whoami` != root ]; then
  echo "Don't run this on your personal machine."
  exit 1
fi

MYSQL_ROOT_PASSWORD=12345
MYSQL_WP_PASSWORD=12345
MYSQL_WP_DATABASE=wordpress
MYSQL_WP_USER=wordpress
MYSQL_WP_PASSWORD=12345

APACHE_WEB_ROOT=/var/www/html

WP_ADMIN_USERNAME=admin
WP_ADMIN_PASSWORD=admin
WP_ADMIN_EMAIL=admin@example.com

# APT REPOS
sudo apt-get update
#sudo apt-get -y install software-properties-common
#sudo add-apt-repository -y ppa:ondrej/php
#sudo add-apt-repository -y ppa:ondrej/apache2
#sudo apt-get update

# MySQL
echo "mysql-server-5.7 mysql-server/root_password password $MYSQL_ROOT_PASSWORD" | sudo debconf-set-selections
echo "mysql-server-5.7 mysql-server/root_password_again password $MYSQL_ROOT_PASSWORD" | sudo debconf-set-selections
apt-get -y install mysql-server
apt-get -y install mysql-client

mysql -u root -p$MYSQL_ROOT_PASSWORD <<EOF
  CREATE DATABASE wordpress;
  GRANT ALL PRIVILEGES ON $MYSQL_WP_DATABASE.* to '$MYSQL_WP_USER'@'localhost' IDENTIFIED BY '$MYSQL_WP_PASSWORD';
EOF

# APACHE
apt-get -y install apache2
sed -i 's/www-data/vagrant/g' /etc/apache2/envvars
sed -i 's/Listen 80/Listen 4000/g' /etc/apache2/ports.conf
a2enmod rewrite
cat <<EOF >> /etc/apache2/sites-available/000-default.conf
<Directory "$APACHE_WEB_ROOT">
	Options FollowSymLinks
	AllowOverride All
</Directory>
EOF

# PHP
apt-get -y install php-{common,mbstring,xmlrpc,soap,gd,xml,intl,mysql,cli,zip,curl}
apt-get -y install libapache2-mod-php

systemctl restart apache2

# WORDPRESS

cd $APACHE_WEB_ROOT
rm index.html
wget https://wordpress.org/latest.tar.gz
tar xf latest.tar.gz --strip-components=1
rm latest.tar.gz

mv wp-config-sample.php wp-config.php
sed -i s/database_name_here/$MYSQL_WP_DATABASE/ wp-config.php
sed -i s/username_here/$MYSQL_WP_USER/ wp-config.php
sed -i s/password_here/$MYSQL_WP_PASSWORD/ wp-config.php
sed -i "s/'WP_DEBUG', false/'WP_DEBUG', true/" wp-config.php
echo "define('FS_METHOD', 'direct');" >> wp-config.php

chown -R vagrant:vagrant $APACHE_WEB_ROOT

curl "http://localhost:4000/wp-admin/install.php?step=2" \
--data-urlencode "weblog_title=Twin Cities Maker" \
--data-urlencode "user_name=$WP_ADMIN_USERNAME" \
--data-urlencode "admin_email=$WP_ADMIN_EMAIL" \
--data-urlencode "admin_password=$WP_ADMIN_PASSWORD" \
--data-urlencode "admin_password2=$WP_ADMIN_PASSWORD" \
--data-urlencode "pw_weak=1"

ln -s /vagrant/wordpress-theme $APACHE_WEB_ROOT/wp-content/themes/tcmaker-theme

# NODEJS + GULP
apt-get -y install nodejs npm
# npm set ca null
npm install gulp-cli -g
npm install gulp -g

touch /root/.already_provisioned
