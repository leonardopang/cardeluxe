<?php
  //Template Name: Pacotes
  get_header();
  function pacotes_item(){
    if( have_rows('pacotes_container') ) :
      while( have_rows('pacotes_container') ) :
        the_row(); ?>
        <a href="<?php the_sub_field('link_pacote'); ?>" class="pacotes--item two_grids--item">
          <img src="<?php the_sub_field('thumbnail'); ?>" alt="<?php the_sub_field('titulo'); ?>">
          <div class="pacotes_info">
            <h2 class="small-title text-bold text-white"><?php the_sub_field('titulo'); ?></h2>
            <h3 class="small-title text-light text-white"><?php the_sub_field('resumo'); ?></h3>
          </div>
        </a><?php
      endwhile;
    endif;
  }
?>
  <?php hero_header(); ?>
  <section class="pacotes">
    <div class="container-wrap">
      <div class="pacotes_container">
        <div class="title-container">
          <h2 class="normal-title"><?php the_field('titulo'); ?></h2>
          <h3 class="small-title"><?php the_field('sub_titulo'); ?></h3>
        </div>
        <div class="pacotes_holder grids two_grids">
          <?php pacotes_item(); ?>
        </div>
      </div>
    </div>
  </section>
<?php
  get_footer();
?>