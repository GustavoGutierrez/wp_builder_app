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
use Insight\Traits\HelperCustomPostType;
use Insight\Traits\HelperCustomTaxonomy;

class Dummies extends Plugin {

	use HelperCustomPostType;
	use HelperCustomTaxonomy;

	public function __construct() {
		//$this->embedJs('app.js', array('post_type'=>'Dummies', 'id'=>'app-script-Dummy'), true);
		$this->embedCss('app.css', array('post_type' => 'Dummies', 'id' => 'app-style-Dummy'), true);
		//dump($this->app_name);
	}

	/**
	 * create post type for plugin
	 */
	public function register_cpt() {

		$this->create_post_type('dummies', __('Dummy', 'proprofile'), __('Dummies', 'proprofile'), __('Dummies Administrator', 'proprofile'), array(
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
			),
			'menu_icon' => 'dashicons-portfolio',
		));

	}

	/**
	 * create taxonomy for the post type of the plugin
	 */
	public function register_tx() {

		$this->create_taxonomy('dummy-type', // taxonomy name
			__('Dummy Type', 'proprofile'), // singular
			__('Dummy Types', 'proprofile'), // plural
			array('show_ui' => true), // argumentos
			array('dummies') // post types
		);

		$this->create_taxonomy('dummy-difficulty', // taxonomy name
			__('Dummy Difficulty', 'proprofile'), // singular
			__('Difficulties Dummies', 'proprofile'), // plural
			array('show_ui' => true), // argumentos
			array('dummies') // post types
		);
	}

	/**
	 * Si se define esta funcion se inicializan las acciones del
	 * HelperCustomPostType de add y save del metabox
	 */
	public function _add_metaboxes() {
		add_meta_box("recommended_links_metabox", __("Recommended Links", "proprofile"), array(
			$this,
			'render_recommended_links_metabox',
		), 'dummies');
	}

	/**
	 * Render metabox
	 * @return [type] [description]
	 */
	public function render_recommended_links_metabox() {

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
