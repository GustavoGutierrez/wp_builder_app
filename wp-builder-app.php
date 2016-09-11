<?php
/*
Plugin Name: Wordpress Builder Application
Plugin URI: https://packagist.org/packages/wp_builder_app/wp_builder_app
Description: El plugin Wp Builder App permite realizar aplicaciones complejas, completamente modulares, implementando para ello los nuevos paradigmas de desarrollo, usando espacios de nombre, abstracciones, inyección de dependencias, facade, traits, etc. También usa <strong>Composer</strong> como gestor de librerías. Además de facilitar el desarrollo frontend utilizando para ello <strong>PostCss</strong> compo preprocesador de css  y <strong>Typescript</strong> para el javascript; permitiendo reutilizar funcionalidades complejas entre sus diferentes partes como plugins independientes, widgets, vistas, lenguajes; si así se requiere. Una de las funcionalidades principales de este plugin es automatizar el guardado de los post types, metadatas, etc; con su funciones heredadas del núcleo  para la facilitar y agilizar el desarrollo.
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
} catch (Dotenv\Exception\InvalidFileException $e) {
	dump($e->getMessage());
} catch (Exception $e) {
	dump($e->getMessage());
}