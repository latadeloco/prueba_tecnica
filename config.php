<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set('UTC');
session_start(); // Si vas a usar sesiones, siempre debe ir primero
// Definir ruta base para incluir archivos
define('BASE_DIR', __DIR__);  // c:/xampp/htdocs/Super
// Definir url base para estilos y enlaces
define('BASE_URL', ''); // http://tu_host_virtual
?>