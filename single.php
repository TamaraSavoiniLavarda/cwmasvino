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
<div class="entrada__curso">
	<section class="contenedor__titulo">
		<div class="container-fluid contenedor__mod_curso">
			<div class="row">
				<div class="col-lg-7">
					<h3 class="titulo__curso"><?=$titulo?></h3>
				</div>
				<div class="col-lg-5 imagen__curso">
					<img src="<?=$imagen?>" alt="<?=$titulo?>">
				</div>
			</div>
		</div>
	</section>
	<div class="container-fluid contenedor__mod_curso">
		<div class="row">
			<div class="col-lg-7 ">
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
		</div>
	</div>
</div>
<!-- CONTENIDO -->
<div class="orientacion">
	<p>
		El curso está orientado a personas que se inician por primera vez en el conocimiento del vino o que tienen una base y quieren especializarse en el tema.</br>Durante el cursado les haremos una introducción al mundo del vino, recorriendo sus principales pilares temáticos en el marco de una experiencia teórica/práctica, que les permitirá conocer los matices y aspectos característicos de cada cepa y estilos de vino.</br><strong>Las clases se dictarán en vivo</strong> a través de la plataforma virtual <strong>Zoom</strong>, muy fácil de usar y se puede utilizar tanto de una computadora como de un dispositivo móvil.</br>Son <strong>4 clases</strong> una vez por semana con una duración de 2 hs. cada una.
	</p>
</div>
<?php else: ?>
	<p>El post no esta disponible</p>
<?php endif; ?>
</main>
<?php get_footer(); ?>