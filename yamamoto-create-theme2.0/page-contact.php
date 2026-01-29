<?php
/**
 * Template Name: Contact Page
 */
get_header(); ?>

<main id="main-container">
    <div id="page-contact" class="page-section active pt-32 pb-20 w-full overflow-x-hidden">
        <div class="px-4 md:px-20 relative z-10 max-w-4xl mx-auto w-full">
            
            <!-- Header -->
            <div class="text-center mb-12">
                <p class="text-blue-600 font-bold tracking-widest text-xs mb-6 font-mono">CONTACT US</p>
                <h2 class="text-4xl md:text-6xl font-black mb-8 tracking-tight text-slate-900 font-jp leading-tight break-words">
                    ビジネスの成長を、<br>ここから始めよう。
                </h2>
                <p class="text-slate-500 mb-12 font-medium leading-loose text-sm md:text-base">
                    Webサイト制作、システム開発、マーケティングのご相談など<br class="hidden md:inline">
                    まずはお気軽にお問い合わせください。
                </p>
            </div>

            <!-- Contact Form Area -->
            <div class="bg-white/80 backdrop-blur-xl p-6 md:p-12 rounded-2xl shadow-xl border border-white w-full">
                <?php
                // 固定ページの本文（ショートコードなど）を表示
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
                ?>
                
                <?php /* Contact Form 7 を使用しない場合の代替HTML（開発用） */ ?>
                <?php if ( ! shortcode_exists( 'contact-form-7' ) ) : ?>
                    <form action="#" method="POST" class="space-y-6 w-full">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="name" class="text-xs font-bold text-slate-500 block">お名前 <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" class="form-input w-full" placeholder="山田 太郎" required>
                            </div>
                            <div class="space-y-2">
                                <label for="company" class="text-xs font-bold text-slate-500 block">貴社名</label>
                                <input type="text" id="company" name="company" class="form-input w-full" placeholder="〇〇株式会社">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="text-xs font-bold text-slate-500 block">メールアドレス <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" class="form-input w-full" placeholder="info@example.com" required>
                        </div>

                        <div class="space-y-2">
                            <label for="category" class="text-xs font-bold text-slate-500 block">ご相談内容 <span class="text-red-500">*</span></label>
                            <div class="relative w-full">
                                <select id="category" name="category" class="form-input w-full appearance-none cursor-pointer">
                                    <option value="" disabled selected>選択してください</option>
                                    <option value="web">Webサイト制作・リニューアル</option>
                                    <option value="system">システム・アプリ開発</option>
                                    <option value="marketing">SNS・Webマーケティング</option>
                                    <option value="dx">LINE公式・DX支援</option>
                                    <option value="other">その他</option>
                                </select>
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="message" class="text-xs font-bold text-slate-500 block">お問い合わせ内容 <span class="text-red-500">*</span></label>
                            <textarea id="message" name="message" rows="5" class="form-input w-full" placeholder="プロジェクトの概要やご予算、納期のご希望などをご記入ください。" required></textarea>
                        </div>

                        <div class="pt-4 text-center">
                            <button type="submit" class="inline-flex items-center justify-center gap-3 px-16 py-4 bg-blue-600 text-white font-bold rounded-full hover:bg-blue-700 transition-all duration-300 hover-magnetic shadow-lg hover:shadow-blue-200 w-full md:w-auto">
                                <span>送信する</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                            </button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>

            <!-- Phone Info -->
            <div class="mt-12 text-center">
                <p class="text-xs font-bold text-slate-400 mb-2">お電話でのお問い合わせ</p>
                <a href="tel:08052738522" class="text-2xl font-black text-slate-900 hover:text-blue-600 transition-colors font-mono tracking-wider">080-5273-8522</a>
                <p class="text-xs text-slate-400 mt-1">（代表：山本）</p>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>