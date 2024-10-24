<?php

// 共有引数を設定
$args['prev_text'] = '&lt;';
$args['next_text'] = '&gt;';
$args['mid_size']  = 1;
$args['type']      = 'array';

$pagination = paginate_links($args);
?>
<?php if ($pagination) { ?>
  <ul class="pagination">
    <?php foreach ($pagination as $page) : ?>
      <li class="pagination__item">
        <?php echo $page; ?>
      </li>
    <?php endforeach ?>
  </ul>
<?php } ?>