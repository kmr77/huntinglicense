<?php get_header(); ?>
<div class="inner">
        <?php get_template_part('parts-breadcrumb'); ?>
      </div>
    </div>
    <div class="main-visual ami">
        <div class="inner">
        <h1>網猟免許 試験対策｜過去問と解説</h1>
        <p>網猟免許では、むそう網やはり網の構造や設置方法、安全確保に関する知識が問われます。本ページでは出題傾向に基づいた問題で確実な理解を目指せます。</p>
        <p class="align-center"><button class="question-btn"><a href="#question">問題へ進む</a></button></p>
        </div>
    </div>
    <div class="inner">
<?php if ( !is_paged() ) : ?>
    <div class="category-intro">
        <h2>網猟免許とは？</h2>
        <p>網猟免許は、落とし網やむそう網などを使って鳥類を捕獲するための免許です。使用できる器具や対象が限られており、受験者は比較的少ない傾向があります。</p>
        <p>このページでは、網猟免許試験に関する筆記問題を掲載しています。法令や器具の取り扱い、識別に関する内容を中心にまとめています。</p>
        <p>▶ <a href="<?php echo home_url('/license-types/'); ?>">狩猟免許の種類と違いを比較する</a></p>
        <p>▶ <a href="<?php echo home_url('/license-difference/'); ?>">狩猟免許と銃の所持許可の違いを知る</a></p>
        <h2>網猟の申請と必要な準備</h2>
        <p>
        網猟を始めるには、狩猟免許の取得だけでなく、公安委員会の審査や狩猟者登録が必要です。申請手数料や講習費用のほか、網の購入費や設置資材、誤捕獲に備える狩猟保険など、多くの支出を考慮する必要があります。
        </p>
        <p>
        このカテゴリでは、網猟の試験問題をまとめると同時に、費用の目安や公安委員会での手続き、保険の選び方なども解説しています。効率的に合格を目指し、長期的な準備にも活用してください。
        </p>
        <h2>狩猟鳥獣イラスト問題</h2>
      <p>網猟免許では、紙芝居形式のイラストを使った狩猟鳥獣の識別問題が行われます。</p>
      <p>▶ <a href="<?php echo home_url('/category/animals-judge/'); ?>">狩猟鳥獣イラスト問題</a></p>
    </div>
    <?php get_template_part('parts-ads'); ?>
    <?php get_template_part('parts-affiliate'); ?>
    <h2><?php single_cat_title(); ?>過去問</h2>
        <p>
        網猟に関する問題は、網の種類や使用法に加え、設置基準や猟場に関する法律が問われます。
        網猟特有の法的な規制や適切な使用方法を理解しておくことが、試験合格には欠かせません。
        このページでは、網猟に関する出題内容をまとめて解説しています。
        </p>
        <?php get_template_part('parts-infotext'); ?>
<?php endif; ?>
        <!-- 問題ここから -->
        <div class="accordion-inner" id="question">
          <dl id="accordion">
          <?php
            // クエリ作成
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $random = isset($_GET['random']) ? $_GET['random'] : 0;
            $orderby = ($random == 1) ? 'rand' : 'ID';
            $order = ($random == 1) ? '' : 'ASC';

            $args = array(
            'category_name' => 'ami',
            'posts_per_page' => 30,
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
            ?>

            <?php
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
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                                <button class="answer-btn">答えを開閉</button>
                                <?php get_template_part('parts-ads-between'); ?>
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
      </div>

<?php get_footer(); ?>
