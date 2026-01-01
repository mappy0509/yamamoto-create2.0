<?php get_header(); ?>

<!-- PAGE: NEWS ARCHIVE -->
<div id="page-news" class="page-section active pt-32 pb-20">
    <div class="px-6 md:px-20 relative z-10 max-w-6xl mx-auto">
        
        <!-- Page Header -->
        <div class="mb-12 border-b border-slate-200 pb-4">
            <h2 class="text-4xl font-black text-slate-900 font-jp mb-2">NEWS</h2>
            <p class="text-xs font-bold text-slate-500 font-mono tracking-wider">LATEST INFORMATION & BLOG</p>
        </div>

        <!-- Posts List -->
        <div class="flex flex-col gap-4">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class('p-6 bg-white border border-slate-200 rounded-xl hover:shadow-md transition-all duration-300 cursor-pointer group hover:-translate-y-1'); ?>>
                        <a href="<?php the_permalink(); ?>" class="block">
                            <div class="flex flex-col md:flex-row md:items-center gap-2 md:gap-4 mb-2">
                                <!-- Date -->
                                <time class="text-xs font-mono text-slate-400 font-bold" datetime="<?php echo get_the_date('c'); ?>">
                                    <?php echo get_the_date('Y.m.d'); ?>
                                </time>
                                
                                <!-- Category Label -->
                                <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    $cat = $categories[0];
                                    $cat_class = 'bg-slate-100 text-slate-600'; // Default
                                    
                                    // カテゴリスラッグに応じた色分け（任意）
                                    if ($cat->slug === 'press') $cat_class = 'bg-blue-100 text-blue-600';
                                    if ($cat->slug === 'works') $cat_class = 'bg-purple-100 text-purple-600';
                                    if ($cat->slug === 'event') $cat_class = 'bg-green-100 text-green-600';
                                    
                                    echo '<span class="px-2 py-0.5 ' . esc_attr($cat_class) . ' text-[10px] font-bold rounded w-fit">' . esc_html($cat->name) . '</span>';
                                }
                                ?>
                            </div>
                            
                            <h3 class="text-lg font-bold text-slate-800 group-hover:text-blue-600 transition-colors">
                                <?php the_title(); ?>
                            </h3>
                            
                            <div class="mt-2 text-sm text-slate-500 line-clamp-2 md:hidden">
                                <?php the_excerpt(); ?>
                            </div>
                        </a>
                    </article>

                <?php endwhile; ?>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    <?php
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => __( '&larr; 前へ', 'textdomain' ),
                        'next_text' => __( '次へ &rarr;', 'textdomain' ),
                        'class'     => 'flex gap-2 font-mono text-sm font-bold text-slate-600',
                    ) );
                    ?>
                </div>

            <?php else : ?>
                <!-- No Posts Found -->
                <div class="p-8 text-center text-slate-500 bg-white rounded-xl border border-slate-200">
                    <p>記事が見つかりませんでした。</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>