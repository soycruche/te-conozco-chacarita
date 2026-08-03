<?php
/**
 * Chacarita Child - funciones del child theme.
 */

defined( 'ABSPATH' ) || exit;

function chacarita_enqueue_styles() {
	wp_enqueue_style( 'astra-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style(
		'chacarita-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'astra-parent-style' ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'chacarita_enqueue_styles' );

/**
 * CPT "El Barrio": directorio de locales/emprendedores del festival.
 */
function chacarita_registrar_cpt_barrio() {
	register_post_type(
		'barrio_local',
		array(
			'labels'       => array(
				'name'          => 'El Barrio',
				'singular_name' => 'Local',
				'add_new_item'  => 'Agregar nuevo local',
				'edit_item'     => 'Editar local',
				'all_items'     => 'El Barrio (locales)',
			),
			'public'       => true,
			'has_archive'  => true,
			'rewrite'      => array( 'slug' => 'el-barrio' ),
			'menu_icon'    => 'dashicons-store',
			'supports'     => array( 'title', 'editor', 'thumbnail' ),
			'show_in_rest' => true,
		)
	);

	register_taxonomy(
		'categoria_barrio',
		'barrio_local',
		array(
			'labels'       => array(
				'name'          => 'Categorías',
				'singular_name' => 'Categoría',
			),
			'public'       => true,
			'hierarchical' => true,
			'rewrite'      => array( 'slug' => 'categoria' ),
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'chacarita_registrar_cpt_barrio' );

/**
 * Campos ACF para cada local (dirección, redes sociales).
 * Se registran por código para que queden versionados en git,
 * en vez de depender de la UI de ACF guardada en la base de datos.
 */
function chacarita_registrar_campos_acf() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_barrio_local',
			'title'    => 'Datos del local',
			'fields'   => array(
				array(
					'key'   => 'field_barrio_direccion',
					'label' => 'Dirección',
					'name'  => 'direccion',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_barrio_instagram',
					'label' => 'Instagram',
					'name'  => 'instagram',
					'type'  => 'url',
				),
				array(
					'key'   => 'field_barrio_facebook',
					'label' => 'Facebook',
					'name'  => 'facebook',
					'type'  => 'url',
				),
				array(
					'key'   => 'field_barrio_web',
					'label' => 'Sitio web',
					'name'  => 'sitio_web',
					'type'  => 'url',
				),
				array(
					'key'   => 'field_barrio_whatsapp',
					'label' => 'WhatsApp',
					'name'  => 'whatsapp',
					'type'  => 'text',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'barrio_local',
					),
				),
			),
		)
	);
}
add_action( 'acf/init', 'chacarita_registrar_campos_acf' );
