<?php
/*
Plugin Name: Wordpress Builder Applications
Plugin URI:
Description: El plugin <strong>Builder of complex applications</strong> permite realizar aplicaciones complejas, completamente modulares, implementando para ello los nuevos paradigmas de desarrollo, usando espacios de nombre, abstracciones, inyeccion de dependencias, traits, <strong>Composer</strong> como gestor de librerias y mucho más. Ademas de facilitar el desarrollo frontend utilizando para ello PostCss y Typescript para el estilizado y scripting; permitiendo reutilizar funcionalidades complejas entre sus diferentes partes como plugins independientes, widgets, vistas, lenguages; si asi se quiere. Una de las funcionalidades principales de este plugin es automatizar el guardado de los post types, taxonomias, etc; con su funciones heredadas del nucleo  para la auto getión de las funcionalidades desarrolladas con este.
Version: 0.0.1
Author: Gustavo Gutierrez
Author URI: http://gustavogutierrez.co
License: GPLv2 or later
Text Domain: insight
Domain Path: /vendor/wp_builder_app/insight/src/Languages
 */

define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', dirname(__FILE__) . DS);

require __DIR__ . '/vendor/autoload.php';

try {

	$app = new Insight\Foundation\Application(BASE_PATH);
	$app->boot();

	//dump(config('app.env'));
	//dump(env('APP_KEY'));
	//exit();

} catch (Dotenv\Exception\InvalidFileException $e) {
	dump($e->getMessage());
} catch (Exception $e) {
	dump($e->getMessage());
}