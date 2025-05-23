<?php get_header(); ?>
<div class="inner">
        <?php get_template_part('parts-breadcrumb'); ?>
      </div>
    </div>
    <div class="main-visual type1">
        <div class="inner">
        <h1>一種銃猟免許 試験対策｜過去問と解説</h1>
        <p>一種銃猟免許では、散弾銃やライフル銃の安全な取扱いと法令遵守の知識が問われます。本ページでは試験に頻出する問題を精選し、合格に必要な要点を効率よく学べます。</p>
        <p class="align-center"><button class="question-btn"><a href="#question">問題へ進む</a></button></p>
        </div>
    </div>
    <div class="inner">
    <div class="category-intro">
        <h2>第一種銃猟免許とは？</h2>
        <p>第一種銃猟免許は、散弾銃やライフル銃を使って、鳥類やシカ・イノシシなどの大型獣を狩猟するための本格的な免許です。銃を所持するには、別途「猟銃等講習会」や「銃の所持許可」が必要となります。</p>
        <p>試験には法令や鳥獣識別などの筆記問題、実技も含まれます。このページでは、その筆記試験の過去問題を集めています。</p>
        <p>▶ <a href="<?php echo home_url('/license-types/'); ?>">狩猟免許の種類と違いを比較する</a></p>
        <p>▶ <a href="<?php echo home_url('/license-difference/'); ?>">狩猟免許と銃の所持許可の違いを知る</a></p>
    </div>
    <h2><?php single_cat_title(); ?> 過去問</h2>
        <p>
        一種銃猟に関する問題も難易度が高い場合がありますが、銃の取り扱いや使用に関する法令や技術的なポイントが重要です。
        試験合格には、実際の銃猟に関する規則や取り扱い方を正確に理解することが必要です。
        このページでは、<strong>一種銃猟</strong>に関連する出題内容を集めて紹介しています。
        </p>
        <?php get_template_part('parts-infotext'); ?>
        <!-- 問題ここから -->
        <div class="accordion-inner" id="question">
          <dl id="accordion">
          <?php
            // 投稿件数設定
            $posts_per_page = 30;

            // 現在のページ番号取得
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        
            // 投稿番号を連番で表示させるための開始値
            $counter = ($paged - 1) * $posts_per_page + 1;
        
            // ランダム or 通常順の判定
            $random = isset($_GET['random']) ? $_GET['random'] : 0;
            $orderby = ($random == 1) ? 'rand' : 'ID';
            $order = ($random == 1) ? '' : 'ASC';
        

            $args = array(
                'category_name' => 'type1',
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

