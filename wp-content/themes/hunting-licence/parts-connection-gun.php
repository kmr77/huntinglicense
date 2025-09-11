<!-- 猟銃所持関連記事 -->
<h2>猟銃所持関連記事</h2>
<?php
$current_url = home_url( add_query_arg( null, null ) );
?>

<ul class="connection-list">
  <li>
    <?php if ($current_url !== home_url('/gun-types/')): ?>
      <a href="<?php echo home_url('/gun-types/'); ?>">▶ 銃の種類の違い（ライフル・散弾銃・空気銃）</a>
      <?php else: ?>
        <span class="current-page">▶ 銃の種類の違い（ライフル・散弾銃・空気銃）</span>
        <?php endif; ?>
      </li>
      <li>
        <?php if ($current_url !== home_url('/rifle-revision/')): ?>
          <a href="<?php echo home_url('/rifle-revision/'); ?>">▶ 2025年法改正：ハーフライフルがライフル扱いに</a>
          <?php else: ?>
            <span class="current-page">▶ 2025年法改正：ハーフライフルがライフル扱いに</span>
    <?php endif; ?>
  </li>
  <li>
    <?php if ($current_url !== home_url('/faq-guns-license/')): ?>
    <a href="<?php echo home_url('/faq-guns-license/'); ?>">▶ 猟銃所持に関するよくある質問</a>
    <?php else: ?>
      <span class="current-page">▶ 猟銃所持に関するよくある質問</span>
      <?php endif; ?>
  </li>
  <li>
    <?php if ($current_url !== home_url('/gun-cost/')): ?>
      <a href="<?php echo home_url('/gun-cost/'); ?>">▶ 猟銃の所持にかかる費用</a>
    <?php else: ?>
      <span class="current-page">▶ 猟銃の所持にかかる費用</span>
    <?php endif; ?>
  </li>
  <li>
    <?php if ($current_url !== home_url('/gun-locker/')): ?>
      <a href="<?php echo home_url('/gun-locker/'); ?>">▶ ガンロッカーの選び方</a>
    <?php else: ?>
      <span class="current-page">▶ ガンロッカーの選び方</span>
    <?php endif; ?>
  </li>
  <li>
    <?php if ($current_url !== home_url('/examination/gun-procedure/')): ?>
      <a href="<?php echo home_url('/examination/gun-procedure/'); ?>">▶ 猟銃所持許可の手続きと費用まとめ</a>
    <?php else: ?>
      <span class="current-page">▶ 猟銃等講習会とは？試験・申込・所持手続きの総合ガイド</span>
    <?php endif; ?>
  </li>
</ul>

<h2>狩猟免許関連記事</h2>
<ul>
  <li><a href="<?php echo home_url('/license-difference/'); ?>">▶ 狩猟免許と銃所持許可の違いを知る</a></li>
  <li><a href="<?php echo home_url('/license-types/'); ?>">▶ 狩猟免許の種類と違いを比較する</a></li>
  <li><a href="<?php echo home_url('/license-types/'); ?>">▶ 狩猟免許の4種類を比較する</a></li>
  <li><a href="<?php echo home_url('/license-difference/'); ?>">▶ 狩猟免許と銃の所持許可の違いを見る</a></li>
  <li><a href="<?php echo home_url('/study-method/'); ?>">▶ 狩猟免許の勉強方法まとめ</a></li>
  <li><a href="<?php echo home_url('/category/all/'); ?>">▶ 狩猟免許過去問 全カテゴリ問題</a></li>
</ul>