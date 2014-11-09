cd /var/www/html
wget https://codeload.github.com/cakephp/cakephp/tar.gz/2.5.5
tar -zxvf 2.5.5
mv cakephp-2.5.5/ skewers
cd /var/www/html/skewers

sed -i 's/DYhG93b0qyJfIxfs2guVoUubWwvniR2G0FgaC9mi/DYhG93b0qyJfIxfs2guVo345WwvniR2G0FgaC9mi/g'  app/Config/core.php
sed -i 's/76859309657453542496749683645/76859309657453531396749683645/g'  app/Config/core.php

sudo sed -i 's/\/var\/www\/html$/\/var\/www\/html\/skewers\/app\/webroot/g' /etc/apache2/sites-enabled/000-default.conf
sudo sed -i '0,/AllowOverride None/s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf | grep AllowOverride

sudo a2enmod rewrite

sed -i 's/=> '\''user'\''/=> '\''skewersUser'\''/g' app/Config/database.php
sed -i 's/=> '\''password'\''/=> '\''skewersPass'\''/g' app/Config/database.php
sed -i 's/=> '\''database_name'\''/=> '\''skewersDB'\''/g' app/Config/database.php

sed -i 's/"require": {/"require": { \n\t\t"cakephp\/debug_kit": "2\.2\.*"/g' composer.json

mv app/Config/database.php.default app/Config/database.php

git clone https://github.com/cakephp/debug_kit.git
mv debug_kit/ app/Plugin/DebugKit
echo "CakePlugin::load('DebugKit');" >> app/Config/bootstrap.php

cd ..

sudo chmod 777 -R skewers/
sudo chown -R www-data:www-data skewers/

sudo service apache2 restart



