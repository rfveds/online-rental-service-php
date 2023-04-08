# online-rental-service-php

Server installation

1. Copy the "app" directory to the server.

2. Set the database access parameters in the .env file.

3. Create a file named .htaccess in the "public" directory with the following content:

 <IfModule mod_rewrite.c>
 	Options -MultiViews
 	RewriteEngine On
	RewriteCond %{REQUEST_FILENAME} !-f
 	RewriteRule ^(.*)$ index.php [QSA,L]
 </IfModule>
 <IfModule !mod_rewrite.c>
 <IfModule mod_alias.c>
	RedirectMatch 302 ^/$ /index.php/
 </IfModule>
 </IfModule>

4. Run the following commands in the project directory:
		
		```composer install	
		php bin/console doctrine:migrations:migrate
		php bin/console doctrine:fixtures:load```
