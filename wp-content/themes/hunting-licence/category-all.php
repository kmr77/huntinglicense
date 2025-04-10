<?php get_header(); ?>
<div class="inner">
        <?php get_template_part('parts-breadcrumb'); ?>
      </div>
    </div>
    <div class="main-visual all">
      <div class="inner">
        <h1><?php single_cat_title(); ?>｜狩猟免許試験過去問集</h1>
        <p>網猟に関する過去問を厳選し、解答と詳細な解説を付けた問題集を提供。試験頻出の知識を効率的に学べるよう構成されています。特に、網猟特有の法規制や使用できる猟具に関する問題を重点的にカバー。スマートフォン対応で、移動時間やスキマ時間を活用しながら知識を定着させることができます。狩猟免許試験の網猟分野で確実に得点できるよう、合格を目指す受験生を徹底サポートします。</p>
        <p class="align-center"><button class="question-btn"><a href="#question">問題へ進む</a></button></p>
      </div>
    </div>
    <div class="inner">
      <h2>狩猟免許試験例題集全問</h2>
      <p>
      このページでは、狩猟免許試験のために必要な<strong>全問題</strong>を完全網羅しています。
      <strong>狩猟免許試験例題集</strong>に掲載されている問題は、法令、猟具の使用方法、鳥獣に関する知識、安全管理など、試験に必要な幅広い分野に対応しています。
      各問題には、詳細な解説と正確な答えが付いており、受験者が理解を深めるために役立つ情報が満載です。
      また、問題ごとに出題される傾向や難易度に応じたアドバイスも提供しており、効果的な試験対策をサポートします。
      さらに、スマートフォン対応のため、移動中やスキマ時間でも手軽に復習が可能です。<strong>狩猟免許試験合格</strong>を目指す受験者にとって、非常に役立つ教材となっています。
      全問題を一度に学べるため、効率よく知識を定着させることができます。
      </p>
      <p>狩猟免許試験は<strong>全30問</strong>出題されます。</p>
      <p>2024年の例題集から抜粋していますので、法律が改訂されたりして答えが違う場合はご連絡ください。<a href="../contact">メールフォームはこちら</a></p>
      <p class="annotation">※問題文をクリックすると選択肢・解答が表示されます。</p>
        <!-- 問題ここから -->
        <div class="accordion-inner" id="question">
          <dl id="accordion">
          <?php
            // カウンター変数を定義（1からスタート）
            $counter = 1;

            // ランダム表示のON/OFFをURLパラメータで制御
            $random = isset($_GET['random']) ? $_GET['random'] : 0;

            // 通常時は「投稿ID順（昇順）」で固定、ランダム時のみシャッフル
            $orderby = ($random == 1) ? 'rand' : 'ID';
            $order = ($random == 1) ? '' : 'ASC'; // 通常時は昇順
            
            // 投稿のループを開始
            $args = array(
                'category_name' => 'all', // カテゴリスラッグ「ami」の記事のみ取得
                //'post_type' => 'post', // カテゴリスラッグ「ami」の記事のみ取得
                'posts_per_page' => -1,   // すべての投稿を表示（ページネーションなし）
                'orderby' => $orderby,    // ランダム or ID順
                'order' => $order

            );
            $the_query = new WP_Query($args);
            ?>

            <!-- ランダム表示切り替えボタン -->
            <?php get_template_part('parts-random-btn'); ?>

            <?php
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
                    ?>
                    <dt>
                        <span class="question">問<?php echo $counter; ?>：<span class="small">No.<?php the_field('no'); ?></span> <?php the_title(); ?></span>
                        <div class="btn-layout">
                          <button class="open-btn">選択肢を見る</button>
                          <button class="single-btn"><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" target="blank">設問へ移動</a></button>
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
                                <button class="answer-btn">答えを開閉</button>
                            </dt>
                            <dd class="answer-dd">
                                <span class="answer">答）<?php the_field('answer'); ?><br>
                                <?php the_field('answer_body'); ?></span>
                            </dd>
                        </dl>
                    </dd>
                    <?php
                    // カウンターを1増やす
                    $counter++;
                endwhile;
                else :
                    echo '<p>投稿が見つかりませんでした。</p>';
                endif;

            // 投稿ループをリセット
            wp_reset_postdata();
            ?>
            </dl>
      </div>

<?php get_footer(); ?>
