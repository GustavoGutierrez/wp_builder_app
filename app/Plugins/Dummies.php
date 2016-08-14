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
use PostType\PostType\Builder as PostType;
use PostType\Taxonomy\Builder as Taxonomy;

class Dummies extends Plugin {

	use HelperCustomPostType;
	use HelperCustomTaxonomy;

	public function __construct() {
		$this->embedJs('app.js', array('post_type' => 'dummy', 'id' => 'app-script-dummy'), true);
		$this->embedCss('app.css', array('post_type' => 'dummy', 'id' => 'app-style-dummy'), true);
	}

	/**
	 * create post type for plugin
	 */
	public function register_cpt() {

		PostType::make(__('Dummy', 'proprofile'), __('Dummies', 'proprofile'), array(
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
		Taxonomy::make(array('dummy'), __('Dummy Type', 'proprofile'), __('Dummies Types', 'proprofile'));
		Taxonomy::make(array('dummy'), __('Dummy Difficulty', 'proprofile'), __('Difficulties Dummies', 'proprofile'));
	}

	/**
	 * Si se define esta funcion se inicializan las acciones del
	 * HelperCustomPostType de add y save del metabox
	 */
	public function _add_metaboxes() {
		add_meta_box("recommended_links_metabox",
			__("Recommended Links", "proprofile"),
			array($this, 'render_recommended_links_metabox'), 'dummy');
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
