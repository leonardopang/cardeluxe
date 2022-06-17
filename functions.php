<?php
function link_css(){
  wp_enqueue_style('bridge-childstyle', get_stylesheet_directory_uri() . '/style.css');
  wp_enqueue_style('childstyle', get_stylesheet_directory_uri() . '/assets/css/style.main.css');
}
add_action('wp_enqueue_scripts', 'link_css', 11);

function wp_custom_script()
{
  wp_register_script('siema-js', get_stylesheet_directory_uri() . '/assets/js/siema.min.js', array(), false, false);
  wp_register_script('siema-arrows', get_stylesheet_directory_uri() . '/assets/js/siema-dots.js', array('siema-js'), false, true);
  wp_register_script('depoimento', get_stylesheet_directory_uri() . '/assets/js/depoimento.js', array('siema-arrows'), false, true);
  wp_enqueue_script('depoimento');

  wp_enqueue_script('FontAwesome', 'https://kit.fontawesome.com/9dd9385575.js', array(), false, false);
}
add_action('wp_enqueue_scripts', 'wp_custom_script', 10);

// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

add_theme_support('menus');


function mytheme_register_nav_menu(){
    register_nav_menus( array(
        'desktop' => __( 'Desktop', 'text_domain' ),
        'footer'  => __( 'Footer', 'text_domain' ),
        'mobile'  => __( 'Mobile', 'text_domain' ),
    ) );
}
add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );

function accordion(){
  if( have_rows('accordion') ) :
    while( have_rows('accordion') ) :
      the_row(); 
      ?>
      <div class="duvidas-accordion">
        <div class="title-container">
          <h3 class="super-text text-green"><?php the_sub_field('titulo_accordion'); ?></h3>
        </div><?php
        if( have_rows('conteudo') ) :
          while( have_rows('conteudo') ) :
            the_row(); ?>
            <div class="duvidas-accordion_holder"><?php
              if( get_row_layout() == 'text_container' ) : ?>
                <div class="normal-text text-container">
                  <?php the_sub_field('texto'); ?>
                </div><?php
              elseif( get_row_layout() == 'imagem_container' ) : ?>
                <div class="imagem-container">
                  <img src="<?php the_sub_field('imagem'); ?>" alt="">
                </div><?php
              elseif( get_row_layout() == 'titulo_container' ) : ?>
                <div class="title-container">
                  <h2 class="small-title"><?php the_sub_field('text') ?></h2>
                </div><?php
              endif; ?>
            </div><?php
          endwhile;
        endif; ?>
      </div> <?php
    endwhile;
    wp_reset_postdata();
  endif;
}

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
    'page_title'    => 'Tema',
    'menu_title'    => 'Tema',
    'menu_slug'     => 'tema',
    'redirect'      => true,
    'position'      => '3.1',
    'icon_url'      =>  get_stylesheet_directory_uri() . '/images/icon-wordpress.png',
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'Logos',
    'menu_title' => 'Logos',
    'parent_slug' => 'tema',
    'menu_slug'   => 'tema-logo',
    'post_id' => 'opt-logo',
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'Footer',
    'menu_title' => 'Footer',
    'parent_slug' => 'tema',
    'menu_slug'   => 'teme-footer',
    'post_id' => 'opt-footer',
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'Redes Sociais',
    'menu_title' => 'Redes Sociais',
    'parent_slug' => 'tema',
    'menu_slug'   => 'redes-sociais',
    'post_id' => 'opt-social',
  ));

}

function hamburguer_menu(){
?>
  <script>
    const menu_mobile = document.querySelector('.icon-hamburguer')
    const menu_holder = document.querySelector('.menu-mobile-nav')

    menu_mobile.addEventListener('click', () => {
      menu_holder.classList.toggle('active')
    })
  </script>
<?php
}
add_action('wp_footer','hamburguer_menu');

function hero_header(){
  ?>
  <section class="hero-banner">
    <div class="container-wrap">
      <div class="hero-banner_holder">
        <div class="moldura-rounded moldura-white">
          <p class="normal-text text-white"><?php the_field('text_moldura'); ?></p>
        </div>
        <div class="title-container">
          <h1 class="normal-title text-white text-bold"><?php the_field('titulo_hero_header'); ?></h1>
          <h2 class="normal-title text-white text-light"><?php the_field('sub_titulo_hero_header'); ?></h2>
        </div>
        <a href="<?php the_field('link_hero_header'); ?>" class="button-primary button-border button-border--white button-rounded text-white">Quero viajar agora</a>
        <div class="hero-banner--image">
          <img src="<?php the_field('imagem_hero_header'); ?>" alt="<?php the_title(); ?>">
        </div>
      </div>
    </div>
  </section>
  <?php
}

function depoimentos(){
  $args = array(
    'post_type'       => 'depoimentos',
    'posts_per_page'  => -1
  );

  $depoimentos = new WP_Query($args);

  if( $depoimentos->have_posts() ) :
    while( $depoimentos->have_posts() ) :
      $depoimentos->the_post();
  ?>
      <div class="depoimento--item">
        <div class="title-container">
          <h2 class="normal-title text-bold"><?php the_title(); ?></h2>
          <h3 class="small-title text-light"><?php the_field('sub_titulo'); ?></h3>
        </div>
        <div class="text-container">
          <p class="normal-text"><?php the_field('depoimento'); ?></p>
        </div>
      </div>
  <?php
    endwhile;
    wp_reset_postdata();
  endif;
}

function planos_home(){
  $args = array(
    'post_type'       => 'planos',
    'posts_per_page'  => -1,
  );
  $planos = new WP_Query($args);

  if( $planos->have_posts() ) :
    while( $planos->have_posts() ) :
      $planos->the_post();
  ?>
      <div class="planos-luxo-siema--item">
        <div class="title-container">
          <h2 class="normal-title text-white text-bold"><?php the_title(); ?></h2>
          <h3 class="small-title text-white text-light"><?php the_field('sub_titulo'); ?></h3>
        </div>
        <div class="text-container">
          <p class="normal-text text-white"><?php the_field('resumo'); ?></p>
        </div>
        <a href="<?php the_permalink(); ?>" class="button-primary button-rounded button-white">Ver planos</a>
      </div>
  <?php
    endwhile;
    wp_reset_postdata();
  endif;
}

function section_column($column){
  if( have_rows("{$column}") ) :
    while( have_rows("{$column}") ) :
      the_row();

      if( have_rows('container') ) :
        while( have_rows('container') ) :
          the_row();

          if( get_row_layout() == 'texto_container' ) : ?>

            <div class="title-container">
              <h2 class="normal-title text-bold"><?php the_sub_field('titulo'); ?></h2>
              <h3 class="small-title text-light"><?php the_sub_field('sub_titulo'); ?></h3>
            </div>
            <div class="text-container normal-text">
              <?php the_sub_field('texto'); ?>
            </div>
            <?php
              if( get_sub_field('button_text') ) :
            ?>
                <a href="<?php the_sub_field('button_link'); ?>" class="button-primary button-rounded button-border"><?php the_sub_field('button_text'); ?></a><?php
              endif;
          elseif( get_row_layout() == 'imagem_container' ) : ?>

            <img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('texto_alternativo'); ?>"> <?php

          endif;
        endwhile;
        wp_reset_postdata();
      endif;

    endwhile;
    wp_reset_postdata();
  endif;
}

function slide_item(){
  $galeria_slides = get_field('galeria_slides');
  foreach( $galeria_slides as $image ) :
  ?>
    <div class="slide-siema--item">
      <img src="<?= $image ?>" alt="">
    </div>
  <?php
  endforeach;
}

function galeria_slides(){
  ?>
  <section class="slides">
    <div class="container-wrap">
      <div class="slides-container">
        <div class="slides_siema">
          <?php slide_item(); ?>
        </div>
        <div class="arrows-container">
          <span class="arrows arrows-left"><i class="fas fa-chevron-left text-white fa-2x"></i></span>
          <span class="arrows arrows-right"><i class="fas fa-chevron-right text-white fa-2x"></i></span>
        </div>
      </div>
    </div>
  </section>
  <?php
}

function carros_item(){
  if( have_rows('carros_container') ) :
    while( have_rows('carros_container') ) :
      the_row();
  ?>
      <div class="opcoes-transporte-siema_holder">
        <img src="<?php the_sub_field('thumbnail') ?>" alt="<?php the_sub_field('titulo'); ?>">
        <div class="title-container text-center">
          <h3 class="super-text text-bold text-white"><?php the_sub_field('nome'); ?></h3>
          <h4 class="super-text text-light text-white"><?php the_sub_field('modelo'); ?></h4>
        </div>
      </div>
  <?php
    endwhile;
    wp_reset_postdata();
  endif;
}

function carros_holder(){
?>
<section class="opcoes-transporte bg-black">
  <div class="container-wrap">
    <div class="opcoes-transporte_container">
      <div class="opcoes-transporte_holder">
        <div class="title-container text-center">
          <h2 class="normal-title text-white text-bold">Suas opções de transporte</h2>
          <h3 class="small-title text-white text-light"><?php the_field('sub_titulo_carros'); ?></h3>
        </div>
        <div class="opcoes-tranporte-siema">
          <?php carros_item(); ?>
        </div>
        <div class="arrows-container">
          <span class="arrows arrows-left"><i class="fas fa-chevron-left text-white fa-2x"></i></span>
          <span class="arrows arrows-right"><i class="fas fa-chevron-right text-white fa-2x"></i></span>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
}

function social_widget(){
?>
  <div class="social-widget"> 
    <div class="social-widget_holder grids">
      <?php
        
        if( have_rows('redes_sociais','opt-social') ) :
          while( have_rows('redes_sociais','opt-social') ) :
            the_row();
            if( get_row_layout() == 'select_redes_sociais') :
              $social_item = get_sub_field('lista_redes_sociais');
              if( $social_item == 'fas fa-envelope' ) :
      ?>      <a href="mailto:<?php the_sub_field('email') ?>" class="<?php the_sub_field('lista_redes_sociais') ?> super-text"></a>
              <?php else: ?>
              <a href="<?php the_sub_field('link_rede_social') ?>" class="<?php the_sub_field('lista_redes_sociais') ?> super-text"></a>
      <?php   endif;
            endif; 
          endwhile;
        endif;
      ?>
    </div>
  </div>

<?php
}
add_action('wp_footer','social_widget');
add_shortcode('social_widget','social_widget');