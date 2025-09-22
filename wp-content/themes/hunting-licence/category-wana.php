<?php get_header(); ?>
<div class="inner">
        <!-- パンくずパーツ -->
        <?php get_template_part('parts-breadcrumb'); ?>
      </div>
    </div>
    <div class="main-visual wana">
      <div class="inner">
      <h1>罠猟免許 試験対策｜過去問と解説</h1>
      <p>わな猟免許では、くくりわな・はこわななどの猟具の構造や設置条件、対象動物の行動特性、安全措置などに関する出題が中心です。技能試験も含まれるため実践知識が重要です。</p>
      <p class="align-center"><button class="question-btn"><a href="#question">問題へ進む</a></button></p>
    </div>
    </div>
    <div class="inner">
<?php if ( !is_paged() ) : ?>
    <div class="category-intro">
      <h2>わな猟免許とは？</h2>
      <p>わな猟免許は、くくりわな・箱わなを使用してイノシシやシカなどの野生動物を捕獲するための免許です。銃を使わないため、取得のハードルが比較的低く、初心者にもおすすめです。</p>
      <p>このページでは、わな猟免許試験に出題される筆記問題をまとめています。法令や識別に関する問題を中心に、合格に役立つ内容を掲載しています。</p>
      <h2>わな猟に必要な装備と費用</h2>
      <p>
      わな猟を行うには、狩猟免許取得後に狩猟者登録や区域確認を行い、箱わな・くくりわな等の道具を準備する必要があります。設置資材や監視用のトレイルカメラなどの装備費用に加え、誤捕獲や事故に備える狩猟保険の加入も重要です。自治体によっては補助金制度が利用できる場合もあります。
      </p>
      <p>
      当サイトでは、わな猟の試験問題と合わせて、費用や装備、安全管理に関する情報も提供しています。学習と実務的な準備を両立させ、安心してわな猟を始めましょう。
      </p>
      <p>▶ <a href="<?php echo home_url('/license-types/'); ?>">狩猟免許の種類と違いを比較する</a></p>
      <p>▶ <a href="<?php echo home_url('/license-difference/'); ?>">狩猟免許と銃の所持許可の違いを知る</a></p>
      <h2>狩猟鳥獣イラスト問題</h2>
      <p>わな猟免許では、紙芝居形式のイラストを使った狩猟鳥獣の識別問題が行われます。</p>
      <p>▶ <a href="<?php echo home_url('/category/animals-judge/'); ?>">狩猟鳥獣イラスト問題</a></p>
    </div>
    <?php get_template_part('parts-ads'); ?>
    <?php get_template_part('parts-affiliate'); ?>
    <h2><?php single_cat_title(); ?> 過去問</h2>
    <p>わな猟に関する問題は、適法なわなの使用方法や設置条件、安全に関する規定などが中心です。
      特に、わな猟の実施に関する法律的な細かい部分が出題されることが多いので、基本的な規定をしっかりと覚えておくことが重要です。
      このページでは、<strong>わな猟</strong>に関する問題の出題内容を記載しています。</p>
        <?php get_template_part('parts-infotext'); ?>
<?php endif; ?>
        <!-- 問題ここから -->
        <div class="accordion-inner" id="question">
          <dl id="accordion">
          <?php
            // 投稿件数設定
            $posts_per_page = 10;

            // 現在のページ番号取得
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        
            // 投稿番号を連番で表示させるための開始値
            $counter = ($paged - 1) * $posts_per_page + 1;
        
            // ランダム or 通常順の判定
            $random = isset($_GET['random']) ? $_GET['random'] : 0;
            $orderby = ($random == 1) ? 'rand' : 'ID';
            $order = ($random == 1) ? '' : 'ASC';
        

            $args = array(
              'category_name' => 'wana',
              'posts_per_page' => $posts_per_page,
              'paged' => $paged,
              'orderby' => $orderby,
              'order' => $order
            );

            $the_query = new WP_Query($args);

            // グローバル変数に上書き（これが重要！）
            global $wp_query;
            $wp_query = $the_query;

            // ページング表示などを含むパーツ読み込み
            get_template_part('parts-random-btn');

              if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                    <dt>
                        <span class="question">問<?php echo $counter; ?>：<span class="small">No.<?php the_field('no'); ?></span> <?php the_title(); ?></span>
                        <div class="btn-layout">
                            <button class="open-btn">選択肢を見る</button>
                            <button class="single-btn"><a href="<?php the_permalink(); ?>" target="_blank">設問へ移動</a></button>
                        </div>
                    </dt>
                    <dd>
                        <dl>
                            <dt class="select-dt">
                                <ul>
                                    <li><span class="bold">ア：</span><?php the_field('select_a'); ?></li>
                                    <li><span class="bold">イ：</span><?php the_field('select_i'); ?></li>
                                    <li><span class="bold">ウ：</span><?php the_field('select_u'); ?></li>
                                </ul>
                                <?php
                                $no = get_field('no');
                                $image_rel_path = '/img/question/' . $no . '.avif';
                                $image_full_path = get_template_directory() . $image_rel_path;
                                $image_url = get_template_directory_uri() . $image_rel_path;

                                if (file_exists($image_full_path)) : ?>
                                    <img src="<?php echo esc_url($image_url); ?>" alt="設問No.<?php the_field('no'); ?>の画像">
                                <?php endif; ?>
                                <button class="answer-btn">答えを開閉</button>
                            </dt>
                            <dd class="answer-dd">
                                <span class="answer">答）<?php the_field('answer'); ?><br>
                                <?php the_field('answer_body'); ?></span>
                            </dd>
                        </dl>
                        </dd>
                        <?php
                        if ($counter % 5 === 0) {
                            echo '<div class="ads-between-questions">';
                            get_template_part('parts-ads-between');
                            echo '</div>';
                        }

                        $counter++;
                      endwhile;
                    else :
                      echo '<p>投稿が見つかりませんでした。</p>';
                    endif;
                  ?>
                  </dl>

          <!-- ページネーション -->
          <div class="pagination">
            <?php
              echo paginate_links(array(
                'total' => $the_query->max_num_pages,
                'current' => $paged,
                'mid_size' => 2,
                'prev_text' => '« 前へ',
                'next_text' => '次へ »',
              ));
            ?>
          </div>

  <?php wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>
