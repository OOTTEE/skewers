cd /var/www/html
sudo sed -i 's/\/var\/www\/html$/\/var\/www\/html\/skewers\/app\/webroot/g' /etc/apache2/sites-enabled/000-default.conf
sudo sed -i '0,/AllowOverride None/s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
sudo a2enmod rewrite

sudo chmod 777 -R skewers/
sudo chown -R www-data:www-data skewers/

sudo service apache2 restart