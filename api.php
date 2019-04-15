<?php
/**
 * Created by PhpStorm.
 * User: CesarJose39
 * Date: 15/04/2019
 * Time: 12:40
 */

//Establecer zona horaria
date_default_timezone_set('America/Lima');

//Para Mostrar o No Errores (Comentado Para SI, Descomentado Para NO)
//error_reporting(E_ALL);

//Levantamiento del Log para registro de errores
require 'app/models/Log.php';

//LLamada a archivo gestor de base de datos
require 'core/Database.php';

$errores = new Log();

// Manejo de Errores Personalizado de PHP a Try/Catch
function exception_error_handler($severidad, $mensaje, $fichero, $linea) {
    $cadena =  '[LEVEL]: ' . $severidad . ' IN ' . $fichero . ': ' . $linea . '[MESSAGGE]' . $mensaje . "\n";
    $guardar = new Log();
    $guardar->insert($cadena, "Excepcion No Manejada");
    //echo $cadena;
}

//Para manejo de caracteres
header("Content-Type: text/html;charset=utf-8");
//Especificar el manejo de errores personalizados
set_error_handler("exception_error_handler");

//Variables Globales
require 'core/globals.php';

$archivo = 'app/controllers/IndexController.php';
require $archivo;
$clase = sprintf('%sController', 'Index');
$accion = $_GET['a'] ?? "nothing";
$clase = trim(ucfirst($clase));
$accion = trim(strtolower($accion));
$controller = new $clase;
$controller->$accion();