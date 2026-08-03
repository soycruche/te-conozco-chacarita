<?php
/**
 * Archivo/catálogo de "El Barrio".
 */

get_header(); ?>

<main class="site-main barrio-archive">
	<h1><?php esc_html_e( 'El Barrio', 'chacarita-child' ); ?></h1>
	<p><?php esc_html_e( 'Conocé a los locales y emprendedores que participan del festival.', 'chacarita-child' ); ?></p>

	<div class="barrio-grid">
		<?php while ( have_posts() ) : the_post(); ?>
			<a class="barrio-card" href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'medium' ); ?>
				<?php endif; ?>
				<div class="barrio-card__body">
					<?php
					$categorias = get_the_terms( get_the_ID(), 'categoria_barrio' );
					if ( $categorias && ! is_wp_error( $categorias ) ) :
						?>
						<span class="barrio-card__categoria"><?php echo esc_html( $categorias[0]->name ); ?></span>
					<?php endif; ?>
					<h2><?php the_title(); ?></h2>
					<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
				</div>
			</a>
		<?php endwhile; ?>
	</div>

	<?php the_posts_pagination(); ?>
</main>

<?php get_footer(); ?>
