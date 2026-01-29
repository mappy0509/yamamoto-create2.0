<?php
/**
 * Template Name: LP Template
 */
get_header(); ?>

<!-- LP Specific Config & Styles -->
<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['"Noto Sans JP"', 'sans-serif'],
                },
                colors: {
                    brand: {
                        navy: '#0f172a',
                        blue: '#1e40af',
                        gold: '#f59e0b',
                        light: '#f8fafc',
                    }
                }
            }
        }
    }
</script>
<style>
    .hero-bg {
        background-image: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.85)), url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2426&q=80');
        background-size: cover;
        background-position: center;
    }

    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    /* 修正版: 確実な選択スタイルの適用 */
    .simulator-option:checked+div {
        border-color: #f59e0b;
        /* brand-gold */
        background-color: #fffbeb;
        /* amber-50 */
        box-shadow: 0 4px 6px -1px rgba(245, 158, 11, 0.1), 0 2px 4px -1px rgba(245, 158, 11, 0.06);
    }

    .simulator-option:checked+div .check-circle {
        background-color: #f59e0b;
        border-color: #f59e0b;
    }

    .simulator-option:checked+div .check-icon {
        opacity: 1;
    }

    .simulator-option:checked+div .option-title {
        color: #1e40af;
        /* brand-blue */
    }
</style>

<div class="font-sans text-slate-800 bg-white">
    <!-- Hero Section -->
    <section class="hero-bg h-screen min-h-[600px] flex items-center justify-center text-white pt-16">
        <div class="container mx-auto px-4 text-center">
            <div
                class="inline-block bg-brand-gold text-white px-3 py-1 rounded-sm text-sm font-bold mb-6 tracking-wider">
                宅建士監修/フルオーダー開発
            </div>
            <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight text-shadow">
                AI搭載で変わる<br>不動産ホームページ
            </h1>
            <p class="text-lg md:text-2xl mb-10 text-slate-200 font-medium">
                人工知能の搭載でウェブサイトは生まれ変わる。<br>
                宅建士保有のエンジニアが御社のサイトを<br>
                オーダーメイド開発
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="#contact"
                    class="bg-brand-gold text-white text-lg font-bold px-10 py-4 rounded-lg shadow-xl hover:bg-amber-600 transition transform hover:-translate-y-1">
                    デモサイトを見る
                </a>
                <a href="#solutions"
                    class="bg-white/10 backdrop-blur-md border border-white/30 text-white text-lg font-bold px-10 py-4 rounded-lg hover:bg-white/20 transition">
                    機能詳細へ
                </a>
            </div>
        </div>
    </section>

    <!-- Benefits/All-in-One Section -->
    <section id="problems" class="py-20 bg-brand-light">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-brand-gold font-bold tracking-widest uppercase text-sm">ALL IN ONE SOLUTION</span>
                <h2 class="text-3xl md:text-4xl font-bold text-brand-navy mt-2 mb-4">
                    ホームページ、物件管理、顧客対応。<br>
                    AIの力で、すべて「欲張り」ませんか？
                </h2>
                <p class="text-slate-600 text-lg">
                    外部の有料サービスはもう不要。<br>
                    集客も、業務効率化も、たった一つのWebサイトで完結します。
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Benefit 0 -->
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden border-t-4 border-brand-blue group hover:-translate-y-1 transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <!-- ローカル画像参照に変更: img/lp_img2.png -->
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/lp_img2.png" alt="公式ホームページ制作"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-6 relative pt-10 text-center">
                        <div
                            class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-brand-blue text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl shadow-lg border-4 border-white">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-3 text-brand-navy">信頼を獲得する<br>「公式ホームページ」として</h3>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            スマホ完全対応のオリジナルデザイン。会社概要、スタッフ紹介、ブログ機能など標準装備。<br>
                            <strong class="text-brand-blue">「ちゃんとした会社」という信頼感を醸成します。</strong>
                        </p>
                    </div>
                </div>

                <!-- Benefit 1 -->
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden border-t-4 border-brand-blue group hover:-translate-y-1 transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <!-- ローカル画像参照に変更: img/lp_img3.png -->
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/lp_img3.png" alt="物件管理システム"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-6 relative pt-10 text-center">
                        <div
                            class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-brand-blue text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl shadow-lg border-4 border-white">
                            <i class="fas fa-server"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-3 text-brand-navy">高機能な<br>「物件管理システム」として</h3>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            AI OCRが図面を読み取り、一瞬でデータベース化。レインズ連動やポータル掲載もスムーズに。<br>
                            <strong class="text-brand-blue">もう、高額な管理ソフトを別途契約する必要はありません。</strong>
                        </p>
                    </div>
                </div>

                <!-- Benefit 2 -->
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden border-t-4 border-brand-blue group hover:-translate-y-1 transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <!-- ローカル画像参照に変更: img/lp_img4.png -->
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/lp_img4.png" alt="業者間対応"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-6 relative pt-10 text-center">
                        <div
                            class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-brand-blue text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl shadow-lg border-4 border-white">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-3 text-brand-navy">24時間働く<br>「業者対応システム」として</h3>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            業者間（B2B）サイト機能も内蔵。図面配布、鍵情報の照会、広告承諾を完全自動化。<br>
                            <strong class="text-brand-blue">電話対応を待つことなく、取引を加速させます。</strong>
                        </p>
                    </div>
                </div>

                <!-- Benefit 3 -->
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden border-t-4 border-brand-blue group hover:-translate-y-1 transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <!-- ローカル画像参照に変更: img/lp_img5.png -->
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/lp_img5.png" alt="顧客管理CRM"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-6 relative pt-10 text-center">
                        <div
                            class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-brand-blue text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl shadow-lg border-4 border-white">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-3 text-brand-navy">成約に繋げる<br>「顧客管理(CRM)」として</h3>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            問い合わせ対応から追客、日程調整までAIにお任せ。顧客の動きを自動で記録し可視化。<br>
                            <strong class="text-brand-blue">営業マンは「最も熱い客」へのクロージングだけに集中できます。</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Solutions Section -->
    <section id="solutions" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-brand-blue font-bold tracking-widest uppercase text-sm">SOLUTION</span>
                <h2 class="text-3xl md:text-4xl font-bold text-brand-navy mt-2">YAMAMOTO CREATEの解決策</h2>
                <p class="text-slate-600 mt-4">エンジニアが作るから実装できる、業務DX機能とAIオプション</p>
            </div>

            <!-- Feature 1: AI OCR -->
            <div class="flex flex-col md:flex-row items-center gap-12 mb-20">
                <div class="w-full md:w-1/2 relative">
                    <div class="bg-slate-100 rounded-lg p-6 shadow-inner border border-slate-200">
                        <!-- Mock UI -->
                        <div class="flex items-center space-x-2 mb-4 border-b pb-4">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                            <div class="w-3 h-3 rounded-full bg-green-400"></div>
                            <span class="text-xs text-slate-400 ml-2">AI物件登録アシスタント</span>
                        </div>
                        <div
                            class="border-2 border-dashed border-brand-blue bg-blue-50 h-40 rounded flex flex-col items-center justify-center text-brand-blue">
                            <i class="fas fa-file-pdf text-3xl mb-2"></i>
                            <span class="font-bold">マイソク(PDF/画像)をドロップ</span>
                            <span class="text-xs mt-1">またはポータル情報のテキストを貼付</span>
                        </div>
                        <div class="mt-4 space-y-2">
                            <div class="flex justify-between text-xs text-slate-600">
                                <span>AI解析中 (OCR & Text Mining)...</span>
                                <span>80%</span>
                            </div>
                            <div class="h-2 bg-slate-200 rounded-full overflow-hidden">
                                <div class="h-full bg-indigo-500 w-4/5"></div>
                            </div>
                            <div class="bg-white p-3 rounded border text-xs text-slate-500 mt-3 shadow-sm">
                                <div class="flex justify-between border-b pb-1 mb-1">
                                    <span>価格:</span> <span class="font-bold text-slate-800">3,480万円</span>
                                </div>
                                <div class="flex justify-between border-b pb-1 mb-1">
                                    <span>間取:</span> <span class="font-bold text-slate-800">3LDK</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>住所:</span> <span class="font-bold text-slate-800">福岡市中央区...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Badge -->
                    <div class="absolute -top-4 -left-4 bg-brand-navy text-white px-4 py-2 font-bold rounded shadow-lg">
                        Feature 01
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <h3 class="text-2xl font-bold text-brand-navy mb-4">
                        <span class="text-brand-gold">入力革命。</span><br>
                        AIが図面を自動読取
                    </h3>
                    <p class="text-slate-600 mb-6 leading-relaxed">
                        もう手入力は不要です。マイソク（販売図面）のPDFや画像をドラッグ＆ドロップするだけ。<br>
                        <strong>AI（OCR技術）が「価格」「住所」「間取り」「平米数」を自動で読み取り</strong>、入力項目を埋めます。<br>
                        さらに、ポータルサイトのテキストをコピペしてAIに分析させることも可能。<br>
                        <strong class="text-brand-blue bg-blue-50 px-1">人間が行っていた「目視→転記」の作業をゼロにします。</strong>
                    </p>
                </div>
            </div>

            <!-- Feature 2: B2B Page -->
            <div class="flex flex-col md:flex-row-reverse items-center gap-12 mb-20">
                <div class="w-full md:w-1/2 relative">
                    <div class="bg-white rounded-lg p-6 shadow-xl border border-slate-100">
                        <!-- Mock UI -->
                        <div class="text-center mb-6">
                            <h4 class="font-bold text-slate-700">仲介業者様専用ページ</h4>
                            <p class="text-xs text-slate-400">要パスワード認証</p>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div
                                class="bg-slate-50 p-4 rounded text-center hover:bg-slate-100 cursor-pointer border border-slate-200">
                                <i class="fas fa-file-pdf text-red-500 text-2xl mb-2"></i>
                                <div class="text-xs font-bold">図面ダウンロード</div>
                            </div>
                            <div
                                class="bg-slate-50 p-4 rounded text-center hover:bg-slate-100 cursor-pointer border border-slate-200">
                                <i class="fas fa-key text-brand-gold text-2xl mb-2"></i>
                                <div class="text-xs font-bold">鍵情報の確認</div>
                            </div>
                            <div
                                class="bg-slate-50 p-4 rounded text-center hover:bg-slate-100 cursor-pointer border border-slate-200">
                                <i class="fas fa-camera text-blue-500 text-2xl mb-2"></i>
                                <div class="text-xs font-bold">写真素材DL</div>
                            </div>
                            <div
                                class="bg-slate-50 p-4 rounded text-center hover:bg-slate-100 cursor-pointer border border-slate-200">
                                <i class="fas fa-bullhorn text-green-500 text-2xl mb-2"></i>
                                <div class="text-xs font-bold">広告転載申請</div>
                            </div>
                        </div>
                    </div>
                    <!-- Badge -->
                    <div
                        class="absolute -top-4 -right-4 bg-brand-navy text-white px-4 py-2 font-bold rounded shadow-lg">
                        Feature 02
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <h3 class="text-2xl font-bold text-brand-navy mb-4">
                        <span class="text-brand-gold">業者対応DX。</span><br>
                        電話対応を9割削減
                    </h3>
                    <p class="text-slate-600 mb-6 leading-relaxed">
                        「業者間（B2B）専用のログインページ」を実装します。
                        客付業者様はパスワードを入力するだけで、図面のダウンロード、キーボックス番号の確認、広告転載の申請が自己完結。<br>
                        <strong class="text-brand-blue bg-blue-50 px-1">電話もFAXも不要。24時間稼働する無人の事務員を配置するようなものです。</strong>
                    </p>
                </div>
            </div>

            <!-- Feature 3: Map Search -->
            <div class="flex flex-col md:flex-row items-center gap-12 mb-20">
                <div class="w-full md:w-1/2 relative">
                    <div
                        class="bg-slate-100 rounded-lg overflow-hidden shadow-lg border border-slate-200 aspect-video relative">
                        <!-- Mock Map -->
                        <div class="absolute inset-0 bg-blue-100 opacity-50"></div>
                        <!-- Pins -->
                        <div class="absolute top-1/3 left-1/4 text-red-500 text-2xl drop-shadow-md"><i
                                class="fas fa-map-marker-alt"></i></div>
                        <div class="absolute top-1/2 left-1/2 text-red-500 text-2xl drop-shadow-md"><i
                                class="fas fa-map-marker-alt"></i></div>
                        <div class="absolute bottom-1/3 right-1/4 text-red-500 text-2xl drop-shadow-md"><i
                                class="fas fa-map-marker-alt"></i></div>

                        <!-- Search Box Overlay -->
                        <div class="absolute top-4 left-4 right-4 bg-white p-2 rounded shadow flex items-center gap-2">
                            <i class="fas fa-search text-slate-400"></i>
                            <span class="text-xs text-slate-500">平尾小学校区 / 3LDK / 3000万円〜</span>
                        </div>
                    </div>
                    <!-- Badge -->
                    <div class="absolute -top-4 -left-4 bg-brand-navy text-white px-4 py-2 font-bold rounded shadow-lg">
                        Feature 03
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <h3 class="text-2xl font-bold text-brand-navy mb-4">
                        <span class="text-brand-gold">ポータル負けしない。</span><br>
                        詳細条件検索機能
                    </h3>
                    <p class="text-slate-600 mb-6 leading-relaxed">
                        「地図を見ながら探したい」「子供の学区内で探したい」。
                        そんなエンドユーザーの当たり前の要望に応える、高度な検索機能を自社サイトに標準装備。<br>
                        <strong class="text-brand-blue bg-blue-50 px-1">SUUMOやアットホームに逃げていた顧客を、自社サイトで囲い込みます。</strong>
                    </p>
                </div>
            </div>

            <!-- Feature 4: AI Assessment -->
            <div class="flex flex-col md:flex-row-reverse items-center gap-12 mb-20">
                <div class="w-full md:w-1/2 relative">
                    <div class="bg-slate-50 rounded-lg p-6 shadow-xl border border-slate-200">
                        <!-- Mock UI -->
                        <div class="flex flex-col space-y-4">
                            <div class="bg-white p-4 rounded shadow-sm border border-slate-100">
                                <h5 class="text-sm font-bold text-brand-navy mb-2">簡易査定シミュレーション</h5>
                                <div class="grid grid-cols-2 gap-2 text-xs">
                                    <div class="bg-slate-100 p-2 rounded">福岡市南区</div>
                                    <div class="bg-slate-100 p-2 rounded">マンション</div>
                                    <div class="bg-slate-100 p-2 rounded">70平米</div>
                                    <div class="bg-slate-100 p-2 rounded">築15年</div>
                                </div>
                                <div
                                    class="mt-4 bg-brand-gold text-white text-center py-2 rounded font-bold text-sm cursor-pointer">
                                    査定額を見る（無料）
                                </div>
                            </div>
                            <div class="bg-blue-50 p-3 rounded text-xs text-brand-blue border border-blue-100">
                                <i class="fas fa-info-circle mr-1"></i>
                                相場データからAIが瞬時に概算価格を算出。連絡先入力後に結果を表示し、リードを獲得します。
                            </div>
                        </div>
                    </div>
                    <!-- Badge -->
                    <div
                        class="absolute -top-4 -right-4 bg-brand-navy text-white px-4 py-2 font-bold rounded shadow-lg">
                        Feature 04
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <h3 class="text-2xl font-bold text-brand-navy mb-4">
                        <span class="text-brand-gold">売却案件も逃さない。</span><br>
                        AI自動査定機能
                    </h3>
                    <p class="text-slate-600 mb-6 leading-relaxed">
                        「まずは価格だけ知りたい」という売主様の心理を掴むAI査定機能を実装。
                        住所や面積を入力するだけで、AIが周辺相場から概算価格を即座に算出します。<br>
                        <strong>結果を見る前に連絡先入力を必須化することで、質の高い「売却見込み客」リストを自動で収集します。</strong>
                    </p>
                </div>
            </div>

            <!-- Feature 5: AI Chatbot -->
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="w-full md:w-1/2 relative">
                    <div
                        class="bg-slate-100 rounded-lg p-6 shadow-inner border border-slate-200 relative h-64 overflow-hidden">
                        <!-- Mock Chat -->
                        <div class="absolute bottom-0 right-0 left-0 p-4 space-y-3 bg-white/50 backdrop-blur">
                            <div class="flex items-start gap-2">
                                <div class="w-8 h-8 rounded-full bg-slate-300 flex-shrink-0"></div>
                                <div
                                    class="bg-slate-200 p-2 rounded-lg rounded-tl-none text-xs text-slate-700 max-w-[80%]">
                                    週末に見学できますか？
                                </div>
                            </div>
                            <div class="flex items-start gap-2 flex-row-reverse">
                                <div
                                    class="w-8 h-8 rounded-full bg-brand-blue flex items-center justify-center text-white text-xs flex-shrink-0">
                                    <i class="fas fa-robot"></i></div>
                                <div
                                    class="bg-brand-blue text-white p-2 rounded-lg rounded-tr-none text-xs max-w-[80%]">
                                    はい、可能です！今週末の空き状況をご案内しますね。<br>
                                    1. 土曜 10:00〜<br>
                                    2. 土曜 14:00〜
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Badge -->
                    <div class="absolute -top-4 -left-4 bg-brand-navy text-white px-4 py-2 font-bold rounded shadow-lg">
                        Feature 05
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <h3 class="text-2xl font-bold text-brand-navy mb-4">
                        <span class="text-brand-gold">24時間追客。</span><br>
                        AIチャットボット
                    </h3>
                    <p class="text-slate-600 mb-6 leading-relaxed">
                        営業時間外の問い合わせも取りこぼしません。
                        「校区は？」「ローンは？」といったよくある質問にAIが即答。さらに、見学予約の日程調整まで自動で行います。<br>
                        <strong>あなたの寝ている間も、AIが接客し、ホットな商談アポをカレンダーに入れておいてくれます。</strong>
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- Pricing / Simulator Section -->
    <section id="pricing" class="py-20 bg-slate-50">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-brand-navy mb-4">開発費用シミュレーター</h2>
                <p class="text-slate-600">
                    必要な機能を選択してください。<br>
                    概算お見積もりがリアルタイムで算出されます。
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 items-start relative">

                <!-- Options Area (Left Side) -->
                <div class="w-full lg:w-2/3">
                    <div class="grid md:grid-cols-2 gap-4">
                        <!-- Base Plan (Always Selected) -->
                        <div
                            class="md:col-span-2 bg-white border-2 border-brand-navy rounded-xl p-6 shadow-sm relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 bg-brand-navy text-white text-xs font-bold px-3 py-1 rounded-bl-lg">
                                必須</div>
                            <div class="flex justify-between items-start mb-2">
                                <div class="font-bold text-lg text-brand-navy flex items-center">
                                    <i class="fas fa-desktop text-slate-400 mr-2"></i>標準ホームページ制作
                                </div>
                                <div class="font-bold text-lg">30万円</div>
                            </div>
                            <p class="text-sm text-slate-500">オリジナルデザイン / スマホ対応 / ブログ機能 / 当社について / 会社概要 / 事業紹介 / NEWS機能
                                / お問い合わせフォーム</p>
                        </div>

                        <!-- Option 1: AI OCR -->
                        <label class="cursor-pointer relative group">
                            <input type="checkbox" class="peer sr-only simulator-option" data-price="45"
                                data-name="AI図面自動入力（OCR）">
                            <div
                                class="bg-white border-2 border-slate-200 rounded-xl p-5 h-full transition-all duration-200 hover:border-slate-300">
                                <div class="flex justify-between items-start mb-2">
                                    <div
                                        class="font-bold text-brand-navy group-hover:text-brand-blue transition flex items-center option-title">
                                        <i class="fas fa-file-import text-brand-blue mr-2 w-5"></i>AI図面自動入力
                                    </div>
                                    <div
                                        class="check-circle w-6 h-6 rounded-full border-2 border-slate-300 flex items-center justify-center text-white transition-colors">
                                        <i class="fas fa-check text-xs check-icon opacity-0 transition-opacity"></i>
                                    </div>
                                </div>
                                <div class="text-2xl font-bold text-brand-navy mb-1">45<span
                                        class="text-sm font-normal">万円</span></div>
                                <p class="text-xs text-slate-500">マイソク読取・CSV入力。入力時間を95%削減。</p>
                            </div>
                        </label>

                        <!-- Option 2: B2B Page -->
                        <label class="cursor-pointer relative group">
                            <input type="checkbox" class="peer sr-only simulator-option" data-price="35"
                                data-name="業者間専用（B2B）ページ">
                            <div
                                class="bg-white border-2 border-slate-200 rounded-xl p-5 h-full transition-all duration-200 hover:border-slate-300">
                                <div class="flex justify-between items-start mb-2">
                                    <div
                                        class="font-bold text-brand-navy group-hover:text-brand-blue transition flex items-center option-title">
                                        <i class="fas fa-users-cog text-brand-blue mr-2 w-5"></i>業者間専用ページ
                                    </div>
                                    <div
                                        class="check-circle w-6 h-6 rounded-full border-2 border-slate-300 flex items-center justify-center text-white transition-colors">
                                        <i class="fas fa-check text-xs check-icon opacity-0 transition-opacity"></i>
                                    </div>
                                </div>
                                <div class="text-2xl font-bold text-brand-navy mb-1">35<span
                                        class="text-sm font-normal">万円</span></div>
                                <p class="text-xs text-slate-500">電話・FAX対応を自動化。パスワード制限付き。</p>
                            </div>
                        </label>

                        <!-- Option 3: Map Search -->
                        <label class="cursor-pointer relative group">
                            <input type="checkbox" class="peer sr-only simulator-option" data-price="40"
                                data-name="詳細条件検索機能">
                            <div
                                class="bg-white border-2 border-slate-200 rounded-xl p-5 h-full transition-all duration-200 hover:border-slate-300">
                                <div class="flex justify-between items-start mb-2">
                                    <div
                                        class="font-bold text-brand-navy group-hover:text-brand-blue transition flex items-center option-title">
                                        <i class="fas fa-map-marked-alt text-brand-blue mr-2 w-5"></i>詳細条件検索機能
                                    </div>
                                    <div
                                        class="check-circle w-6 h-6 rounded-full border-2 border-slate-300 flex items-center justify-center text-white transition-colors">
                                        <i class="fas fa-check text-xs check-icon opacity-0 transition-opacity"></i>
                                    </div>
                                </div>
                                <div class="text-2xl font-bold text-brand-navy mb-1">40<span
                                        class="text-sm font-normal">万円</span></div>
                                <p class="text-xs text-slate-500">Googleマップ連動。ポータルサイト並みの機能。</p>
                            </div>
                        </label>

                        <!-- Option 4: AI Assessment -->
                        <label class="cursor-pointer relative group">
                            <input type="checkbox" class="peer sr-only simulator-option" data-price="30"
                                data-name="AI売却査定システム">
                            <div
                                class="bg-white border-2 border-slate-200 rounded-xl p-5 h-full transition-all duration-200 hover:border-slate-300">
                                <div class="flex justify-between items-start mb-2">
                                    <div
                                        class="font-bold text-brand-navy group-hover:text-brand-blue transition flex items-center option-title">
                                        <i class="fas fa-calculator text-brand-blue mr-2 w-5"></i>AI売却査定システム
                                    </div>
                                    <div
                                        class="check-circle w-6 h-6 rounded-full border-2 border-slate-300 flex items-center justify-center text-white transition-colors">
                                        <i class="fas fa-check text-xs check-icon opacity-0 transition-opacity"></i>
                                    </div>
                                </div>
                                <div class="text-2xl font-bold text-brand-navy mb-1">30<span
                                        class="text-sm font-normal">万円</span></div>
                                <p class="text-xs text-slate-500">住所入力で相場算出。売却リードを自動獲得。</p>
                            </div>
                        </label>

                        <!-- Option 5: AI Chatbot -->
                        <label class="cursor-pointer relative group">
                            <input type="checkbox" class="peer sr-only simulator-option" data-price="20"
                                data-name="AIチャットボット">
                            <div
                                class="bg-white border-2 border-slate-200 rounded-xl p-5 h-full transition-all duration-200 hover:border-slate-300">
                                <div class="flex justify-between items-start mb-2">
                                    <div
                                        class="font-bold text-brand-navy group-hover:text-brand-blue transition flex items-center option-title">
                                        <i class="fas fa-comments text-brand-blue mr-2 w-5"></i>AIチャットボット
                                    </div>
                                    <div
                                        class="check-circle w-6 h-6 rounded-full border-2 border-slate-300 flex items-center justify-center text-white transition-colors">
                                        <i class="fas fa-check text-xs check-icon opacity-0 transition-opacity"></i>
                                    </div>
                                </div>
                                <div class="text-2xl font-bold text-brand-navy mb-1">20<span
                                        class="text-sm font-normal">万円</span></div>
                                <p class="text-xs text-slate-500">24時間自動応答。見学予約調整まで。</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Result Area (Right Side / Sticky) -->
                <div class="w-full lg:w-1/3 lg:sticky lg:top-24 self-start">
                    <div class="bg-white rounded-xl shadow-xl border border-slate-200 overflow-hidden">
                        <div class="bg-brand-navy text-white p-4 text-center font-bold relative overflow-hidden">
                            概算お見積もり結果
                            <div
                                class="absolute -right-6 -top-6 w-20 h-20 bg-brand-blue rounded-full opacity-20 blur-xl">
                            </div>
                        </div>
                        <div class="p-6">
                            <!-- List -->
                            <div class="text-xs text-slate-400 mb-2 font-bold">選択中のプラン内訳:</div>
                            <ul id="selected-items" class="space-y-3 mb-6 border-b border-slate-100 pb-6 min-h-[100px]">
                                <li class="flex justify-between items-center text-sm text-slate-700">
                                    <span class="flex items-center"><i
                                            class="fas fa-desktop text-slate-400 mr-2 text-xs"></i>標準ホームページ制作</span>
                                    <span class="font-bold">30万円</span>
                                </li>
                                <!-- Dynamic items will appear here -->
                            </ul>

                            <!-- Total -->
                            <div class="flex justify-between items-end mb-2">
                                <span class="text-slate-600 font-bold">合計目安（税別）</span>
                                <span class="text-4xl font-black text-brand-gold leading-none tracking-tighter"
                                    id="total-price-display">30<span class="text-lg text-brand-navy">万円</span></span>
                            </div>

                            <!-- CTA -->
                            <a href="#contact"
                                class="block w-full bg-brand-gold text-white font-bold py-4 rounded-lg shadow-lg hover:bg-amber-600 transition transform hover:scale-[1.02] text-center mt-6 group">
                                この内容で相談する
                                <i
                                    class="fas fa-chevron-right ml-2 text-sm group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                        <div class="bg-slate-50 p-3 text-center border-t border-slate-100">
                            <p class="text-[10px] text-slate-400">※機能要件や仕様により変動する場合があります。<br>詳細はお問い合わせください。</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FAQ Section (New) -->
    <section id="faq" class="py-20 bg-white">
        <div class="container mx-auto px-4 max-w-5xl">
            <div class="text-center mb-16">
                <span class="text-brand-blue font-bold tracking-widest uppercase text-sm">Q & A</span>
                <h2 class="text-3xl font-bold text-brand-navy mt-2">よくある質問</h2>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Q1 -->
                <div class="bg-slate-50 rounded-xl p-6 border border-slate-100">
                    <h3 class="font-bold text-brand-navy text-lg mb-3 flex items-start">
                        <span
                            class="bg-brand-blue text-white rounded text-xs px-2 py-1 mr-3 mt-1 flex-shrink-0">Q1</span>
                        本当に30万円でホームページが作れるのですか？
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed pl-10">
                        はい、可能です。30万円のベースプランには、トップページ、会社概要、物件検索（基本）、ブログ機能、お問い合わせフォームなど、不動産業に必要な基本機能は全て含まれています。テンプレートの使い回しではなく、御社のブランドに合わせたオリジナルデザインで構築します。
                    </p>
                </div>

                <!-- Q2 -->
                <div class="bg-slate-50 rounded-xl p-6 border border-slate-100">
                    <h3 class="font-bold text-brand-navy text-lg mb-3 flex items-start">
                        <span
                            class="bg-brand-blue text-white rounded text-xs px-2 py-1 mr-3 mt-1 flex-shrink-0">Q2</span>
                        月額の管理費（ランニングコスト）はいくらかかりますか？
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed pl-10">
                        サーバー・ドメインの保守管理のみであれば、月額1.5万円（税別）〜承っております。AIチャットボットなどの外部APIを利用する機能を追加された場合は、従量課金分を含めたお見積りを事前にご提示します。他社のリース契約のような高額な月額費用は発生しません。
                    </p>
                </div>

                <!-- Q3 -->
                <div class="bg-slate-50 rounded-xl p-6 border border-slate-100">
                    <h3 class="font-bold text-brand-navy text-lg mb-3 flex items-start">
                        <span
                            class="bg-brand-blue text-white rounded text-xs px-2 py-1 mr-3 mt-1 flex-shrink-0">Q3</span>
                        今使っているドメイン（URL）はそのまま使えますか？
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed pl-10">
                        はい、そのまま引き継げます。ドメインの移管手続きや、サーバーの切り替え作業も弊社が代行しますので、専門的な知識は不要です。メールアドレスの設定などもサポートいたします。
                    </p>
                </div>

                <!-- Q4 -->
                <div class="bg-slate-50 rounded-xl p-6 border border-slate-100">
                    <h3 class="font-bold text-brand-navy text-lg mb-3 flex items-start">
                        <span
                            class="bg-brand-blue text-white rounded text-xs px-2 py-1 mr-3 mt-1 flex-shrink-0">Q4</span>
                        宅建士が作ると、具体的に何が良いのですか？
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed pl-10">
                        コミュニケーションコストが圧倒的に下がります。「元付・客付」「レインズ」「用途地域」などの専門用語が通じるため、説明の手間が省けます。また、不動産公取規約（広告規制）を意識したサイト設計ができるため、コンプライアンス面でも安心です。
                    </p>
                </div>

                <!-- Q5 -->
                <div class="bg-slate-50 rounded-xl p-6 border border-slate-100">
                    <h3 class="font-bold text-brand-navy text-lg mb-3 flex items-start">
                        <span
                            class="bg-brand-blue text-white rounded text-xs px-2 py-1 mr-3 mt-1 flex-shrink-0">Q5</span>
                        AIの図面読取は、どんな形式でも対応していますか？
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed pl-10">
                        PDF、JPGなどの一般的な画像データであれば高精度で読み取れます。手書き文字や、極端に画質が粗いFAX画像などは修正が必要な場合がありますが、ゼロから手入力するのに比べて大幅な時間短縮（95%削減）が可能です。
                    </p>
                </div>

                <!-- Q6 -->
                <div class="bg-slate-50 rounded-xl p-6 border border-slate-100">
                    <h3 class="font-bold text-brand-navy text-lg mb-3 flex items-start">
                        <span
                            class="bg-brand-blue text-white rounded text-xs px-2 py-1 mr-3 mt-1 flex-shrink-0">Q6</span>
                        既存のホームページに「システム」だけ追加できますか？
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed pl-10">
                        技術的には可能ですが、既存サイトの構造（WordPressのテーマやバージョン）によっては、作り直した方が費用を抑えられるケースが多いです。まずは無料診断にて、現在のサイト状況を確認させてください。
                    </p>
                </div>

                <!-- Q7 -->
                <div class="bg-slate-50 rounded-xl p-6 border border-slate-100">
                    <h3 class="font-bold text-brand-navy text-lg mb-3 flex items-start">
                        <span
                            class="bg-brand-blue text-white rounded text-xs px-2 py-1 mr-3 mt-1 flex-shrink-0">Q7</span>
                        IT導入補助金などは使えますか？
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed pl-10">
                        補助金の種類によっては、採択実績のあるパートナー行政書士を紹介し、申請サポートを行うことも可能ですので、お気軽にご相談ください。
                    </p>
                </div>

                <!-- Q8 -->
                <div class="bg-slate-50 rounded-xl p-6 border border-slate-100">
                    <h3 class="font-bold text-brand-navy text-lg mb-3 flex items-start">
                        <span
                            class="bg-brand-blue text-white rounded text-xs px-2 py-1 mr-3 mt-1 flex-shrink-0">Q8</span>
                        制作期間はどれくらいですか？
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed pl-10">
                        ベースプラン（HP制作のみ）であれば約1ヶ月〜1.5ヶ月での納品が可能です。AI図面読取システムなどのカスタマイズ開発を含む場合は、仕様にもよりますが2ヶ月〜3ヶ月程度が目安となります。
                    </p>
                </div>

                <!-- Q9 -->
                <div class="bg-slate-50 rounded-xl p-6 border border-slate-100">
                    <h3 class="font-bold text-brand-navy text-lg mb-3 flex items-start">
                        <span
                            class="bg-brand-blue text-white rounded text-xs px-2 py-1 mr-3 mt-1 flex-shrink-0">Q9</span>
                        福岡市外ですが、依頼できますか？
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed pl-10">
                        はい、全国対応可能です。ZoomやChatwork等でのオンライン打ち合わせで完結できます。福岡県内（福岡市、北九州市、久留米市など）であれば、直接お伺いしてのデモ説明も可能です。
                    </p>
                </div>

                <!-- Q10 -->
                <div class="bg-slate-50 rounded-xl p-6 border border-slate-100">
                    <h3 class="font-bold text-brand-navy text-lg mb-3 flex items-start">
                        <span
                            class="bg-brand-blue text-white rounded text-xs px-2 py-1 mr-3 mt-1 flex-shrink-0">Q10</span>
                        契約後のサポートはどうなっていますか？
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed pl-10">
                        納品後もチャットやメールでサポートいたします。「物件の登録方法がわからない」「バナーを変えたい」などのご相談に即座に対応します。エンジニア直通のホットラインがあるため、たらい回しにされる心配はありません。
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact" class="py-24 bg-brand-navy relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 20px 20px;"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">
                    無料相談・お見積もり
                </h2>
                <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                    シミュレーション結果を元に、詳細なご提案をさせていただきます。<br>
                    まずは以下のフォームよりご連絡ください。
                </p>
            </div>

            <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden p-8 md:p-12">
                <!-- Contact Form Code for Copy Paste -->
                <?php if ( shortcode_exists( 'contact-form-7' ) ) : ?>
                    <!-- User should replace this ID with their own -->
                    <?php echo do_shortcode('[contact-form-7 id="944f531" title="不動産システムお問い合わせフォーム"]'); ?>
                <?php else : ?>
                    <form action="#" method="POST" class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="your-name" class="text-xs font-bold text-slate-500 block">お名前 <span class="text-red-500">*</span></label>
                                <input type="text" id="your-name" name="your-name" class="form-input w-full bg-slate-50 border border-slate-200 rounded p-3" placeholder="山田 太郎" required>
                            </div>
                            <div class="space-y-2">
                                <label for="your-company" class="text-xs font-bold text-slate-500 block">貴社名</label>
                                <input type="text" id="your-company" name="your-company" class="form-input w-full bg-slate-50 border border-slate-200 rounded p-3" placeholder="〇〇株式会社">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="your-email" class="text-xs font-bold text-slate-500 block">メールアドレス <span class="text-red-500">*</span></label>
                            <input type="email" id="your-email" name="your-email" class="form-input w-full bg-slate-50 border border-slate-200 rounded p-3" placeholder="info@example.com" required>
                        </div>

                        <div class="space-y-2">
                            <label for="your-message" class="text-xs font-bold text-slate-500 block">お問い合わせ内容</label>
                            <textarea id="your-message" name="your-message" rows="5" class="form-input w-full bg-slate-50 border border-slate-200 rounded p-3" placeholder="その他ご要望などがございましたらご記入ください。"></textarea>
                        </div>

                        <!-- Hidden Fields for Simulation Integration (JS targets these IDs) -->
                        <div class="hidden-fields p-4 bg-slate-100 rounded border border-slate-200 text-sm hidden">
                            <label class="block font-bold mb-1">選択プラン（自動入力）</label>
                            <textarea id="selected_plans" name="selected_plans" class="w-full h-20 mb-2"></textarea>
                            <label class="block font-bold mb-1">概算費用（自動入力）</label>
                            <input type="text" id="estimated_cost" name="estimated_cost" class="w-full">
                        </div>

                        <div class="pt-4 text-center">
                            <button type="submit" class="inline-block w-full md:w-auto bg-brand-gold text-white text-xl font-bold px-12 py-4 rounded-lg shadow-lg hover:bg-amber-600 transition transform hover:scale-105">
                                上記の内容で送信する
                            </button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>

<!-- Simulator Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.simulator-option');
        const totalPriceDisplay = document.getElementById('total-price-display');
        const selectedItemsContainer = document.getElementById('selected-items');
        const basePrice = 30; // 30万円

        function updateSimulator() {
            let total = basePrice;
            // Start with base item
            let selectedHTML = `
                <li class="flex justify-between items-center text-sm text-slate-700">
                    <span class="flex items-center"><i class="fas fa-desktop text-slate-400 mr-2 text-xs"></i>標準ホームページ制作</span>
                    <span class="font-bold">30万円</span>
                </li>
            `;

            checkboxes.forEach(box => {
                if (box.checked) {
                    const price = parseInt(box.getAttribute('data-price'));
                    const name = box.getAttribute('data-name');
                    total += price;

                    // Add list item
                    selectedHTML += `
                        <li class="flex justify-between items-center text-sm text-brand-navy font-medium animate-fadeIn bg-slate-50 p-2 rounded">
                            <span class="flex items-center"><i class="fas fa-check text-brand-gold mr-2 text-xs"></i>${name}</span>
                            <span class="font-bold">${price}万円</span>
                        </li>
                    `;
                }
            });

            // Update List
            selectedItemsContainer.innerHTML = selectedHTML;

            // Animate Total Price
            const currentTotal = parseInt(totalPriceDisplay.innerText);
            animateValue(totalPriceDisplay, currentTotal, total, 400);

            // Update Hidden Fields in Contact Form
            updateContactFormFields(total, checkboxes);
        }

        function updateContactFormFields(total, checkboxes) {
            const costField = document.getElementById('estimated_cost');
            const plansField = document.getElementById('selected_plans');
            
            if (costField) {
                costField.value = total + '万円';
            }

            if (plansField) {
                let plansText = "【基本プラン】標準ホームページ制作: 30万円\n";
                checkboxes.forEach(box => {
                    if (box.checked) {
                        const price = box.getAttribute('data-price');
                        const name = box.getAttribute('data-name');
                        plansText += `【追加オプション】${name}: ${price}万円\n`;
                    }
                });
                plansText += `\n合計概算費用: ${total}万円`;
                plansField.value = plansText;
            }
        }

        function animateValue(obj, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const currentValue = Math.floor(progress * (end - start) + start);
                obj.innerHTML = `${currentValue}<span class="text-lg text-brand-navy">万円</span>`;
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        checkboxes.forEach(box => {
            box.addEventListener('change', updateSimulator);
        });
    });
</script>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(5px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.2s ease-out forwards;
    }
</style>
