<?php
  if( !is_page(array('Contato', 'Luis Guilherme')) ) :
?>
    <footer class="footer bg-black">
      <div class="container-wrap">
        <div class="footer-top_holder grids two_grids">
          <div class="footer-top--item">
            <img src="<?= home_url() ?>/wp-content/uploads/thumbnail-footer.png" alt="">
          </div>
          <div class="footer-top--item">
            <div class="title-container">
              <h2 class="normal-title text-white text-bold"><?php the_field('titulo','opt-footer'); ?></h2>
              <h3 class="normal-title text-white text-light"><?php the_field('sub_titulo','opt-footer'); ?></h3>
            </div>
            <div class="text-container">
                <p class="normal-text text-white"><?php the_field('texto','opt-footer'); ?></p>
            </div>
            <a href="<?php the_field('link_button','opt-footer'); ?>" class="button-primary button-rounded button-white">Entrar em contato</a>
            <?= do_shortcode('[social_widget]') ?> 
            <div class="footer-copy">
              <p class="normal-text text-light text-white">Car Deluxe © 2021 | Site desenvolvido por <a href="http://dp8.studio/" class="normal-text text-white" target="_blank">Estúdio DP8</a></p>
            </div>
          </div>

        </div>
        
      </div>
    </footer>
<?
  endif;
?>
  <?php wp_footer(); ?>
  </body>
</html>