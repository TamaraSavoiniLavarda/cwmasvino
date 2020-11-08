<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <!-- HEADER -->
  <header class="header">
    <section class="contenedor__mod">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3">
            <section class="logo">
              <?php 
                /*
                  Para obtener la pagina principal o el incio del sitio
                  utilizar home_url(): http://localhost/ o http://cabureweb.com/
                */
              ?>
              <a href="<?=home_url();?>"><img src="<?= getIMG('Mas Vinos - logo.png');?>" alt="logo"></a>
              <!-- <div class="boton">
                <p id="btn-responsive">MENÚ</p>
              </div> -->
            </section>
          </div>
          <div class="col-lg-7">
            <?php
              /*
                Obtenemos el menu definido en functions.php y agregamos una clase padre.
                https://developer.wordpress.org/reference/functions/wp_nav_menu/
              */
              wp_nav_menu(
                array(
                  'theme_location'=> 'menu_principal',
                  'menu_class' => 'menuHeader')
                );
              ?>
          </div>
          <div class="col-lg-2">
            <ul class="redes">
              <li><a href="" target="_blank"><img src="<?=getIMG('icon_header_f.png')?>" alt="facebook-logo"></a></li>
              <li><a href=""><img src="<?=getIMG('icon_header_i.png')?>" alt="instagram-logo"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </header>