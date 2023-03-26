# system_interakcyjny_projekt

instalacja na serwerze 

	1. skopiuj katalog app na serwer
	2. w pliku .env ustaw parametry dostępowe do bazy danych
	3. w katalogu public stwórz plik .htacces o następującej zawartości
		

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

	4. w katalogu projektu wykonaj polecenia 
		
		composer install	
		php bin/console doctrine:migrations:migrate
		php bin/console doctrine:fixtures:load
