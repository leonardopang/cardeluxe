<?php
  //Template Name: Contato
  get_header();
  function buttons_item(){
    if( have_rows('buttons_container') ) :
      while( have_rows('buttons_container') ) :
        the_row();
        $buttons_contato = get_sub_field('buttons');

        if( $buttons_contato == 'E-mail' ) :
    ?>
        <a href="mailto:<?php the_sub_field('email') ?>" target="_blank" class="button-primary button-border button-border--white button-rounded text-white"><?php the_sub_field('buttons') ?></a>
    <?php
        elseif( $buttons_contato == 'Telefone' ): ?>
        <a href="tel:<?php the_sub_field('numero_tel') ?>" target="_blank" class="button-primary button-border button-border--white button-rounded text-white"><?php the_sub_field('buttons') ?></a> <?php
        else :
    ?>
        <a href="<?php the_sub_field('link') ?>" target="_blank" class="button-primary button-border button-border--white button-rounded text-white"><?php the_sub_field('buttons') ?></a>
    <?php
        endif;
      endwhile;
    endif;
  }
?>

<section class="contato">
  <div class="container-wrap">
    <div class="contato_container">
      <div class="title-container text-center">
        <h1 class="normal-title text-white">Escolha o meio de contato</h1>
        <h2 class="small-title text-white">Vamos ficar felizes em te atender</h2>
      </div><?php
      if( get_field('nome_pessoa') ){
      ?>
        <div class="info-contato text-center">
          <h3 class="small-title text-white"><?php the_field('nome_pessoa'); ?></h3>
          <h4 class="small-title text-white"><?php the_field('cargo'); ?></h4>
        </div><?php
      } ?>
      <div class="contato_holder flex_item"> 
        <?php buttons_item(); ?>
      </div>
    </div>
  </div>
</section>

  <?php wp_footer(); ?>
  </body>
</html>