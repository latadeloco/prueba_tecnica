# Prueba Técnica para GetLife

Se ha implementado los 3 ejercicios que se piden en la prueba en 3 carpetas diferentes:

1. ej1: Es el ejercicio 1 con todos sus apartados
2. ej2: Proyecto Symfony 5.3 para ejercicio 2 con todos sus apartados
3. ej3: Formulario implementado con HTML, CSS y Javascript que hace petición a API implementada en ejercicio 2.


## Requerimientos y pasos

1. php8.0.13 como se puede ver en la imagen:
![Imagen versión php usada](/imgs/php8.png)

2. Crear un nuevo VirtualHost y asigno hosts en `/etc/hosts` añadiendo una nueva línea `127.0.0.1    prueba_tecnica.test` y después clono en `/var/www/` el repositorio ( Para mayor comodidad (en mi caso) clono el repositorio directamente en `/var/www` asegurando previamente que tengo los permisos para hacerlo):
![Imagen virtualhost usado](/imgs/virtualhost.png)

Dejo mi código VirtualHost para que se pueda copiar:

![Imagen virtualhost usado](/imgs/site_virtual.png)

```
<VirtualHost *:80>
	# The ServerName directive sets the request scheme, hostname and port that
	# the server uses to identify itself. This is used when creating
	# redirection URLs. In the context of virtual hosts, the ServerName
	# specifies what hostname must appear in the request's Host: header to
	# match this virtual host. For the default virtual host (this file) this
	# value is not decisive as it is used as a last resort host regardless.
	# However, you must set it for any further virtual host explicitly.
	ServerName www.prueba_tecnica.test
	ServerAlias prueba_tecnica.test
	ServerAdmin webmaster@localhost
	DocumentRoot /var/www/prueba_tecnica

	# Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
	# error, crit, alert, emerg.
	# It is also possible to configure the loglevel for particular
	# modules, e.g.
	#LogLevel info ssl:warn

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined

	# For most configuration files from conf-available/, which are
	# enabled or disabled at a global level, it is possible to
	# include a line for only one particular virtual host. For example the
	# following line enables the CGI configuration for this host only
	# after it has been globally disabled with "a2disconf".
	#Include conf-available/serve-cgi-bin.conf
</VirtualHost>

# vim: syntax=apache ts=4 sw=4 sts=4 sr noet
```

3. Realizar `composer install` en directorio `/ej2` para instalar las dependencias del proyecto Symfony.

4. Levantar servidor symfony: primero comprobar que está levando el proxy para que no de error de autorización a la hora de pedir los datos por API `symfony proxy:start` y luego levantar servidor `symfony server:start --port=8000` asegurando que el puerto sea el `8000`.
