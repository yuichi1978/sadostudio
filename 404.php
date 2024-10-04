<?php
/* Template Name: 404ページ */
get_header();
?>

<body>
  <div id="wrapper" class="l-wrapper">
    <?php get_template_part('inc', 'header'); ?>
    <main id="main" class="l-main">
      <div class="not-found">
        <p class="not-found-ttl">お探しの記事・ページはございません。</p>
        <div class="c-linkbtn-wrap">
          <a class="c-linkbtn_link c-linkbtn_link--green" href="<?php echo esc_url(home_url('/')); ?>">TOPに戻る</a>
        </div>
      </div>
      <?php get_template_part('inc', 'page_top'); ?>
    </main>
    <?php get_template_part('inc', 'footer'); ?>
  </div><!-- wrapper -->
  <?php /*get_template_part('inc', 'sp_menu');*/ ?>
  <?php get_template_part('inc', 'js'); ?>
  <?php wp_footer(); ?>
</body>

</html>
