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
	$categoria = substr($categoria, 0, -2) . '.';
  ?>
	<section class="contenedor_curso">
		<div class="container-fluid contenedor__mod_curso">
			<div class="row">
				<div class="col-lg-7">
					<div>
						<h3 class="titulo__curso"><?=$titulo?></h3>
					</div>
					<div>
						<p class="clases_online_curso"><?=$categoria?></p>
						<h3 class="precio_curso"><?=$contenido?></h3>
					</div>
					<div class="contenedor_añadir_mp">
						<div>
							<a href="<?=$link?>" class="añadir__carrito">Añadir al carrito</a>
							<img src="<?= getIMG('mercadolibre.png')?>" alt="mercadolibre">
						</div>
					</div>
				</div>
				<div class="col-lg-5">
						<img src="<?=$imagen?>" alt="<?=$titulo?>">
				</div>
			</div>
		</div>
	</section>
<?php else: ?>
	<p>El post no esta disponible</p>
<?php endif; ?>
</main>
<?php get_footer(); ?>