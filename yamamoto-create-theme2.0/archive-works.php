<?php get_header(); ?>

<main id="main-container">
    <div id="page-works" class="page-section active pt-32 pb-20">
        <div class="px-6 md:px-20 relative z-10 max-w-7xl mx-auto">
            
            <!-- Page Header -->
            <div class="mb-16 flex flex-col md:flex-row items-start md:items-end justify-between gap-6">
                <div>
                    <p class="font-mono text-blue-600 text-xs mb-2 tracking-widest font-bold">CASE STUDY</p>
                    <h2 class="text-4xl md:text-5xl font-black text-slate-900 font-jp">導入事例・実績</h2>
                </div>
                
                <!-- Category Tabs (Links) -->
                <div class="flex flex-wrap gap-2">
                    <a href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>" class="tab-btn px-4 py-2 rounded-full border border-slate-200 text-xs font-bold hover:bg-slate-100 transition-colors <?php echo !is_tax() ? 'active' : ''; ?>">
                        ALL
                    </a>
                    <?php
                    $terms = get_terms( array(
                        'taxonomy' => 'works_category',
                        'hide_empty' => true,
                    ) );
                    
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                        foreach ( $terms as $term ) {
                            $is_active = is_tax( 'works_category', $term->slug ) ? 'active' : '';
                            echo '<a href="' . esc_url( get_term_link( $term ) ) . '" class="tab-btn px-4 py-2 rounded-full border border-slate-200 text-xs font-bold hover:bg-slate-100 transition-colors ' . esc_attr( $is_active ) . '">' . esc_html( $term->name ) . '</a>';
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Works List -->
            <div class="flex flex-col gap-24">
                <?php if ( have_posts() ) : ?>
                    <?php 
                    $count = 0;
                    while ( have_posts() ) : the_post(); 
                        $count++;
                        // 偶数・奇数でレイアウトを反転
                        $reverse_class = ( $count % 2 === 0 ) ? 'md:flex-row-reverse' : '';
                        
                        // カスタムフィールドの取得 (ACF等を想定)
                        $client_name = get_post_meta( get_the_ID(), 'client_name', true );
                        $service_type = get_post_meta( get_the_ID(), 'service_type', true ); // 例: Web制作
                        
                        // タクソノミー取得
                        $terms = get_the_terms( get_the_ID(), 'works_category' );
                        $term_name = !empty($terms) ? $terms[0]->name : 'Project';
                        $term_slug = !empty($terms) ? $terms[0]->slug : '';
                        
                        // アイキャッチ画像
                        $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                        if(!$thumb_url) $thumb_url = 'https://placehold.jp/3d4070/ffffff/800x450.png?text=NO%20IMAGE';
                        
                        // テーマカラー（カテゴリごとの色分け）
                        $color_class = 'text-blue-600 bg-blue-50 group-hover:text-blue-600 group-hover:border-blue-400';
                        if($term_slug === 'system') $color_class = 'text-green-600 bg-green-50 group-hover:text-green-600 group-hover:border-green-400';
                        if($term_slug === 'marketing' || $term_slug === 'dx') $color_class = 'text-purple-600 bg-purple-50 group-hover:text-purple-600 group-hover:border-purple-400';
                    ?>
                    
                    <a href="<?php the_permalink(); ?>" class="work-item group relative grid md:grid-cols-2 gap-12 items-center <?php echo esc_attr($reverse_class); ?>">
                        <div class="relative overflow-hidden rounded-2xl aspect-video bg-slate-100 border border-slate-200 <?php echo esc_attr(explode(' ', $color_class)[2]); ?> transition-colors shadow-lg group-hover:shadow-2xl">
                            <!-- Image -->
                            <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-slate-900/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 mix-blend-multiply"></div>
                        </div>
                        
                        <div>
                            <div class="inline-block px-3 py-1 <?php echo esc_attr(explode(' ', $color_class)[1] . ' ' . explode(' ', $color_class)[0]); ?> rounded-full text-[10px] font-bold mb-4 tracking-wider">
                                <?php echo esc_html($term_name); ?>
                            </div>
                            
                            <h3 class="text-3xl font-black mb-4 text-slate-900 leading-tight <?php echo esc_attr(explode(' ', $color_class)[2]); ?> transition-colors">
                                <?php the_title(); ?>
                            </h3>
                            
                            <div class="text-slate-500 text-sm leading-loose mb-6 font-medium line-clamp-3">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <!-- Tags (Custom Taxonomy or Tags) -->
                            <?php
                            $tags = get_the_tags();
                            if($tags) : ?>
                            <div class="flex flex-wrap gap-2 mb-8">
                                <?php foreach($tags as $tag) : ?>
                                <span class="px-3 py-1 bg-white border border-slate-200 rounded-md text-[10px] text-slate-600 font-bold"><?php echo esc_html($tag->name); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            
                            <span class="inline-flex items-center gap-2 text-sm font-bold text-slate-900 group-hover:translate-x-2 transition-transform">
                                詳細を見る <span class="text-xl">→</span>
                            </span>
                        </div>
                    </a>

                    <?php endwhile; ?>
                    
                    <!-- Pagination -->
                    <div class="mt-20 flex justify-center">
                        <?php
                        the_posts_pagination( array(
                            'mid_size'  => 2,
                            'prev_text' => __( '&larr; PREV', 'textdomain' ),
                            'next_text' => __( 'NEXT &rarr;', 'textdomain' ),
                            'class'     => 'flex gap-4 font-mono text-sm font-bold text-slate-600',
                        ) );
                        ?>
                    </div>

                <?php else : ?>
                    <div class="text-center py-20 text-slate-500">
                        <p>実績記事がまだありません。</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>