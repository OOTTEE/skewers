
Manual de configuracion de apache2 para versione ubuntuServer 14.04 64bits

en '/etc/apache2/sites-enabled/000-default.conf':
	
	reemplazar: DocumentRoot /var/www/html/skewers/app/webroot   =>   DocumentRoot /var/www/html/skewers/app/webroot
	
en '/etc/apache2/apache2.conf':

	añadir: servername 127.0.0.1
	
	reemplazar toda las lineas:  AllowOverride None   =>    AllowOverride All

habilitar el mode rewrite de apache:

	sudo a2enmod rewrite

Cambiar permisos del directorio del proyecto:
	
	sudo chmod 777 -R skewers/
	sudo chown -R www-data:www-data skewers/
	
Reiniciar Apache

	sudo service apache2 restart
	

	
	