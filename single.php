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
?>
<!-- ENTRADA DE CURSO INDIVIDUAL -->
	<section class="entrada__curso">
		<img src="<?=getIMG('puntos4.png')?>" alt="" class="puntos4">
		<div class="container-fluid">
			<div class="contenedor__mod_curso">
				<div class="row">
					<div class="col-lg-7">
						<h3 class="titulo__curso"><?=$titulo?></h3>
						<div class="contenedor_cat_pre">
							<p class="clases_online_curso"><?=$categoria?></p>
							<h3 class="precio_curso"><?=$contenido?></h3>
							<div class="contenedor_añadir_mp">
								<div>
									<a href="<?=$link?>" class="añadir__carrito">Añadir al carrito</a>
									<img src="<?= getIMG('mercadolibre.png')?>" alt="mercadolibre">
								</div>
						</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="imagen__curso">
							<img src="<?=$imagen?>" alt="<?=$titulo?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php else: ?>
	<p>El post no esta disponible</p>
<?php endif; ?>
<!-- CONTENIDO -->
	<div class="contenido__curso">
		<p>
			El curso está orientado a personas que se inician por primera vez en el conocimiento del vino o que tienen una base y quieren especializarse en el tema.
		</p>
		</br>
		<p>
			Durante el cursado les haremos una introducción al mundo del vino, recorriendo sus principales pilares temáticos en el marco de una experiencia teórica/práctica, que les permitirá conocer los matices y aspectos característicos de cada cepa y estilos de vino.
		</p>
		</br>
		<p><strong>Las clases se dictarán en vivo</strong> a través de la plataforma virtual <strong>Zoom</strong>, muy fácil de usar y se puede utilizar tanto de una computadora como de un dispositivo móvil.
		</p>
		<hr>
		<p class="desc_roja">
			<strong>Descripción</strong>
		</p>
		<p>
			<strong>Módulo 1</strong></br>Introducción al mundo del vino.</br>Historia y sus orígenes en Argentina.</br>Conceptos básicos.</br>Trabajos en el viñedo.</br>Elaboración de vino blanco.</br>Fases de la cata técnica.</br>Cata técnica de vino blanco.</br>Cepas blancas principales y características.</br>
		</p>
		<p>
			<strong>Módulo 2</strong></br>Componentes del vino.</br>Elaboración de vino tinto.</br>Maceración.</br>Fermentación.</br>Análisis visual del vino.</br>Fases de la cata técnica.</br>Cata técnica de vino tintos.</br>Cepas tinas principales y características.</br>
		</p>
		<p>
			<strong>Módulo 3</strong></br>Crianza del vino.</br>Fermentación maloláctica.</br>Efectos del roble en el vino.</br>Evolución del vino en la botella.</br>Guarda del vino.</br>Análisis olfativo del vino.</br>Cata técnica de vino reservas.</br>
		</p>
		<p>
			<strong>Módulo 4</strong></br>Definición de D.O.C (Denominación de origen controlado).</br>Champagne.</br>Elaboración de vinos espumosos.</br>Método tradicional o Champenoise.</br>Método industrial o Charmat.</br>Elaboración de vinos dulces.</br>Análisis gustativo del vino.</br>Cata técnica de vinos espumosos.
		</p>
	</div>
<!-- OTROS CURSOS -->
<div class="invitacion_rel">
	<img src="<?=getIMG('puntos5.png')?>" alt="" class="puntos5">
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
</main>
<?php get_footer(); ?>