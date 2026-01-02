<?php get_header(); ?>

<main id="main-container">
    <div id="page-news-single" class="page-section active pt-32 pb-20">
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            <?php
            // カテゴリ取得
            $categories = get_the_category();
            $cat_name = !empty($categories) ? $categories[0]->name : 'NEWS';
            $cat_slug = !empty($categories) ? $categories[0]->slug : '';
            
            // カテゴリごとの色設定（一覧と同じルール）
            $label_class = 'bg-slate-100 text-slate-600';
            if($cat_slug === 'press') $label_class = 'bg-blue-100 text-blue-600';
            if($cat_slug === 'works') $label_class = 'bg-purple-100 text-purple-600';
            if($cat_slug === 'event') $label_class = 'bg-green-100 text-green-600';
            ?>

            <div class="px-6 md:px-20 relative z-10 bg-white/90 backdrop-blur max-w-4xl mx-auto rounded-3xl p-8 md:p-16 border border-white shadow-xl">
                
                <!-- Back Link -->
                <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="mb-8 text-xs font-bold text-slate-500 hover:text-blue-600 flex items-center gap-1 w-fit transition-colors group">
                    <span class="group-hover:-translate-x-1 transition-transform">&larr;</span> NEWS一覧に戻る
                </a>
                
                <!-- Header Info -->
                <div class="mb-10 border-b border-slate-200 pb-10">
                    <div class="flex items-center gap-4 mb-4">
                        <time class="text-sm font-mono text-slate-400 font-bold"><?php echo get_the_date('Y.m.d'); ?></time>
                        <span class="inline-block px-3 py-1 <?php echo esc_attr($label_class); ?> rounded-full text-[10px] font-bold tracking-wider">
                            <?php echo esc_html($cat_name); ?>
                        </span>
                    </div>
                    <h1 class="text-2xl md:text-4xl font-black text-slate-900 leading-tight">
                        <?php the_title(); ?>
                    </h1>
                </div>

                <!-- Main Visual (あれば表示) -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="aspect-video bg-slate-100 rounded-2xl mb-12 overflow-hidden border border-slate-200 shadow-sm">
                        <?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                    </div>
                <?php endif; ?>

                <!-- Content Body -->
                <div class="entry-content text-slate-600 leading-loose font-medium">
                    <?php the_content(); ?>
                </div>

                <!-- Footer Navigation -->
                <div class="mt-20 pt-10 border-t border-slate-200 flex justify-between">
                    <div class="w-1/2 pr-4">
                        <?php previous_post_link( '%link', '<span class="block text-[10px] text-slate-400 font-bold mb-1">前の記事</span><span class="font-bold text-slate-900 hover:text-blue-600 transition-colors text-sm line-clamp-1">%title</span>' ); ?>
                    </div>
                    <div class="w-1/2 pl-4 text-right border-l border-slate-100">
                        <?php next_post_link( '%link', '<span class="block text-[10px] text-slate-400 font-bold mb-1">次の記事</span><span class="font-bold text-slate-900 hover:text-blue-600 transition-colors text-sm line-clamp-1">%title</span>' ); ?>
                    </div>
                </div>

            </div>

        <?php endwhile; endif; ?>
        
    </div>
</main>

<?php get_footer(); ?>