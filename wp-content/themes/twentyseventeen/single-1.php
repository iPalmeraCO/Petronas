<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<?php echo do_shortcode('[rev_slider alias="productos"]'); ?>
<?php $catego = 0; 

$categoria = get_the_category();
$slug = $categoria[0]->slug;
// echo $slug;

?>
<div class="cont-bread">
	<div class="container">
		<div class="breadcrumbs">
			<a class="bread-link" href="http://159.203.108.98/Petronas/">Home / </a>
			<a class="bread-link" href="http://159.203.108.98/Petronas/productos/syntium/"> Productos /</a>
			<p class="bread-pag"><?php the_title(); ?></p>
		</div>
	</div>
</div>

<div class="container">
	<div style="margin: 46px 0px;">
		<?php dynamic_sidebar('textoproductos') ?>
	</div>
	<div class="row">
		<div class="col-md-3">
			<?php 
				echo do_shortcode('[listadeproductos]');
			?>
		</div>
		<div class="col-md-9">
			<div class="descripcionproducto">
				<div class="row">

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						?>
						<div class="col-md-3">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="col-md-9 descrip-product-producto">
							<h4 class="titulos-secciones">Petronas <span class="titulos-secciones-gris">
								<?php $categoria = get_the_category();
									  $namecat = $categoria[0]->cat_name;
									  $catego = $categoria[0]->cat_ID;
									  echo $namecat;
							 ?></span></h4>
							 <h4 class="nombre-producto"><?php the_title(); ?></h4>
							 <div class="dos-lineas">
								<div class="linea-verde-producto-corta"></div>
								<div class="linea-verde-producto-corta"></div>
							</div>
							<?php the_content(); ?>
							<div class="row">
								<div class="col-md-6">
									<?php 
										if (get_post_meta($post->ID, 'beneficiosxcaracteristicas', true)) {
											?>
											<h5 class="especificacionesxbeneficios">Beneficios x Características:</h5>
											<?php
										    echo get_post_meta($post->ID, 'beneficiosxcaracteristicas', true);
										}
									?>
								</div>
								<div class="col-md-6">
									<?php 
										if (get_post_meta($post->ID, 'especificaciones', true)) {
											?>
											<h5 class="especificacionesxbeneficios">Especificaciones:</h5>
											<?php
										    echo get_post_meta($post->ID, 'especificaciones', true);
										}
									?>
								</div>
							</div>
							
						</div>
						<?php

						// get_template_part( 'template-parts/post/content', get_post_format() );

						// If comments are open or we have at least one comment, load up the comment template.
						// if ( comments_open() || get_comments_number() ) :
						// 	comments_template();
						// endif;

						// the_post_navigation( array(
						// 	'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
						// 	'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
						// ) );

					endwhile; // End of the loop.
					?>
				</div>
			</div>
			<div class="margtitle">
				<h4 class="titulos-secciones">Productos <span class="titulos-secciones-gris">relacionados</span></h4>
			</div>
			<div style="margin-bottom: 10px;">
				<div class="productos">
					<?php echo do_shortcode('[wpb-random-posts cat="'.$catego.'" idpost="'.get_the_ID().'"]'); ?>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- <div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/* Start the Loop */
			// while ( have_posts() ) : the_post();

			// 	get_template_part( 'template-parts/post/content', get_post_format() );

			// 	// If comments are open or we have at least one comment, load up the comment template.
			// 	if ( comments_open() || get_comments_number() ) :
			// 		comments_template();
			// 	endif;

			// 	the_post_navigation( array(
			// 		'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
			// 		'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
			// 	) );

			// endwhile; // End of the loop.
			?>

		</main><!- - #main -->
	</div><!--  - ->#primary -->
	<?php //get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
