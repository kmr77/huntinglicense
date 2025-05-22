<?php
if (in_category('experience')) {
  // 体験談カテゴリの投稿なら専用テンプレートを読み込む
  include(TEMPLATEPATH . '/single-experience.php');
  return;
}
?>

<?php get_header(); ?>
    <div class="inner">
    <?php get_template_part('parts-breadcrumb'); ?>
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
                        <div class="related-links">
                        <h3>他の狩猟免許の問題を見る</h3>
                        <ul>
                            <li><a href="/category/type1/">第一種銃猟免許の問題</a></li>
                            <li><a href="/category/type2/">第二種銃猟免許の問題</a></li>
                            <li><a href="/category/wana/">わな猟免許の問題</a></li>
                            <li><a href="/category/ami/">網猟免許の問題</a></li>
                            <li><a href="/category/laws/">法令問題</a></li>
                            <li><a href="/category/examination/">猟銃講習会の問題</a></li>
                            <li><a href="/category/examination/">数字問題</a></li>
                            <li><a href="/category/all/">全カテゴリの問題まとめ</a></li>
                        </ul>
                        <?php
                        // 現在の投稿のカテゴリを取得（複数ある場合は最初の1つを使用）
                        $category = get_the_category();
                        if (!empty($category)) {
                        $category_link = get_category_link($category[0]->term_id);
                        $category_name = $category[0]->name;
                        echo '<div class="back-to-list">';
                        echo '<a href="' . esc_url($category_link) . '">一覧へ戻る（' . esc_html($category_name) . '）</a>';
                        echo '</div>';
                        }
                        ?>

                        </div>
                    </div>
                </div>
            </div>

    <?php endwhile; endif; ?>
<?php get_footer(); ?>
