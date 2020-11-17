<?php
  get_header();
/*
  Formas de mostrar algo en php:
  <?php echo 'hola mundo'; ?>
  <?php echo('hola mundo'); ?>
  <?='hola mundo'; ?>
*/
  
?>

<main>
  <!-- SLIDE -->
  <div class="gradient">
    <div class="slide">
      <p>SLIDES</p>
    </div>
  </div>
  <!-- CONTENT -->
  <section class="cuerpo">
    <div class="cuerpo__superior">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <img src="<?= getIMG('puntos5.png')?>" alt="puntos" class="puntos1">
            <section class="imagen1">
              <img src="<?= getIMG('imagen1.jpg'); ?>" alt="Más Vino">
            </section>
          </div>
          <div class="col-lg-6 pl-5"> 
            <img src="<?= getIMG('linea.png'); ?>" alt="linea">
            <p class="sobremi"> SOBRE MÍ</p>
            <h3 class="julian pt-4">Mi nombre es Julián Páez, <br> soy sommelier y un apasionado <br> del vino y todo lo que lo rodea.</h3>
            <p class="texto1 pt-4">Mi principal objetivo es acercarte al vino, quitándole ese manto de solemnidad que lo rodea, te lo traduzco a tu idioma, brindandote herramientas teóricas, analíticas y técnicas para que lo entiendas y disfrutes de una manera diferente. </p>
            <p class="texto1 pt-1">Bienvenidos al mundo de nuestra <strong>BEBIDA NACIONAL</strong></p>
            <p class="texto1 pt-1">Salud!</p>
          </div>
           </div>
      </div>
      <div class="container text-center pt-5">
        <div class="row">
          <div class="col-lg-4">
            <img src="<?=getIMG('logo_cursos.png')?>" alt="cursos">
            <h3 class="titulos">CURSOS</h3>
            <p class="objetivo">Mi principal objetivo es acercarte al vino, quitándole todo ese manto de solemnidad que lo rodea, te lo traduzco a tu idioma, brindandote.</p>
          </div>
          <div class="col-lg-4">
            <img src="<?= getIMG('logo_catas.png')?>" alt="catas">
            <h3 class="titulos">CATAS</h3>
            <p class="objetivo">Mi principal objetivo es acercarte al vino, quitándole todo ese manto de solemnidad que lo rodea, te lo traduzco a tu idioma, brindandote.</p>
          </div>
          <div class="col-lg-4">
            <img src="<?= getIMG('logo_eventos.png'); ?>" alt="eventos">
            <h3 class="titulos">EVENTOS</h3>
            <p class="objetivo">Mi principal objetivo es acercarte al vino, quitándole todo ese manto de solemnidad que lo rodea, te lo traduzco a tu idioma, brindandote.</p>
          </div>
        </div>
        <div class="cursos">CURSOS</div>
      </div>  
    </div>
    <div class="cuerpo__inferior">
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
              'posts_per_page' => 3,
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
                $imagen = get_the_post_thumbnail_url();
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
                  <a href="<?=$link?>" class="ver_mas">VER MÁS</a>
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
  </section>

  <section class="container-fluid">
    <div class="row">
      <div class="col-lg-12 text-center pb-5">
        <a href="<?=home_url().'/cursos/'?>" class="ver_mas_cursos">ver más cursos</a>
      </div>
    </div>
  </section>

  <!-- FORMULARIO DE CONTACTO -->
  <section>
    <div class="container-fluid contenedor__contacto">
      <div class="row">
        <div class="col-lg-6 contenedor__texto">
          <ul>
            <li>
              <p class="pregunta__contacto">Querés contactarte con nosotros?</p>
            </li>
            <li>
              <img src="<?=getIMG('linea.png')?>" alt="linea roja" width="35px">
            </li>
            <li>
              <p class="contacto__texto">COMPLETÁ EL FORMULARIO ASÍ NOS PONEMOS EN CONTACTO CON VOS!</p>
            </li>
          </ul>
        </div>
        <div class="col-lg-6 contenedor__form">
          <div class="contenedor__formulario">
            <div class="form-group form">
              <input type="text" class="form-control" placeholder="NOMBRE Y APELLIDO">
            </div>
            <div class="form-group form">
              <input type="email" class="form-control" placeholder="E-MAIL">
            </div>
            <div class="form-group form">
              <input type="number" class="form-control" placeholder="TELÉFONO">
            </div>
            <div class="form-group form">
              <textarea class="form-control" id="text-area" placeholder="MENSAJE"></textarea>
            </div>
            <div class="boton">
              <a href="">
                <p>ENVIAR</p>
              </a>
            </div>
          </div>
          <div class="puntos2">
            <img src="<?=getIMG('puntos2_recortado.png')?>" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- INVITACION -->
  <div class="invitacion">
    <div class="container-fluid contenedor__inv">
      <div class="row">
        <div class="col-lg-6 contenedor__rel">
          <div class="invitacion__img">
            <img src="<?=getIMG('imagen5.png')?>" alt="Julián con copa">
          </div>
          <div class="puntos3">
            <img src="<?=getIMG('puntos3.png')?>" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="invitacion__texto">
            <p>Sumate a</br>nuestra</br> comunidad!</p>
          </div>
        <div>
            <ul class="invitacion__redes">
              <li><img src="<?=getIMG('logo_facebook_violeta.png')?>" alt="facebook"></li>
              <li><img src="<?=getIMG('logo_instagram_violeta.png')?>" alt="instagram"></li>
            </ul>
          </div>
        </div>
      </div>
    </div>    
    <!-- <img src="<?php //echo getIMG('curva.png')?>" width="100%"> -->
  </div>
</main>
<?php get_footer(); ?>