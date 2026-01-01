<?php
/**
 * YAMAMOTO CREATE Theme2.0 Functions
 */

if ( ! function_exists( 'yamamoto_create_setup' ) ) :
    function yamamoto_create_setup() {
        // アイキャッチ画像のサポート
        add_theme_support( 'post-thumbnails' );
        
        // タイトルタグの自動出力
        add_theme_support( 'title-tag' );

        // HTML5形式のサポート
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ) );
    }
endif;
add_action( 'after_setup_theme', 'yamamoto_create_setup' );

/**
 * スクリプトとスタイルのエンキュー
 */
function yamamoto_enqueue_scripts() {
    // Tailwind CSS (CDN) - 本番環境ではビルドファイルを推奨
    wp_enqueue_script( 'tailwindcss', 'https://cdn.tailwindcss.com', array(), null, false );

    // GSAP
    wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), null, true );
    wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array('gsap'), null, true );

    // メインスタイルシート
    wp_enqueue_style( 'yamamoto-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'yamamoto_enqueue_scripts' );

/**
 * カスタム投稿タイプ「実績 (Works)」の登録
 */
function create_post_type_works() {
    register_post_type( 'works',
        array(
            'labels' => array(
                'name'          => __( '制作実績', 'yamamoto-create' ),
                'singular_name' => __( '制作実績', 'yamamoto-create' ),
                'add_new'       => __( '新規追加', 'yamamoto-create' ),
                'add_new_item'  => __( '実績を追加', 'yamamoto-create' ),
                'edit_item'     => __( '実績を編集', 'yamamoto-create' ),
                'view_item'     => __( '実績を表示', 'yamamoto-create' ),
                'search_items'  => __( '実績を検索', 'yamamoto-create' ),
            ),
            'public'        => true,
            'has_archive'   => true,
            'menu_position' => 5,
            'menu_icon'     => 'dashicons-art', // 管理画面用アイコン
            'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ), // サポートする機能
            'show_in_rest'  => true, // ブロックエディタ (Gutenberg) を有効化
            'rewrite'       => array( 'slug' => 'works' ),
        )
    );

    /**
     * カスタムタクソノミー「制作ジャンル」
     */
    register_taxonomy(
        'works_category', // タクソノミー名
        'works',          // 紐付ける投稿タイプ
        array(
            'label'             => __( '制作ジャンル', 'yamamoto-create' ),
            'rewrite'           => array( 'slug' => 'works-category' ),
            'hierarchical'      => true, // カテゴリーのように階層を持たせる
            'show_in_rest'      => true, // ブロックエディタで選択可能にする
            'show_admin_column' => true, // 管理画面の一覧に表示
        )
    );
}
add_action( 'init', 'create_post_type_works' );

/**
 * 抜粋の文字数を変更
 */
function custom_excerpt_length( $length ) {
    return 80;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * 抜粋の末尾を変更
 */
function custom_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

/**
 * 管理バーをフロントエンドで非表示にする
 * (固定ヘッダーとの重なりを防ぐため)
 */
add_filter( 'show_admin_bar', '__return_false' );