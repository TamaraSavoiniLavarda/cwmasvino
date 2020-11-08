<?php get_header();?>
<!-- PAGE HOME -->

<main>
  <div class="container">
    <div class="row">
      <?php if ( have_posts()): while (have_posts()): the_post();
        $postid = get_the_ID();
        $titulo = get_the_title();
        $imagen = get_the_post_thumbnail_url();
        

        // categoria
        $auxCatProduct = get_the_terms($postid, 'category');
        $categoria = '';
        foreach ($auxCatProduct as $categorias) {
          foreach ($categorias as $key => $value) {
            if($key === 'name'){
              $categoria .= $value . ', ';
            }
          }
        }
        $categoria= substr($categoria, 0, -2) . '.';



        $contenido = get_the_content();
        $link = get_the_permalink();
      ?>
        <div class="col-lg-4">
          <div class="contenedor_cursos">
            <img src="<?=$imagen?>" alt="<?=$titulo?>">
            <h3 class="titulo2"><?=$titulo?></h3>
            <p class="clases_online"><?=$categoria?></p>
            <h3 class="precio"><?=$contenido?></h3>
            <a href="<?=$link; ?>" class="ver_mas">VER MÁS</a>
          </div>
        </div>
      <?php endwhile;  else: ?>
        <div class="col-lg-12">
          no hay poost
        </div>
      <?php endif; ?>
      
    </div>
  </div>
</main>

<?php get_footer(); ?>  