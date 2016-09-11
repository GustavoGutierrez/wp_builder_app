<?php
/**
 * CONFIGURACION PARA EL RENDERIZAR DE LAS VISTAS USANDO MUSTRACHE ENGINE
 */
return [
	/**
	 * RUTA ABSOLUTA HACIA LA CARPETA DE RENDERIZADO DE LAS VISTAS
	 */
	'path' => BASE_PATH . 'app' . DS . 'Views' . DS,

	/**
	 * HABILITA EL USO DE CACHE PARA TODAS LAS VISTAS
	 */
	'cache' => true,

	'cache_path' => BASE_PATH . 'storage' . DS . 'cache' . DS . 'views' . DS,

	/**
	 * HABULITA EL USO DE LA CARPETA partials DENTRO DE EL PATH DE LA VISTAS
	 */
	'partials' => true,

	'charset' => 'ISO-8859-1',

	'extension' => '.html',

];
