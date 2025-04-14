<?php get_header(); ?>
    <div class="inner">
    <nav class="breadcrumb">
        <ul>
            <li>
            <a href="<?php echo home_url(); ?>">狩猟免許試験例題集 過去問</a>
            </li>

            <?php
            // 投稿に関連付けられているカテゴリを取得
            $categories = get_the_category();
            if ( !empty($categories) ) {
            // 先頭のカテゴリを使う（必要に応じて複数対応も可能）
            $cat = $categories[0];
            $cat_link = get_category_link( $cat->term_id );
            echo '<li><a href="' . esc_url( $cat_link ) . '">' . esc_html( $cat->name ) . '</a></li>';
            }
            ?>

            <li>問題番号<?php the_field('no'); ?>：<?php the_title(); ?></li>
        </ul>
    </nav>

    </div>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h2>設問No.<?php the_field('no'); ?>：<?php the_title(); ?></h2>
            <div class="accordion-inner">
                <div class="single-contents">
                    <div>
                        <dl id="accordion">
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
                                    <div class="mt-1 mb-1 align-center">
                                        <button class="answer-btn">答えを開閉</button>
                                    </div>
                                </dt>
                                <dd class="answer-dd">
                                    <span class="answer">答）<?php the_field('answer'); ?><br>
                                    <?php the_field('answer_body'); ?></span>
                                </dd>
                            </dl>
                        </dl>
                    </div>
                </div>
            </div>
        </article>
    <?php endwhile; endif; ?>
<?php get_footer(); ?>
