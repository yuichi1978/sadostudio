<?php
/* Template Name: works詳細ページ */
if (is_date()) {
  include(TEMPLATEPATH . '/date.php');
} else {
  get_header();
?>

<body id="works_detail">
    <div id="wrapper" class="l-wrapper">
      <?php get_template_part('inc', 'header'); ?>
      <main id="main" class="l-main">
      <section id="lower_news" class="p-section l-lower-section p-news__detail">
      <div class="p-section__inr c-width c-width--1400">
            <div class="l-title__head">
              <h2 class="l-title__narrow">WORKS</h2>
            </div>
            <div class="c-spacer_group c-width c-width--900">
              <div class="c-spacer_group__inr">
                <div class="c-gt__title">
                  <h1 class="c-gt__title__h1"><?php the_title(); ?></h1>
                  <span class="c-gt__date"><?php echo get_the_date(); ?></span>
                </div>
                <div class="c-gt__output">
                  <?php echo the_content(); ?>
                </div><!--c-gt__output-->
              </div>

              <div class="p-pagination">
                <ul class="p-pager__ul c-pagination">
                  <li class="p-pager__prev"><?php previous_post_link('%link', 'BACK'); ?></li>
                  <li class="p-pagination__li center"><a href="<?php echo esc_url(home_url("/works")); ?>" class="c-linkbtn c-pagination__item">ALL</a></li>
                  <li class="p-pager__next"><?php next_post_link('%link', 'NEXT'); ?></li>
                </ul>
              </div>

            </div>
          </div>
        </section>
        <?php get_template_part('inc', 'pagetop'); ?>
      </main>
    <?php get_template_part('inc', 'footer'); ?>
    <?php get_template_part('inc', 'sp_menu'); ?>
    <?php get_template_part('inc', 'side_menu'); ?>
    
  </div><!-- wrapper -->

  <?php get_template_part('inc', 'js'); ?>
    <?php wp_footer(); ?>
  </body>

  </html>
<?php } ?>