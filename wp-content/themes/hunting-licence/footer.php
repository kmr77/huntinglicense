<?php get_template_part('parts-ads-wide'); ?>
</div>

<footer id="footer">
  <?php get_template_part('parts-share'); ?>

  <div class="inner">
    <nav class="footer-navi" aria-label="フッターナビゲーション">
      <div class="footer-nav-grid">

        <section class="footer-nav-group">
          <h2 class="footer-nav-title">問題・模擬試験</h2>
          <ul class="footer-links">
            <li><a href="<?php echo esc_url( home_url('/') ); ?>">狩猟免許過去問ドリル</a></li>
            <li><a href="<?php echo esc_url( home_url('/category/all/') ); ?>">全カテゴリ問題</a></li>
            <li><a href="<?php echo esc_url( home_url('/category/laws/') ); ?>">法令問題</a></li>
            <li><a href="<?php echo esc_url( home_url('/category/type1/') ); ?>">第一種銃猟問題</a></li>
            <li><a href="<?php echo esc_url( home_url('/category/type2/') ); ?>">第二種銃猟問題</a></li>
            <li><a href="<?php echo esc_url( home_url('/category/wana/') ); ?>">わな猟問題</a></li>
            <li><a href="<?php echo esc_url( home_url('/category/ami/') ); ?>">網猟問題</a></li>
            <li><a href="<?php echo esc_url( home_url('/category/animals/') ); ?>">鳥獣問題</a></li>
            <li><a href="<?php echo esc_url( home_url('/category/examination/') ); ?>">猟銃等講習会 過去問</a></li>
            <li><a href="<?php echo esc_url( home_url('/mock-exam/') ); ?>">模擬試験</a></li>
          </ul>
        </section>

        <section class="footer-nav-group">
          <h2 class="footer-nav-title">受験・手続き</h2>
          <ul class="footer-links">
            <li><a href="<?php echo esc_url( home_url('/know/') ); ?>">知っておくべきこと</a></li>
            <li><a href="<?php echo esc_url( home_url('/application/') ); ?>">狩猟免許受験申請</a></li>
            <li><a href="<?php echo esc_url( home_url('/content/') ); ?>">試験の内容と対策</a></li>
            <li><a href="<?php echo esc_url( home_url('/information/') ); ?>">全国の試験情報</a></li>
            <li><a href="<?php echo esc_url( home_url('/pre-lecture/') ); ?>">猟友会による予備講習</a></li>
            <li><a href="<?php echo esc_url( home_url('/registration/') ); ?>">狩猟者登録</a></li>
            <li><a href="<?php echo esc_url( home_url('/study-method/') ); ?>">狩猟免許の独学勉強法</a></li>
          </ul>
        </section>

        <section class="footer-nav-group">
          <h2 class="footer-nav-title">サイト情報</h2>
          <ul class="footer-links">
            <li><a href="<?php echo esc_url( home_url('/faq-hunting-license/') ); ?>">よくある質問</a></li>
            <li><a href="<?php echo esc_url( home_url('/about/') ); ?>">運営者情報</a></li>
            <li><a href="<?php echo esc_url( home_url('/for-corporate/') ); ?>">法人・自治体の皆さまへ</a></li>
            <li><a href="<?php echo esc_url( home_url('/privacy-policy/') ); ?>">プライバシーポリシー</a></li>
            <li><a href="<?php echo esc_url( home_url('/contact/') ); ?>">お問い合わせ</a></li>
          </ul>
        </section>

      </div>
    </nav>

    <div class="copy">
      Copyright <a href="<?php echo esc_url( home_url('/') ); ?>">狩猟免許ドリル</a>
    </div>
  </div>
</footer>

<script src="<?php echo esc_url( get_template_directory_uri() . '/common.js' ); ?>" type="text/javascript" charset="utf-8"></script>
</body>
</html>
