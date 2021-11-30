# Prueba Técnica para GetLife

Se ha implementado los 3 ejercicios que se piden en la prueba en 3 carpetas diferentes:

1. ej1: Es el ejercicio 1 con todos sus apartados
2. ej2: Proyecto Symfony 5.3 para ejercicio 2 con todos sus apartados
3. ej3: Formulario implementado con HTML, CSS y Javascript que hace petición a API implementada en ejercicio 2.


## Requerimientos y pasos

1. php8.0.13 como se puede ver en la imagen:
![Imagen versión php usada](/imgs/php8.png)

2. Crear un nuevo VirtualHost en `/var/www/` y copiar todo el contenido del repositorio:
![Imagen virtualhost usado](/imgs/virtualhost.png)

3. Realizar `composer install` en directorio `/ej2` para instalar las dependencias del proyecto Symfony.

4. Levantar servidor symfony: `symfony server:start --port=8000` asegurando que el puerto sea el `8000`.