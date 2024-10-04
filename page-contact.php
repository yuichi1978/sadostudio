<?php
/* Template Name: お問合せ */
get_header();
?>

<body id="contact" class="contact">
  <div id="wrapper" class="l-wrapper">
    <?php get_template_part('inc', 'header'); ?>
    <main id="main" class="l-main">
      <section id="lower_contact" class="p-section l-lower-section p-contact">
        <div class="p-section__inr c-width c-width--1200">
          <div class="l-title__head">
            <h1 class="l-title__h1">CONTACT</h1>
          </div>
          <div class="c-spacer_group ml300">
            <div class="c-spacer_group__inr">
              <div class="c-spacer_cont">
                <div class="c-form">
                  <?php echo apply_shortcodes('[contact-form-7 id="118" title="お問い合わせ"]'); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php get_template_part('inc', 'pagetop'); ?>
    </main><!-- main_area -->
    <?php get_template_part('inc', 'footer'); ?>
    <?php get_template_part('inc', 'sp_menu'); ?>
    <?php get_template_part('inc', 'side_menu'); ?>

  </div><!-- wrapper -->
  <?php get_template_part('inc', 'js'); ?>

  <?php wp_footer(); ?>
</body>

</html>