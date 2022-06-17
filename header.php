<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php the_field('fav_icon','opt-logo'); ?>" type="image/x-icon">
    <title> <?php
      if( is_page('home') or is_home() ):
        echo get_bloginfo('name') . " | " . get_bloginfo('description');
      else:
        echo  get_bloginfo('name'). " | " .get_the_title();
      endif;
    ?></title>
    <?php wp_head(); ?>
  </head>
  <body class="main_container">
  <header class="header bg_white">
    <div class="header-middle">
      <div class="menu-desktop">
        <div class="container-wrap">
          <div class="menu-desktop_holder">
            <div class="logo_holder">
              <a href="<?= home_url() ?>"><img src="<?php the_field('desktop','opt-logo'); ?>" alt="Logo Car Delux"></a>
            </div>
            <?php
              $args = array(
                'theme_location'  => 'desktop',
                'container'       => 'div',
                'menu_class'      => 'menu-header',
              );
              wp_nav_menu($args); ?> 
          </div>
        </div>
      </div>
      <div class="header-mobile">
        <div class="container-wrap">
          <div class="header-mobile_holder">
            <a href="<?= home_url() ?>" class="logo-mobile"><img src="<?php the_field('mobile','opt-logo'); ?>" alt="Logo Car Delux"></a>
            <div class="icon-hamburguer">
              <span class="fas fa-bars fa-lg"></span>
            </div>
          </div>
        </div>
        <div class="menu-mobile-nav"> 
          <div class="container-wrap"> <?php
            $args = array(
                'theme_location' => 'mobile',
                'container' => 'div',
            );
            wp_nav_menu($args); ?>
          </div>
        </div>
      </div>
    </div>
  </header>
