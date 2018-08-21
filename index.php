<?php
/**
 * Plugin Name:       Cutter-Sanborn
 * Description:       A Tabela de Cutter é uma tabela de códigos utilizada para classificar livros em bibliotecas.
 * Version:           1.0.0
 * Author:            Roger C Guilherme
 * Author URI:        https://biblioteca.pucrs.br
 * Text Domain:       LC1cutter
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://biblioteca.pucrs.br/github
 */



class LC1_cutter extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'cutter_sanborn',
			'description' => 'Consulta a tabela Cutter-Sanborn.',
		);
		parent::__construct( 'cutter_sanborn', 'Cutter-Sanborn', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		include"html/index.php";

	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		echo "<p>Exibe o formulário de consulta para a Tabela Cutter-Sanborn</p>";
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}

add_action( 'widgets_init', function(){
	register_widget( 'LC1_cutter' );
});

function cutter_load_plugin_textdomain() {
    load_plugin_textdomain( 'cutter-sanborn', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'cutter_load_plugin_textdomain' );
