<?php
//投稿者アーカイブが不要な場合（ユーザーID漏洩防止）
add_filter('author_rewrite_rules', '__return_empty_array');
// authorページ削除
function author_custom_redirection()
{
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
  $wp_rewrite->author_base = '';
  $wp_rewrite->author_structure = '/';
  if (isset($_REQUEST['author']) && !empty($_REQUEST['author'])) {
    wp_redirect(home_url());
    exit;
  }
}

//個別に無効化する場合いかに
add_filter('use_block_editor_for_post_type', 'disable_block_editor', 10, 2);
function disable_block_editor($use_block_editor, $post_type)
{
  if ($post_type === 'page') return false; //固定ページ
  //if ( $post_type === 'works' ) return false;//投稿タイプ 実績
  //if ( $post_type === 'plan' ) return false;//投稿タイプ
  return $use_block_editor;
}

//type属性、style属性を完璧に消す
function html5_validation($buffer)
{
  $buffer = preg_replace('/\s?type=(\'|")text\/(javascript|css)(\'|")/is', '', $buffer);
  return $buffer;
}
function buf_start()
{
  ob_start('html5_validation');
}
function buf_end()
{
  ob_end_flush();
}
add_action('after_setup_theme', 'buf_start');
add_action('shutdown', 'buf_end');



// 余計なソース削除
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
function disable_emoji()
{
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emoji');

//カスタム投稿パーマリンク「/taxonomy/」削除
function my_custom_post_type_permalinks_set($termlink, $term, $taxonomy)
{
  return str_replace('/' . $taxonomy . '/', '/', $termlink);
}
add_filter('term_link', 'my_custom_post_type_permalinks_set', 11, 3);
//カスタム分類アーカイブ用のリライトルールを追加
add_rewrite_rule('topics/([^/]+)/?$', 'index.php?topics_cat=$matches[1]', 'top');
add_rewrite_rule('topics/([^/]+)/page/([0-9]+)/?$', 'index.php?topics_cat=$matches[1]&paged=$matches[2]', 'top');

/*メタ　タイトル*/
function custom_title()
{
  global $post;
  $site_name = get_bloginfo('name'); // サイト名を取得
  if (is_front_page()) { // フロントページの場合
    echo $site_name;
  } elseif (is_singular()) { // 投稿・固定ページの場合
    single_post_title();
    echo ' | ' . $site_name;
  } elseif (is_post_type_archive()) { // カスタム投稿のアーカイブページの場合
    post_type_archive_title();
    echo ' | ' . $site_name;
  } elseif (is_category()) { // カテゴリーページの場合
    single_cat_title();
    echo ' | ' . $site_name;
  } elseif (is_tag()) { // タグページの場合
    single_tag_title();
    echo ' | ' . $site_name;
  } elseif (is_search()) { // 検索結果ページの場合
    echo '「' . get_search_query() . '」の検索結果 | ' . $site_name;
  } elseif (is_404()) { // 404エラーページの場合
    echo 'ページが見つかりませんでした | ' . $site_name;
  } else { // その他のページの場合
    echo $site_name;
  }
}

/*メタ　ディスクリプション*/
function custom_description()
{
  global $post;
  $description = '';
  $site_name = get_bloginfo('name'); // サイト名を取得
  if (is_front_page()) { // フロントページの場合
    $description = get_bloginfo('description');
  } elseif (is_page('contact')) { // お問合せページの場合
    $description =
      'taneCREATIVE 株式会社へのお問合せはこちら。';
  } elseif (is_page('diagnosis')) { // 診断結果ページの場合
    $description =
      $site_name . 'による脆弱性診断の結果です。';
  } elseif (is_singular('column')) { // 投稿・固定ページの場合
    $description = get_the_excerpt();
  } elseif (is_post_type_archive('column')) { // 投稿・固定ページの場合
    $description = $site_name . 'のコラムの一覧ページです。';
  } elseif (is_category()) { // カテゴリーページの場合
    $description = category_description();
  } elseif (is_tag()) { // タグページの場合
    $description = tag_description();
  } elseif (is_home()) { // ブログページの場合
    $description = get_bloginfo('description');
  } elseif (is_archive()) { // アーカイブページの場合
    $description = get_the_archive_description();
  } elseif (is_search()) { // 検索結果ページの場合
    $description = '「' . get_search_query() . '」の検索結果です。';
  }
  echo $description;
}
/*メタ　OGP */
function add_ogp_tags()
{
  global $post;
  $site_name = get_bloginfo('name');
  // TOPページ
  if (is_front_page()) {
    echo '<meta property="og:title" content="' . get_bloginfo('name') . '" />';
    echo '<meta property="og:description" content="' . get_bloginfo('description') . '" />';
    echo '<meta property="og:image" content="' . get_template_directory_uri() . '/asset/media/images/common/logo-1.webp" />';
    echo '<meta property="og:type" content="website" />';
    echo '<meta property="og:url" content="' .  get_home_url() . '" />';
    echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '" />';
    echo '<meta name="twitter:card" content="summary_large_image">';
    echo '<meta name="twitter:title" content=" ' . get_bloginfo('name') . '" />';
    echo '<meta name="twitter:description" content=" ' . get_bloginfo('description') . '" />';
  }
  // 固定ページ
  elseif (is_page('contact')) {
    $og_title = get_the_title();
    $og_description =
      'taneCREATIVE 株式会社へのお問合せはこちら。';
    $og_image = get_the_post_thumbnail_url($post->ID, 'large');
    echo '<meta property="og:title" content="' . $og_title . '" />';
    echo '<meta property="og:description" content="' . $og_description . '" />';
    if ($og_image) {
      echo '<meta property="og:image" content="' . $og_image . '" />';
    } else {
      echo '<meta property="og:image" content="' . get_template_directory_uri() . '/asset/media/images/common/logo-1.webp" />';
    }
    echo '<meta property="og:type" content="article" />';
    echo '<meta property="og:url" content="' . get_permalink() . '" />';
    echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '" />';
    echo '<meta name="twitter:card" content="summary_large_image">';
    echo '<meta name="twitter:title" content=" ' . get_bloginfo('name') . '" />';
    echo '<meta name="twitter:description" content=" ' . get_bloginfo('description') . '" />';
  } elseif (is_page('diagnosis')) {
    $og_title = get_the_title();
    $og_description =
      $site_name . 'による脆弱性診断の結果です。';
    $og_image = get_the_post_thumbnail_url($post->ID, 'large');
    echo '<meta property="og:title" content="' . $og_title . '" />';
    echo '<meta property="og:description" content="' . $og_description . '" />';
    if ($og_image) {
      echo '<meta property="og:image" content="' . $og_image . '" />';
    } else {
      echo '<meta property="og:image" content="' . get_template_directory_uri() . '/asset/media/images/common/logo-1.webp" />';
    }
    echo '<meta property="og:type" content="article" />';
    echo '<meta property="og:url" content="' . get_permalink() . '" />';
    echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '" />';
    echo '<meta name="twitter:card" content="summary_large_image">';
    echo '<meta name="twitter:title" content=" ' . $og_title . '" />';
    echo '<meta name="twitter:description" content=" ' . $og_description . '" />';
  }
  // カスタム投稿タイプのアーカイブページ
  elseif (is_post_type_archive('column')) {
    $og_description = $site_name . 'のコラムの一覧ページです。';
    echo '<meta property="og:title" content="' . post_type_archive_title('', false) . '" />';
    echo '<meta property="og:description" content="' . $og_description . '" />';
    echo '<meta property="og:image" content="' . get_template_directory_uri() . '/asset/media/images/common/logo-1.webp" />';
    echo '<meta property="og:type" content="website" />';
    echo '<meta property="og:url" content="' . get_permalink() . '" />';
    echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '" />';
    echo '<meta name="twitter:card" content="summary_large_image">';
    echo '<meta name="twitter:title" content=" ' .  get_bloginfo('name') . '" />';
    echo '<meta name="twitter:description" content=" ' . $og_description . '" />';
  }
  // カスタム投稿タイプの個別ページ
  elseif (is_singular('column')) {
    $og_title = get_the_title();
    $og_description = get_the_excerpt();
    $og_image = get_the_post_thumbnail_url($post->ID, 'large');
    echo '<meta property="og:title" content="' . $og_title . '" />';
    echo '<meta property="og:description" content="' . $og_description . '" />';
    if ($og_image) {
      echo '<meta property="og:image" content="' . $og_image . '" />';
    } else {
      echo '<meta property="og:image" content="' . get_template_directory_uri() . '/asset/media/images/common/logo-1.webp" />';
    }
    echo '<meta property="og:type" content="article" />';
    echo '<meta property="og:url" content="' . get_permalink() . '" />';
    echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '" />';
    echo '<meta name="twitter:card" content="summary_large_image">';
    echo '<meta name="twitter:title" content=" ' . $og_title . '" />';
    echo '<meta name="twitter:description" content=" ' . $og_description . '" />';
  }
}
add_action('wp_head', 'add_ogp_tags');

add_theme_support('post-thumbnails');    // アイキャッチ画像を追加
set_post_thumbnail_size(600, 380, true); // 通常の投稿サムネイル

//カスタム投稿タイプ専用の検索結果ページを作成したい場合
add_filter('template_include', 'custom_search_template');
function custom_search_template($template)
{
  if (is_search() && is_post_type_archive('works')) {
    $post_types = get_query_var('works');
    foreach ((array) $post_types as $post_type)
      $templates[] = "search-works.php";
    $templates[] = 'search.php';
    $template = get_query_template('search', $templates);
  }
  return $template;
}