<?php
  //Template Name: Sobre
  get_header();
?>
  <?php hero_header(); ?>
  <section class="sobre">
    <div class="container-wrap"><?php
      if( have_rows('primeira_section') ) :?>
        <div class="sobre_holder grids two_grids"><?php
          while( have_rows('primeira_section') ) :
            the_row();
              if( have_rows('column_1') ) :
                while( have_rows('column_1') ) :
                  the_row() ?>
                  <div class="sobre--item two_grids--item">
                    <?php
                      if( get_row_layout() == 'texto_container' ) :
                    ?>
                        <div class="title-container">
                          <h2 class="normal-title text-bold"><?php the_sub_field('titulo'); ?></h2>
                          <h3 class="small-title text-light"><?php the_sub_field('sub_titulo'); ?></h3>
                        </div>
                        <div class="text-container normal-text">
                          <?php the_sub_field('texto'); ?>
                        </div>
                  <?php
                      elseif( get_row_layout() == 'imagem_container' ) :                  
                    ?>
                        <img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('texto_alternativo'); ?>">
                    <?php
                      endif;
                    ?>
                  </div><?php
                endwhile;
               
              endif;     
              if( have_rows('column_2') ) :
                while( have_rows('column_2') ) :
                  the_row() ?>
                  <div class="sobre--item two_grids--item">
                    <?php
                      if( get_row_layout() == 'texto_container' ) :
                    ?>
                        <div class="title-container">
                          <h2 class="normal-title text-bold"><?php the_sub_field('titulo'); ?></h2>
                          <h3 class="small-title text-light"><?php the_sub_field('sub_titulo'); ?></h3>
                        </div>
                        <div class="text-container normal-text">
                          <?php the_sub_field('texto'); ?>
                        </div>
                  <?php
                      elseif( get_row_layout() == 'imagem_container' ) :                  
                    ?>
                        <img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('texto_alternativo'); ?>">
                    <?php
                      endif;
                    ?>
                  </div><?php
                endwhile;
                
              endif;
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
      <?php
      endif;
      ?>
    </div>
  </section>

  <section class="car-delux">
    <div class="container-wrap"><?php
      if( have_rows('segunda_section') ) :?>
      <div class="car-delux_holder grids two_grids"><?php
        while( have_rows('segunda_section') ) :
          the_row();
          if( have_rows('column_1') ) :
            while( have_rows('column_1') ) :
              the_row() ?>
              <div class="car-delux--item two_grids--item">
                <?php
                  if( get_row_layout() == 'texto_container' ) :
                ?>
                    <div class="title-container text-center">
                      <h2 class="normal-title text-white text-bold"><?php the_sub_field('titulo'); ?></h2>
                      <h3 class="small-title text-white text-light"><?php the_sub_field('sub_titulo'); ?></h3>
                    </div>
              <?php
                  elseif( get_row_layout() == 'imagem_container' ) :                  
                ?>
                    <img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('texto_alternativo'); ?>">
                <?php
                  endif;
                ?>
              </div><?php
            endwhile;
           
          endif;     
          if( have_rows('column_2') ) :
            while( have_rows('column_2') ) :
              the_row() ?>
              <div class="car-delux--item two_grids--item">
                <?php
                  if( get_row_layout() == 'texto_container' ) :
                ?>
                    <div class="title-container">
                      <h2 class="normal-title text-white text-bold"><?php the_sub_field('titulo'); ?></h2>
                      <h3 class="small-title text-white text-light"><?php the_sub_field('sub_titulo'); ?></h3>
                    </div>
              <?php
                  elseif( get_row_layout() == 'imagem_container' ) :                  
                ?>
                    <img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('texto_alternativo'); ?>">
                <?php
                  endif;
                ?>
              </div><?php
            endwhile;
            
          endif;
        endwhile;
        wp_reset_postdata();
        ?>
      </div>
    <?php
    endif;
    ?>
    </div>
  </section>
  <?php galeria_slides(); ?>
<?php
  get_footer();
?>