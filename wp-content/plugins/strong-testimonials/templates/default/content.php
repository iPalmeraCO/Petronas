<?php
/**
 * Template Name: Default
 * Description: The default template.
 */
?>
<?php do_action( 'wpmtst_before_view' ); ?>
<?php do_action( 'wpmtst_after_view' ); ?>
<div class="strong-view <?php wpmtst_container_class(); ?>"<?php wpmtst_container_data(); ?>>
	<?php do_action( 'wpmtst_view_header' ); ?>

	<div class="strong-content <?php wpmtst_content_class(); ?>">
		<?php do_action( 'wpmtst_before_content' ); ?>

		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="<?php wpmtst_post_class(); ?>">

			<div class="testimonial-inner">
				<?php do_action( 'wpmtst_before_testimonial' ); ?>

				

				<div class="testimonial-content">
					<div class="testimonial__con">
						<?php wpmtst_the_title( '<h3 class="testimonial-heading">', '</h3>' ); ?>
					<?php wpmtst_the_content(); ?>

					<?php do_action( 'wpmtst_after_testimonial_content' ); ?>
					</div>
					<?php wpmtst_the_thumbnail(); ?>
				<!-- 	<div class="maybe-clear"></div> -->

				</div>

				<div class="testimonial-client">
					<?php wpmtst_the_client(); ?>
				</div>
				<!-- <div class="clear"></div> -->

				<?php do_action( 'wpmtst_after_testimonial' ); ?>
			</div>

		</div>
		<?php endwhile; ?>

		<?php do_action( 'wpmtst_after_content' ); ?>
	</div>

	<?php do_action( 'wpmtst_view_footer' ); ?>
</div>

