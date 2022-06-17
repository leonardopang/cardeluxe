<?php
  //Template Name: Home
  get_header();
?>
  <?php hero_header(); ?>

  <section class="transporte-executivo">
    <div class="container-wrap">
      <div class="transporte-executivo_holder grids two_grids">
        <div class="transporte-executivo--item two_grids--item">
          <?php section_column('column_1'); ?>
        </div>
        <div class="transporte-executivo--item two_grids--item">
          <?php section_column('column_2'); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="planos-luxo">
    <div class="planos-luxo_holder grids two_grids">
      <div class="planos-luxo--item two_grids--item">
        <div class="half-container half-container--left">
          <div class="planos-luxo-siema">
            <?php planos_home(); ?>
          </div>
        </div>
      </div>
      <div class="planos-luxo--item two_grids--item">
        <div class="plano-luxo--image">
          <img src="<?php the_field('thumbnail_planos_home'); ?>" alt="">
        </div>
      </div>
    </div>
  </section>

  <section class="depoimentos">
    <div class="container-wrap">
      <div class="depoimentos_holder">
        <?php depoimentos(); ?>
      </div>
    </div>
  </section>
  <?php carros_holder(); ?>
  <!--<section class="opcoes-transporte bg-black">
    <div class="container-wrap">
      <div class="opcoes-transporte_container">
        <div class="opcoes-transporte_holder">
          <div class="title-container text-center">
            <h2 class="normal-title text-white text-bold">Suas opções de transporte</h2>
            <h3 class="small-title text-white text-light">Lorem Ipsum dolor set</h3>
          </div>
          <div class="opcoes-tranporte-siema">
            <div class="opcoes-transporte-siema_holder">
              <img src="<?= home_url() ?>/wp-content/uploads/carro-opcoes.png" alt="">
              <div class="title-container text-center">
                <h3 class="super-text text-bold text-white">Mercedes Benz </h3>
                <h4 class="super-text text-light text-white">C280 Turbo</h4>
              </div>
            </div>
          </div>
          <div class="arrows-container">
            <span class="arrows arrows-left"><i class="fas fa-chevron-left text-white fa-2x"></i></span>
            <span class="arrows arrows-right"><i class="fas fa-chevron-right text-white fa-2x"></i></span>
          </div>
        </div>
      </div>
    </div>
  </section>-->

  <?php galeria_slides(); ?>

<?php
  get_footer();
?>

