<?php
   /**   
      * The template for displaying all pages      
      * This is the template that displays all pages by default.
      * Please note that this is the WordPress construct of pages and that other   
      * 'pages' on your WordPress site will use a different template.   
      * Template Name: listarproductos
   
      * @package WordPress   
      * @subpackage Twenty_Thirteen   
      * @since Twenty Thirteen 1.0
    */
$categories = get_all_category_ids() ; ?>
<?php sort($categories); ?>
<div class="lista-productos">
   <div class="titulo-lista-productos">
      <h3>Productos</h3>
   </div>
   <?php foreach ($categories as $key => $cat) { ?>
      <?php if ($cat!=1 && $cat!=9): ?>
         <div class="listado">
            <h4 class="subt-lista-productos"><?php echo get_cat_name($cat); ?></h4>
            <ul>
               <?php $the_query = new WP_Query('cat='.$cat); ?>
               <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
               <li><a href="<?php the_permalink(); ?>">Petronas <?php echo get_cat_name($cat).' '; the_title(); ?></a></li>
               <?php endwhile;?>
            </ul>
         </div>
      <?php endif ?>
   <?php } ?>
</div>

<!-- 
<div class="lista-productos">
   <div class="titulo-lista-productos">
      <h3>Productos</h3>
   </div>
   <div class="listado">
      <h4 class="subt-lista-productos">Syntium</h4>
      <ul>
         <li><a href="https://grupouma.com/petronas/index.php/7000-ow-20/">Petronas Syntium 7000 0W-20</a></li>
         <li><a href="https://grupouma.com/petronas/index.php/7000-e/">Petronas Syntium 7000 E</a></li>
         <li><a href="https://grupouma.com/petronas/index.php/racer/">Petronas Syntium Racer</a></li>
         <li><a href="https://grupouma.com/petronas/index.php/5000-av/">Petronas Syntium 5000 AV</a></li>
         <li><a href="https://grupouma.com/petronas/index.php/5000-dx/">Petronas Syntium 5000 DX</a></li>
         <li><a href="https://grupouma.com/petronas/index.php/3000-fr/">Petronas Syntium 3000 FR</a></li>
         <li><a href="https://grupouma.com/petronas/index.php/3000-xs/">Petronas Syntium 3000 XS</a></li>
         <li><a href="https://grupouma.com/petronas/index.php/3000-2/">Petronas Syntium 3000</a></li>
         <li><a href="https://grupouma.com/petronas/index.php/3000-bv/">Petronas Syntium 3000 BV</a></li>
         <li><a href="https://grupouma.com/petronas/index.php/1000-2/">Petronas Syntium 1000</a></li>
         <li><a href="https://grupouma.com/petronas/index.php/800-2/">Petronas Syntium 800</a></li>
         <li><a href="https://grupouma.com/petronas/index.php/800-hm/">Petronas Syntium 800 HM</a></li>
      </ul>
   </div>
   <div class="listado">
   <h4 class="subt-lista-productos">Sprinta</h4>
   <ul>
   <li><a href="https://grupouma.com/petronas/index.php/sprinta-4xt/">Petronas Sprinta 4XT</a></li>
   <li><a href="https://grupouma.com/petronas/index.php/sprinta-2xt/">Petronas Sprinta 2XT</a></li>
   </ul>
   </div>
   <div class="listado">
   <h4 class="subt-lista-productos">Urania</h4>
   <ul>
   <li><a href="https://grupouma.com/petronas/index.php/urania-5000-se/">Petronas Urania 5000 SE</a></li>
   <li><a href="https://grupouma.com/petronas/index.php/urania-5000/">Petronas Urania 5000</a></li>
   <li><a href="https://grupouma.com/petronas/index.php/urania-3000/">Petronas Urania 3000</a></li>
   <li><a href="https://grupouma.com/petronas/index.php/urania-3000-ls/">Petronas Urania 3000 LS</a></li>
   <li><a href="https://grupouma.com/petronas/index.php/urania-3000-se/">Petronas Urania 3000 SE</a></li>
   <li><a href="https://grupouma.com/petronas/index.php/urania-ld7/">Petronas Urania LD7</a></li>
   <li><a href="https://grupouma.com/petronas/index.php/urania-1000-hm/">Petronas Urania 1000 HM</a></li>
   </ul>
   </div>
</div> -->