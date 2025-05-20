<?php
if (in_category('experience')) {
  // 体験談カテゴリの投稿なら専用テンプレートを読み込む
  include(TEMPLATEPATH . '/single-experience.php');
  return;
}
?>

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
                $cat = $categories[0]; // 最初のカテゴリのみ使用
                $cat_link = get_category_link( $cat->term_id );
                echo '<li><a href="' . esc_url( $cat_link ) . '">' . esc_html( $cat->name ) . '</a></li>';
            }

            // タイトルと問題番号の表示
            $custom_title = get_field('custom_title');
            $post_no = get_field('no');
            $title_text = $custom_title ? $custom_title : get_the_title();
            echo '<li>' . esc_html($title_text) . '</li>';
            ?>
        </ul>
    </nav>


    </div>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h2>設問No.<?php the_field('no'); ?>：<?php the_title(); ?></h2>
    <div class="inner">
            <div class="accordion-inner">
                <div class="tag">
                <ul>
                    <?php
                    $post_tags = get_the_tags();
                    if ( $post_tags ) {
                        foreach ( $post_tags as $tag ) {
                            echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . esc_html($tag->name) . '</a></li>';
                        }
                    } else {
                        echo '<li>タグはありません</li>';
                    }
                    ?>
                </ul>
                </div>
                <div class="single-contents">
                    <div>
                        <dl id="accordion">
                            <dl>
                                <dt class="select-dt">
                                    <div>
                                    カテゴリ：
                                    <?php
                                        $categories = get_the_category();
                                        if ( ! empty( $categories ) ) {
                                            $cat_names = wp_list_pluck( $categories, 'name' );
                                            echo esc_html( implode( ', ', $cat_names ) );
                                        }
                                        ?>
                                    </div>
                                    <h3><?php the_title(); ?></h3>
                                    <?php if ( !has_category(array('examination', 'numbers')) ) : ?>
                                        <ul>
                                            <li><span class="bold">ア：</span><?php the_field('select_a'); ?></li>
                                            <li><span class="bold">イ：</span><?php the_field('select_i'); ?></li>
                                            <li><span class="bold">ウ：</span><?php the_field('select_u'); ?></li>
                                        </ul>
                                    <?php endif; ?>
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
                                    <?php
                                    $answer_ai = get_field('answer_ai');
                                    if ( $answer_ai ) : ?>
                                        <section class="custom-ai-explanation">
                                            <h3>AI解説</h3>
                                            <p>
                                                <?php echo wp_kses_post( $answer_ai ); ?>
                                            </p>
                                        </section>
                                    <?php endif; ?>
                                </dd>
                            </dl>
                        </dl>
                    </div>
                </div>
            </div>
        </article>
    <?php endwhile; endif; ?>
<?php get_footer(); ?>
