<?php get_header(); ?>

<main id="main-container">

    <!-- PAGE: HOME -->
    <div id="page-home" class="page-section active" style="padding-top: 0;">
        <!-- Hero Section -->
        <section class="relative h-screen flex flex-col justify-center px-6 md:px-20 pt-20">
            <div class="max-w-6xl z-10">
                <div class="flex items-center gap-3 mb-6 reveal-fade">
                    <span class="w-8 h-[1px] bg-blue-600"></span>
                    <p class="text-blue-600 text-xs md:text-sm tracking-wider font-bold">DIGITAL STRATEGY PARTNER</p>
                </div>
                
                <h1 class="text-4xl sm:text-5xl md:text-8xl lg:text-9xl font-black leading-[1.1] mb-8 tracking-tight text-slate-900 font-jp">
                    <span class="block overflow-hidden"><span class="block reveal-text whitespace-nowrap">アイデアを</span></span>
                    <span class="block overflow-hidden"><span class="block reveal-text text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 whitespace-nowrap">カタチにする。</span></span>
                </h1>
                
                <p class="max-w-xl text-slate-600 text-sm md:text-base leading-loose mb-10 reveal-fade font-medium">
                    Web制作、システム開発、マーケティング。<br>
                    YAMAMOTO CREATEは、バラバラになりがちなデジタル施策を統合し、
                    <span class="text-slate-900 font-bold bg-blue-100/50 px-1">ビジネスの成長を加速させる</span>実装パートナーです。
                </p>
                
                <div class="reveal-fade flex flex-col sm:flex-row gap-4">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="group inline-flex items-center justify-center gap-3 px-8 py-4 bg-slate-900 text-white rounded-full hover:bg-blue-600 transition-all duration-300 hover-magnetic shadow-lg">
                        <span class="font-bold text-sm tracking-wider">プロジェクトを相談する</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transform group-hover:translate-x-1 transition-transform"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                    <a href="<?php echo esc_url( home_url( '/works/' ) ); ?>" class="group inline-flex items-center justify-center gap-3 px-8 py-4 bg-white text-slate-900 border border-slate-200 rounded-full hover:border-slate-400 transition-all duration-300 hover-magnetic">
                        <span class="font-bold text-sm tracking-wider">実績を見る</span>
                    </a>
                </div>
            </div>

            <div class="absolute bottom-10 right-6 md:right-20 flex flex-col items-center gap-4 reveal-fade">
                <div class="font-mono text-[10px] [writing-mode:vertical-rl] tracking-widest text-slate-400">SCROLL DOWN</div>
                <div class="w-[1px] h-16 bg-slate-200 overflow-hidden">
                    <div class="w-full h-full bg-blue-600 animate-scroll-line"></div>
                </div>
            </div>
        </section>

        <!-- NEWS Preview (WP Query) -->
        <section id="news-preview" class="py-20 px-6 md:px-20 relative z-10">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-end mb-10 border-b border-slate-200 pb-4">
                    <div class="flex items-center gap-4">
                        <h2 class="text-3xl font-black text-slate-900 font-jp">NEWS</h2>
                        <span class="font-mono text-blue-600 text-xs font-bold">LATEST INFORMATION</span>
                    </div>
                    <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="text-xs font-bold text-slate-500 hover:text-blue-600 transition-colors flex items-center gap-1 group mt-4 md:mt-0">
                        一覧を見る <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
                <div class="flex flex-col gap-2">
                    <?php
                    $news_query = new WP_Query( array(
                        'post_type' => 'post',
                        'posts_per_page' => 3
                    ) );
                    
                    if ( $news_query->have_posts() ) :
                        while ( $news_query->have_posts() ) : $news_query->the_post();
                            $cats = get_the_category();
                            $cat_name = !empty($cats) ? $cats[0]->name : 'NEWS';
                            $cat_slug = !empty($cats) ? $cats[0]->slug : '';
                            
                            $cat_class = 'bg-slate-100 text-slate-600';
                            if($cat_slug === 'press') $cat_class = 'bg-blue-100 text-blue-600';
                            if($cat_slug === 'works') $cat_class = 'bg-purple-100 text-purple-600';
                            if($cat_slug === 'event') $cat_class = 'bg-green-100 text-green-600';
                    ?>
                    <a href="<?php the_permalink(); ?>" class="group flex flex-col md:flex-row md:items-center gap-2 md:gap-8 p-6 glass-panel rounded-xl hover:bg-white hover:border-blue-200 transition-all duration-300 hover-magnetic-card">
                        <div class="font-mono text-slate-400 text-xs font-bold"><?php echo get_the_date('Y.m.d'); ?></div>
                        <span class="inline-block px-2 py-0.5 <?php echo esc_attr($cat_class); ?> text-[10px] font-bold rounded w-fit"><?php echo esc_html($cat_name); ?></span>
                        <div class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors line-clamp-1"><?php the_title(); ?></div>
                        <div class="hidden md:block ml-auto opacity-0 group-hover:opacity-100 transition-opacity text-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                        </div>
                    </a>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="py-20 px-6 md:px-20 relative z-10 bg-white/40 backdrop-blur-sm">
            <div class="flex flex-col md:flex-row justify-between items-end mb-20 gap-6">
                <div>
                    <span class="font-mono text-blue-600 text-xs font-bold mb-2 block">OUR SERVICES</span>
                    <h2 class="text-4xl md:text-5xl font-black text-slate-900 font-jp">事業内容</h2>
                </div>
                <p class="max-w-md text-slate-600 text-sm leading-relaxed font-medium">デザインと技術の両輪で、<br>お客様のビジネス課題を解決する3つのソリューション。</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Service 1 -->
                <div class="glass-panel p-8 rounded-2xl hover:bg-white transition-all duration-300 group cursor-none hover-magnetic-card border-l-4 border-l-transparent hover:border-l-blue-600">
                    <div class="flex justify-between items-start mb-6">
                        <span class="font-mono text-slate-300 text-2xl font-bold group-hover:text-blue-600 transition-colors">01</span>
                        <div class="p-2 bg-blue-50 rounded-lg text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></div>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-900">システム・アプリ開発</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6 font-medium">見栄えの良いWebサイトから、業務効率化のためのシステム開発まで。WordPressや最新のReact/Next.js技術を駆使し、拡張性の高い基盤を構築します。</p>
                    <ul class="space-y-2 border-t border-slate-100 pt-4">
                        <li class="text-xs text-slate-600 font-bold flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>コーポレートサイト制作</li>
                        <li class="text-xs text-slate-600 font-bold flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>Webアプリ / SaaS開発</li>
                        <li class="text-xs text-slate-600 font-bold flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>ECサイト構築</li>
                    </ul>
                </div>
                <!-- Service 2 -->
                <div class="glass-panel p-8 rounded-2xl hover:bg-white transition-all duration-300 group cursor-none hover-magnetic-card border-l-4 border-l-transparent hover:border-l-blue-600">
                    <div class="flex justify-between items-start mb-6">
                        <span class="font-mono text-slate-300 text-2xl font-bold group-hover:text-blue-600 transition-colors">02</span>
                        <div class="p-2 bg-blue-50 rounded-lg text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></div>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-900">Webマーケティング</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6 font-medium">「作って終わり」ではありません。SNS運用、SEO対策、広告運用を通じて、ターゲットユーザーに確実にリーチし、売上につながる導線を設計します。</p>
                    <ul class="space-y-2 border-t border-slate-100 pt-4">
                        <li class="text-xs text-slate-600 font-bold flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>SNS運用代行 (Instagram/TikTok)</li>
                        <li class="text-xs text-slate-600 font-bold flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>SEO / MEO対策</li>
                        <li class="text-xs text-slate-600 font-bold flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>Web広告運用</li>
                    </ul>
                </div>
                <!-- Service 3 -->
                <div class="glass-panel p-8 rounded-2xl hover:bg-white transition-all duration-300 group cursor-none hover-magnetic-card border-l-4 border-l-transparent hover:border-l-blue-600">
                    <div class="flex justify-between items-start mb-6">
                        <span class="font-mono text-slate-300 text-2xl font-bold group-hover:text-blue-600 transition-colors">03</span>
                        <div class="p-2 bg-blue-50 rounded-lg text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></div>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-900">DX・業務効率化</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6 font-medium">LINE公式アカウントを活用した自動接客や、業務プロセスのデジタル化支援。アナログ作業を削減し、貴社の生産性を劇的に向上させます。</p>
                    <ul class="space-y-2 border-t border-slate-100 pt-4">
                        <li class="text-xs text-slate-600 font-bold flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>LINE公式デザイン/構築</li>
                        <li class="text-xs text-slate-600 font-bold flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>業務自動化ツール導入</li>
                        <li class="text-xs text-slate-600 font-bold flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>ライブ配信サポート</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Works Section (Dynamic Filtering Loop) -->
        <section id="works" class="py-32 relative z-10 overflow-hidden">
             <div class="px-6 md:px-20 mb-16 flex flex-col md:flex-row items-start md:items-end justify-between gap-6">
                <div>
                    <p class="font-mono text-blue-600 text-xs mb-2 tracking-widest font-bold">CASE STUDY</p>
                    <h2 class="text-4xl md:text-5xl font-black text-slate-900 font-jp scramble-trigger">導入事例・実績</h2>
                </div>
                
                <!-- Category Tabs -->
                <div class="flex flex-wrap gap-2" id="works-tabs">
                    <button class="tab-btn active px-4 py-2 rounded-full border border-slate-200 text-xs font-bold hover:bg-slate-100 transition-colors" data-filter="all">ALL</button>
                    <?php
                    // カスタムタクソノミーからタブを生成
                    $terms = get_terms( array(
                        'taxonomy' => 'works_category',
                        'hide_empty' => true,
                    ) );
                    
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                        foreach ( $terms as $term ) {
                            echo '<button class="tab-btn px-4 py-2 rounded-full border border-slate-200 text-xs font-bold hover:bg-slate-100 transition-colors" data-filter="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</button>';
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Works List (Filtered by JS) -->
            <div class="flex flex-col gap-24 px-6 md:px-20" id="works-container">
                
                <?php
                $works_args = array(
                    'post_type' => 'works',
                    'posts_per_page' => 10, // 表示件数を増やしてフィルタリングに対応
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $works_query = new WP_Query($works_args);
                
                if ( $works_query->have_posts() ) :
                    $count = 0;
                    while ( $works_query->have_posts() ) : $works_query->the_post();
                        $count++;
                        $reverse_class = ( $count % 2 === 0 ) ? 'md:flex-row-reverse' : '';
                        
                        $terms = get_the_terms( get_the_ID(), 'works_category' );
                        $term_name = !empty($terms) ? $terms[0]->name : 'Project';
                        $term_slug = !empty($terms) ? $terms[0]->slug : 'other'; // data-category用
                        
                        $tech_stack = get_post_meta( get_the_ID(), 'technologies', true );
                        
                        $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                        if(!$thumb_url) $thumb_url = 'https://placehold.jp/f1f5f9/334155/800x450.png?text=NO%20IMAGE';
                        
                        $color_class = 'text-blue-600 bg-blue-50 group-hover:text-blue-600 group-hover:border-blue-400';
                        if($term_slug === 'system') $color_class = 'text-green-600 bg-green-50 group-hover:text-green-600 group-hover:border-green-400';
                        if($term_slug === 'marketing' || $term_slug === 'dx') $color_class = 'text-purple-600 bg-purple-50 group-hover:text-purple-600 group-hover:border-purple-400';
                ?>
                
                <!-- data-category 属性を追加 -->
                <a href="<?php the_permalink(); ?>" class="work-item group relative grid md:grid-cols-2 gap-12 items-center <?php echo esc_attr($reverse_class); ?>" data-category="<?php echo esc_attr($term_slug); ?>">
                    <div class="relative overflow-hidden rounded-2xl aspect-video bg-slate-100 border border-slate-200 <?php echo esc_attr(explode(' ', $color_class)[2]); ?> transition-colors shadow-lg group-hover:shadow-2xl">
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
                        
                        <?php if($tech_stack): ?>
                        <div class="flex flex-wrap gap-2 mb-8">
                            <?php 
                            $techs = explode(',', $tech_stack);
                            foreach($techs as $tech): 
                                $tech = trim($tech);
                                if(empty($tech)) continue;
                            ?>
                            <span class="px-3 py-1 bg-white border border-slate-200 rounded-md text-[10px] text-slate-600 font-bold"><?php echo esc_html($tech); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        
                        <span class="inline-flex items-center gap-2 text-sm font-bold text-slate-900 group-hover:translate-x-2 transition-transform">
                            詳細を見る <span class="text-xl">→</span>
                        </span>
                    </div>
                </a>
                
                <?php 
                    endwhile;
                    wp_reset_postdata();
                else : 
                ?>
                    <div class="text-center py-20 bg-slate-50 rounded-2xl border border-slate-100">
                        <p class="text-slate-500 font-bold">現在、公開できる実績記事の準備中です。</p>
                    </div>
                <?php endif; ?>

            </div>
            
            <div class="mt-12 text-center">
                <a href="<?php echo esc_url( home_url( '/works/' ) ); ?>" class="inline-block px-8 py-3 border border-slate-300 rounded-full text-xs font-bold text-slate-600 hover:bg-slate-100 transition-colors">
                    すべての実績を見る
                </a>
            </div>

            <!-- Tab Filter Script -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const tabBtns = document.querySelectorAll('#works-tabs .tab-btn');
                    const workItems = document.querySelectorAll('.work-item');

                    tabBtns.forEach(btn => {
                        btn.addEventListener('click', () => {
                            // Style updates
                            tabBtns.forEach(b => {
                                b.classList.remove('active', 'bg-slate-900', 'text-white', 'border-slate-900');
                                b.classList.add('bg-transparent', 'text-slate-900', 'border-slate-200');
                            });
                            btn.classList.add('active', 'bg-slate-900', 'text-white', 'border-slate-900');
                            btn.classList.remove('bg-transparent', 'text-slate-900', 'border-slate-200');

                            const filter = btn.getAttribute('data-filter');

                            // Filtering with GSAP
                            workItems.forEach(item => {
                                const category = item.getAttribute('data-category');
                                if (filter === 'all' || filter === category) {
                                    gsap.to(item, { autoAlpha: 1, display: 'grid', duration: 0.4, overwrite: true });
                                } else {
                                    gsap.to(item, { autoAlpha: 0, display: 'none', duration: 0.4, overwrite: true });
                                }
                            });
                            
                            // Refresh ScrollTrigger as layout changes
                            if(typeof ScrollTrigger !== 'undefined') ScrollTrigger.refresh();
                        });
                    });
                });
            </script>
        </section>

        <!-- Company / Why Choose Us -->
        <section id="about" class="py-32 px-6 md:px-20 bg-white/60 backdrop-blur-md relative z-10 border-y border-slate-200">
            <div class="grid md:grid-cols-2 gap-16">
                <div>
                    <h2 class="text-3xl md:text-5xl font-black mb-8 text-slate-900 font-jp">選ばれる理由</h2>
                    <p class="text-slate-500 text-sm leading-loose mb-8 font-medium">私たちはスタートアップだからこそ、<br>形式にとらわれない「柔軟性」と、圧倒的な「スピード」を約束します。<br>お客様のビジネスを自分ごとのように考え、<br>最新技術を駆使して最短距離でゴールへ導きます。</p>
                    
                    <div class="mt-8 bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                        <h3 class="font-bold text-slate-900 mb-4 border-b pb-2">COMPANY PROFILE</h3>
                        <dl class="text-xs grid grid-cols-[100px_1fr] gap-y-3">
                            <dt class="font-bold text-slate-500">名称</dt> <dd class="font-bold text-slate-900">YAMAMOTO CREATE</dd>
                            <dt class="font-bold text-slate-500">代表者</dt> <dd class="text-slate-700">山本 真大</dd>
                            <dt class="font-bold text-slate-500">所在地</dt> <dd class="text-slate-700">福岡県福岡市南区大橋2</dd>
                            <dt class="font-bold text-slate-500">電話番号</dt> <dd class="text-slate-700">080-5273-8522</dd>
                            <dt class="font-bold text-slate-500">メール</dt> <dd class="text-slate-700">boboboborn1993@gmail.com</dd>
                            <dt class="font-bold text-slate-500">取引銀行</dt> <dd class="text-slate-700">福岡銀行</dd>
                        </dl>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-12">
                    <!-- Strength Icons (Monochrome) -->
                    <!-- Strength 1 -->
                    <div>
                        <div class="w-12 h-12 bg-white border border-slate-200 rounded-xl flex items-center justify-center text-slate-900 mb-4 shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg></div>
                        <h4 class="text-lg font-black text-slate-900 mb-2 font-jp">圧倒的なスピード感</h4>
                        <p class="text-xs text-slate-500 font-medium leading-relaxed">大企業のような稟議や複雑なフローは不要。即断即決で開発を進め、市場の変化に遅れることなくプロダクトをリリースします。</p>
                    </div>
                    <!-- Strength 2 -->
                    <div>
                        <div class="w-12 h-12 bg-white border border-slate-200 rounded-xl flex items-center justify-center text-slate-900 mb-4 shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a10 10 0 1 0 10 10H12V2z"></path><path d="M12 2a10 10 0 0 1 10 10"></path><path d="m9 22 3-8 3 8"></path></svg></div>
                        <h4 class="text-lg font-black text-slate-900 mb-2 font-jp">最新技術への挑戦</h4>
                        <p class="text-xs text-slate-500 font-medium leading-relaxed">生成AIやWebGLなど、トレンド技術を積極的にキャッチアップ。他社では断られるような新しい試みも、私たちなら実現できます。</p>
                    </div>
                    <!-- Strength 3 -->
                    <div>
                        <div class="w-12 h-12 bg-white border border-slate-200 rounded-xl flex items-center justify-center text-slate-900 mb-4 shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div>
                        <h4 class="text-lg font-black text-slate-900 mb-2 font-jp">伴走型パートナー</h4>
                        <p class="text-xs text-slate-500 font-medium leading-relaxed">「言われた通りに作る」だけの下請けではありません。ビジネスのゴールを共有し、企画段階からチームの一員として伴走します。</p>
                    </div>
                    <!-- Strength 4 -->
                    <div>
                        <div class="w-12 h-12 bg-white border border-slate-200 rounded-xl flex items-center justify-center text-slate-900 mb-4 shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg></div>
                        <h4 class="text-lg font-black text-slate-900 mb-2 font-jp">柔軟な対応力</h4>
                        <p class="text-xs text-slate-500 font-medium leading-relaxed">仕様変更や急なご要望にも、小回りの利く体制で柔軟に対応。マニュアル通りの対応ではなく、その時々のベストを提案します。</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

</main>

<?php get_footer(); ?>