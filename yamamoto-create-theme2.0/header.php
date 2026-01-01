<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&family=JetBrains+Mono:wght@400;700&family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
    
    <style>
        /* テーマ独自のスタイル定義 (style.css 以外に必要な動的要素など) */
        :root { --cursor-size: 20px; --cursor-hover-size: 60px; --primary: #3b82f6; }
        body { margin: 0; background-color: #f8fafc; color: #0f172a; font-family: 'Inter', 'Noto Sans JP', sans-serif; overflow-x: hidden; cursor: none; }
        
        /* カーソル */
        #cursor { position: fixed; top: 0; left: 0; width: var(--cursor-size); height: var(--cursor-size); border: 1px solid rgba(15, 23, 42, 0.4); border-radius: 50%; pointer-events: none; z-index: 9999; transform: translate(-50%, -50%); transition: width 0.3s, height 0.3s, background-color 0.3s, border-color 0.3s; background-color: transparent; }
        #cursor-dot { position: fixed; top: 0; left: 0; width: 4px; height: 4px; background-color: #0f172a; border-radius: 50%; pointer-events: none; z-index: 10000; transform: translate(-50%, -50%); }
        body.hovering #cursor { width: var(--cursor-hover-size); height: var(--cursor-hover-size); background-color: rgba(59, 130, 246, 0.1); border-color: rgba(59, 130, 246, 0.3); }
        
        /* ユーティリティ */
        .font-mono { font-family: 'JetBrains Mono', monospace; }
        .font-jp { font-family: 'Noto Sans JP', sans-serif; }
        #webgl-canvas { position: fixed; top: 0; left: 0; width: 100%; height: 100vh; z-index: -1; opacity: 0.8; }
        .glass-panel { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.8); box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); }
        .tracking-wider-jp { letter-spacing: 0.1em; }
        .menu-grid-bg { background-image: linear-gradient(rgba(15, 23, 42, 0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(15, 23, 42, 0.05) 1px, transparent 1px); background-size: 40px 40px; }
        .hover-magnetic-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .hover-magnetic-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px -10px rgba(59, 130, 246, 0.15); }
        
        /* ローダー */
        #loader { position: fixed; inset: 0; background: #ffffff; z-index: 10000; display: flex; justify-content: center; align-items: center; flex-direction: column; }
        .loader-bar { width: 0%; height: 2px; background: #3b82f6; transition: width 0.1s; }
    </style>
    
    <!-- Three.js Import Map -->
    <script type="importmap">
        { "imports": { "three": "https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.module.js" } }
    </script>
</head>

<body <?php body_class('antialiased selection:bg-blue-500 selection:text-white'); ?>>
    <?php wp_body_open(); ?>

    <!-- Custom Cursor -->
    <div id="cursor"></div>
    <div id="cursor-dot"></div>

    <!-- Loading Screen (Only show on front page) -->
    <?php if ( is_front_page() ) : ?>
    <div id="loader">
        <div class="font-mono text-blue-600 text-sm mb-4 tracking-widest">INITIALIZING...</div>
        <div class="w-64 h-[2px] bg-slate-100 relative overflow-hidden">
            <div class="loader-bar absolute top-0 left-0 h-full w-full"></div>
        </div>
        <div class="font-mono text-slate-400 text-xs mt-2" id="loader-percent">00%</div>
    </div>
    <?php endif; ?>

    <!-- Background WebGL -->
    <canvas id="webgl-canvas"></canvas>

    <!-- Header -->
    <header class="fixed top-0 w-full z-50 px-6 py-4 md:px-12 flex justify-between items-center bg-white/70 backdrop-blur-md border-b border-white/40 transition-all duration-300">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-lg md:text-xl font-black tracking-tighter hover-magnetic text-slate-900 group relative z-[60]" data-strength="20">
            YAMAMOTO <span class="text-blue-600 group-hover:text-blue-500 transition-colors">CREATE</span>
        </a>
        
        <!-- Desktop Nav -->
        <nav class="hidden md:flex gap-8 items-center text-slate-800">
            <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="text-xs font-bold hover:text-blue-600 transition-colors hover-magnetic tracking-wider-jp">NEWS</a>
            <a href="<?php echo is_front_page() ? '#services' : esc_url( home_url( '/#services' ) ); ?>" class="text-xs font-bold hover:text-blue-600 transition-colors hover-magnetic tracking-wider-jp">事業内容</a>
            <a href="<?php echo esc_url( home_url( '/works/' ) ); ?>" class="text-xs font-bold hover:text-blue-600 transition-colors hover-magnetic tracking-wider-jp">制作実績</a>
            <a href="<?php echo is_front_page() ? '#about' : esc_url( home_url( '/#about' ) ); ?>" class="text-xs font-bold hover:text-blue-600 transition-colors hover-magnetic tracking-wider-jp">会社概要</a>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="px-6 py-2.5 bg-slate-900 text-white rounded-full text-xs font-bold hover:bg-blue-600 hover:shadow-lg transition-all hover-magnetic tracking-wider-jp">お問い合わせ</a>
        </nav>

        <!-- Mobile Menu Button -->
        <button id="menu-toggle" class="md:hidden relative z-[60] w-10 h-10 flex flex-col justify-center items-end gap-1.5 group hover-magnetic">
            <span class="w-8 h-0.5 bg-slate-900 transition-all duration-300 origin-center group-[.active]:rotate-45 group-[.active]:translate-y-2"></span>
            <span class="w-6 h-0.5 bg-slate-900 transition-all duration-300 group-[.active]:opacity-0"></span>
            <span class="w-8 h-0.5 bg-slate-900 transition-all duration-300 origin-center group-[.active]:-rotate-45 group-[.active]:-translate-y-2"></span>
        </button>
    </header>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="fixed inset-0 z-50 pointer-events-none flex flex-col justify-center items-center overflow-hidden">
        <div class="menu-curtain absolute inset-0 bg-slate-900 transform -translate-y-full z-20"></div>
        <div class="menu-curtain absolute inset-0 bg-blue-600 transform -translate-y-full z-10"></div>
        
        <div class="menu-content relative z-30 w-full h-full bg-white opacity-0 flex flex-col justify-center px-8 menu-grid-bg">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-600 to-purple-600"></div>
            
            <nav class="flex flex-col gap-6 text-center md:text-left">
                <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="mobile-link text-4xl font-black text-slate-900 tracking-tighter hover:text-blue-600 transition-colors font-jp opacity-0 translate-y-4 inline-block">NEWS <span class="text-sm font-normal text-slate-400 block tracking-widest mt-1 font-mono">LATEST INFO</span></a>
                <a href="<?php echo is_front_page() ? '#services' : esc_url( home_url( '/#services' ) ); ?>" class="mobile-link text-4xl font-black text-slate-900 tracking-tighter hover:text-blue-600 transition-colors font-jp opacity-0 translate-y-4 inline-block">SERVICES <span class="text-sm font-normal text-slate-400 block tracking-widest mt-1 font-mono">事業内容</span></a>
                <a href="<?php echo esc_url( home_url( '/works/' ) ); ?>" class="mobile-link text-4xl font-black text-slate-900 tracking-tighter hover:text-blue-600 transition-colors font-jp opacity-0 translate-y-4 inline-block">WORKS <span class="text-sm font-normal text-slate-400 block tracking-widest mt-1 font-mono">制作実績</span></a>
                <a href="<?php echo is_front_page() ? '#about' : esc_url( home_url( '/#about' ) ); ?>" class="mobile-link text-4xl font-black text-slate-900 tracking-tighter hover:text-blue-600 transition-colors font-jp opacity-0 translate-y-4 inline-block">ABOUT <span class="text-sm font-normal text-slate-400 block tracking-widest mt-1 font-mono">会社概要</span></a>
            </nav>

            <div class="mt-12 w-full max-w-xs mx-auto opacity-0 translate-y-4 mobile-cta">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="block w-full py-4 bg-slate-900 text-white font-bold text-center rounded-full shadow-lg">お問い合わせ</a>
            </div>

            <div class="absolute bottom-8 left-0 w-full text-center text-xs font-mono text-slate-400 opacity-0 mobile-footer">
                &copy; <?php echo date('Y'); ?> YAMAMOTO CREATE INC.
            </div>
        </div>
    </div>