<?php
    /*
    固定ページをカテゴリごとに表示を制御する共通パーツ
    */

    // 許可するカテゴリスラッグのリスト
    $allowed_categories = array('all','laws', 'ami', 'trap', 'type1', 'type2', 'examination', 'numbers');

    // URLからカテゴリを取得
    $category_slug = get_query_var('category_name');

    // カテゴリが指定されていない、または無効なカテゴリならデフォルトを 'laws' に
    if (!$category_slug || !in_array($category_slug, $allowed_categories)) {
        $category_slug = 'all';
    }

    // 並び順を指定（ランダム or 固定）
    $random = isset($_GET['random']) ? $_GET['random'] : 0;
    $orderby = ($random == 1) ? 'rand' : 'ID';
    $order = ($random == 1) ? '' : 'ASC';

    // 投稿のループを開始
    $args = array(
        'category_name' => $category_slug,
        'posts_per_page' => -1,
        'orderby' => $orderby,
        'order' => $order
    );

    $the_query = new WP_Query($args);
    $counter = 1; // カウンターの初期化
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
            ?>
            <dt>
                <span class="question">問<?php echo $counter; ?>：<?php the_title(); ?></span>
                <!-- <button class="openclose-btn">選択肢を開閉</button> -->
            </dt>
            <dd>
                <dl>
                    <dt class="select-dt">
                        <ul>
                            <li>ア：<?php the_field('select_a'); ?></li>
                            <li>イ：<?php the_field('select_i'); ?></li>
                            <li>ウ：<?php the_field('select_u'); ?></li>
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