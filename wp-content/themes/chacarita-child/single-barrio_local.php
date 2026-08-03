<?php
/**
 * Página individual de un local en "El Barrio".
 */

get_header(); ?>

<main class="site-main barrio-single">
	<?php while ( have_posts() ) : the_post(); ?>

		<h1><?php the_title(); ?></h1>

		<?php
		$categorias = get_the_terms( get_the_ID(), 'categoria_barrio' );
		if ( $categorias && ! is_wp_error( $categorias ) ) :
			?>
			<span class="barrio-card__categoria"><?php echo esc_html( $categorias[0]->name ); ?></span>
		<?php endif; ?>

		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>

		<div class="barrio-single__content">
			<?php the_content(); ?>
		</div>

		<div class="barrio-single__meta">
			<?php
			$direccion = get_field( 'direccion' );
			$instagram = get_field( 'instagram' );
			$facebook  = get_field( 'facebook' );
			$web       = get_field( 'sitio_web' );
			$whatsapp  = get_field( 'whatsapp' );
			?>
			<?php if ( $direccion ) : ?>
				<p><strong><?php esc_html_e( 'Dirección:', 'chacarita-child' ); ?></strong> <?php echo esc_html( $direccion ); ?></p>
			<?php endif; ?>

			<?php if ( $instagram ) : ?>
				<a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener">Instagram</a>
			<?php endif; ?>
			<?php if ( $facebook ) : ?>
				<a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener">Facebook</a>
			<?php endif; ?>
			<?php if ( $web ) : ?>
				<a href="<?php echo esc_url( $web ); ?>" target="_blank" rel="noopener">Sitio web</a>
			<?php endif; ?>
			<?php if ( $whatsapp ) : ?>
				<a href="https://wa.me/<?php echo esc_attr( preg_replace( '/\D/', '', $whatsapp ) ); ?>" target="_blank" rel="noopener">WhatsApp</a>
			<?php endif; ?>
		</div>

	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
