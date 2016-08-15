<?php
/*
Plugin Name: Dummies by profesional profile
Plugin URI:
Description: Administrador de Dummyos
Version: 0.0.1
Author: Gustavo Gutierrez
Author URI: http://gustavogutierrez.co
License: GPLv2 or later
Text Domain: proprofile
Domain Path: /languages
 */
namespace App\Plugins;

use App\Plugins\Plugin;
use PostType\PostType\Builder as PostType;
use PostType\Taxonomy\Builder as Taxonomy;

class Dummies extends Plugin {

	public function __construct() {
		$this->embedJs('app.js', array('post_type' => 'dummy', 'id' => 'app-script-dummy'), true);
		$this->embedCss('app.css', array('post_type' => 'dummy', 'id' => 'app-style-dummy'), true);
	}

	/**
	 * Registra todos PostTypes del plugin
	 */
	public function action_posttypes_init_10() {
		PostType::make(__('Dummy', 'proprofile'),
			__('Dummies', 'proprofile'),
			array(
				'supports' => array(
					'title',
					'editor',
					'thumbnail',
				),
				'menu_icon' => 'dashicons-portfolio',
			));
	}

	/**
	 * Registra todas las taxonomias del plugin
	 */
	public function action_taxonomies_init_11() {

		Taxonomy::make(array('dummy'),
			__('Dummy Type', 'proprofile'),
			__('Dummies Types', 'proprofile'));

		Taxonomy::make(array('dummy'),
			__('Dummy Difficulty', 'proprofile'),
			__('Difficulties Dummies', 'proprofile'));
	}

	/**
	 * Crea el metabox recommendedLinks para los posttypes dummy y otroTest con prioridad high
	 */
	public function metabox_recommendedLinks_dummy_otroTest_high() {
		$Dummies = array(
			array(
				'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
			),
			array(
				'text' => 'Cras placerat condimentum dui, ac dapibus nibh tincidunt in.',
			),
		);

		echo view('dummies')
			->with('dummies', $Dummies)
			->with('title', 'Dummies')
			->with('url', 'http://lorempixel.com/1000/200/');
	}

}
