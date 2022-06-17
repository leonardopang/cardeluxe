<?php
  get_header();
  function categorias_planos(){
    if( have_rows('categoria_container') ) :
      while( have_rows('categoria_container') ) :
        the_row(); ?>
        <div class="categoria-veiculos-item flex_item two_grids--item">
          <img src="<?php the_sub_field('thumbnail'); ?>" alt="<?php the_sub_field('categoria'); ?>">
          <div class="categoria-veiculos_info">
            <h2 class="normal-title nome-categoria"><?php the_sub_field('categoria'); ?></h2>
            <h3 class="small-title tipo-veiculo"><?php the_sub_field('tipo_veiculo'); ?></h3>
            <div class="marcas-veiculos">
              <p class="normal-text"><?php the_sub_field('marca_carros'); ?></p>
            </div>
          </div>
        </div> <?php
      endwhile;
      wp_reset_postdata();
    endif;
  }

  function opcionais_servicos(){
    if( have_rows('opcionais_container') ) :
      while( have_rows('opcionais_container') ) :
        the_row();
    ?>
        <div class="opcionais-planos--item flex_item three_grids">
          <img src="<?php the_sub_field('thumbnail'); ?>" alt="<?php the_sub_field('titulo'); ?>">
          <div class="opcionais-planos_info">
            <h3 class="normal-text"><?php the_sub_field('titulo'); ?></h3>
            <h4 class="normal-text"><?php the_sub_field('sub_titulo'); ?></h4>
          </div>
        </div>
    <?php
      endwhile;
      wp_reset_postdata();
    endif;
  }
?>
  <?php hero_header(); ?>
  <section class="planos">
    <div class="container-wrap">
      <div class="planos_holder grids two_grids">
        <div class="planos--item two_grids--item">
          <?php section_column('column_1'); ?>
        </div>
        <div class="planos--item two_grids--item">
          <?php section_column('column_2'); ?>
        </div>
      </div>
    </div>
  </section>
  <?php carros_holder(); ?>
  <section class="categoria-veiculos">
    <div class="container-wrap">
      <div class="categoria-veiculos_container">
        <div class="title-container">
          <h2 class="normal-title">Categorias de veículos</h2>
          <h3 class="small-title">Tenha a experiência ideal para você</h3>
        </div>
        <div class="categoria-veiculos_holder grids two_grids">
          <?php categorias_planos(); ?>
        </div>
      </div>
    </div>
  </section>
  <section class="sobre-planos">
    <div class="container-wrap">
      <div class="sobre-planos_holder">
        <div class="title-container text-center">
          <h2 class="normal-title text-white"><?php the_title(); ?></h2>
          <h3 class="small-title text-white"><?php the_field('sub_titulo_sobre_planos') ?></h3>
        </div>
        <div class="text-container text-center">
          <p class="normal-text text-white"><?php the_field('texto_sobre_planos') ?></p>
        </div>
        <a href="<?php the_field('link_button_sobre_planos') ?>" class="button-primary button-rounded button-white">Orçar pacote</a>
      </div>
    </div>
  </section>
  <section class="vantagens-inclusos">
    <div class="container-wrap">
      <div class="vantagens-inclusos_holder grids two_grids">
      <?php
        $vantagens = get_field('vantagens');
        $inclusos = get_field('inclusos');
      ?>
        <div class="vantagens-inclusos--item">
          <div class="title-container">
            <h2 class="normal-title">Vantegens</h2>
            <h3 class="small-title"><?= $vantagens['sub_titulo'] ?></h3>
          </div>
          <div class="text-container">
            <p class="normal-text"><?= $vantagens['texto'] ?></p>
          </div>
        </div>
        <div class="vantagens-inclusos--item">
          <div class="title-container">
            <h2 class="normal-title">Incluso em todos os carros</h2>
            <h3 class="small-title"><?= $inclusos['sub_titulo'] ?></h3>
          </div>
          <div class="text-container">
            <p class="normal-text"><?= $inclusos['texto'] ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="opcionais-planos">
    <div class="container-wrap">
      <div class="opcionais-planos_container">
        <div class="title-container">
          <h2 class="normal-title"><?php the_field('titulo_opcionais'); ?></h2>
          <h3 class="small-title"><?php the_field('sub_titulo_opcionais'); ?></h3>
        </div>
        <div class="opcionais-planos_holder grids three_grids">
          <?php opcionais_servicos(); ?>
        </div>
      </div>
    </div>
  </section>
<?php
  get_footer();
?>