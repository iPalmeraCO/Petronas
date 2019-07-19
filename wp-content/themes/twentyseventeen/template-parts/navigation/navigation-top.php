<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentyseventeen' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) );
		echo twentyseventeen_get_svg( array( 'icon' => 'close' ) );
		_e( '', 'twentyseventeen' );
		?>
	</button>
	<div class="header__navigation__social">
		<a target="_blank" href="https://www.facebook.com/petronas/" class="b none"><i class="fab fa-facebook-square"></i></a>
				<!-- <a target="_blank" href="https://twitter.com/Petronas" class="b none"><i class="fab fa-twitter-square"></i></a>
				<a target="_blank" href="https://www.linkedin.com/company/petronas" class="b none"><i class="fab fa-linkedin-square"></i></a> -->
				<a target="_blank" href="#" class="b none"><i class="fab fa-instagram"></i></a>
	</div>
	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>
</nav><!-- #site-navigation -->
