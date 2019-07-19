<?php

add_action('widgets_init', 'twentyseventeen_WidgetsInit');

function twentyseventeen_WidgetsInit() {
	register_sidebar(array(
			'name'=> __('Post Sidebar', 'theme_slug'),
			'id' => 'sidebar_post',
			'description' => __('los widget se va a colocar en esta area en todos los post', 'theme_slug'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>',
	) );
}

/**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

	function widget($args, $instance) {
	
		extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
				
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 10;
		// entradas recientes solo para la categoría blog
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'cat' => 9, 'post_status' => 'publish', 'ignore_sticky_posts' => true , 'post__not_in' => array(get_the_ID())) ) );
		if( $r->have_posts() ) :
			
			echo $before_widget;
			if( $title ) echo $before_title . $title . $after_title; ?>
			<ul class="not">
				<?php while( $r->have_posts() ) : $r->the_post(); ?>				
				<li class="line"> 
					<div class="content-recent">
					<div class="img-side"><?php echo get_the_post_thumbnail( $page->ID, 'thumbnail' ); ?>
						
					</div>
					<div class="textos-wid">

					<div class="flex__aling">
					<div class="barra-title"></div><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</div>

					<div class="date-recent">	
						<!-- <div class="category-blog-dos">	
							<?php
							/*$category = get_the_category();
							echo $category[0]->cat_name;*/
							?>
						</div> -->
						<div class="entry-date">	
							<?php the_time('M-d-Y') ?>
						</div>
					</div>
					
					</div>
						</div>
					
					
				</li>
				<?php endwhile; ?>
			</ul>
			 
			<?php
			echo $after_widget;
		
		wp_reset_postdata();
		
		endif;
	}
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');

/** --------------------------------------------------------------------*/