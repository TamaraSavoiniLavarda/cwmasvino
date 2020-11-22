<?php get_header();?>
<!-- PAGE HOME -->
  <main>
  <div class="nuestroscursos">
    <p>
      Nuestros cursos
    </p>
  </div>
  <div class="contenedor__cursos">
    <div class="cuerpo__cursos">
      <div class="container">
        <div class="row">
          <?php
            /*
              Definiendo una consulta a la base de datos,
              Mediante una especificacion particular.
              https://developer.wordpress.org/reference/classes/wp_query/
            */
            $cursos = new WP_Query(array(
              'post_type' => 'post',
              /*'cat' => 3,*/
            ));
            /*
              Recorremos y mostramos los Post del objeto $cursos.
              https://codex.wordpress.org/the_loop#Object_orientation
            */
            if ($cursos->have_posts()):
              while ($cursos->have_posts()): $cursos->the_post();
                /* 
                  Obtenemos el id del post
                */
                $postid = get_the_ID();
                /* 
                  Obtenemos el titulo del post
                */
                $titulo = get_the_title();
                /*
                  Obtenemos la imagen destacada del post.
                  
                  Podemos indicarle un image_size si fue previamente definido en functions.php
                  https://developer.wordpress.org/reference/functions/get_the_post_thumbnail_url/
                */
                $imagen = get_the_post_thumbnail_url($postid, 'img_curso');
                /*
                  Obtenemos las categorias del post.
                  
                  Get_the_terms obtiene todos los items del post y la taxonomia indicada.
                  Taxonomia que soporta el tipo de post actual.

                  https://developer.wordpress.org/reference/functions/get_the_terms/
                */
                $auxCat = get_the_terms($postid, 'category');
                $categoria = '';
                foreach ($auxCat as $categorias) {
                  foreach ($categorias as $key => $value) {
                    if($key === 'name'){
                      $categoria .= $value . ', ';
                    }
                  }
                }
                $categoria = substr($categoria, 0, -2);
                /* 
                  Obtenemos el contenido del post
                */
                $contenido = get_the_content();
                /* 
                  Obtenemos el link al single del post
                */
                $link = get_the_permalink();
              ?>
              <div class="col-lg-4">
                <div class="contenedor_cursos">
                  <img src="<?=$imagen?>" alt="<?=$titulo?>">
                  <h3 class="titulo2"><?=$titulo?></h3>
                  <p class="clases_online"><?=$categoria?></p>
                  <h3 class="precio"><?=$contenido?></h3>
                  <a href="<?=$link?>" class="ver_mas">Comprar</a>
                </div>
              </div>
          <?php endwhile;  else: ?>
            <div class="col-lg-12">
              no hay poost
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>  