<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="color-scheme" content="light dark" />
    <title>{{ config('portfolio.name', 'Portfolio') }} — Backend & Systems</title>
    <meta name="description" content="Laravel Developer and Linux Systems Administrator. Backend architecture and server automation." />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Ryan Boc — Laravel Developer & Linux Systems Administrator">
    <meta property="og:description" content="Production Laravel systems, barcode traceability, APIs, reporting and Linux infrastructure.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('img/portfolio-preview.jpg') }}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    <meta name="twitter:card" content="summary_large_image">

    <style>
      :root,
      html[data-theme="light"] {
        color-scheme: light;
        --font-main: "Inter", system-ui, sans-serif;
        --font-mono: "JetBrains Mono", monospace;
        --container: 1200px;
        --radius: 14px;
        --space-lg: 88px;
        --space-xl: 104px;
        --bg: #f8fafc;
        --bg-alt: #f1f5f9;
        --bg-card: #ffffff;
        --fg: #0f172a;
        --muted: #475569;
        --muted-2: #64748b;
        --border: #dbe3ee;
        --brand: #2563eb;
        --brand-hover: #1d4ed8;
        --shadow-sm: 0 2px 8px rgba(15, 23, 42, 0.08);
        --shadow-md: 0 14px 30px rgba(15, 23, 42, 0.12);
        --shadow-lg: 0 24px 60px rgba(15, 23, 42, 0.14);
        --modal-background: #ffffff;
        --modal-panel: #f6f8fb;
        --modal-text: #172033;
        --modal-muted: #526072;
        --modal-border: #dce2ea;
        --modal-backdrop: rgba(15, 23, 42, 0.55);
      }

      html[data-theme="dark"] {
        color-scheme: dark;
        --bg: #0f172a;
        --bg-alt: #1e293b;
        --bg-card: #1e293b;
        --fg: #f8fafc;
        --muted: #cbd5e1;
        --muted-2: #64748b;
        --border: #334155;
        --brand: #3b82f6;
        --brand-hover: #60a5fa;
        --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.18);
        --shadow-md: 0 14px 30px rgba(0, 0, 0, 0.25);
        --shadow-lg: 0 24px 60px rgba(0, 0, 0, 0.32);
        --modal-background: #172235;
        --modal-panel: #111b2c;
        --modal-text: #f1f5f9;
        --modal-muted: #b5c0d0;
        --modal-border: #334155;
        --modal-backdrop: rgba(3, 10, 24, 0.82);
      }

      /* Global Reset */
      * { box-sizing: border-box; margin: 0; padding: 0; }
      html { scroll-behavior: smooth; }

      body {
        font-family: var(--font-main);
        background: var(--bg);
        color: var(--fg);
        line-height: 1.6;
        transition: background 0.3s, color 0.3s;
      }

      a { text-decoration: none; color: inherit; transition: color 0.2s; }
      ul { list-style: none; }

      .container {
        width: min(var(--container), calc(100% - 40px));
        margin: 0 auto;
      }

      /* === Typography === */
      h1, h2, h3 { line-height: 1.1; font-weight: 800; letter-spacing: -0.02em; color: var(--fg); }
      h1 { font-size: clamp(2rem, 5vw, 3.5rem); }
      h2 { font-size: clamp(1.5rem, 3vw, 2.25rem); margin-bottom: 10px; }
      p { color: var(--muted); margin-bottom: 20px; font-size: 1.05rem; }
      
      .text-mono { font-family: var(--font-mono); }
      .text-brand { color: var(--brand); }

      /* === Buttons === */
      .btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        border-radius: var(--radius);
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        border: 1px solid transparent;
        font-size: 0.95rem;
      }
      .btn-primary { background: var(--brand); color: white; box-shadow: var(--shadow-sm); }
      .btn-primary:hover { background: var(--brand-hover); transform: translateY(-1px); }
      
      .btn-outline { border-color: var(--border); background: transparent; color: var(--fg); }
      .btn-outline:hover { border-color: var(--muted); background: var(--bg-alt); }
      
      .btn-sm { padding: 8px 16px; font-size: 0.85rem; }

      /* === Header === */
      .site-header {
        position: sticky; top: 0; z-index: 100;
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid var(--border);
      }
      [data-theme="dark"] .site-header { background: rgba(15, 23, 42, 0.85); }
      
      .nav-inner { display: flex; justify-content: space-between; align-items: center; height: 70px; }
      .logo { font-weight: 800; font-size: 1.25rem; display: flex; align-items: center; gap: 8px; }
      
      .nav-links { display: flex; gap: 30px; }
      .nav-links a { font-weight: 500; font-size: 0.95rem; color: var(--muted); }
      .nav-links a:hover { color: var(--brand); }
      
      @media (max-width: 768px) { .nav-links { display: none; } }

      /* === Hero Section (Dot Pattern) === */
      .hero {
        padding: var(--space-xl) 0;
        background-image: radial-gradient(var(--muted-2) 1px, transparent 1px);
        background-size: 30px 30px; 
        background-position: 0 0;
        opacity: 0.9;
        border-bottom: 1px solid var(--border);
      }

      .hero-grid { display: grid; grid-template-columns: 1.2fr 0.8fr; gap: var(--space-lg); align-items: center; }
      
      /* Profile Card */
      .profile-card {
        background: var(--bg-card); border: 1px solid var(--border);
        padding: 30px; border-radius: var(--radius);
        box-shadow: var(--shadow-lg); text-align: center;
      }
      .profile-image {
        width: 100px; height: 100px; border-radius: 50%;
        display: block; margin: 0 auto 20px; object-fit: cover;
        border: 4px solid var(--bg-alt);
      }
      .profile-stats {
        display: flex; justify-content: space-around;
        margin-top: 20px; padding-top: 20px;
        border-top: 1px solid var(--border);
        gap: 16px;
      }
      .profile-stat { flex: 1; }
      .profile-stat strong { display: block; font-size: 1.1rem; color: var(--fg); }
      .profile-stat span { display: block; font-size: 0.72rem; text-transform: uppercase; color: var(--muted-2); letter-spacing: 0.08em; font-weight: 600; }

      /* === Projects (Grid) === */
      .section { padding: var(--space-lg) 0; }
      .section-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 40px; }
      
      .grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
      @media (max-width: 1100px) { .grid-4 { grid-template-columns: repeat(2, 1fr); } }
      @media (max-width: 600px) { .grid-4 { grid-template-columns: 1fr; } }
      
      .card {
        background: var(--bg-card); border: 1px solid var(--border);
        border-radius: var(--radius); overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
        height: 100%; display: flex; flex-direction: column;
      }
      .card:hover { transform: translateY(-5px); box-shadow: var(--shadow-md); border-color: var(--brand); }

      /* Terminal Thumbnails */
      .terminal-thumb {
        height: 160px; background: #1e293b;
        display: flex; align-items: center; justify-content: center;
        flex-direction: column; border-bottom: 1px solid var(--border);
        font-family: var(--font-mono); color: #94a3b8;
      }
      .terminal-thumb i { font-size: 3rem; margin-bottom: 10px; color: #e2e8f0; }
      .terminal-thumb span { font-size: 0.9rem; background: rgba(255,255,255,0.1); padding: 2px 8px; border-radius: 4px; }

      .card-body { padding: 24px; flex: 1; display: flex; flex-direction: column; }
      .card-body h3 { font-size: 1.25rem; margin-bottom: 12px; }
      
      .tags { display: flex; gap: 8px; flex-wrap: wrap; margin-top: auto; }
      .tag {
        font-size: 0.75rem; padding: 4px 10px; border-radius: 6px;
        background: var(--bg-alt); border: 1px solid var(--border);
        color: var(--muted); font-family: var(--font-mono); font-weight: 600;
      }

      /* === Services (Split) === */
      .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; }
      .service-item ul { margin-top: 16px; }
      .service-item li { margin-bottom: 10px; display: flex; align-items: center; gap: 10px; color: var(--muted); }
      .service-item li i { color: var(--brand); font-size: 0.8rem; }

      /* === Tech Stack (Pills) === */
      .stack-container { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 20px; }
      .stack-pill {
        display: flex; align-items: center; gap: 8px;
        padding: 8px 16px; background: var(--bg-card);
        border: 1px solid var(--border); border-radius: 8px;
        font-weight: 500; color: var(--fg);
      }
      .stack-pill i { color: var(--muted); }

      /* === Contact Form === */
      .contact-box {
        background: var(--bg-card); border: 1px solid var(--border);
        border-radius: var(--radius); padding: 40px;
        display: grid; grid-template-columns: 1fr 1.5fr; gap: 60px;
      }
      
      input, textarea {
        width: 100%; padding: 12px; margin-bottom: 16px;
        background: var(--bg-alt); border: 1px solid var(--border);
        border-radius: 8px; color: var(--fg); font-family: inherit;
        transition: border-color 0.2s;
      }
      input:focus, textarea:focus { outline: none; border-color: var(--brand); box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1); }
      
      .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

      /* === Utilities === */
      .toast {
        position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%) translateY(20px);
        background: #1e293b; color: #fff; padding: 10px 20px; border-radius: 50px;
        opacity: 0; pointer-events: none; transition: 0.3s; z-index: 200; font-size: 0.9rem;
      }
      .toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }

      /* === Case Study Grid & Modal === */
      .grid-3 { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 24px; }
      .grid-3 > .case-study-trigger { display: block; min-width: 0; color: inherit; text-decoration: none; }
      .grid-3 .card { height: 100%; display: flex; flex-direction: column; overflow: hidden; }
      .grid-3 .card-body { display: flex; flex: 1; flex-direction: column; }
      .grid-3 .tags { margin-top: auto; padding-top: 20px; }
      .case-study-link { display: flex; align-items: center; gap: 8px; margin-top: 18px; color: var(--brand); font-size: 0.9rem; font-weight: 700; }
      .case-study-link i { font-size: 0.75rem; transition: transform 0.2s ease; }
      .case-study-trigger:hover .case-study-link i { transform: translateX(4px); }
      
      .case-study-trigger {
        display: block; width: 100%; min-width: 0; padding: 0; border: 0;
        background: transparent; color: inherit; font: inherit; text-align: left; cursor: pointer;
      }
      .case-study-trigger .card { height: 100%; }
      .case-study-trigger:focus-visible { border-radius: 14px; outline: 3px solid var(--brand); outline-offset: 4px; }

      .case-study-modal {
        position: fixed; inset: 0; width: min(960px, calc(100% - 32px));
        max-height: calc(100vh - 40px); margin: auto; padding: 0;
        border: 1px solid var(--modal-border); border-radius: 18px;
        background: var(--modal-background); color: var(--modal-text);
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.35); overflow: hidden; z-index: 1000;
      }
      .case-study-modal[open] { animation: modal-in 0.2s ease-out; }
      .case-study-modal::backdrop { background: var(--modal-backdrop); backdrop-filter: blur(6px); }
      .case-study-modal-container { max-height: calc(100vh - 40px); overflow-y: auto; overscroll-behavior: contain; }
      
      .case-study-modal-header {
        position: sticky; top: 0; z-index: 2; display: flex; align-items: flex-start;
        justify-content: space-between; gap: 24px; padding: 28px 32px;
        background: var(--modal-background); border-bottom: 1px solid var(--modal-border);
      }
      .case-study-modal-header h2 { margin: 8px 0 0; font-size: clamp(1.6rem, 4vw, 2.3rem); line-height: 1.2; color: var(--modal-text); }
      .case-study-category { color: var(--brand); font-family: var(--font-mono); font-size: 0.8rem; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; }
      
      .case-study-close {
        display: grid; width: 42px; height: 42px; flex: 0 0 auto; place-items: center;
        border: 1px solid var(--modal-border); border-radius: 10px; background: transparent;
        color: var(--modal-text); cursor: pointer; transition: background 0.2s, border-color 0.2s, color 0.2s;
      }
      .case-study-close:hover { border-color: var(--brand); background: var(--modal-panel); color: var(--brand); }
      .case-study-close:focus-visible { outline: 3px solid color-mix(in srgb, var(--brand) 35%, transparent); outline-offset: 2px; }
      
      .case-study-modal-body { padding: 32px; }
      .case-study-summary { max-width: 800px; margin: 0; color: var(--modal-muted); font-size: 1.05rem; line-height: 1.75; }
      .case-study-modal-tags { margin: 24px 0 32px; }
      .case-study-content-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 20px; margin-bottom: 20px; }
      .case-study-modal-body > .case-study-content-section + .case-study-content-section { margin-top: 20px; }
      
      .case-study-content-section { padding: 24px; border-radius: 14px; background: var(--modal-panel); border: 1px solid var(--modal-border); }
      .case-study-content-section p { margin: 0; color: var(--modal-muted); line-height: 1.7; }
      .case-study-section-heading { display: flex; align-items: center; gap: 10px; margin-bottom: 14px; }
      .case-study-section-heading i { color: var(--brand); }
      .case-study-section-heading h3 { margin: 0; font-size: 1rem; color: var(--modal-text); }
      
      .case-study-feature-list { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px 24px; margin: 0; padding: 0; list-style: none; }
      .case-study-feature-list li { position: relative; padding-left: 24px; color: var(--modal-muted); line-height: 1.55; }
      .case-study-feature-list li::before { position: absolute; top: 0; left: 0; color: var(--brand); content: "✓"; font-weight: 700; }
      
      .case-study-outcome { margin-top: 20px; border-color: color-mix(in srgb, var(--brand) 40%, var(--modal-border)); }
      .case-study-note { margin-top: 20px; padding: 16px 18px; border: 1px solid var(--modal-border); border-radius: 12px; background: color-mix(in srgb, var(--brand) 7%, var(--modal-background)); }
      .case-study-note p { margin: 0; color: var(--modal-muted); font-size: 0.9rem; }
      .case-study-note i { margin-right: 8px; color: var(--brand); }
      .case-study-confidentiality { margin: 12px 0 0; color: var(--modal-muted); font-size: 0.8rem; line-height: 1.6; text-align: center; }
      
      body.modal-open { overflow: hidden; }

      @keyframes modal-in {
        from { opacity: 0; transform: translateY(14px) scale(0.985); }
        to { opacity: 1; transform: translateY(0) scale(1); }
      }

      /* === Mobile Tweak === */
      @media (max-width: 992px) { .grid-3 { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
      @media (max-width: 900px) {
        .hero-grid, .grid-2, .contact-box { grid-template-columns: 1fr; gap: 30px; }
        h1 { font-size: 2.5rem; }
        .form-grid { grid-template-columns: 1fr; }
      }
      @media (max-width: 700px) {
        .grid-3 { grid-template-columns: 1fr; }
        .case-study-modal { width: calc(100% - 20px); max-height: calc(100vh - 20px); }
        .case-study-modal-container { max-height: calc(100vh - 20px); }
        .case-study-modal-header, .case-study-modal-body { padding: 22px; }
        .case-study-content-grid, .case-study-feature-list { grid-template-columns: 1fr; }
      }
      
      @media (prefers-reduced-motion: reduce) {
        html { scroll-behavior: auto; }
        *, *::before, *::after { scroll-behavior: auto !important; transition-duration: 0.01ms !important; animation-duration: 0.01ms !important; }
      }
    </style>
  </head>

  <body>
    <header class="site-header">
      <div class="container nav-inner">
        <a href="#top" class="logo">
          <i class="fas fa-server text-brand"></i> {{ config('portfolio.name', 'Portfolio') }}
        </a>

        <nav class="nav-links">
          <a href="#projects">Work</a>
          <a href="#services">Services</a>
          <a href="#stack">Stack</a>
          <a href="#contact">Contact</a>
        </nav>

        <div style="display: flex; gap: 10px;">
          <button type="button" class="btn btn-outline btn-sm" id="themeBtn" aria-label="Switch to dark theme" aria-pressed="false">
            <i class="fas fa-moon"></i>
          </button>
          <a class="btn btn-primary btn-sm" href="#contact">Hire Me</a>
        </div>
      </div>
    </header>

    <main id="top">
      @yield('content')
    </main>

    <footer>
      <div class="container" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
        <div>
          &copy; <span id="year"></span> {{ config('portfolio.name') }}. 
          <span style="opacity: 0.6;">Laravel Developer and Linux Server Administrator.</span>
        </div>
        <div style="display: flex; gap: 20px;">
           <a href="#top">Back to Top</a>
           <a href="{{ config('portfolio.github') }}">GitHub</a>
        </div>
      </div>
    </footer>

    <div id="toast" class="toast"></div>

    <script>
      (function() {
        const EMAIL = @json(config('portfolio.email'));
        
        // --- Theme Logic ---
        const themeBtn = document.getElementById('themeBtn');
        const themeIcon = themeBtn.querySelector('i');
        
        function setTheme(theme) {
          document.documentElement.setAttribute('data-theme', theme);
          localStorage.setItem('theme', theme);
          themeIcon.className = theme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
          themeBtn.setAttribute('aria-pressed', theme === 'dark' ? 'true' : 'false');
          themeBtn.setAttribute('aria-label', theme === 'light' ? 'Switch to dark theme' : 'Switch to light theme');
        }
        
        const saved = localStorage.getItem('theme');
        if(saved) {
           setTheme(saved);
        } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
           setTheme('dark');
        }

        themeBtn.addEventListener('click', () => {
          const cur = document.documentElement.getAttribute('data-theme') || 'light';
          setTheme(cur === 'light' ? 'dark' : 'light');
        });

        // --- Utilities ---
        document.getElementById('year').textContent = new Date().getFullYear();
        
        const toast = document.getElementById('toast');
        window.showToast = function(msg) {
          toast.textContent = msg;
          toast.classList.add('show');
          setTimeout(() => toast.classList.remove('show'), 2500);
        }
      })();
    </script>
    
    @stack('scripts')
  </body>
</html>