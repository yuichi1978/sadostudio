<?php
/* Template Name: ABOUT US */
get_header();
?>

<body id="about">
  <div id="wrapper" class="l-wrapper">

    <?php get_template_part('inc', 'header'); ?>
    <main id="main" class="l-main">
      <section id="lower_about" class="p-section l-lower-section p-about-intro">

        <div class="c-about__block">
          <div class="c-about__block__inr">
            <div class="p-section__inr c-width c-width--1200__pc">
              <div class="c-width c-width--750__pc">
                <div class="c-about__block__word">
                  <div class="l-title__head">
                    <h1 class="l-title__h1">ABOUT US</h1>
                  </div>
                  <div class="l-read">
                    <p class="c-section_text">美しい木組みの家。そのために、まず必要なのは本物の自然素材。私たち佐渡建築設計スタジオでは、私たちは自ら山に入り木を選ぶところから家づくりを始めます。素性がわかる素材を使用することは、住まい手の健康や暮らしやすさ、さらにはメンテナンスのしやすさにも繋がります。私たち佐渡建築設計スタジオは、年を経るごとに美しさと深みを増す、美しい木組の家をつくります。</p>
                  </div>
                </div>
                <div class="c-about__block__photo">
                  <picture class="p-hd__logo-img">
                    <source media="(min-width:1024px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/about/about_kv@2x.webp">
                    <source media="(max-width:1023px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images//about/about_kv.webp">
                    <img src="<?php echo get_template_directory_uri() ?>/asset/media/images/about/about_kv.webp" width="700" height="1120" alt="KV">
                  </picture>
                </div>
              </div>
            </div><!--c-width c-width--1200-->
            <div class="p-section__inr c-width c-width--1200 p-outline">
              <div class="c-width c-width--750">
                <div class="c-title__head">
                  <h2 class="c-title__h2">会社概要</h2>
                </div>
                <div class="c-border__graf">
                  <dl class="c-border__item">
                    <dt class="c-border__head">会社名</dt>
                    <dd class="c-border__content">佐渡建築設計スタジオ</dd>
                  </dl>
                  <dl class="c-border__item">
                    <dt class="c-border__head">住所</dt>
                    <dd class="c-border__content">〒123-4567 新潟県佐渡市◯◯◯◯◯◯◯</dd>
                  </dl>
                  <dl class="c-border__item">
                    <dt class="c-border__head">連絡先</dt>
                    <dd class="c-border__content">TEL　012-3456-7890（代表）<br>
                      FAX　012-3456-7890</dd>
                  </dl>
                  <dl class="c-border__item">
                    <dt class="c-border__head">資本金</dt>
                    <dd class="c-border__content">1,000万円</dd>
                  </dl>
                  <dl class="c-border__item">
                    <dt class="c-border__head">創業</dt>
                    <dd class="c-border__content">2000年（平成12年）1月</dd>
                  </dl>
                  <dl class="c-border__item">
                    <dt class="c-border__head">役員</dt>
                    <dd class="c-border__content">代表取締役社長　佐渡 太郎</dd>
                  </dl>
                  <dl class="c-border__item">
                    <dt class="c-border__head">業務内容</dt>
                    <dd class="c-border__content">◯ 建築の企画・設計・監理<br>
                      ◯ 地域・都市計画に関する企画・調査・研究</dd>
                  </dl>
                </div>
              </div>
            </div><!--c-width c-width--1200-->
            <div class="c-access">
              <div class="p-section__inr c-width c-width--1200">
                <div class="c-width c-width--750">
                  <div class="c-title__head">
                    <h2 class="c-title__h2">アクセス</h2>
                  </div>
                </div>
              </div>
              <div class="c-access__map">
                <div class="p-section__inr c-width c-width--1200-spfull">
                  <div class="c-width c-width--750">
                    <picture class="p-hd__logo-img">
                      <source media="(min-width:768px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images/about/map@2x.webp">
                      <source media="(max-width:767px)" srcset="<?php echo get_template_directory_uri() ?>/asset/media/images//about/map.webp">
                      <img src="<?php echo get_template_directory_uri() ?>/asset/media/images/about/map.webp" width="1500" height="1120" alt="MAP">
                    </picture>
                  </div>
                </div>
              </div>
            </div><!--c-access-->
          </div><!--c-about__block__inr-->
        </div><!--c-about__block-->

      </section>
      <?php get_template_part('inc', 'pagetop'); ?>
    </main><!-- main_area -->
    <?php get_template_part('inc', 'footer'); ?>
    <?php get_template_part('inc', 'sp_menu'); ?>
    <?php get_template_part('inc', 'side_menu'); ?>

  </div><!-- wrapper -->
  <?php /*get_template_part('inc', 'sp_menu');*/ ?>
  <?php get_template_part('inc', 'js'); ?>

</body>

</html>