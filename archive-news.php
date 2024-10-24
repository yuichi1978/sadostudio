<?php
/* Template Name: NEWS一覧ページ */
if (is_date()) {
  include(TEMPLATEPATH . '/date.php');
} else {
  get_header();
?>

  <body id="news">
    <div id="wrapper" class="l-wrapper">
      <?php get_template_part('inc', 'header'); ?>
      <main id="main" class="l-main">
        <section id="lower_news" class="p-section l-lower-section p-news">
          <div class="p-section__inr c-width c-width--1200">
            <div class="l-title__head">
              <h1 class="l-title__h1">NEWS</h1>
            </div>
            <div class="c-spacer_group ml300">
              <div class="c-spacer_group__inr">
                <div class="c-spacer_cont">
                  <div class="c-border__graf">
                    <?php $args = array(
                      'post_type' => 'news',
                      'posts_per_page' => 8,
                      'paged' => $paged
                    );

                    $the_query = new WP_Query($args);

                    if ($the_query->have_posts()) {
                      while ($the_query->have_posts()) {
                        $the_query->the_post(); ?>
                        <div class="c-graf_block">
                          <a href="<?php the_permalink(); ?>" class="c-graf_link">
                            <dl class="c-border__item">
                              <dt class="c-border__head"><?php echo get_the_time('Y.m.d'); ?></dt>
                              <dd class="c-border__content"><?php the_title(); ?></dd>
                            </dl>
                          </a>
                        </div><!--c-graf_block-->
                    <?php }
                    }
                    wp_reset_postdata();
                    ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section id="lower_news_pagination" class="p-section l-lower-section p-pager">
          <div class="p-section__inr c-width c-width--1200">

          
            <?php if ($wp_query->max_num_pages > 1) { ?>
              <div class="c-pagination">
                <?php
                $big = 999999999;
                $pagination = paginate_links([
                  'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                  'current' => max(1, get_query_var('paged')),
                  'total' => $wp_query->max_num_pages,
                  'mid_size' => 1,
                  'end_size' => 0,
                  'prev_next' => true,
                  'type' => 'array',
                  'prev_text' => '<span class="c-pagination__prev"></span>',
                  'next_text' => '<span class="c-pagination__next"></span>',
                ]);
                echo '<ul class="c-pagination__list">';
                foreach ($pagination as $page) {
                  echo '<li class="c-pagination__item">' . $page . '</li>';
                }
                echo '</ul>';
                ?>
              </div>
            <?php } ?>
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
<?php } ?>