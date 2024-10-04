<?php
/* Template Name: works */
if (is_date()) {
  include(TEMPLATEPATH . '/date.php');
} else {
  get_header();
?>

  <body id="works">
    <div id="wrapper" class="l-wrapper">
      <?php get_template_part('inc', 'header'); ?>
      <main id="main" class="l-main">

        <section id="lower_works_select" class="p-section l-lower-section p-works__select">
          <div class="p-section__inr c-width c-width--1200">
            <div class="l-title__head">
              <h1 class="l-title__h1">WORKS</h1>
            </div>
            <form class="c-form__pc">
              <div class="p-project__search">
                <dl class="p-project__search-item">
                  <dt class="p-project__search-head">地域</dt>
                  <dd class="p-project__search-content">
                    <select name="area" class="p-select">
                      <option value="all">選択してください</option>
                      <?php
                      $custom_terms = get_terms("projects_area");
                      foreach ($custom_terms as $custom_term) {
                        $term_slug = urldecode($custom_term->slug); ?>

                        <option value="<?php echo $term_slug ?>">
                          <?php echo $custom_term->name ?>
                        </option>
                      <?php } ?>
                    </select>
                  </dd>
                </dl>
                <dl class="p-project__search-item">
                  <dt class="p-project__search-head">竣工年</dt>
                  <dd class="p-project__search-content">
                    <select name="year" class="p-select">
                      <option value="all">選択してください</option>
                      <?php
                      $custom_terms = get_terms("projects_year");
                      foreach ($custom_terms as $custom_term) {
                        $term_slug = urldecode($custom_term->slug); ?>
                        <option value="<?php echo $term_slug ?>">
                          <?php echo $custom_term->name ?>
                        </option>
                      <?php } ?>
                    </select>
                  </dd>
                </dl>
                <dl class="p-project__search-item">
                  <dt class="p-project__search-head">構造</dt>
                  <dd class="p-project__search-content">
                    <select name="structure" class="p-select">
                      <option value="all">選択してください</option>
                      <?php
                      $custom_terms = get_terms("projects_structure");
                      foreach ($custom_terms as $custom_term) {
                        $term_slug = urldecode($custom_term->slug); ?>
                        <option value="<?php echo $term_slug  ?>">
                          <?php echo $custom_term->name ?>
                        </option>
                      <?php } ?>
                    </select>
                  </dd>
                </dl>
                <dl class="p-project__search-item -check">
                  <dt class="p-project__search-head">規模</dt>
                  <dd class="p-project__search-content">
                    <ul class="p-project__search-list">
                      <?php
                      $custom_terms = get_terms("projects_scale");
                      foreach ($custom_terms as $custom_term) {
                        $term_slug = urldecode($custom_term->slug);
                      ?>
                        <li class="p-project__search-item">
                          <label class="p-project__search-label">
                            <input type="checkbox" class="checkbox-input" name="scale" value="<?php echo $term_slug; ?>">
                            <span class="checkbox-parts"><?php echo  $custom_term->name ?></span>
                          </label>
                        </li>
                      <?php } ?>
                    </ul>
                  </dd>
                </dl>
                <div class="p-project__search__btn c-linkbtn u-position-right js-search-trigger-pc">SEARCH</div>
              </div><!--project_search_dl-->
            </form>
            <form class="c-form__sp">
              <div class="c-serch__aco">
                <dl class="p-project__search-item">
                  <dt class="p-project__search-head">地域</dt>
                  <dd class="p-project__search-content">
                    <select name="s_area" class="p-select">
                      <option value="all">選択してください</option>
                      <?php
                      $custom_terms = get_terms("projects_area");
                      foreach ($custom_terms as $custom_term) {
                        $term_slug = urldecode($custom_term->slug); ?>
                        <option value="<?php echo $term_slug; ?>">
                          <?php echo $custom_term->name ?>
                        </option>
                      <?php } ?>
                    </select>
                  </dd>
                </dl>
                <dl class="p-project__search-item">
                  <dt class="p-project__search-head">竣工年</dt>
                  <dd class="p-project__search-content">
                    <select name="s_year" class="p-select">
                      <option value="all">選択してください</option>
                      <?php
                      $custom_terms = get_terms("projects_year");
                      foreach ($custom_terms as $custom_term) {
                        $term_slug = urldecode($custom_term->slug); ?>
                        <option value="<?php echo $term_slug ?>">
                          <?php echo $custom_term->name ?>
                        </option>
                      <?php } ?>
                    </select>
                  </dd>
                </dl>
                <dl class="p-project__search-item">
                  <dt class="p-project__search-head">構造</dt>
                  <dd class="p-project__search-content">
                    <select name="s_structure" class="p-select">
                      <option value="all">選択してください</option>
                      <?php
                      $custom_terms = get_terms("projects_structure");
                      foreach ($custom_terms as $custom_term) {
                        $term_slug = urldecode($custom_term->slug); ?>
                        <option value="<?php echo $term_slug ?>">
                          <?php echo $custom_term->name ?>
                        </option>
                      <?php } ?>
                    </select>
                  </dd>
                </dl>
                <dl class="p-project__search-item -check">
                  <dt class="p-project__search-head">規模</dt>
                  <dd class="p-project__search-content">
                    <ul class="p-project__search-list">
                      <?php
                      $custom_terms = get_terms("projects_scale");
                      foreach ($custom_terms as $custom_term) {
                        $term_slug = urldecode($custom_term->slug); ?>
                        <li class="p-project__search-list-item">
                          <label class="p-project__search-label">
                            <input type="checkbox" class="checkbox-input" name="s_scale" value="<?php echo $term_slug  ?>">
                            <span class="checkbox-parts"><?php echo  $custom_term->name ?></span>
                          </label>
                        </li>
                      <?php } ?>
                    </ul>
                  </dd>
                </dl>
                <div class="p-project__search-btn-acc-inside c-linkbtn js-search-trigger-sp">SEARCH</div>
              </div>
              <div class="p-project__search-btn-acc-outside js-search-acc-trigger">
                <div class="c-linkbtn">SEARCH</div>
              </div>
            </form>
          </div>
        </section>
        <section id="lower_works_list" class="lower_works__result p-section l-lower-section p-works__result">
          <div class="p-section__inr c-width c-width--1200">
            <div class="l-work__list">
              <div class="l-work__list__inr">
                <?php
                $the_query = new WP_Query();
                $args = array(
                  'post_type' => 'works',
                  'posts_per_page' => 8,
                  'paged' => $paged
                );

                $the_query->query($args);

                if ($the_query->have_posts()) { ?>
                  <?php while ($the_query->have_posts()) {
                    $the_query->the_post(); ?>
                    <div class="l-work__block">
                      <a href="<?php the_permalink(); ?>" class="l-work_link">
                        <div class="l-work__photo">
                          <?php
                          if (has_post_thumbnail()) {
                            the_post_thumbnail('post-thumbnail');
                          } else {
                            echo '<img src="' . get_template_directory_uri() . '../../asset/media/images/common/archive_img01.png" width="360" height="199" loading="lazy" alt="No Image"/>';
                          }
                          ?>
                        </div>
                        <div class="l-work__word">
                          <div class="l-work__head">
                            <p class="l-work__text"><?php
                                                    $terms = get_the_terms($post->ID, 'workscat');
                                                    foreach ($terms as $term) {
                                                      echo $term->name;
                                                    };
                                                    ?></p>
                          </div>
                          <div class="l-work__read">
                            <h3 class="l-work__title"><?php the_title(); ?></h3>
                          </div>
                          <div class="l-work__date">
                            <p class="l-work__date-ymd"><?php echo get_the_time('Y.m.d'); ?></p>
                          </div>
                        </div>
                      </a>
                    </div><!--l-work__block-->
                <?php };
                };
                wp_reset_postdata();
                ?>
              </div>
            </div>
          </div>
        </section>
        <section id="lower_works_result" class="p-section l-lower-section p-pager">
          <div class="p-section__inr c-width c-width--1200">
            <?php if ($the_query->max_num_pages > 1) { ?>
              <div class="c-pagination">
                <?php
                $big = 999999999;
                $pagination = paginate_links([
                  'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                  'current' => max(1, get_query_var('paged')),
                  'total' => $the_query->max_num_pages,
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
      </main>
      <?php get_template_part('inc', 'footer'); ?>
      <?php get_template_part('inc', 'sp_menu'); ?>
      <?php get_template_part('inc', 'side_menu'); ?>

    </div><!-- wrapper -->
    <?php get_template_part('inc', 'js'); ?>
    <script>
      $(function() {
        $(".c-serch__aco").hide();

        // 事例絞り込みJavaScriptここから

        // 選択された値をパラメータに設定
        function sendParam(isSp) {

          // 入力要素 (input select) のnameプロパティ
          let area_name = "area";
          let year_name = "year";
          let structure_name = "structure";
          let scale_name = "scale";

          // スマホだった時はスマホ用のnameに切り替える
          if (isSp) {
            area_name = "s_area";
            year_name = "s_year";
            structure_name = "s_structure";
            scale_name = "s_scale";
          }

          // 最後に直接文字列に書き込んでいるselectの部分を変数を指定することでPCとスマホで選択状態を取得する要素で切り替えることができる

          // 地域
          const area = $('[name="' + area_name + '"]').val();
          // 竣工年
          const year = $('[name="' + year_name + '"]').val();
          // 構造
          const structure = $('[name="' + structure_name + '"]').val();

          // チェックされている「規模」を格納する配列
          let scale = [];

          // 規模
          // チェックが入っている配列の要素を取得する
          const check_scale = $('[name="' + scale_name + '"]:checked');

          // jqueryのeach分を使い各要素のvalueに入っている値をscale配列に格納する
          // $.each:先頭から順番に処理
          // indexとは現在処理中の要素の番号(配列の何番目の要素が)
          // itemとは配列から取り出した現在処理中の要素(名前は自由)
          $.each(check_scale, function(index, item) {
            scale.push(item.value);
          });

          // URLパラメーター付きのページへ遷移
          location.href = "../works_list/?area=" + area + "&year=" + year + "&structure=" + structure + "&scale=" + scale;
        }

        // PC用検索
        $(".js-search-trigger-pc").on("click", function() {
          sendParam(false);
        })

        // スマホ用検索
        $(".js-search-trigger-sp").on("click", function() {
          sendParam(true);
        })


        // スマホ用検索欄アコーディオンの開閉
        $(".js-search-acc-trigger").on("click", function() {
          $(this).prev().slideToggle();
          $(this).toggleClass("close");
        })
      });
    </script>
    <?php wp_footer(); ?>
  </body>

  </html>
<?php } ?>