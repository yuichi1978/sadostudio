<?php
/* Template Name: トップページ */
get_header();
?>

<body id="home">
  <div id="wrapper" class="l-wrapper">

    <?php get_template_part('inc', 'header'); ?>

    <main id="main" class="l-main">
      <div id="first_view" class="p-home-firstview">
        <div class="p-home-firstview__head c-width__max-sp">
          <h1 class="l-title__h1">佐渡建築設計スタジオ</h1>
          <span class="l-title__span">SADO <span class="l-title__br">Architects</span></span>
        </div>
        <div class="p-home-firstview__kv c-width c-width--max">
          <div class="p-home-firstview__photo"></div>
        </div>
      </div><!--first_view-->

      <section id="home_about" class="l-section p-section l-lower-section p-home-about">
        <div class="l-section__inr c-width c-width--left--200">
          <div class="l-about__block">
            <div class="l-about__block-inr">
              <div class="l-about__block-word">
                <div class="l-title__head">
                  <h2 class="l-title__h2">ABOUT US</h2>
                </div>
                <div class="l-read">
                  <p class="l-read__text">日本では昔から安らぎと温かみのある木組みの家が愛されてきました。湿度の高い日本の気候と上手につきあい、住まいの居心地を整えてくれる、木組みの家。その魅力を最大限に引き出すために、私たちは、選りすぐりの自然素材のみを使用します。長く愛される、美しい木組の家を建てることが、私たち佐渡建築設計スタジオの仕事です。</p>
                </div>
                <div class="c-linkbtn-wrap alignleft aligncenter1023">
                  <a href="<?php echo esc_url(home_url("/about")); ?>" class="c-linkbtn">MORE</a>
                </div>
              </div>
              <div class="l-about__block-photo">
                <picture class="p-hd__logo-img--large">
                  <source media="(min-width:768px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/home_about@2x.webp">
                  <source media="(max-width:767px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/home_about.webp">
                  <img src="<?php echo get_template_directory_uri() ?>/asset/media/images/home/home_about@2x.webp" width="1000" height="665" alt="KV">
                </picture>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="home_works" class="l-section p-home-works">
        <div class="l-section__inr c-width c-width--1200">
          <div class="l-title__head">
            <h2 class="l-title__h2">WORKS</h2>
          </div>
          <div class="l-work">
            <div class="l-work__list">
              <div class="l-work__list-inr">
                <?php $args = array(
                  'post_type' => 'works',
                  'posts_per_page' => 2,
                );

                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) {
                  while ($the_query->have_posts()) {
                    $the_query->the_post();
                ?>
                    <div class="l-work__block">
                      <a href="<?php the_permalink(); ?>" class="l-work_link">
                        <div class="l-work__photo">
                          <?php
                          if (has_post_thumbnail()) {
                            the_post_thumbnail('post-thumbnail');
                          } else {
                            echo '<img src="' . get_template_directory_uri() . '/asset/media/images/common/archive_img01.png" width="360" height="199" loading="lazy" alt="No Image"/>';
                          }
                          ?>
                        </div>
                        <div class="l-work__word">
                          <div class="l-work__read">
                            <p class="l-work__text">
                              <?php
                              $terms = get_the_terms($post->ID, 'workscat');
                              foreach ($terms as $term) {
                                echo $term->name;
                              }
                              ?></p>
                          </div>
                          <div class="l-work__head">
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
              <div class="c-linkbtn-wrap alignright aligncenter480">
                <a href="<?php echo esc_url(home_url('/works')); ?>" class="c-linkbtn">MORE</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="home_member" class="l-section p-home-member">
        <div class="l-section__inr c-width c-width--1200">
          <div class="l-title__head">
            <h2 class="l-title__h2">MEMBER</h2>
          </div>
          <div class="p-home-swiper  c-width c-width--1200">
            <div class="swiper p-home-swiper__inr">
              <div class="swiper-wrapper p-home-swiper__wrapper">
                <div class="swiper-slide p-home-swiper__slide">
                  <div class="p-home-swiper__wrap">
                    <picture class="p-hd__logo-img">
                      <source media="(min-width:480px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust01@2x.webp">
                      <source media="(max-width:479px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust01.webp">
                      <img src="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust01@2x.webp" width="250" height="250" alt="MEMBER" class="p-member__img">
                    </picture>
                  </div>
                  <p class="p-home-swiper-txt__ttl">CEO</p>
                  <p class="p-home-swiper-txt__date">Taro Sado</p>
                </div><!--swiper-slide-->
                <div class="swiper-slide p-home-swiper__slide">
                  <div class="p-home-swiper__wrap">
                    <picture class="p-hd__logo-img">
                      <source media="(min-width:480px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust02@2x.webp">
                      <source media="(max-width:479px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust02.webp">
                      <img src="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust02@2x.webp" width="250" height="250" alt="MEMBER" class="p-member__img">
                    </picture>
                  </div>
                  <p class="p-home-swiper-txt__ttl">一級建築士</p>
                  <p class="p-home-swiper-txt__date">Ichiko Yamada</p>
                </div><!--swiper-slide-->
                <div class="swiper-slide p-home-swiper__slide">
                  <div class="p-home-swiper__wrap">
                    <picture class="p-hd__logo-img">
                      <source media="(min-width:480px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust03@2x.webp">
                      <source media="(max-width:479px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust03.webp">
                      <img src="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust03@2x.webp" width="250" height="250" alt="MEMBER" class="p-member__img">
                    </picture>
                  </div>
                  <p class="p-home-swiper-txt__ttl">一級建築士</p>
                  <p class="p-home-swiper-txt__date">Jiro Tanaka</p>
                </div><!--swiper-slide-->
                <div class="swiper-slide p-home-swiper__slide">
                  <div class="p-home-swiper__wrap">
                    <picture class="p-hd__logo-img">
                      <source media="(min-width:480px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust04@2x.webp">
                      <source media="(max-width:479px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust04.webp">
                      <img src="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust04@2x.webp" width="250" height="250" alt="MEMBER" class="p-member__img">
                    </picture>
                  </div>
                  <p class="p-home-swiper-txt__ttl">一級建築士</p>
                  <p class="p-home-swiper-txt__date">Yuto Sakai</p>
                </div><!--swiper-slide-->
                <div class="swiper-slide p-home-swiper__slide">
                  <div class="p-home-swiper__wrap">
                    <picture class="p-hd__logo-img">
                      <source media="(min-width:480px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust05@2x.webp">
                      <source media="(max-width:479px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust05.webp">
                      <img src="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust05@2x.webp" width="250" height="250" alt="MEMBER" class="p-member__img">
                    </picture>
                  </div>
                  <p class="p-home-swiper-txt__ttl">二級建築士</p>
                  <p class="p-home-swiper-txt__date">Hime Nakata</p>
                </div><!--swiper-slide-->
                <div class="swiper-slide p-home-swiper__slide">
                  <div class="p-home-swiper__wrap">
                    <picture class="p-hd__logo-img">
                      <source media="(min-width:480px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust06@2x.webp">
                      <source media="(max-width:479px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust06.webp">
                      <img src="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust06@2x.webp" width="250" height="250" alt="MEMBER" class="p-member__img">
                    </picture>
                  </div>
                  <p class="p-home-swiper-txt__ttl">二級建築士</p>
                  <p class="p-home-swiper-txt__date">Ken Sato</p>
                </div><!--swiper-slide-->
                <div class="swiper-slide p-home-swiper__slide">
                  <div class="p-home-swiper__wrap">
                    <picture class="p-hd__logo-img">
                      <source media="(min-width:480px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust07@2x.webp">
                      <source media="(max-width:479px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust07.webp">
                      <img src="<?php echo get_template_directory_uri() ?>/asset/media/images/home/member_Illust07@2x.webp" width="250" height="250" alt="MEMBER" class="p-member__img">
                    </picture>
                  </div>
                  <p class="p-home-swiper-txt__ttl">インテリアコーディネーター</p>
                  <p class="p-home-swiper-txt__date">Hanako Yamamoto</p>
                </div><!--swiper-slide-->
              </div>
              <div class="swiper-controls">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>
            </div>
          </div><!--p-home-swiper-->
          <div class="c-linkbtn-wrap alignright aligncenter480 mt0">
            <a href="<?php echo esc_url(home_url("/member")); ?>" class="c-linkbtn">MORE</a>
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
  <script>
    const swiper = new Swiper(".swiper", {
      loop: true,
      loopAdditionalSlides: 1,
      loopAdditionalSlides: 4,
      //spaceBetween: 24,
      // 前後の矢印
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      // スライドの表示枚数：600px未満の場合
      slidesPerView: 1,
      breakpoints: {
        // スライドの表示枚数：600px以上の場合
        // スライドの表示枚数：375px以上の場合
        375: {
          slidesPerView: 1,
        },
        // スライドの表示枚数：480px以上の場合
        480: {
          slidesPerView: 2,
        },
        // スライドの表示枚数：768px以上の場合
        768: {
          slidesPerView: 3,
          spaceBetween: 24,
        },
        // スライドの表示枚数：1025px以上の場合
        1025: {
          slidesPerView: 3.8,
        },
      },
    });
  </script>


  <?php wp_footer(); ?>
</body>

</html>