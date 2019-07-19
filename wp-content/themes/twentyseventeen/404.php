<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<!--<div class="wrap">-->
	<!-- <div id="primary" class="content-area">-->
		<!-- <main id="main" class="site-main" role="main">-->

		<section class="e-404 container row pad-cero-dos">
				<div class="bg-eror404">
				<p class="bg-404">404</p>
				<p class="text_e404">Error<br>404</p>
				<div class="linea_e404"></div>
				<p class="text_e4042">Página no encontrada</p>
				</div>
				
				<div class="contenido-error col-md-6 col-sm-6 col-xs-12pad-cero-dos">
					<br><br>
					<p class="text-noEncontrada">La URL solicitada<br>no está disponible</p><BR>
					<div class="line-separator linea2"></div>
					<div class="cr-ver-dos">
					<div class="btn-lado"><a href="<?php echo site_url();  ?>" target="_self" class="btn-entrada">VOLVER</a></div>
					</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		<!--</main><!-- #main -->
	<!--</div><!-- #primary -->
<!--</div><!-- .wrap -->

<?php get_footer();
