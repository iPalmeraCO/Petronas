<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<?php //echo do_shortcode('[rev_slider alias="productos"]'); 
$term = get_queried_object();
// echo $term->slug;
// echo 'rev_slider alias="'.$term->slug.'"';
$sliders = array();
if ( class_exists( 'RevSlider' ) ) {
    $rev_slider = new RevSlider();
    $sliders = $rev_slider->getAllSliderAliases();
}
if (in_array($term->slug, $sliders)) {
   echo do_shortcode('[rev_slider alias="'.$term->slug.'"]'); 
}else{
	echo do_shortcode('[rev_slider alias="productos"]'); 
}

?>
<div class="cont-bread">
	<div class="container">
		<div class="breadcrumbs">
			<a class="bread-link" href="/Petronas/">Home / </a>
			<p class="bread-pag">Productos /</p>
			<p class="bread-pag"><?php echo single_cat_title( '', false ); ?></p>
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
			<div>
				<?php echo category_description(); ?>
			</div>
			<div class="separador" style="margin: 35px 0px;"></div>
			<div>
				<div class="productos">
					<?php 
						if ( have_posts() ) : ?>

							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post(); ?>
								<div class="cont-producto">
								<div class="imagen">
								<p><img class="imagen-producto" src="<?php echo get_the_post_thumbnail_url(); ?>"></p>
								<div class="linea-verde-producto-2">&nbsp;</div>
								</div>
								<div class="cont-marca-nombre">
								<p class="marca-producto"><?php echo single_cat_title( '', false ); ?></p>
								<h3 class="nombre-producto-bold">Petronas <?php echo single_cat_title( '', false ); ?></h3>
								<h3 class="nombre-producto"><?php echo get_the_title(); ?></h3>
								</div>
								<div class="cont-boton-producto"><a class="boton-producto" href="<?php echo get_permalink(); ?>">ver más</a></div>
							</div>
							<?php
								// get_template_part( 'template-parts/post/content', get_post_format() );

							endwhile;
						else :

							// get_template_part( 'template-parts/post/content', 'none' );

						endif;
					?>
					
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="wrap">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
				// the_archive_title( '<h1 class="page-title">', '</h1>' );
				// the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
			<?php
			/* Start the Loop */
			// while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				// get_template_part( 'template-parts/post/content', get_post_format() );

			// endwhile;

			// the_posts_pagination( array(
			// 	'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
			// 	'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
			// 	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			// ) );

		else :

			// get_template_part( 'template-parts/post/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php //get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
