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
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Ryan Boc — Laravel Developer & Linux Systems Administrator">
    <meta property="og:description" content="Production Laravel systems, barcode traceability, APIs, reporting and Linux infrastructure.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('img/portfolio-preview.jpg') }}">

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">

        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="{{ asset('img/favicon-32x32.png') }}"
        >

        <link
            rel="icon"
            type="image/png"
            sizes="192x192"
            href="{{ asset('img/favicon-192x192.png') }}"
        >

        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="{{ asset('img/apple-touch-icon.png') }}"
        >

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
        background-size: 30px 30px; /* Dot grid */
        background-position: 0 0;
        opacity: 0.9;
        border-bottom: 1px solid var(--border);
      }

      .hero-grid { display: grid; grid-template-columns: 1.2fr 0.8fr; gap: var(--space-lg); align-items: center; }
      
      .status-pill {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 6px 12px; border-radius: 50px;
        background: var(--bg-card); border: 1px solid var(--border);
        font-size: 0.85rem; font-weight: 600; color: var(--muted);
        margin-bottom: 24px; box-shadow: var(--shadow-sm);
      }
      .dot { width: 8px; height: 8px; background: #22c55e; border-radius: 50%; box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.2); }

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
      
      .grid-4 {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
      }

      /* Make the 4 columns responsive */
      @media (max-width: 1100px) {
        .grid-4 {
          grid-template-columns: repeat(2, 1fr); /* 2 columns on laptops/tablets */
        }
      }

      @media (max-width: 600px) {
        .grid-4 {
          grid-template-columns: 1fr; /* 1 column on mobile */
        }
      }
      
      .card {
        background: var(--bg-card); border: 1px solid var(--border);
        border-radius: var(--radius); overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
        height: 100%; display: flex; flex-direction: column;
      }
      .card:hover { transform: translateY(-5px); box-shadow: var(--shadow-md); border-color: var(--brand); }

      /* Terminal Thumbnails */
      .terminal-thumb {
        height: 160px; background: #1e293b; /* Dark bg always */
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

      /* === Footer === */
      footer { border-top: 1px solid var(--border); padding: 40px 0; background: var(--bg-alt); color: var(--muted); font-size: 0.9rem; margin-top: var(--space-xl); }

      /* === Mobile Tweak === */
      @media (max-width: 900px) {
        .hero-grid, .grid-2, .contact-box { grid-template-columns: 1fr; gap: 30px; }
        h1 { font-size: 2.5rem; }
      }

      /* === Utilities === */
      .toast {
        position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%) translateY(20px);
        background: #1e293b; color: #fff; padding: 10px 20px; border-radius: 50px;
        opacity: 0; pointer-events: none; transition: 0.3s; z-index: 200; font-size: 0.9rem;
      }
      .toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }

      .grid-3 {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 24px;
    }

    .grid-3 > .case-study-trigger {
        display: block;
        min-width: 0;
        color: inherit;
        text-decoration: none;
    }

    .grid-3 .card {
        height: 100%;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .grid-3 .card-body {
        display: flex;
        flex: 1;
        flex-direction: column;
    }

    .grid-3 .tags {
        margin-top: auto;
        padding-top: 20px;
    }

    .case-study-link {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 18px;
        color: var(--brand);
        font-size: 0.9rem;
        font-weight: 700;
    }

    .case-study-link i {
        font-size: 0.75rem;
        transition: transform 0.2s ease;
    }

    .case-study-trigger:hover .case-study-link i {
        transform: translateX(4px);
    }

    @media (max-width: 992px) {
        .grid-3 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 700px) {
        .grid-3 {
            grid-template-columns: 1fr;
        }
    }
    .case-study-trigger {
    display: block;
    width: 100%;
    min-width: 0;
    padding: 0;
    border: 0;
    background: transparent;
    color: inherit;
    font: inherit;
    text-align: left;
    cursor: pointer;
    }

    .case-study-trigger .card {
        height: 100%;
    }

    .case-study-trigger:focus-visible {
        border-radius: 14px;
        outline: 3px solid var(--brand);
        outline-offset: 4px;
    }

    .case-study-modal {
        position: fixed;
        inset: 0;
        width: min(960px, calc(100% - 32px));
        max-height: calc(100vh - 40px);
        margin: auto;
        padding: 0;
        border: 1px solid var(--modal-border);
        border-radius: 18px;
        background: var(--modal-background);
        color: var(--modal-text);
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.35);
        overflow: hidden;
        z-index: 1000;
    }

    .case-study-modal[open] {
        animation: modal-in 0.2s ease-out;
    }

    .case-study-modal::backdrop {
        background: var(--modal-backdrop);
        backdrop-filter: blur(6px);
    }

    .case-study-modal-container {
        max-height: calc(100vh - 40px);
        overflow-y: auto;
        overscroll-behavior: contain;
    }

    .case-study-modal-header {
        position: sticky;
        top: 0;
        z-index: 2;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 24px;
        padding: 28px 32px;
        background: var(--modal-background);
        border-bottom: 1px solid var(--modal-border);
    }

    .case-study-modal-header h2 {
        margin: 8px 0 0;
        font-size: clamp(1.6rem, 4vw, 2.3rem);
        line-height: 1.2;
        color: var(--modal-text);
    }

    .case-study-category {
        color: var(--brand);
        font-family: var(--font-mono);
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .case-study-close {
        display: grid;
        width: 42px;
        height: 42px;
        flex: 0 0 auto;
        place-items: center;
        border: 1px solid var(--modal-border);
        border-radius: 10px;
        background: transparent;
        color: var(--modal-text);
        cursor: pointer;
        transition: background 0.2s, border-color 0.2s, color 0.2s;
    }

    .case-study-close:hover {
        border-color: var(--brand);
        background: var(--modal-panel);
        color: var(--brand);
    }

    .case-study-close:focus-visible {
        outline: 3px solid color-mix(in srgb, var(--brand) 35%, transparent);
        outline-offset: 2px;
    }

    .case-study-modal-body {
        padding: 32px;
    }

    .case-study-summary {
        max-width: 800px;
        margin: 0;
        color: var(--modal-muted);
        font-size: 1.05rem;
        line-height: 1.75;
    }

    .case-study-modal-tags {
        margin: 24px 0 32px;
    }

    .case-study-content-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
        margin-bottom: 20px;
    }

    .case-study-modal-body > .case-study-content-section + .case-study-content-section {
        margin-top: 20px;
    }

    .case-study-content-section {
        padding: 24px;
        border-radius: 14px;
        background: var(--modal-panel);
        border: 1px solid var(--modal-border);
    }

    .case-study-content-section p {
        margin: 0;
        color: var(--modal-muted);
        line-height: 1.7;
    }

    .case-study-section-heading {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 14px;
    }

    .case-study-section-heading i {
        color: var(--brand);
    }

    .case-study-section-heading h3 {
        margin: 0;
        font-size: 1rem;
        color: var(--modal-text);
    }

    .case-study-feature-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px 24px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .case-study-feature-list li {
        position: relative;
        padding-left: 24px;
        color: var(--modal-muted);
        line-height: 1.55;
    }

    .case-study-feature-list li::before {
        position: absolute;
        top: 0;
        left: 0;
        color: var(--brand);
        content: "✓";
        font-weight: 700;
    }

    .case-study-outcome {
        margin-top: 20px;
        border-color: color-mix(in srgb, var(--brand) 40%, var(--modal-border));
    }

    .case-study-note {
        margin-top: 20px;
        padding: 16px 18px;
        border: 1px solid var(--modal-border);
        border-radius: 12px;
        background: color-mix(in srgb, var(--brand) 7%, var(--modal-background));
    }

    .case-study-note p { margin: 0; color: var(--modal-muted); font-size: 0.9rem; }
    .case-study-note i { margin-right: 8px; color: var(--brand); }

    .case-study-confidentiality {
        margin: 12px 0 0;
        color: var(--modal-muted);
        font-size: 0.8rem;
        line-height: 1.6;
        text-align: center;
    }

    .case-study-confidentiality i {
        margin-right: 6px;
    }

    body.modal-open {
        overflow: hidden;
    }

    @keyframes modal-in {
        from { opacity: 0; transform: translateY(14px) scale(0.985); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }

    @media (prefers-reduced-motion: reduce) {
        html { scroll-behavior: auto; }
        *, *::before, *::after { scroll-behavior: auto !important; transition-duration: 0.01ms !important; animation-duration: 0.01ms !important; }
    }

    @media (max-width: 700px) {
        .case-study-modal {
            width: calc(100% - 20px);
            max-height: calc(100vh - 20px);
        }

        .case-study-modal-container {
            max-height: calc(100vh - 20px);
        }

        .case-study-modal-header,
        .case-study-modal-body {
            padding: 22px;
        }

        .case-study-content-grid,
        .case-study-feature-list {
            grid-template-columns: 1fr;
        }
    }

    .form-grid {
        display: grid; 
        grid-template-columns: 1fr 1fr; 
        gap: 20px;
    }

    /* Add this to your mobile media query */
    @media (max-width: 900px) {
        .form-grid { 
            grid-template-columns: 1fr; /* Stacks Name and Email vertically on phones */
        }
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
          
          <section class="hero">
            <div class="container hero-grid">
              <div>
                  <h1>
                      {{ config(
                          'portfolio.headline',
                          'Senior Laravel Developer & Linux Systems Administrator'
                      ) }}
                  </h1>

                  <p class="lead">
                      I’m <strong>{{ config('portfolio.name', 'Ryan Boc') }}</strong>.
                      I build and operate production systems for warehouses,
                      manufacturing and agriculture—from barcode traceability and
                      operational reporting to APIs, automation and Linux infrastructure.
                  </p>

                  <div style="
                      display: flex;
                      gap: 16px;
                      margin-top: 30px;
                      flex-wrap: wrap;
                  ">
                      <a class="btn btn-primary" href="#projects">
                          View Case Studies
                      </a>

                      <a
                          class="btn btn-outline"
                          href="{{ asset('documents/Ryan-Boc-CV.pdf') }}"
                          target="_blank"
                          rel="noopener noreferrer"
                      >
                          <i class="fas fa-file-arrow-down"></i>
                          Download CV
                      </a>
                  </div>

                  <div style="
                      margin-top: 40px;
                      font-size: 0.9rem;
                      color: var(--muted-2);
                      display: flex;
                      gap: 20px;
                      align-items: center;
                      flex-wrap: wrap;
                  ">
                      <span>
                          <i class="fas fa-map-marker-alt"></i>
                          {{ config('portfolio.location', 'Brisbane / Toowoomba / Remote') }}
                      </span>

                      <span class="hero-separator"></span>

                      <a
                          href="{{ config('portfolio.linkedin') }}"
                          target="_blank"
                          rel="noopener noreferrer"
                          style="color: inherit; text-decoration: none;"
                      >
                          <i class="fab fa-linkedin"></i>
                          LinkedIn
                      </a>

                      <a
                          href="{{ config('portfolio.github') }}"
                          target="_blank"
                          rel="noopener noreferrer"
                          style="color: inherit; text-decoration: none;"
                      >
                          <i class="fab fa-github"></i>
                          GitHub
                      </a>
                  </div>
              </div>

              <aside class="profile-card">
    <img
        src="{{ asset('img/8053598.jpeg') }}"
        alt="{{ config('portfolio.name', 'Ryan Boc') }}"
        class="profile-image"
    >

    <h3>Backend & Infrastructure Specialist</h3>

    <p>
        From application architecture and database design to deployment,
        automation and production support.
    </p>

    <div class="profile-stats">
        <div class="profile-stat">
            <strong>15+</strong>
            <span>Years Experience</span>
        </div>

        <div class="profile-stat">
            <strong>Laravel</strong>
            <span>Backend Systems</span>
        </div>

        <div class="profile-stat">
            <strong>Linux</strong>
            <span>Infrastructure</span>
        </div>
    </div>
</aside>
            </div>
          </section>

          <section id="projects" class="section">
            <div class="container">
                <div class="section-header">
                    <div>
                        <h2>Featured Case Studies</h2>

                        <p style="margin-bottom: 0;">
                            Production systems I have designed, developed and maintained
                            across warehouse operations, agricultural management and
                            workforce integrations.
                        </p>
                    </div>
                </div>

                <div class="grid-3">

                {{-- Ishida Barcode and Shipping Label Case Study --}}
                    <button
                            type="button"
                            class="case-study-trigger"
                            data-case-study="production-barcode"
                            aria-haspopup="dialog"
                            aria-label="Open Production Barcode, Labelling & Traceability case study"
                        >
                        <article class="card">
                            <div class="terminal-thumb">
                                <i class="fas fa-qrcode"></i>

                                <span class="text-mono">
                                    case-study/production-barcodes
                                </span>
                            </div>

                            <div class="card-body">
                                <h3>Production Barcode, Labelling & Traceability</h3>

                                <p>
                                    A production barcode system that scans 1D and 2D GS1
                                    barcodes, validates product information, generates
                                    shipping labels and stores production records for
                                    end-to-end traceability.
                                </p>

                                <div class="tags">
                                    <span class="tag">Laravel</span>
                                    <span class="tag">1D / 2D</span>
                                    <span class="tag">GS1</span>
                                    <span class="tag">Ishida</span>
                                    <span class="tag">Label Printing</span>
                                </div>

                                <div class="case-study-link">
                                    View Case Study
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </article>
                    </button>

                    {{-- Warehouse Case Study --}}
                    <button
                          type="button"
                          class="case-study-trigger"
                          data-case-study="warehouse"
                          aria-haspopup="dialog"
                          aria-label="Open Warehouse Barcode and Pallet Traceability case study"
                      >
                        <article class="card">
                            <div class="terminal-thumb">
                                <i class="fas fa-barcode"></i>

                                <span class="text-mono">
                                    case-study/warehouse
                                </span>
                            </div>

                            <div class="card-body">
                                <h3>Warehouse Barcode & Pallet Traceability</h3>

                                <p>
                                    A Laravel-based warehouse system for tracing products
                                    and pallets through receiving, storage, transfer and
                                    dispatch using GS1 barcodes and Honeywell scanning
                                    equipment.
                                </p>

                                <div class="tags">
                                    <span class="tag">Laravel</span>
                                    <span class="tag">MySQL</span>
                                    <span class="tag">GS1-128</span>
                                    <span class="tag">Honeywell</span>
                                </div>

                                <div class="case-study-link">
                                    View Case Study
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </article>
                    </button>

                    {{-- Plant and Farm Operations Case Study --}}
                    <button
                          type="button"
                          class="case-study-trigger"
                          data-case-study="operations"
                          aria-haspopup="dialog"
                          aria-label="Open Plant & Farm Operations case study"
                      >
                        <article class="card">
                            <div class="terminal-thumb">
                                <i class="fas fa-seedling"></i>

                                <span class="text-mono">
                                    case-study/operations
                                </span>
                            </div>

                            <div class="card-body">
                                <h3>Plant & Farm Operations Platform</h3>

                                <p>
                                    A collection of production systems supporting orders,
                                    inventory, invoicing, livestock records, operational
                                    reporting and automated business rules across plant
                                    and farm environments.
                                </p>

                                <div class="tags">
                                    <span class="tag">PHP</span>
                                    <span class="tag">MySQL</span>
                                    <span class="tag">Reporting</span>
                                </div>

                                <div class="case-study-link">
                                    View Case Study
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </article>
                    </button>

                    {{-- Workforce Integration Case Study --}}
              <button
                  type="button"
                  class="case-study-trigger"
                  data-case-study="workforce-api"
                  aria-haspopup="dialog"
                  aria-label="Open Workforce Event API Integration case study"
              >
                  <article class="card">
                      <div class="terminal-thumb">
                          <i class="fas fa-exchange-alt"></i>

                          <span class="text-mono">
                              case-study/workforce-api
                          </span>
                      </div>

                      <div class="card-body">
                          <h3>Workforce Event API Integration</h3>

                          <p>
                              A Laravel REST API integration that receives workforce
                              clocking events, retrieves employee information and connects
                              production-floor attendance devices with internal systems.
                          </p>

                          <div class="tags">
                              <span class="tag">Laravel</span>
                              <span class="tag">REST API</span>
                              <span class="tag">Webhooks</span>
                              <span class="tag">Cloudflare</span>
                          </div>

                          <div class="case-study-link">
                              View Case Study
                              <i class="fas fa-arrow-right"></i>
                          </div>
                      </div>
                  </article>
              </button>

                    

                </div>

                <p class="case-study-note">
                    Case studies are presented at a high level to protect confidential
                    company information, customer data and proprietary source code.
                </p>
            </div>
        </section>

{{-- Add this section here --}}
<section id="demos" class="section" style="background: var(--bg-alt);">
    <div class="container">
        <div class="section-header">
            <div>
                <h2>Technical Demos</h2>

                <p style="margin-bottom: 0;">
                    Smaller applications demonstrating Laravel fundamentals,
                    API integration, validation and database operations.
                </p>
            </div>

            <a
                href="{{ config('portfolio.github') }}"
                class="btn btn-outline btn-sm"
                target="_blank"
                rel="noopener noreferrer"
            >
                View GitHub
                <i class="fas fa-arrow-up-right-from-square"></i>
            </a>
        </div>

        <div class="grid-2">
            {{-- Edamam API --}}
            <article class="card">
                <div class="terminal-thumb">
                    <i class="fas fa-utensils"></i>
                    <span class="text-mono">demo/nutrition-api</span>
                </div>

                <div class="card-body">
                    <h3>Nutrition API Integration</h3>

                    <p>
                        A Laravel application that retrieves nutrition information
                        from the Edamam API, processes the response and presents
                        ingredient and daily-value information.
                    </p>

                    <div class="tags">
                        <span class="tag">Laravel</span>
                        <span class="tag">REST API</span>
                        <span class="tag">Edamam</span>
                        <span class="tag">JSON</span>
                        <span class="tag">Caching</span>
                    </div>

                    <a class="case-study-link" href="{{ url('/test-nutrition') }}">
                        Open Demo
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            {{-- CRUD Demo --}}
            <article class="card">
                <div class="terminal-thumb">
                    <i class="fas fa-list-check"></i>
                    <span class="text-mono">demo/task-manager</span>
                </div>

                <div class="card-body">
                    <h3>Laravel Task Manager</h3>

                    <p>
                        A database-backed task manager demonstrating create,
                        read, update and delete operations with validation,
                        Eloquent models and Laravel routing.
                    </p>

                    <div class="tags">
                        <span class="tag">Laravel</span>
                        <span class="tag">CRUD</span>
                        <span class="tag">MySQL</span>
                        <span class="tag">Eloquent</span>
                        <span class="tag">Validation</span>
                    </div>

                    <a class="case-study-link" href="{{ url('/todos') }}">
                        Open Demo
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>
        </div>
    </div>
</section>

        <dialog id="caseStudyModal" class="case-study-modal" aria-labelledby="caseStudyTitle" aria-describedby="caseStudySummary">
        <div class="case-study-modal-container">
            <header class="case-study-modal-header">
                <div>
                    <span id="caseStudyCategory" class="case-study-category">
                        Case Study
                    </span>

                    <h2 id="caseStudyTitle"></h2>
                </div>

                <button
                    type="button"
                    class="case-study-close"
                    aria-label="Close case study"
                >
                    <i class="fas fa-times"></i>
                </button>
            </header>

            <div class="case-study-modal-body">
                <p id="caseStudySummary" class="case-study-summary"></p>

                <div id="caseStudyTags" class="tags case-study-modal-tags"></div>

                <div class="case-study-content-grid">
                    <section class="case-study-content-section">
                        <div class="case-study-section-heading">
                            <i class="fas fa-circle-exclamation"></i>
                            <h3>The Challenge</h3>
                        </div>

                        <p id="caseStudyChallenge"></p>
                    </section>

                    <section class="case-study-content-section">
                        <div class="case-study-section-heading">
                            <i class="fas fa-lightbulb"></i>
                            <h3>The Solution</h3>
                        </div>

                        <p id="caseStudySolution"></p>
                    </section>
                </div>

                <section class="case-study-content-section">
                    <div class="case-study-section-heading">
                        <i class="fas fa-list-check"></i>
                        <h3>Key Capabilities</h3>
                    </div>

                    <ul id="caseStudyFeatures" class="case-study-feature-list"></ul>
                </section>

                <section class="case-study-content-section">
                    <div class="case-study-section-heading">
                        <i class="fas fa-user-gear"></i>
                        <h3>My Responsibilities</h3>
                    </div>

                    <ul id="caseStudyResponsibilities"
                        class="case-study-feature-list"></ul>
                </section>

                <section class="case-study-content-section case-study-outcome">
                    <div class="case-study-section-heading">
                        <i class="fas fa-chart-line"></i>
                        <h3>Outcome</h3>
                    </div>

                    <p id="caseStudyOutcome"></p>
                </section>

                <p class="case-study-confidentiality">
                    <i class="fas fa-lock"></i>

                    This case study is presented at a high level to protect
                    confidential company information, customer data and
                    proprietary source code.
                </p>
            </div>
        </div>
    </dialog>

      <section id="services" class="section" style="background: var(--bg-alt);">
        <div class="container">
          <div class="grid-2">
            <div>
              <h2>What I Bring to the Table</h2>
              <p>I bridge the gap between complex backend logic and the servers that run them.</p>
              <a href="#contact" class="btn btn-primary">Let's Discuss Your Project</a>
            </div>
            
            <div class="grid-2 service-list"> <div class="service-item">
                <i class="fab fa-laravel fa-2x text-brand mb-3"></i>
                <h3>Laravel Development</h3>
                <ul>
                  <li><i class="fas fa-check"></i> Custom API Architecture</li>
                  <li><i class="fas fa-check"></i> Database Optimization (MySQL)</li>
                  <li><i class="fas fa-check"></i> Payment Integrations (Stripe)</li>
                  <li><i class="fas fa-check"></i> Job Queues & Workers</li>
                </ul>
              </div>
              <div class="service-item">
                <i class="fab fa-linux fa-2x text-brand mb-3"></i>
                <h3>Linux Administration</h3>
                <ul>
                  <li><i class="fas fa-check"></i> VPS Provisioning (Ubuntu)</li>
                  <li><i class="fas fa-check"></i> Nginx & Apache Config</li>
                  <li><i class="fas fa-check"></i> BIND9 DNS</li>
                  <li><i class="fas fa-check"></i> Security Hardening (UFW)</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="stack" class="section">
        <div class="container">
          <h2>Technical Stack</h2>
          <div class="stack-container">
            <div class="stack-pill"><i class="fab fa-php"></i> PHP 8.2+</div>
            <div class="stack-pill"><i class="fab fa-laravel"></i> Laravel</div>
            <div class="stack-pill"><i class="fab fa-css3"></i> CSS</div>
            <div class="stack-pill"><i class="fab fa-html5"></i> HTML</div>
            <div class="stack-pill"><i class="fab fa-css3"></i> Tailwind CSS</div>
            <div class="stack-pill"><i class="fas fa-database"></i> MySQL / MariaDB</div>
            <div class="stack-pill"><i class="fas fa-server"></i> Nginx</div>
            <div class="stack-pill"><i class="fab fa-ubuntu"></i> Ubuntu</div>
            <div class="stack-pill"><i class="fas fa-terminal"></i> Bash Scripting</div>
            <div class="stack-pill"><i class="fab fa-git-alt"></i> Git</div>
          </div>
        </div>
      </section>

      <section id="contact" class="section">
        <div class="container">
          <div class="contact-box">
            <div>
              <h2>Let's Work Together</h2>
              <p>Whether you need a new backend feature or a server audit, I'm available for freelance contracts.</p>
              
              <div style="margin-top: 30px;">
                <p class="mb-2"><strong>Email Me:</strong></p>
                <div style="display: flex; gap: 10px;">
                  <input type="text" value="{{ config('portfolio.email') }}" readonly id="emailInput" style="margin:0; width: auto; flex:1;">
                  <button type="button" class="btn btn-primary" id="copyEmailBtn">Copy</button>
                </div>
              </div>
              
              <div style="margin-top: 30px;">
                <a href="{{ config('portfolio.linkedin') }}" class="btn btn-outline" style="width: 100%; justify-content: center;">
                  <i class="fab fa-linkedin"></i> Connect on LinkedIn
                </a>
              </div>
            </div>

            <form id="contactForm">
              <div style="form-grid">
                <div>
                  <label for="contact-name">Name</label>
                    <input
                        id="contact-name"
                        type="text"
                        name="name"
                        autocomplete="name"
                        placeholder="John Doe"
                        required
                    >
                </div>
                <div>
                  <label for="contact-email">Email</label>
                  <input
                      id="contact-email"
                      type="email"
                      name="email"
                      required
                      placeholder="john@company.com"
                  >
                </div>
              </div>
              <label for="contact-message">Project Details</label>
              <textarea id="contact-message" name="message" rows="5" required placeholder="I need help with..."></textarea>
              <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
            </form>
          </div>
        </div>
      </section>

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
        
        // Check saved or preference
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
        function showToast(msg) {
          toast.textContent = msg;
          toast.classList.add('show');
          setTimeout(() => toast.classList.remove('show'), 2500);
        }

        // --- Copy Email ---
        document.getElementById('copyEmailBtn').addEventListener('click', async () => {
          try {
            await navigator.clipboard.writeText(EMAIL);
            showToast('Email copied to clipboard!');
          } catch (error) {
            document.getElementById('emailInput').select();
            showToast('Select the email address and copy it manually.');
          }
        });

        // --- Form Handler (Mailto Fallback) ---
        const form = document.getElementById('contactForm');
        const submitBtn = form.querySelector('button[type="submit"]');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            // Disable button and show loading state
            submitBtn.disabled = true;
            submitBtn.textContent = "Sending...";

            const formData = new FormData(form);
            
            try {
                const response = await fetch('/contact-submit', {
                    method: 'POST',
                    headers: {
                        // Laravel needs this CSRF token to allow the request
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                if (!response.ok) {
                    throw new Error('Network error');
                }

                const result = await response.json();
                
                // Success
                showToast('Message sent! I will get back to you soon.');
                form.reset();
                
            } catch (error) {
                // Error handling
                showToast('Something went wrong. Please email me directly.');
                console.error('Error:', error);
            } finally {
                // Reset button
                submitBtn.disabled = false;
                submitBtn.textContent = "Send Message";
            }
        });
      })();
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const caseStudies = {
        warehouse: {
            category: 'Warehouse Operations',
            title: 'Warehouse Barcode & Pallet Traceability',

            summary: `
                A Laravel-based warehouse system that traces products
                and pallets through receiving, freezer storage, internal
                transfers and dispatch.
            `,

            tags: [
                'Laravel',
                'MySQL',
                'GS1-128',
                'Honeywell',
                'Warehouse Operations'
            ],

            challenge: `
                Warehouse staff needed to manage products belonging to
                multiple customers while preventing duplicate scans,
                incorrect pallet assignments and inaccurate stock records.
                Each customer could also have different rules governing
                product and pallet movement.
            `,

            solution: `
                I developed a centralised barcode and pallet-management
                workflow that validates scanned products, identifies
                existing pallet relationships and applies configurable
                customer-specific transfer rules.
            `,

            features: [
                'Product and pallet receiving workflows',
                'GS1 barcode parsing and validation',
                'Duplicate barcode detection',
                'Customer-specific pallet-transfer rules',
                'Freezer location and stock tracking',
                'Stock-on-hand Excel reports',
                'Goods-stored reporting',
                'Scheduled customer email reports'
            ],

            responsibilities: [
                'Laravel backend development',
                'MySQL database design and troubleshooting',
                'Barcode parsing and validation logic',
                'JavaScript scanning workflows',
                'Excel and PDF report generation',
                'SMTP and scheduled-report configuration',
                'Linux and Nginx deployment',
                'Production support for warehouse users'
            ],

            outcome: `
                The system provides warehouse staff with one traceable
                workflow for receiving, storing, transferring and
                dispatching customer products while giving management
                access to current operational reports.
            `
        },

        'production-barcode': {
            category: 'Production Traceability',
            title: 'Production Barcode, Labelling & Traceability',

            summary: `
                A production system that scans 1D and 2D GS1
                barcodes, validates product data, generates shipping
                labels and stores production records for traceability.
            `,

            tags: [
                'Laravel',
                'Ishida',
                '1D / 2D',
                'GS1',
                'Label Printing',
                'MySQL'
            ],

            challenge: `
                Production and dispatch teams needed to process different
                barcode formats, consistently generate shipping labels
                and retain the scanned information for future product
                investigations and traceability.
            `,

            solution: `
                I built a barcode-processing workflow that identifies the
                scanned format, extracts the available product information,
                validates it against production rules, saves the record and
                produces a correctly formatted shipping label.
            `,

            features: [
                'Standard 1D barcode scanning',
                'GS1 2D barcode scanning',
                'GTIN extraction and validation',
                'Weight extraction from GS1 data',
                'Best-before date extraction',
                'Product-rule validation',
                'Shipping-label generation',
                'Production-history reporting'
            ],

            responsibilities: [
                'Barcode parsing implementation',
                'Laravel application development',
                'Ishida workflow integration',
                'Honeywell scanner testing',
                'Industrial label-printer integration',
                'Custom label-size configuration',
                'Database storage and traceability',
                'Linux CUPS printing configuration'
            ],

            outcome: `
                Production barcode information is captured consistently,
                shipping labels are generated from validated data and
                historical records remain available for operational
                reporting and product traceability.
            `
        },

        operations: {
            category: 'Business Operations',
            title: 'Plant & Farm Operations Platform',

            summary: `
                A collection of production systems supporting orders,
                inventory, invoicing, farm records, operational reporting
                and business-rule automation.
            `,

            tags: [
                'PHP',
                'Laravel',
                'MariaDB',
                'Reporting',
                'Automation',
                'Linux'
            ],

            challenge: `
                Plant and farm teams required systems capable of supporting
                specialised operational rules that could not be handled
                effectively through generic off-the-shelf software.
            `,

            solution: `
                I developed and maintained interconnected business
                applications covering production, sales, stock,
                livestock records and management reporting while
                progressively improving legacy functionality.
            `,

            features: [
                'Order and invoice processing',
                'Stock and location management',
                'Production reporting',
                'Mortality and livestock records',
                'Bird-weight analysis',
                'Harvest documentation',
                'Excel and PDF exports',
                'Automated operational alerts'
            ],

            responsibilities: [
                'PHP and Laravel development',
                'Legacy-code maintenance',
                'Business-rule implementation',
                'Database query optimisation',
                'Report design and generation',
                'Scheduled email automation',
                'User support and troubleshooting',
                'Linux server administration'
            ],

            outcome: `
                The platforms provide operations, finance and management
                teams with systems tailored to their actual workflows,
                reducing reliance on disconnected manual processes.
            `
        },

        'workforce-api': {
            category: 'API Integration',
            title: 'Workforce Event API Integration',

            summary: `
                A Laravel REST API integration connecting production-floor
                attendance devices with internal workforce systems.
            `,

            tags: [
                'Laravel',
                'REST API',
                'Webhooks',
                'JSON',
                'Cloudflare',
                'Nginx'
            ],

            challenge: `
                Workforce clocking events from production-floor devices
                needed to be received reliably and made available to
                internal systems without exposing the application server
                directly to the public internet.
            `,

            solution: `
                I created a Laravel API that receives event notifications,
                validates and logs the payloads, provides employee lookup
                endpoints and operates through a secured Cloudflare
                connection.
            `,

            features: [
                'Event-notification webhook',
                'Clock-in and clock-out events',
                'Break event processing',
                'Employee-list endpoint',
                'Individual employee lookup',
                'JSON request logging',
                'Public API routing',
                'Cloudflare-secured connectivity'
            ],

            responsibilities: [
                'REST endpoint development',
                'Webhook payload handling',
                'API testing and validation',
                'Laravel logging configuration',
                'Nginx and PHP-FPM configuration',
                'Cloudflare Tunnel deployment',
                'Production-device testing',
                'Integration troubleshooting'
            ],

            outcome: `
                Attendance events can be received and investigated
                centrally, providing the foundation for connecting
                production-floor activity with internal workforce
                reporting.
            `
        }
    };

    const modal = document.getElementById('caseStudyModal');
    const closeButton = modal.querySelector('.case-study-close');
    const triggers = document.querySelectorAll('.case-study-trigger');

    const categoryElement =
        document.getElementById('caseStudyCategory');

    const titleElement =
        document.getElementById('caseStudyTitle');

    const summaryElement =
        document.getElementById('caseStudySummary');

    const tagsElement =
        document.getElementById('caseStudyTags');

    const challengeElement =
        document.getElementById('caseStudyChallenge');

    const solutionElement =
        document.getElementById('caseStudySolution');

    const featuresElement =
        document.getElementById('caseStudyFeatures');

    const responsibilitiesElement =
        document.getElementById('caseStudyResponsibilities');

    const outcomeElement =
        document.getElementById('caseStudyOutcome');

    let activeTrigger = null;

    function createTag(tag) {
        const element = document.createElement('span');
        element.className = 'tag';
        element.textContent = tag;

        return element;
    }

    function createListItem(content) {
        const element = document.createElement('li');
        element.textContent = content;

        return element;
    }

    function openCaseStudy(caseStudyKey, trigger) {
        const caseStudy = caseStudies[caseStudyKey];

        if (!caseStudy) {
            return;
        }

        activeTrigger = trigger;

        categoryElement.textContent = caseStudy.category;
        titleElement.textContent = caseStudy.title;
        summaryElement.textContent = caseStudy.summary.trim();
        challengeElement.textContent = caseStudy.challenge.trim();
        solutionElement.textContent = caseStudy.solution.trim();
        outcomeElement.textContent = caseStudy.outcome.trim();

        tagsElement.replaceChildren(
            ...caseStudy.tags.map(createTag)
        );

        featuresElement.replaceChildren(
            ...caseStudy.features.map(createListItem)
        );

        responsibilitiesElement.replaceChildren(
            ...caseStudy.responsibilities.map(createListItem)
        );

        document.body.classList.add('modal-open');
        modal.showModal();
    }

    function closeCaseStudy() {
        modal.close();
    }

    triggers.forEach(function (trigger) {
        trigger.addEventListener('click', function () {
            openCaseStudy(
                trigger.dataset.caseStudy,
                trigger
            );
        });
    });

    closeButton.addEventListener('click', closeCaseStudy);

    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            closeCaseStudy();
        }
    });

    modal.addEventListener('close', function () {
        document.body.classList.remove('modal-open');

        if (activeTrigger) {
            activeTrigger.focus();
        }
    });
});
</script>
  </body>
</html>