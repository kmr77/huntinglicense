<?php
/*
Template Name: 模擬試験（共通）
Template Post Type: page
*/

get_header();

$current_page_id = get_queried_object_id();
$page_slug       = get_post_field( 'post_name', $current_page_id );
$parent_id       = wp_get_post_parent_id( $current_page_id );
$parent_slug     = $parent_id ? get_post_field( 'post_name', $parent_id ) : '';
$grandparent_id  = $parent_id ? wp_get_post_parent_id( $parent_id ) : 0;
$grandparent_slug = $grandparent_id ? get_post_field( 'post_name', $grandparent_id ) : '';

$license_labels = [
    'type1' => '第一種銃猟',
    'type2' => '第二種銃猟',
    'wana'  => 'わな猟',
    'ami'   => '網猟',
];

$license_tool_labels = [
    'type1' => '猟具（第一種銃猟）',
    'type2' => '猟具（第二種銃猟）',
    'wana'  => '猟具（わな）',
    'ami'   => '猟具（網）',
];

$license_descriptions = [
    'type1' => '第一種銃猟免許向けの本番形式30問です。法令13問・第一種銃猟の猟具6問・鳥獣9問・保護管理2問をランダムに出題します。',
    'type2' => '第二種銃猟免許向けの本番形式30問です。法令13問・第二種銃猟の猟具6問・鳥獣9問・保護管理2問をランダムに出題します。',
    'wana'  => 'わな猟免許向けの本番形式30問です。法令13問・わな猟具6問・鳥獣9問・保護管理2問をランダムに出題します。',
    'ami'   => '網猟免許向けの本番形式30問です。法令13問・網猟具6問・鳥獣9問・保護管理2問をランダムに出題します。',
];

$is_mock_index = (
    $page_slug === 'mock-exam'
    && ! $parent_id
);

$is_official_index = (
    $page_slug === 'hunting-license'
    && $parent_slug === 'mock-exam'
);

// 本番形式は /mock-exam/hunting-license/ の1ページ内で完結。
// 免許の切替は ?license=type1 などのクエリで行う。
$requested_license = isset( $_GET['license'] )
    ? sanitize_key( wp_unslash( $_GET['license'] ) )
    : '';

$selected_license = isset( $license_labels[ $requested_license ] )
    ? $requested_license
    : ( $is_official_index ? 'type1' : '' );

// 旧URLを残している場合だけ互換動作させる。
$is_official_child = (
    $parent_slug === 'hunting-license'
    && $grandparent_slug === 'mock-exam'
    && isset( $license_labels[ $page_slug ] )
);

if ( $is_official_child ) {
    $selected_license = $page_slug;
}

$mock_configs = [
    'type1' => [
        'title'       => '第一種銃猟 30問模擬試験',
        'description' => '第一種銃猟の問題から30問をランダム出題します。',
        'mode'        => 'category',
        'category'    => 'type1',
        'count'       => 30,
    ],
    'type2' => [
        'title'       => '第二種銃猟 30問模擬試験',
        'description' => '第二種銃猟の問題から30問をランダム出題します。',
        'mode'        => 'category',
        'category'    => 'type2',
        'count'       => 30,
    ],
    'wana' => [
        'title'       => 'わな猟 30問模擬試験',
        'description' => 'わな猟の問題から30問をランダム出題します。',
        'mode'        => 'category',
        'category'    => 'wana',
        'count'       => 30,
    ],
    'ami' => [
        'title'       => '網猟 27問模擬試験',
        'description' => '網猟の全27問をランダム順で出題します。',
        'mode'        => 'category',
        'category'    => 'ami',
        'count'       => 27,
    ],
    'laws' => [
        'title'       => '狩猟免許 法令30問模擬試験',
        'description' => '法令問題から30問をランダム出題します。',
        'mode'        => 'category',
        'category'    => 'laws',
        'count'       => 30,
    ],
    'animals' => [
        'title'       => '狩猟免許 鳥獣30問模擬試験',
        'description' => '鳥獣問題から30問をランダム出題します。',
        'mode'        => 'category',
        'category'    => 'animals',
        'count'       => 30,
    ],
    'protection' => [
        'title'       => '狩猟免許 保護管理20問模擬試験',
        'description' => '保護管理の問題から20問をランダム出題します。',
        'mode'        => 'tag',
        'tag'         => 'protection',
        'count'       => 20,
    ],
    'gun-course' => [
        'title'       => '猟銃等講習会 50問模擬考査',
        'description' => '猟銃等講習会の考査問題から50問をランダム出題します。',
        'mode'        => 'category',
        'category'    => 'examination',
        'count'       => 50,
    ],
];

if ( $is_mock_index ) {
    $config = [
        'title'       => '狩猟免許 模擬試験',
        'description' => '本番形式30問と、免許・分野別の模擬試験から選んで学習できます。',
        'mode'        => 'index',
        'count'       => 0,
    ];
} elseif ( $is_official_index ) {
    $config = [
        'title'       => $license_labels[ $selected_license ] . ' 本番形式30問模擬試験',
        'description' => $license_descriptions[ $selected_license ],
        'mode'        => 'official-format',
        'count'       => 30,
    ];
} elseif ( $is_official_child ) {
    $config = [
        'title'       => $license_labels[ $selected_license ] . ' 本番形式30問模擬試験',
        'description' => $license_descriptions[ $selected_license ],
        'mode'        => 'official-format',
        'count'       => 30,
    ];
} else {
    $config = $mock_configs[ $page_slug ] ?? null;
}

function shuryo_mock_normalize_answer( $answer, $has_choices ) {
    $answer = trim( wp_strip_all_tags( (string) $answer ) );

    if ( $has_choices ) {
        if ( preg_match( '/^[\s\(（]*ア/u', $answer ) ) return 'a';
        if ( preg_match( '/^[\s\(（]*イ/u', $answer ) ) return 'i';
        if ( preg_match( '/^[\s\(（]*ウ/u', $answer ) ) return 'u';
    }

    if (
        strpos( $answer, '〇' ) !== false ||
        strpos( $answer, '○' ) !== false ||
        mb_strpos( $answer, '正しい' ) !== false
    ) return 'maru';

    if (
        strpos( $answer, '×' ) !== false ||
        strpos( $answer, '✕' ) !== false ||
        strpos( $answer, '✖' ) !== false ||
        mb_strpos( $answer, '誤り' ) !== false
    ) return 'batsu';

    return '';
}

function shuryo_mock_post_to_question( $post_id, $section = '' ) {
    $no       = get_field( 'no', $post_id );
    $select_a = get_field( 'select_a', $post_id );
    $select_i = get_field( 'select_i', $post_id );
    $select_u = get_field( 'select_u', $post_id );
    $answer   = get_field( 'answer', $post_id );
    $body     = get_field( 'answer_body', $post_id );

    $has_choices = ( $select_a !== '' && $select_a !== null )
        || ( $select_i !== '' && $select_i !== null )
        || ( $select_u !== '' && $select_u !== null );

    $is_animals_judge = has_category( 'animals-judge', $post_id );
    $img_url = '';

    if ( $no ) {
        $folder = $is_animals_judge ? 'animal' : 'question';
        $rel    = '/img/' . $folder . '/' . $no . '.avif';
        $parent_path = get_template_directory() . $rel;
        $child_path  = get_stylesheet_directory() . $rel;

        if ( file_exists( $parent_path ) ) {
            $img_url = get_template_directory_uri() . $rel;
        } elseif ( file_exists( $child_path ) ) {
            $img_url = get_stylesheet_directory_uri() . $rel;
        }
    }

    return [
        'id'          => $post_id,
        'no'          => $no,
        'title'       => get_the_title( $post_id ),
        'select_a'    => $select_a,
        'select_i'    => $select_i,
        'select_u'    => $select_u,
        'answer_text' => $answer,
        'answer_body' => $body,
        'correct'     => shuryo_mock_normalize_answer( $answer, $has_choices ),
        'has_choices' => $has_choices,
        'image'       => $img_url,
        'section'     => $section,
    ];
}

function shuryo_mock_random_ids( $count, $args = [] ) {
    $defaults = [
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => $count,
        'fields'              => 'ids',
        'orderby'             => 'rand',
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ];

    $query = new WP_Query( wp_parse_args( $args, $defaults ) );
    return array_map( 'intval', $query->posts );
}

$questions = [];
$mock_error = '';
$breakdown = [];

if ( ! $config ) {
    $mock_error = 'この固定ページは模擬試験テンプレートの対象外です。URLスラッグを確認してください。';
} elseif ( $config['mode'] === 'index' ) {
    // 模擬試験トップでは問題を取得しません。
} elseif ( $config['mode'] === 'category' ) {
    $ids = shuryo_mock_random_ids( $config['count'], [
        'category_name' => $config['category'],
    ] );

    foreach ( $ids as $post_id ) {
        $questions[] = shuryo_mock_post_to_question( $post_id );
    }

    if ( count( $questions ) < $config['count'] ) {
        $mock_error = '対象カテゴリの問題数が不足しています。必要数：' . $config['count'] . '問、取得数：' . count( $questions ) . '問。';
    }
} elseif ( $config['mode'] === 'tag' ) {
    $ids = shuryo_mock_random_ids( $config['count'], [
        'tag' => $config['tag'],
    ] );

    foreach ( $ids as $post_id ) {
        $questions[] = shuryo_mock_post_to_question( $post_id );
    }

    if ( count( $questions ) < $config['count'] ) {
        $mock_error = '対象タグの問題数が不足しています。必要数：' . $config['count'] . '問、取得数：' . count( $questions ) . '問。';
    }
} elseif ( $config['mode'] === 'official-format' ) {
    /*
     * 本番形式30問
     * 法令13 / 猟具6 / 鳥獣9 / 保護管理2
     * 保護管理タグ: protection
     * 猟具: 選択した免許カテゴリ（type1/type2/wana/ami）
     */
    $hogo_tag = get_term_by( 'slug', 'protection', 'post_tag' );
    $hogo_tag_id = $hogo_tag ? (int) $hogo_tag->term_id : 0;

    if ( ! $hogo_tag_id ) {
        $mock_error = '「保護管理」タグ（スラッグ：protection）が見つかりません。該当問題にタグを付けてから利用してください。';
    } else {
        $used_ids = [];

        $sections = [
            [
                'label' => '法令',
                'count' => 13,
                'args'  => [
                    'category_name' => 'laws',
                    'tag__not_in'    => [ $hogo_tag_id ],
                ],
            ],
            [
                'label' => '猟具',
                'count' => 6,
                'args'  => [
                    'category_name' => $selected_license,
                    'tag__not_in'    => [ $hogo_tag_id ],
                ],
            ],
            [
                'label' => '鳥獣',
                'count' => 9,
                'args'  => [
                    'category_name' => 'animals',
                    'tag__not_in'    => [ $hogo_tag_id ],
                ],
            ],
            [
                'label' => '保護管理',
                'count' => 2,
                'args'  => [
                    'tag_id' => $hogo_tag_id,
                ],
            ],
        ];

        foreach ( $sections as $section ) {
            $args = $section['args'];
            if ( ! empty( $used_ids ) ) {
                $args['post__not_in'] = $used_ids;
            }

            $ids = shuryo_mock_random_ids( $section['count'], $args );
            $breakdown[ $section['label'] ] = count( $ids );

            foreach ( $ids as $post_id ) {
                $used_ids[] = $post_id;
                $questions[] = shuryo_mock_post_to_question( $post_id, $section['label'] );
            }

            if ( count( $ids ) < $section['count'] ) {
                $mock_error .= ( $mock_error ? ' ' : '' ) . $section['label'] . 'の問題が不足しています（必要' . $section['count'] . '問／取得' . count( $ids ) . '問）。';
            }
        }

        // 出題順をランダム化。
        shuffle( $questions );
    }
}
?>

<div class="mock-exam-page">
<div class="inner">
<main class="mock-wrap">
    <header class="mock-header">
        <h1><?php echo esc_html( $config ? $config['title'] : '模擬試験' ); ?></h1>
        <?php if ( $config ) : ?>
            <p class="mock-description"><?php echo esc_html( $config['description'] ); ?></p>
        <?php endif; ?>
    </header>

    <?php if ( $config && $config['mode'] === 'index' ) : ?>

        <section class="mock-menu">

            <a class="mock-menu-main"
               href="<?php echo esc_url( home_url('/mock-exam/hunting-license/') ); ?>">
                <span class="mock-menu-main__label">本番対策</span>
                <strong>狩猟免許 本番形式30問</strong>
                <span>受験する免許を選んで、本番を想定した30問に挑戦</span>
                <span class="mock-menu-main__link">本番形式を始める →</span>
            </a>

            <section class="mock-menu-section">
                <h2>免許別の模擬試験</h2>

                <div class="mock-menu-grid">
                    <a href="<?php echo esc_url( home_url('/mock-exam/type1/') ); ?>">
                        <strong>第一種銃猟</strong>
                        <span>30問</span>
                    </a>

                    <a href="<?php echo esc_url( home_url('/mock-exam/type2/') ); ?>">
                        <strong>第二種銃猟</strong>
                        <span>30問</span>
                    </a>

                    <a href="<?php echo esc_url( home_url('/mock-exam/wana/') ); ?>">
                        <strong>わな猟</strong>
                        <span>30問</span>
                    </a>

                    <a href="<?php echo esc_url( home_url('/mock-exam/ami/') ); ?>">
                        <strong>網猟</strong>
                        <span>27問</span>
                    </a>
                </div>
            </section>

            <section class="mock-menu-section">
                <h2>分野別の模擬試験</h2>

                <div class="mock-menu-grid mock-menu-grid--sub">
                    <a href="<?php echo esc_url( home_url('/mock-exam/laws/') ); ?>">
                        <strong>法令</strong>
                        <span>30問</span>
                    </a>

                    <a href="<?php echo esc_url( home_url('/mock-exam/animals/') ); ?>">
                        <strong>鳥獣</strong>
                        <span>30問</span>
                    </a>

                    <a href="<?php echo esc_url( home_url('/mock-exam/protection/') ); ?>">
                        <strong>保護管理</strong>
                        <span>20問</span>
                    </a>

                    <a href="<?php echo esc_url( home_url('/mock-exam/gun-course/') ); ?>">
                        <strong>猟銃等講習会</strong>
                        <span>50問</span>
                    </a>
                </div>
            </section>

        </section>

    <?php else : ?>

        <?php if ( $config && $config['mode'] === 'official-format' ) : ?>
            <nav class="mock-license-select mock-license-select--compact" aria-label="本番形式の受験免許を切り替える">
                <p class="mock-license-select__title">受験免許</p>
                <div class="mock-license-select__buttons">
                    <?php foreach ( $license_labels as $license_slug => $license_label ) : ?>
                        <?php
                        $url = add_query_arg(
                            'license',
                            $license_slug,
                            home_url('/mock-exam/hunting-license/')
                        );
                        $class = $selected_license === $license_slug ? ' is-current' : '';
                        ?>
                        <a class="mock-license-select__button<?php echo esc_attr( $class ); ?>"
                           href="<?php echo esc_url( $url ); ?>">
                            <?php echo esc_html( $license_label ); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </nav>
        <?php endif; ?>

    <?php if ( $mock_error ) : ?>
        <div class="mock-error"><?php echo esc_html( $mock_error ); ?></div>
    <?php elseif ( count( $questions ) < 1 ) : ?>
        <div class="mock-error">問題を取得できませんでした。固定ページのスラッグと対象カテゴリを確認してください。</div>
    <?php else : ?>

    <section class="mock-start-card" id="mock-start">
        <h2><?php echo ( $config && $config['mode'] === 'official-format' ) ? '本番形式30問' : '模擬試験について'; ?></h2>

        <?php if ( $config && $config['mode'] === 'official-format' ) : ?>
            <div class="mock-format-breakdown" aria-label="出題内訳">
                <div><strong>13問</strong><span>法令</span></div>
                <div><strong>6問</strong><span><?php echo esc_html( $license_tool_labels[ $selected_license ] ); ?></span></div>
                <div><strong>9問</strong><span>鳥獣</span></div>
                <div><strong>2問</strong><span>保護管理</span></div>
            </div>
        <?php else : ?>
            <div class="mock-info">
                <div class="mock-info-item"><strong><?php echo esc_html( count( $questions ) ); ?>問</strong><span>ランダム出題</span></div>
                <div class="mock-info-item"><strong>一括採点</strong><span>最後に結果表示</span></div>
                <div class="mock-info-item"><strong>解説付き</strong><span>採点後に確認</span></div>
            </div>
        <?php endif; ?>

        <p class="mock-note">
            <?php if ( $config && $config['mode'] === 'official-format' ) : ?>
                法令13問・<?php echo esc_html( $license_tool_labels[ $selected_license ] ); ?>6問・鳥獣9問・保護管理2問をランダム抽選し、30問を混ぜて出題します。
                回答中は正解を表示せず、全問回答後にまとめて採点・解説を確認できます。ページを再読み込みすると問題は再抽選されます。
            <?php else : ?>
                回答中は正解を表示しません。すべて回答した後に採点すると、正解・不正解と解説をまとめて確認できます。ページを再読み込みすると問題は再抽選されます。
            <?php endif; ?>
        </p>
        <div class="mock-start-actions"><button type="button" class="mock-primary-btn" id="mock-start-btn">模擬試験を開始する</button></div>
    </section>

    <section class="mock-test" id="mock-test">
        <div class="mock-status">
            <div class="mock-progress-row">
                <div>現在 <strong><span id="mock-current-number">1</span> / <?php echo esc_html( count( $questions ) ); ?>問</strong></div>
                <div>回答済み <strong><span id="mock-answered-count">0</span> / <?php echo esc_html( count( $questions ) ); ?>問</strong></div>
            </div>
            <div class="mock-progress-bar"><div class="mock-progress-fill" id="mock-progress-fill"></div></div>
        </div>

        <div class="mock-paper">
            <form id="mock-form">
            <?php foreach ( $questions as $index => $question ) : ?>
                <article class="mock-question<?php echo $index === 0 ? ' is-current' : ''; ?>"
                    data-index="<?php echo esc_attr( $index ); ?>"
                    data-correct="<?php echo esc_attr( $question['correct'] ); ?>"
                    data-answer-text="<?php echo esc_attr( wp_strip_all_tags( (string) $question['answer_text'] ) ); ?>">

                    <div class="mock-question-no">
                        <span>問<?php echo esc_html( $index + 1 ); ?></span>
                        <?php if ( $question['no'] ) : ?>
                            <span class="mock-source-no">出題元 No.<?php echo esc_html( $question['no'] ); ?></span>
                        <?php endif; ?>
                    </div>

                    <h2 class="mock-question-title"><?php echo esc_html( $question['title'] ); ?></h2>

                    <?php if ( $question['image'] ) : ?>
                        <img class="mock-question-image" src="<?php echo esc_url( $question['image'] ); ?>" alt="問題<?php echo esc_attr( $index + 1 ); ?>の画像">
                    <?php endif; ?>

                    <div class="mock-options">
                    <?php if ( $question['has_choices'] ) : ?>
                        <?php if ( $question['select_a'] !== '' && $question['select_a'] !== null ) : ?>
                            <label class="mock-option"><input type="radio" name="q<?php echo esc_attr( $index ); ?>" value="a"><span data-mark="ア"><?php echo esc_html( $question['select_a'] ); ?></span></label>
                        <?php endif; ?>
                        <?php if ( $question['select_i'] !== '' && $question['select_i'] !== null ) : ?>
                            <label class="mock-option"><input type="radio" name="q<?php echo esc_attr( $index ); ?>" value="i"><span data-mark="イ"><?php echo esc_html( $question['select_i'] ); ?></span></label>
                        <?php endif; ?>
                        <?php if ( $question['select_u'] !== '' && $question['select_u'] !== null ) : ?>
                            <label class="mock-option"><input type="radio" name="q<?php echo esc_attr( $index ); ?>" value="u"><span data-mark="ウ"><?php echo esc_html( $question['select_u'] ); ?></span></label>
                        <?php endif; ?>
                    <?php else : ?>
                        <label class="mock-option"><input type="radio" name="q<?php echo esc_attr( $index ); ?>" value="maru"><span data-mark="〇">正しい</span></label>
                        <label class="mock-option"><input type="radio" name="q<?php echo esc_attr( $index ); ?>" value="batsu"><span data-mark="×">誤り</span></label>
                    <?php endif; ?>
                    </div>

                    <template class="mock-explanation-template"><?php echo wp_kses_post( $question['answer_body'] ); ?></template>
                </article>
            <?php endforeach; ?>

                <div class="mock-nav">
                    <button type="button" class="mock-secondary-btn" id="mock-prev">← 前の問題</button>
                    <button type="button" class="mock-primary-btn" id="mock-next">次の問題 →</button>
                </div>

                <div class="mock-index-box">
                    <div class="mock-index-head">
                        <p class="mock-index-title">問題一覧</p>
                        <span class="mock-index-legend">回答済みは薄緑・現在の問題は濃緑</span>
                    </div>
                    <div class="mock-jump">
                        <?php foreach ( $questions as $index => $question ) : ?>
                            <button type="button" class="mock-jump-btn<?php echo $index === 0 ? ' is-current' : ''; ?>" data-index="<?php echo esc_attr( $index ); ?>"><?php echo esc_html( $index + 1 ); ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="mock-submit-wrap" id="mock-submit-wrap">
                    <p>全問回答済みです。最後にまとめて採点します。</p>
                    <button type="submit" class="mock-primary-btn"><?php echo esc_html( count( $questions ) ); ?>問を採点する</button>
                </div>
            </form>
        </div>
    </section>

    <section class="mock-result" id="mock-result">
        <div class="mock-score">
            <h2>採点結果</h2>
            <div class="mock-score-number" id="mock-score-number"></div>
            <div id="mock-score-rate"></div>
        </div>
        <div class="mock-review" id="mock-review"></div>
        <div class="mock-retry"><button type="button" class="mock-primary-btn" id="mock-retry">別の問題でもう一度挑戦する</button></div>
    </section>

    <?php endif; ?>

    <?php endif; ?>
</main>
</div>
</div>

<?php if ( $config && in_array( $config['mode'], [ 'category', 'tag', 'official-format' ], true ) && ! $mock_error && count( $questions ) > 0 ) : ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const startBox = document.getElementById('mock-start');
    const startBtn = document.getElementById('mock-start-btn');
    const testBox = document.getElementById('mock-test');
    const form = document.getElementById('mock-form');
    const questions = Array.from(document.querySelectorAll('.mock-question'));
    const jumpButtons = Array.from(document.querySelectorAll('.mock-jump-btn'));
    const prevBtn = document.getElementById('mock-prev');
    const nextBtn = document.getElementById('mock-next');
    const submitWrap = document.getElementById('mock-submit-wrap');
    const currentNumber = document.getElementById('mock-current-number');
    const answeredCount = document.getElementById('mock-answered-count');
    const progressFill = document.getElementById('mock-progress-fill');
    const resultBox = document.getElementById('mock-result');
    const scoreNumber = document.getElementById('mock-score-number');
    const scoreRate = document.getElementById('mock-score-rate');
    const review = document.getElementById('mock-review');
    const retryBtn = document.getElementById('mock-retry');

    let current = 0;

    function getAnsweredCount() {
        return questions.reduce(function(total, question, index) {
            return total + (form.querySelector('input[name="q' + index + '"]:checked') ? 1 : 0);
        }, 0);
    }

    function updateUI() {
        const count = getAnsweredCount();
        answeredCount.textContent = count;
        progressFill.style.width = ((count / questions.length) * 100) + '%';

        jumpButtons.forEach(function(button, index) {
            const checked = form.querySelector('input[name="q' + index + '"]:checked');
            button.classList.toggle('is-answered', !!checked);
            button.classList.toggle('is-current', index === current);
        });

        submitWrap.classList.toggle('is-visible', count === questions.length);
    }

    function showQuestion(index) {
        current = Math.max(0, Math.min(index, questions.length - 1));
        questions.forEach(function(question, i) {
            question.classList.toggle('is-current', i === current);
        });
        currentNumber.textContent = current + 1;
        prevBtn.disabled = current === 0;
        nextBtn.textContent = current === questions.length - 1 ? '最初の問題へ' : '次の問題 →';
        updateUI();
        window.scrollTo({ top: testBox.offsetTop - 20, behavior: 'smooth' });
    }

    startBtn.addEventListener('click', function() {
        startBox.style.display = 'none';
        testBox.classList.add('is-active');
        showQuestion(0);
    });

    prevBtn.addEventListener('click', function() { showQuestion(current - 1); });
    nextBtn.addEventListener('click', function() { showQuestion(current === questions.length - 1 ? 0 : current + 1); });

    jumpButtons.forEach(function(button) {
        button.addEventListener('click', function() { showQuestion(Number(button.dataset.index)); });
    });

    form.querySelectorAll('input[type="radio"]').forEach(function(input) {
        input.addEventListener('change', updateUI);
    });

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        let score = 0;
        let html = '';

        questions.forEach(function(question, index) {
            const checked = form.querySelector('input[name="q' + index + '"]:checked');
            const selected = checked ? checked.value : '';
            const correct = question.dataset.correct;
            const isCorrect = selected !== '' && correct !== '' && selected === correct;
            const answerText = question.dataset.answerText || '確認できません';
            const title = question.querySelector('.mock-question-title').textContent;
            const explanation = question.querySelector('.mock-explanation-template').innerHTML;

            if (isCorrect) score++;

            html += '<div class="mock-review-item ' + (isCorrect ? 'is-correct' : 'is-wrong') + '">';
            html += '<p><strong>問' + (index + 1) + '：</strong>' + escapeHtml(title) + '</p>';
            html += '<p><strong>' + (isCorrect ? '〇 正解' : '× 不正解') + '</strong></p>';
            html += '<p>正解：' + escapeHtml(answerText) + '</p>';
            if (explanation.trim() !== '') html += '<div class="mock-review-explain">' + explanation + '</div>';
            html += '</div>';
        });

        const rate = Math.round((score / questions.length) * 100);
        scoreNumber.textContent = score + ' / ' + questions.length + '問';
        scoreRate.textContent = '正答率 ' + rate + '%';
        review.innerHTML = html;

        testBox.style.display = 'none';
        resultBox.classList.add('is-active');
        window.scrollTo({ top: resultBox.offsetTop - 20, behavior: 'smooth' });
    });

    retryBtn.addEventListener('click', function() { window.location.reload(); });

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
});
</script>
<?php endif; ?>

<?php get_footer(); ?>
