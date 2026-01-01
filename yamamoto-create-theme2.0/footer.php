<!-- Common Footer -->
    <footer id="main-footer" class="py-10 px-6 md:px-20 relative z-10 text-center border-t border-slate-200 bg-slate-50">
        <div class="flex flex-col md:flex-row justify-between items-center text-xs text-slate-500 font-bold max-w-6xl mx-auto">
            <div class="flex gap-6 mb-4 md:mb-0">
                <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="hover:text-blue-600 transition-colors">プライバシーポリシー</a>
                <a href="<?php echo esc_url( home_url( '/law/' ) ); ?>" class="hover:text-blue-600 transition-colors">特商法に基づく表記</a>
            </div>
            <p>&copy; <?php echo date('Y'); ?> YAMAMOTO CREATE.</p>
        </div>
    </footer>

    <?php wp_footer(); ?>

    <!-- Main JavaScript Logic -->
    <script type="module">
        import * as THREE from 'three';

        // --- Router Logic (Simulated for WP Single Page feel if needed, primarily for static demo but kept for transitions) ---
        // WordPressでは基本ページ遷移を行いますが、フェードイン演出などをここに記述します
        document.addEventListener('DOMContentLoaded', () => {
            const pageSection = document.querySelector('.page-section');
            if(pageSection) {
                gsap.to(pageSection, { opacity: 1, duration: 0.5, delay: 0.2 });
            }
        });

        // --- Custom Cursor ---
        const cursor = document.getElementById('cursor');
        const cursorDot = document.getElementById('cursor-dot');
        const magneticElements = document.querySelectorAll('.hover-magnetic, a, button, input, textarea, select');
        let mouseX = 0, mouseY = 0, cursorX = 0, cursorY = 0;

        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX; mouseY = e.clientY;
            if(cursorDot) {
                cursorDot.style.left = mouseX + 'px'; cursorDot.style.top = mouseY + 'px';
            }
        });

        function animateCursor() {
            if(!cursor) return;
            cursorX += (mouseX - cursorX) * 0.15;
            cursorY += (mouseY - cursorY) * 0.15;
            cursor.style.left = cursorX + 'px'; cursor.style.top = cursorY + 'px';
            requestAnimationFrame(animateCursor);
        }
        animateCursor();

        magneticElements.forEach(el => {
            el.addEventListener('mouseenter', () => {
                document.body.classList.add('hovering');
            });
            el.addEventListener('mouseleave', () => {
                document.body.classList.remove('hovering');
            });
        });

        // --- Three.js Background ---
        const canvas = document.getElementById('webgl-canvas');
        if (canvas) {
            const scene = new THREE.Scene();
            scene.background = new THREE.Color(0xf8fafc); 
            scene.fog = new THREE.FogExp2(0xf8fafc, 0.002);
            const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            camera.position.z = 50;
            const renderer = new THREE.WebGLRenderer({ canvas, alpha: true, antialias: true });
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

            const particlesGeometry = new THREE.BufferGeometry();
            const posArray = new Float32Array(3000 * 3);
            for(let i=0; i<3000*3; i++) posArray[i] = (Math.random() - 0.5) * 150;
            particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
            const particlesMesh = new THREE.Points(particlesGeometry, new THREE.PointsMaterial({ size: 0.25, color: 0x3b82f6, transparent: true, opacity: 0.8 }));
            scene.add(particlesMesh);

            const plane = new THREE.Mesh(new THREE.PlaneGeometry(200, 200, 40, 40), new THREE.MeshBasicMaterial({ color: 0x94a3b8, wireframe: true, transparent: true, opacity: 0.15 }));
            plane.rotation.x = -Math.PI / 2; plane.position.y = -20;
            scene.add(plane);

            let targetX = 0, targetY = 0;
            document.addEventListener('mousemove', (e) => {
                targetX = (e.clientX - window.innerWidth/2) * 0.001;
                targetY = (e.clientY - window.innerHeight/2) * 0.001;
            });

            const clock = new THREE.Clock();
            function animate() {
                const time = clock.getElapsedTime();
                particlesMesh.rotation.y = time * 0.05;
                particlesMesh.rotation.x = targetY * 0.5;
                particlesMesh.rotation.y += targetX * 0.5;
                
                const pos = plane.geometry.attributes.position;
                for(let i=0; i<pos.count; i++) {
                    const x = pos.getX(i); const y = pos.getY(i);
                    pos.setZ(i, (0.5 * Math.sin(x*0.1 + time) + 0.5 * Math.sin(y*0.1 + time)) * 5);
                }
                pos.needsUpdate = true;
                renderer.render(scene, camera);
                requestAnimationFrame(animate);
            }
            animate();
            window.addEventListener('resize', () => {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, window.innerHeight);
            });
        }

        // --- Text Scramble & Loader ---
        const chars = '!<>-_\\/[]{}—=+*^?#________'; 
        function scrambleText(el) {
            const original = el.innerText;
            const len = original.length;
            const tl = gsap.timeline();
            let obj = { val: 0 };
            tl.to(obj, { val: 1, duration: 1.5, ease: "power2.inOut", onUpdate: () => {
                let res = "";
                for(let i=0; i<len; i++) res += (obj.val * len > i) ? original[i] : chars[Math.floor(Math.random() * chars.length)];
                el.innerText = res;
            }});
        }

        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            const bar = document.querySelector('.loader-bar');
            const pct = document.getElementById('loader-percent');
            
            if(loader && bar && pct) {
                let p = 0;
                const int = setInterval(() => {
                    p += Math.random() * 10;
                    if(p > 100) p = 100;
                    bar.style.width = p + '%'; pct.innerText = Math.floor(p) + '%';
                    if(p === 100) {
                        clearInterval(int);
                        setTimeout(() => {
                            gsap.to(loader, { yPercent: -100, duration: 0.8, ease: "power4.inOut" });
                            document.querySelectorAll('.scramble-trigger').forEach(el => scrambleText(el));
                        }, 500);
                    }
                }, 50);
            } else {
                // If no loader (inner pages), just trigger animations
                document.querySelectorAll('.scramble-trigger').forEach(el => scrambleText(el));
            }
        });

        // --- Mobile Menu ---
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        if (menuToggle && mobileMenu) {
            let isMenuOpen = false;
            const menuTl = gsap.timeline({ paused: true });
            menuTl.to(mobileMenu, { pointerEvents: 'auto', duration: 0 })
                .to('.menu-curtain', { y: '0%', duration: 0.8, ease: 'power4.inOut', stagger: 0.1 })
                .to('.menu-content', { opacity: 1, duration: 0.5 }, '-=0.4')
                .to('.mobile-link', { y: 0, opacity: 1, duration: 0.6, stagger: 0.1, ease: 'power3.out' }, '-=0.3')
                .to('.mobile-cta', { y: 0, opacity: 1, duration: 0.6, ease: 'power3.out'}, '-=0.4')
                .to('.mobile-footer', { opacity: 1, duration: 0.6 }, '-=0.4');

            menuToggle.addEventListener('click', () => {
                isMenuOpen = !isMenuOpen;
                menuToggle.classList.toggle('active');
                if(isMenuOpen) { document.body.style.overflow = 'hidden'; menuTl.play(); }
                else { document.body.style.overflow = ''; menuTl.reverse(); }
            });
        }
    </script>
</body>
</html>