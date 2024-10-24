<!doctype html>
<html <?php language_attributes(); ?> class="loading">

<head>
  <meta charset="utf-8">
  <?php $response_code = http_response_code();
  if ($response_code == 404) { ?>
    <meta name="robots" content="noindex">
  <?php } ?>
  <?php
  wp_reset_query();
  ?>
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=0">
  <title><?php custom_title(); ?></title>
  <meta name="description" content="<?php custom_description(); ?>">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/asset/media/images/common/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/asset/media/images/common/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/asset/media/images/common/android-touch-icon.png" sizes="192x192">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/asset/css/common_first_view.css">
  <?php
  $is_home = false;
  if (is_home() || is_front_page()) {
    $is_home = true;
  }

  // ファーストビューのCSSを直接出力
  $first_view_css = "lower_first_view";
  $first_view = '';
  if ($is_home) {
    $first_view_css = "home_first_view";
  }

  ob_start();
  include(get_template_directory() . "/asset/css/" . $first_view_css . ".css");
  $first_view = ob_get_contents();
  ob_end_clean();
  $first_view = str_replace('@charset "UTF-8";', '', $first_view);
  $first_view = str_replace('../', '' . get_template_directory_uri() . '/asset/', $first_view);
  echo "<style>
    " . $first_view . "
  </style>"
  ?>

  <?php if (is_home() || is_front_page()) { ?>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/asset/css/swiper.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/asset/css/home.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/asset/css/home_first_view.css">

  <?php } elseif (is_post_type_archive('works')) { ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/asset/css/works.css">
  <?php } elseif (is_singular('works')) { ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/asset/css/works.css">
  <?php } elseif (is_page('works_list')) { ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/asset/css/works.css">
  <?php } elseif (is_post_type_archive('news')) { ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/asset/css/news.css">
  <?php } elseif (is_singular('news')) { ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/asset/css/news.css">
  <?php } elseif (is_page('about')) { ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/asset/css/about.css">
  <?php } elseif (is_page('contact')) { ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/asset/css/contact.css">
  <?php } elseif (is_page('member') || is_page('sitepolicy')) { ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/asset/css/member.css">
  <?php } else { ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/asset/css/404.css">
  <?php } ?>

  <?php
  /*構造化データ*/
  $main_logo = get_template_directory_uri() . '/asset_tanecreative/media/images/common/main_logo.jpg';
  $site_name = get_bloginfo('name');
  $site_url = get_home_url();
  $author = 'taneCREATIVE株式会社';
  $adress = array(
    "@type" => "PostalAddress",
    "addressLocality" => "新潟県",
    "addressRegion" => "JP",
    "postalCode" => "952-1211",
    "streetAddress" => "佐渡市中興乙1427"
  );

  if (is_front_page()) {
    // 構造化データを生成する
    $structured_data = array(
      '@context' => 'https://schema.org',
      '@type' => 'WebSite',
      'url' => $site_url,
      'name' => $site_name,
      'alternateName' => 'tane CREATIVE CO.,LTD.',
      "logo" => $main_logo,
      "founder" => array(
        "@type" => "Person",
        "name" => "tane太郎",
        "url" => "https://tane-creative.co.jp/"
      ),
      'description' => get_bloginfo('description'),
      "publisher" => $author,
      "adress" => $adress
    );

    // パンくずリストの構造化データを生成する
    $breadcrumb = array(
      '@context' => 'https://schema.org',
      '@type' => 'BreadcrumbList',
      'itemListElement' => array(
        array(
          '@type' => 'ListItem',
          'position' => 1,
          'name' => 'Home',
          'item' => $site_url
        )
      )
    );

    // JSON-LD 形式で出力する
    echo '<script type="application/ld+json">' . json_encode(array($structured_data, $breadcrumb), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)  . '</script>';

    // ループ後の処理
    wp_reset_postdata();
  } elseif (is_post_type_archive('column')) {
    // 現在表示されているカスタム投稿タイプの情報を取得
    $queried_object = get_queried_object();
    $post_type = $queried_object->name;

    // パンくずリストの構造化データを生成する
    $breadcrumb = array(
      '@context' => 'https://schema.org',
      '@type' => 'BreadcrumbList',
      'itemListElement' => array(
        array(
          '@type' => 'ListItem',
          'position' => 1,
          'name' => 'ホーム',
          'item' => get_site_url()
        ),
        array(
          '@type' => 'ListItem',
          'position' => 2,
          'name' => ucfirst($post_type),
          'item' => get_post_type_archive_link($post_type)
        )
      )
    );

    // カスタム投稿を取得する
    $args = array(
      'post_type' => $post_type,
      'posts_per_page' => 9, // 1ページに表示される記事数
      'paged' => get_query_var('paged') ?: 1 // ページ番号を取得する。存在しない場合は1とする。
    );
    $posts = new WP_Query($args);

    // 構造化データを生成する
    $structured_data = array(
      '@context' => 'https://schema.org',
      '@type' => 'ItemList',
      'name' => ucfirst($post_type),
      'description' =>  $site_name . 'のコラムの一覧ページです。',
      'itemListElement' => array()
    );

    // 記事ごとに構造化データを生成する
    if ($posts->have_posts()) {
      $count = 1;
      while ($posts->have_posts()) {
        $posts->the_post();
        $structured_data['itemListElement'][] = array(
          '@type' => 'ListItem',
          'position' => $count,
          'url' => get_permalink(),
          'name' => get_the_title()
        );
        $count++;
      }
    }

    // JSON-LD 形式で出力する
    echo '<script type="application/ld+json"> ' . json_encode(array($structured_data, $breadcrumb), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)  . ' </script>';

    // ループ後の処理
    wp_reset_postdata();
  } elseif (is_singular('column')) { // カスタム投稿タイプが"column"の場合にのみ出力する
    $post_id = get_the_ID();
    $column_cover = get_the_post_thumbnail_url($post_id, 'large'); // 投稿のアイキャッチ画像のURLを取得する

    // 構造化データを生成する
    $structured_data = array(
      '@context' => 'https://schema.org',
      '@type' => 'Article',
      'name' => get_the_title(),
      'author' => $author,
      'publisher' => $author,
      'image' => $column_cover
    );
    //パンくずリストを生成する
    $breadcrumb = array(
      '@context' => 'https://schema.org',
      '@type' => 'BreadcrumbList',
      'itemListElement' => array(
        array(
          '@type' => 'ListItem',
          'position' => 1,
          'name' => 'ホーム',
          'item' => get_site_url()
        ),
        array(
          '@type' => 'ListItem',
          'position' => 2,
          'name' => 'コラム一覧',
          'item' => get_post_type_archive_link($post_type)
        ),
        array(
          '@type' => 'ListItem',
          'position' => 3,
          'name' => get_the_title(),
          'item' => get_permalink()
        )
      )
    );

    // JSON-LD 形式で出力する
    echo '<script type="application/ld+json">' . json_encode(array($structured_data, $breadcrumb), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
  } elseif (is_page()) {
    // 固定ページのIDを取得
    $page_id = get_queried_object_id();
    // 構造化データを生成する
    $structured_data = array(
      "@context" => "http://schema.org",
      "@type" => "WebPage",
      "name" => get_the_title(),
      "url" => get_permalink(),
      "description" => get_the_excerpt(),
      "mainEntityOfPage" => array(
        "@type" => "WebPage",
        "@id" => get_permalink()
      )
    );

    // パンくずリストの配列を作成
    $breadcrumb = array(
      '@context' => 'https://schema.org',
      '@type' => 'BreadcrumbList',
      'itemListElement' => array(
        array(
          '@type' => 'ListItem',
          'position' => 1,
          'name' => 'ホーム',
          'item' => get_site_url()
        ),
        array(
          '@type' => 'ListItem',
          'position' => 2,
          'name' => get_the_title(),
          'item' => get_permalink()
        )
      )
    );

    // 構造化データを出力
    echo '<script type="application/ld+json">' . json_encode(array($structured_data, $breadcrumb), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
  }
  ?>

  <?php wp_head(); ?>
</head>