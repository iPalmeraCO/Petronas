<?php 
	/**   
      * The template for displaying all pages      
      * This is the template that displays all pages by default.
      * Please note that this is the WordPress construct of pages and that other   
      * 'pages' on your WordPress site will use a different template.   
      * Template Name: productoshome
   
      * @package WordPress   
      * @subpackage Twenty_Thirteen   
      * @since Twenty Thirteen 1.0
    */
?>
<?php 
$args = array(
		'post_type' => 'post',
		'orderby' => 'rand',
		'posts_per_page' => 3,
		'category__not_in' => 9
		
	);
	// print_r($args);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		?>
		<div class="productos">
			<?php
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				?>
					<div class="cont-producto">
						<?php 
							if (get_post_meta($post->ID, 'productonuevo', true)) {
								?>
								<div class="etiqueta-nuevo">
									<p class="p-nuevo">Nuevo</p>
								</div>
								<?php
							    // echo get_post_meta($post->ID, 'productonuevo', true);
							}else{
								?>
								<div class="" style="min-height: 49px;">
									
								</div>
								<?php
							}
						?>
						<a href="<?php echo get_permalink(); ?>" class="btn-mas-ico"><img src="https://grupouma.com/petronas/wp-content/uploads/2019/01/btn-mas.svg"></a>
						<div class="imagen">
							<img class="imagen-producto" src="<?php echo get_the_post_thumbnail_url(); ?>" />
							<div class="linea-verde-producto"></div>
						</div>
						<div class="cont-marca-nombre">
							<?php 
								$categoria = get_the_category();
								$namecat = $categoria[0]->cat_name;
							?>
							<p class="marca-producto"><?php echo $namecat; ?></p>

							<h3 class="nombre-producto-bold"><?php echo get_the_title(); ?></h3>
							<h3 class="nombre-producto"><?php echo get_the_title(); ?></h3>
							<div class="linea-verde-producto-corta"></div>
							<div class="linea-verde-producto-corta"></div>
						</div>
						<div class="cont-beneficios">
							<div class="beneficios-producto">
								<?php 
									if (get_post_meta($post->ID, 'beneficiosxcaracteristicas', true)) {
										?>
										<p class="tit-beneficios">Beneficios x Caracteristicas</p>
									    <ul>
									    	<?php 
									    		$beneficios = get_post_meta($post->ID, 'beneficiosxcaracteristicas', true);
											    $beneficios = str_replace('<p class="bloque-texto">','', $beneficios);
											    $beneficios = str_replace('</p>','', $beneficios);
											    $beneficios = str_replace('<br>','', $beneficios);
											    $beneficios = explode("•", $beneficios);
											    // print_r($beneficios);
											    foreach ($beneficios as $bene) {
											    	if ($bene != '') {
											    		?>
												    		<li>- <?php echo $bene ?></li>
												    	<?php
											    	}
											    }
									    	?>
									    </ul>
									    <?php
									}
								?>
								<!-- <ul>
								 	<li>- Diferenciado paquete de aditivos</li>
								 	<li>- Diferenciado paquete de aditivos</li>
								 	<li>- Diferenciado paquete de aditivos</li>
								</ul> -->
							</div>
						</div>
						<div class="cont-boton-producto"><a class="boton-producto" href="<?php echo get_permalink(); ?>">ver información</a></div>
					</div>	
				<?php
			}
			?>
		</div>
		<?php
		wp_reset_postdata();
	}
?>
<!-- <div class="productos">
<div class="cont-producto">
<div class="imagen">

<img class="imagen-producto" src="https://grupouma.com/petronas/wp-content/uploads/2019/01/symtium-7000-ow-20.jpg" />
<div class="linea-verde-producto"></div>
</div>
<div class="cont-marca-nombre">
<p class="marca-producto">Syntium</p>

<h3 class="nombre-producto-bold">Syntiuem 70000</h3>
<h3 class="nombre-producto">Syntiuem 70000</h3>
<div class="linea-verde-producto-corta"></div>
<div class="linea-verde-producto-corta"></div>
</div>
<div class="cont-beneficios">
<div class="beneficios-producto">
<p class="tit-beneficios">Beneficios x Caracteristicas</p>

<ul>
 	<li>- Diferenciado paquete de aditivos</li>
 	<li>- Diferenciado paquete de aditivos</li>
 	<li>- Diferenciado paquete de aditivos</li>
</ul>
</div>
</div>
<div class="cont-boton-producto"><a class="boton-producto" href="#">ver información</a></div>
</div>
<div class="cont-producto">
<div class="imagen">

<img class="imagen-producto" src="https://grupouma.com/petronas/wp-content/uploads/2019/01/symtium-7000-ow-20.jpg" />
<div class="linea-verde-producto"></div>
</div>
<div class="cont-marca-nombre">
<p class="marca-producto">Syntium</p>

<h3 class="nombre-producto-bold">Syntiuem 70000</h3>
<h3 class="nombre-producto">Syntiuem 70000</h3>
<div class="linea-verde-producto-corta"></div>
<div class="linea-verde-producto-corta"></div>
</div>
<div class="cont-beneficios">
<div class="beneficios-producto">
<p class="tit-beneficios">Beneficios x Caracteristicas</p>

<ul>
 	<li>- Diferenciado paquete de aditivos</li>
 	<li>- Diferenciado paquete de aditivos</li>
 	<li>- Diferenciado paquete de aditivos</li>
</ul>
</div>
</div>
<div class="cont-boton-producto"><a class="boton-producto" href="#">ver información</a></div>
</div>
<div class="cont-producto">
<div class="imagen">

<img class="imagen-producto" src="https://grupouma.com/petronas/wp-content/uploads/2019/01/symtium-7000-ow-20.jpg" />
<div class="linea-verde-producto"></div>
</div>
<div class="cont-marca-nombre">
<p class="marca-producto">Syntium</p>

<h3 class="nombre-producto-bold">Syntiuem 70000</h3>
<h3 class="nombre-producto">Syntiuem 70000</h3>
<div class="linea-verde-producto-corta"></div>
<div class="linea-verde-producto-corta"></div>
</div>
<div class="cont-beneficios">
<div class="beneficios-producto">
<p class="tit-beneficios">Beneficios x Caracteristicas</p>

<ul>
 	<li>- Diferenciado paquete de aditivos</li>
 	<li>- Diferenciado paquete de aditivos</li>
 	<li>- Diferenciado paquete de aditivos</li>
</ul>
</div>
</div>
<div class="cont-boton-producto"><a class="boton-producto" href="#">ver información</a></div>
</div>
</div> -->