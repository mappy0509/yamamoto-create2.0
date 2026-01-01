<?php get_header(); ?>

<main id="main-container">
    <div id="page-works-single" class="page-section active pt-32 pb-20">
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            <?php
            // カスタムフィールドの取得（ACF等のプラグイン使用を想定したキー名）
            $client_name = get_post_meta( get_the_ID(), 'client_name', true );
            $role        = get_post_meta( get_the_ID(), 'role', true ); // Design, Dev, etc.
            $date        = get_post_meta( get_the_ID(), 'project_date', true ); // 2025.02 etc.
            $tech_stack  = get_post_meta( get_the_ID(), 'technologies', true ); // カンマ区切りテキスト または 配列
            
            // タクソノミー（カテゴリ）取得
            $terms = get_the_terms( get_the_ID(), 'works_category' );
            $term_name = !empty($terms) ? $terms[0]->name : 'Project';
            $term_slug = !empty($terms) ? $terms[0]->slug : '';
            
            // カテゴリごとの色設定
            $label_class = 'bg-slate-100 text-slate-600';
            if($term_slug === 'web') $label_class = 'bg-blue-100 text-blue-600';
            if($term_slug === 'system') $label_class = 'bg-green-100 text-green-600';
            if($term_slug === 'marketing' || $term_slug === 'dx') $label_class = 'bg-purple-100 text-purple-600';
            ?>

            <div class="px-6 md:px-20 relative z-10 bg-white/90 backdrop-blur max-w-7xl mx-auto rounded-3xl p-8 md:p-16 border border-white shadow-xl">
                
                <!-- Back Link -->
                <a href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>" class="mb-8 text-xs font-bold text-slate-500 hover:text-blue-600 flex items-center gap-1 w-fit transition-colors group">
                    <span class="group-hover:-translate-x-1 transition-transform">&larr;</span> 一覧に戻る
                </a>
                
                <!-- Header Info -->
                <div class="mb-10">
                    <span class="inline-block px-3 py-1 <?php echo esc_attr($label_class); ?> rounded-full text-[10px] font-bold mb-4 tracking-wider">
                        <?php echo esc_html($term_name); ?>
                    </span>
                    <h1 class="text-3xl md:text-5xl font-black text-slate-900 mb-8 leading-tight">
                        <?php the_title(); ?>
                    </h1>
                    
                    <!-- Meta Data Grid -->
                    <div class="flex flex-wrap gap-y-4 gap-x-12 text-xs font-bold text-slate-600 border-y border-slate-200 py-6 font-mono">
                        <?php if($client_name): ?>
                        <div>
                            <span class="text-slate-400 block mb-1 text-[10px]">CLIENT</span>
                            <?php echo esc_html($client_name); ?>
                        </div>
                        <?php endif; ?>
                        
                        <?php if($role): ?>
                        <div>
                            <span class="text-slate-400 block mb-1 text-[10px]">ROLE</span>
                            <?php echo esc_html($role); ?>
                        </div>
                        <?php endif; ?>
                        
                        <?php if($date): ?>
                        <div>
                            <span class="text-slate-400 block mb-1 text-[10px]">DATE</span>
                            <?php echo esc_html($date); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Main Visual -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="aspect-video bg-slate-100 rounded-2xl mb-12 overflow-hidden border border-slate-200 shadow-sm">
                        <?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                    </div>
                <?php endif; ?>

                <!-- Content Body -->
                <div class="grid lg:grid-cols-3 gap-12">
                    
                    <!-- Main Text -->
                    <div class="lg:col-span-2 entry-content text-sm text-slate-600 leading-loose font-medium">
                        <?php the_content(); ?>
                    </div>
                    
                    <!-- Sidebar (Technologies etc.) -->
                    <div class="lg:col-span-1">
                        <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 sticky top-32">
                            <h4 class="font-bold text-slate-900 mb-6 text-sm flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                                TECHNOLOGY
                            </h4>
                            
                            <div class="flex flex-wrap gap-2">
                                <?php 
                                // カスタムフィールド 'technologies' がカンマ区切りテキストの場合の処理例
                                // (例: "Next.js, React, Three.js, AWS")
                                if ( $tech_stack ) {
                                    $techs = explode( ',', $tech_stack );
                                    foreach ( $techs as $tech ) {
                                        echo '<span class="px-3 py-1 bg-white border border-slate-200 rounded-md text-[10px] font-bold text-slate-700 shadow-sm">' . esc_html( trim( $tech ) ) . '</span>';
                                    }
                                }
                                
                                // もしくはタグを表示する場合
                                $tags = get_the_tags();
                                if ( $tags ) {
                                    foreach ( $tags as $tag ) {
                                        echo '<span class="px-3 py-1 bg-white border border-slate-200 rounded-md text-[10px] font-bold text-slate-700 shadow-sm">' . esc_html( $tag->name ) . '</span>';
                                    }
                                }
                                ?>
                            </div>

                            <!-- Share Buttons (Optional) -->
                            <div class="mt-8 pt-8 border-t border-slate-200">
                                <p class="text-[10px] font-bold text-slate-400 mb-4 tracking-widest">SHARE</p>
                                <div class="flex gap-4">
                                    <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-blue-400 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-12.7 12.5S.2 5 .2 5s2.1.3 3.9 1.8c0 0 2.2-4.2 1.9-6.6 0 0 .1 1.1 1.2 1.3 0 0-1.7-2.3 1.1-4 0 0 .6 2 2.4 2.5 0 0 2.9-6.1 7.2-2.1z"></path></svg>
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-blue-600 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="mt-20 pt-10 border-t border-slate-200 flex justify-between">
                    <div class="w-1/2 pr-4">
                        <?php previous_post_link( '%link', '<span class="block text-[10px] text-slate-400 font-bold mb-1">PREV</span><span class="font-bold text-slate-900 hover:text-blue-600 transition-colors text-sm line-clamp-1">%title</span>' ); ?>
                    </div>
                    <div class="w-1/2 pl-4 text-right border-l border-slate-100">
                        <?php next_post_link( '%link', '<span class="block text-[10px] text-slate-400 font-bold mb-1">NEXT</span><span class="font-bold text-slate-900 hover:text-blue-600 transition-colors text-sm line-clamp-1">%title</span>' ); ?>
                    </div>
                </div>

            </div>

        <?php endwhile; endif; ?>
        
    </div>
</main>

<?php get_footer(); ?>