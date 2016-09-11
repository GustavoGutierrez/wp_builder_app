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
	/**
	 * Dummies constructor.
	 */
	public function __construct() {
		$this->embedJs('app.js', array('post_type' => 'dummy', 'id' => 'app-script-dummy'), true);
		$this->embedCss('app.css', array('post_type' => 'dummy', 'id' => 'app-style-dummy'), true);
	}

	/**
	 * Registrar los metaboxes para el post_type dummy
	 */
	public function metabox_dummy() {
		$prefix = 'yourprefix_demo_';
		$cmb_demo = new_cmb2_box(array(
			'id' => $prefix . 'metabox',
			'title' => __('Test Metabox', 'cmb2'),
			'object_types' => array('dummy'), // Post type
			'priority' => 'high'
		));

		$cmb_demo->add_field(array(
			'name' => __('Test Text', 'cmb2'),
			'desc' => __('field description (optional)', 'cmb2'),
			'id' => $prefix . 'text',
			'type' => 'text',
			'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
		));

		$cmb_demo->add_field(array(
			'name' => __('Test Text Small', 'cmb2'),
			'desc' => __('field description (optional)', 'cmb2'),
			'id' => $prefix . 'textsmall',
			'type' => 'text_small',
		));
		$cmb_demo->add_field(array(
			'name' => __('Test Text Medium', 'cmb2'),
			'desc' => __('field description (optional)', 'cmb2'),
			'id' => $prefix . 'textmedium',
			'type' => 'text_medium'
		));
		$cmb_demo->add_field(array(
			'name' => __('Custom Rendered Field', 'cmb2'),
			'desc' => __('field description (optional)', 'cmb2'),
			'id' => $prefix . 'render_row_cb',
			'type' => 'text'
		));
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
}