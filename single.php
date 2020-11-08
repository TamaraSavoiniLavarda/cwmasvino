<?php get_header();?>
<!-- PAGE SINGLE -->
<main>
<?php
if (have_posts()): the_post();
    $postid = get_the_ID();
    $titulo = get_the_title();
    $imagen = get_the_post_thumbnail_url();
    // $categoria = get_the_title();
    $contenido = get_the_content();
    $link = get_the_permalink();
  ?>
  <section class="container">
  	<div class="row">
	  <div class="col-lg-12">
	    <div class="contenedor_cursos">
	      <img src="<?=$imagen?>" alt="<?=$titulo?>">
	      <h3 class="titulo2"><?=$titulo?></h3>
	      <p class="clases_online">Clases online</p>
	      <h3 class="precio"><?=$contenido?></h3>
	    </div>
	  </div>
  	</div>
  </section>
<?php else: ?>
	<p>El post no esta disponible</p>
<?php endif; ?>
</main>
<?php get_footer(); ?>