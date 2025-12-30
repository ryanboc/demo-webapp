<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="color-scheme" content="dark light" />
    <title>{{ config('portfolio.name') }} — Portfolio</title>
    <meta name="description" content="{{ config('portfolio.name') }} — selected work, skills, and contact." />

    <style>
      :root {
        --bg: #0b0c10;
        --bg-elev: rgba(255, 255, 255, 0.06);
        --fg: rgba(255, 255, 255, 0.92);
        --muted: rgba(255, 255, 255, 0.68);
        --muted-2: rgba(255, 255, 255, 0.55);
        --border: rgba(255, 255, 255, 0.12);
        --shadow: 0 18px 45px rgba(0, 0, 0, 0.35);

        --brand: #8b5cf6;
        --brand-2: #22c55e;

        --radius-xl: 20px;
        --radius-lg: 16px;
        --radius-md: 12px;

        --container: 1120px;

        --step--1: clamp(0.92rem, 0.87rem + 0.2vw, 1rem);
        --step-0: clamp(1rem, 0.95rem + 0.3vw, 1.1rem);
        --step-1: clamp(1.18rem, 1.06rem + 0.55vw, 1.38rem);
        --step-2: clamp(1.4rem, 1.2rem + 1vw, 1.9rem);
        --step-3: clamp(1.75rem, 1.35rem + 1.8vw, 2.6rem);
        --step-4: clamp(2.1rem, 1.55rem + 2.6vw, 3.4rem);

        --space-1: 8px;
        --space-2: 12px;
        --space-3: 16px;
        --space-4: 20px;
        --space-5: 28px;
        --space-6: 36px;
        --space-7: 48px;
        --space-8: 64px;
        --space-9: 84px;
        --space-10: 110px;

        --ring: 0 0 0 4px rgba(139, 92, 246, 0.35);
      }

      [data-theme="light"] {
        --bg: #fafafa;
        --bg-elev: rgba(0, 0, 0, 0.04);
        --fg: rgba(17, 24, 39, 0.92);
        --muted: rgba(17, 24, 39, 0.68);
        --muted-2: rgba(17, 24, 39, 0.55);
        --border: rgba(17, 24, 39, 0.14);
        --shadow: 0 18px 45px rgba(17, 24, 39, 0.12);
        --ring: 0 0 0 4px rgba(139, 92, 246, 0.25);
      }

      * { box-sizing: border-box; }
      html { scroll-behavior: smooth; }

      body {
        margin: 0;
        font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial,
          "Apple Color Emoji", "Segoe UI Emoji";
        font-size: var(--step-0);
        line-height: 1.55;
        color: var(--fg);
        background: radial-gradient(1200px 800px at 15% 10%, rgba(139, 92, 246, 0.22), transparent 55%),
          radial-gradient(1000px 650px at 88% 22%, rgba(34, 197, 94, 0.16), transparent 60%),
          radial-gradient(1200px 700px at 55% 95%, rgba(59, 130, 246, 0.14), transparent 60%),
          var(--bg);
      }

      a { color: inherit; text-decoration: none; }
      a:hover { text-decoration: underline; text-underline-offset: 4px; }
      img { max-width: 100%; display: block; }

      .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
      }

      .skip-link {
        position: absolute;
        left: -999px;
        top: 12px;
        padding: 10px 12px;
        background: var(--bg);
        border: 1px solid var(--border);
        border-radius: var(--radius-md);
        z-index: 999;
      }
      .skip-link:focus { left: 12px; outline: none; box-shadow: var(--ring); }

      .container { width: min(var(--container), calc(100% - 40px)); margin: 0 auto; }

      .card {
        background: color-mix(in oklab, var(--bg-elev) 92%, transparent);
        border: 1px solid var(--border);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow);
        backdrop-filter: blur(10px);
      }

      .pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        border-radius: 999px;
        border: 1px solid var(--border);
        background: color-mix(in oklab, var(--bg-elev) 86%, transparent);
        color: var(--muted);
        font-size: var(--step--1);
        white-space: nowrap;
      }

      .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px 14px;
        border-radius: 999px;
        border: 1px solid var(--border);
        background: color-mix(in oklab, var(--bg-elev) 92%, transparent);
        color: var(--fg);
        font-weight: 650;
        letter-spacing: 0.2px;
        cursor: pointer;
        user-select: none;
        transition: transform 120ms ease, border-color 120ms ease, background 120ms ease;
      }
      .btn:hover {
        transform: translateY(-1px);
        border-color: color-mix(in oklab, var(--brand) 55%, var(--border));
        text-decoration: none;
      }
      .btn:focus-visible { outline: none; box-shadow: var(--ring); }

      .btn-primary {
        border-color: color-mix(in oklab, var(--brand) 50%, var(--border));
        background: linear-gradient(
          135deg,
          color-mix(in oklab, var(--brand) 82%, transparent),
          color-mix(in oklab, var(--brand-2) 55%, transparent)
        );
      }
      .btn-ghost { background: transparent; }

      header {
        position: sticky;
        top: 0;
        z-index: 50;
        background: color-mix(in oklab, var(--bg) 78%, transparent);
        border-bottom: 1px solid color-mix(in oklab, var(--border) 75%, transparent);
        backdrop-filter: blur(12px);
      }

      .nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 0;
        gap: var(--space-3);
      }

      .brand {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-weight: 800;
        letter-spacing: 0.2px;
        min-width: max-content;
      }

      .logo {
        width: 34px;
        height: 34px;
        border-radius: 12px;
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.95), rgba(34, 197, 94, 0.85));
        border: 1px solid rgba(255, 255, 255, 0.16);
        box-shadow: 0 10px 28px rgba(139, 92, 246, 0.25);
      }

      nav.nav-links {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        justify-content: flex-end;
      }

      .nav-links a {
        padding: 10px 12px;
        border-radius: 999px;
        border: 1px solid transparent;
        color: var(--muted);
        font-size: var(--step--1);
        font-weight: 650;
      }
      .nav-links a:hover { border-color: var(--border); text-decoration: none; color: var(--fg); }
      .nav-links a[aria-current="page"] {
        color: var(--fg);
        border-color: color-mix(in oklab, var(--brand) 45%, var(--border));
        background: color-mix(in oklab, var(--bg-elev) 92%, transparent);
      }

      .nav-actions { display: flex; align-items: center; gap: 10px; min-width: max-content; }

      .menu-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.35);
        opacity: 0;
        pointer-events: none;
        transition: opacity 160ms ease;
        z-index: 60;
      }
      .menu-overlay[data-open="true"] { opacity: 1; pointer-events: auto; }

      .hero { padding: var(--space-10) 0 var(--space-9); }

      .hero-grid {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: var(--space-7);
        align-items: start;
      }

      .hero h1 {
        margin: 10px 0 14px;
        font-size: var(--step-4);
        line-height: 1.05;
        letter-spacing: -0.02em;
      }

      .hero p { margin: 0 0 var(--space-5); color: var(--muted); max-width: 64ch; }

      .hero .cta { display: flex; gap: 12px; flex-wrap: wrap; align-items: center; }

      .meta-row { margin-top: var(--space-6); display: flex; flex-wrap: wrap; gap: 10px; }

      .profile-card { padding: var(--space-6); position: relative; overflow: hidden; }
      .profile-card::before {
        content: "";
        position: absolute;
        inset: -2px;
        background: radial-gradient(500px 250px at 20% 20%, rgba(139, 92, 246, 0.35), transparent 60%),
          radial-gradient(520px 260px at 80% 55%, rgba(34, 197, 94, 0.22), transparent 55%);
        opacity: 0.8;
        pointer-events: none;
      }
      .profile-card > * { position: relative; }

      .avatar {
        width: 84px;
        height: 84px;
        border-radius: 26px;
        border: 1px solid var(--border);
        background: color-mix(in oklab, var(--bg-elev) 92%, transparent);
        display: grid;
        place-items: center;
        font-weight: 900;
        letter-spacing: -0.02em;
        font-size: 22px;
        flex: 0 0 auto;
      }

      .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        border-radius: inherit;
      }

      .profile-top { display: flex; align-items: center; justify-content: space-between; gap: var(--space-4); }

      .profile-title { margin: var(--space-4) 0 6px; font-size: var(--step-2); letter-spacing: -0.01em; }
      .profile-sub { margin: 0 0 var(--space-4); color: var(--muted); }

      .profile-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        margin-top: var(--space-5);
      }

      .stat {
        padding: 12px;
        border-radius: var(--radius-lg);
        border: 1px solid var(--border);
        background: color-mix(in oklab, var(--bg-elev) 90%, transparent);
      }
      .stat strong { display: block; font-size: var(--step-1); line-height: 1.1; }
      .stat span { color: var(--muted-2); font-size: var(--step--1); }

      section { padding: var(--space-9) 0; }

      .section-head {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: var(--space-4);
        margin-bottom: var(--space-6);
        flex-wrap: wrap;
      }

      .section-head h2 {
        margin: 0;
        font-size: var(--step-3);
        letter-spacing: -0.02em;
        line-height: 1.1;
      }
      .section-head p { margin: 0; color: var(--muted); max-width: 58ch; }

      .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-4); }
      .grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--space-4); }

      .project-card {
        padding: var(--space-5);
        transition: transform 140ms ease, border-color 140ms ease;
        position: relative;
        overflow: hidden;
        min-height: 220px;
        display: flex;
        flex-direction: column;
      }
      .project-thumb {
        height: 120px;
        border-radius: 12px;
        margin: -1rem -1rem var(--space-4);
        background: linear-gradient(135deg, rgba(139,92,246,0.12), rgba(34,197,94,0.08));
        border-bottom: 1px solid color-mix(in oklab, var(--border) 75%, transparent);
      }
      .project-card:hover .project-thumb { filter: saturate(1.05) contrast(1.02) brightness(1.02); }
      .project-card:hover {
        transform: translateY(-2px);
        border-color: color-mix(in oklab, var(--brand) 40%, var(--border));
      }
      .project-card h3 { margin: 0 0 8px; font-size: var(--step-1); letter-spacing: -0.01em; }
      .project-card p { margin: 0 0 var(--space-4); color: var(--muted); }

      .tags { display: flex; flex-wrap: wrap; gap: 8px; margin: 0 0 var(--space-4); padding: 0; list-style: none; }
      .tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 10px;
        border-radius: 999px;
        border: 1px solid var(--border);
        color: var(--muted);
        font-size: var(--step--1);
        background: color-mix(in oklab, var(--bg-elev) 92%, transparent);
      }

      .project-actions { display: flex; gap: 10px; flex-wrap: wrap; margin-top: auto; }

      .kpi-row { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); }
      .kpi { padding: var(--space-5); }
      .kpi h3 { margin: 0 0 10px; font-size: var(--step-2); letter-spacing: -0.02em; }
      .kpi ul { margin: 0; padding-left: 18px; color: var(--muted); }

      .skills { padding: var(--space-6); }
      .skills ul { margin: 0; padding: 0; list-style: none; display: flex; flex-wrap: wrap; gap: 10px; }

      .timeline { padding: var(--space-6); }
      .timeline-item {
        display: grid;
        grid-template-columns: 140px 1fr;
        gap: var(--space-4);
        padding: var(--space-4) 0;
        border-top: 1px solid var(--border);
      }
      .timeline-item:first-child { border-top: 0; padding-top: 0; }
      .timeline-item time { color: var(--muted-2); font-size: var(--step--1); }
      .timeline-item h3 { margin: 0 0 6px; font-size: var(--step-1); }
      .timeline-item p { margin: 0; color: var(--muted); }

      .contact {
        padding: var(--space-6);
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: var(--space-4);
        align-items: start;
      }
      .contact .box { padding: var(--space-5); }

      .field { display: grid; gap: 8px; margin-bottom: 12px; }
      label { color: var(--muted-2); font-size: var(--step--1); font-weight: 650; }

      input, textarea {
        width: 100%;
        padding: 12px 12px;
        border-radius: var(--radius-md);
        border: 1px solid var(--border);
        background: color-mix(in oklab, var(--bg) 86%, transparent);
        color: var(--fg);
        outline: none;
        font: inherit;
      }
      textarea { min-height: 120px; resize: vertical; }
      input:focus, textarea:focus {
        box-shadow: var(--ring);
        border-color: color-mix(in oklab, var(--brand) 55%, var(--border));
      }

      footer {
        padding: var(--space-7) 0 var(--space-6);
        color: var(--muted-2);
        border-top: 1px solid color-mix(in oklab, var(--border) 75%, transparent);
      }
      .footer-row { display: flex; align-items: center; justify-content: space-between; gap: var(--space-4); flex-wrap: wrap; }
      .links { display: flex; gap: 12px; flex-wrap: wrap; }

      .toast {
        position: fixed;
        left: 50%;
        bottom: 18px;
        transform: translateX(-50%);
        padding: 10px 12px;
        border-radius: 999px;
        border: 1px solid var(--border);
      .btn:focus-visible { outline: none; box-shadow: var(--ring); }
        background: color-mix(in oklab, var(--bg) 86%, transparent);
        color: var(--fg);
        box-shadow: var(--shadow);
        backdrop-filter: blur(12px);
        opacity: 0;
        pointer-events: none;
        transition: opacity 180ms ease, transform 180ms ease;
        font-size: var(--step--1);
        z-index: 100;
      }
      .toast.show { opacity: 1; transform: translateX(-50%) translateY(-3px); }

      /* ===== Responsive ===== */
      @media (max-width: 980px) {
        .hero-grid { grid-template-columns: 1fr; }
        .grid-3 { grid-template-columns: 1fr; }
        .grid-2, .kpi-row { grid-template-columns: 1fr; }
        .contact { grid-template-columns: 1fr; }
        .timeline-item { grid-template-columns: 1fr; }
      }

      @media (max-width: 720px) {
        .container { width: min(var(--container), calc(100% - 28px)); }
        .hero { padding: var(--space-8) 0 var(--space-7); }
        section { padding: var(--space-7) 0; }

        .nav { gap: 10px; }
        .nav-actions .btn-primary { display: none; }

        nav.nav-links {
          position: fixed;
          left: 14px;
          right: 14px;
          top: 64px;
          z-index: 70;
          display: grid;
          gap: 8px;
          padding: 12px;
          border-radius: var(--radius-xl);
          border: 1px solid var(--border);
          background: color-mix(in oklab, var(--bg) 86%, transparent);
          backdrop-filter: blur(14px);
          box-shadow: var(--shadow);
          opacity: 0;
          transform: translateY(-10px);
          pointer-events: none;
          transition: opacity 160ms ease, transform 160ms ease;
        }

        html[data-menu-open="true"] nav.nav-links {
          opacity: 1;
          transform: translateY(0);
          pointer-events: auto;
        }

        .nav-links a {
          border-color: var(--border);
          background: color-mix(in oklab, var(--bg-elev) 92%, transparent);
        }

        .profile-stats { grid-template-columns: 1fr 1fr; }
      }

      @media (max-width: 560px) {
        .hero .cta { gap: 10px; }
        .hero .cta .btn { width: 100%; }
        .project-actions .btn { width: 100%; }
        .profile-stats { grid-template-columns: 1fr; }
        .avatar { width: 72px; height: 72px; border-radius: 22px; }
      }

      @media (prefers-reduced-motion: reduce) {
        html { scroll-behavior: auto; }
        .btn, .project-card, .toast, nav.nav-links, .menu-overlay { transition: none; }
      }

      code {
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono",
          "Courier New", monospace;
        font-size: 0.95em;
      }
    </style>
  </head>

  <body>
    <a class="skip-link" href="#content">Skip to content</a>

    <div class="menu-overlay" id="menuOverlay" data-open="false" aria-hidden="true"></div>

    <header>
      <div class="container">
        <div class="nav" role="navigation" aria-label="Primary">
          <a class="brand" href="#top" aria-label="Home">
            <span class="logo" aria-hidden="true"></span>
            <span>{{ config('portfolio.name') }}</span>
          </a>

          <nav class="nav-links" id="navLinks" aria-label="Sections">
            <a href="#projects">Projects</a>
            <a href="#about">About</a>
            <a href="#skills">Skills</a>
            <a href="#experience">Experience</a>
            <a href="#contact">Contact</a>
            <a class="btn btn-primary" href="#contact" style="justify-content:center;">Hire / Collaborate</a>
          </nav>

          <div class="nav-actions">
            <button class="btn btn-ghost" id="menuBtn" type="button" aria-label="Open menu" aria-controls="navLinks" aria-expanded="false">
              <span aria-hidden="true">☰</span>
              <span class="sr-only">Menu</span>
            </button>

            <button class="btn btn-ghost" id="themeBtn" type="button" aria-label="Toggle theme">
              <span aria-hidden="true">🌓</span>
              <span class="sr-only">Toggle theme</span>
            </button>

            <a class="btn btn-primary" href="#contact">
              <span aria-hidden="true">✦</span>
              Hire / Collaborate
            </a>
          </div>
        </div>
      </div>
    </header>

    <main id="content">
      <div id="top"></div>

      <section class="hero">
        <div class="container">
          <div class="hero-grid">
            <div>
              <span class="pill" aria-label="Availability">
                <span aria-hidden="true">●</span>
                Open to opportunities — 2026
              </span>

              <h1>{{ config('portfolio.headline') }}</h1>

              <p>
                I’m <strong>{{ config('portfolio.name') }}</strong>, a <strong>{{ config('portfolio.subheadline') }}</strong>
              </p>

              <div class="cta">
                <a class="btn btn-primary" href="#projects">
                  <span aria-hidden="true">↳</span>
                  View Projects
                </a>
                <a class="btn" href="{{ config('portfolio.github') }}" target="_blank" rel="noreferrer">
                  <span aria-hidden="true">⌁</span>
                  GitHub
                </a>
                <button class="btn" type="button" id="copyEmailBtn">
                  <span aria-hidden="true">⎘</span>
                  Copy Email
                </button>
              </div>

              <div class="meta-row" aria-label="Highlights">
                <span class="pill">📍 {{ config('portfolio.location') }}</span>
                <span class="pill">⚡ React • TypeScript • Node</span>
                <span class="pill">🧠 Design-minded engineering</span>
              </div>
            </div>

            <aside class="card profile-card" aria-label="Profile summary">
              <div class="profile-top">
                <div class="avatar" aria-label="Avatar">
                  @if(config('portfolio.photo'))
                    <img src="{{ config('portfolio.photo') }}" alt="{{ config('portfolio.name') }}">
                  @else
                    {{ config('portfolio.initials') }}
                  @endif
                </div>
                <div style="display:flex; gap:10px; flex-wrap:wrap; justify-content:flex-end;">
                  <a class="btn btn-ghost" href="#about">About</a>
                  <a class="btn btn-ghost" href="#contact">Contact</a>
                </div>
              </div>

              <h2 class="profile-title">Product-focused developer</h2>
              <p class="profile-sub">I ship user-first interfaces, reliable APIs, and crisp design systems—fast.</p>

              <div class="profile-stats" aria-label="Key stats">
                <div class="stat"><strong>8+</strong><span>Shipped products</span></div>
                <div class="stat"><strong>~35%</strong><span>Perf wins</span></div>
                <div class="stat"><strong>End-to-end</strong><span>Design → Code</span></div>
              </div>
            </aside>
          </div>
        </div>
      </section>

      <section id="projects">
        <div class="container">
          <div class="section-head">
            <div>
              <h2>Selected Projects</h2>
              <p>Three quick case studies. Replace the content with your real work and links.</p>
            </div>
            <a class="btn" href="#contact">Request a full résumé</a>
          </div>

          <div class="grid-3">
            <article class="card project-card">
              <div class="project-thumb" aria-hidden="true"></div>
              <h3>Pulse — Analytics Dashboard</h3>
              <p>A fast dashboard with real-time charts, role-based access, and a clean design system.</p>
              <ul class="tags" aria-label="Tech tags">
                <li class="tag">React</li><li class="tag">TypeScript</li><li class="tag">Vite</li><li class="tag">Charts</li>
              </ul>
              <div class="project-actions">
                <a class="btn btn-primary" href="#" aria-label="Open live demo">Live</a>
                <a class="btn" href="#" aria-label="Open case study">Case Study</a>
              </div>
            </article>

            <article class="card project-card">
              <div class="project-thumb" aria-hidden="true"></div>
              <h3>Atlas — API + Worker Pipeline</h3>
              <p>Job queues, observability, and resilient processing for high-volume ingest workloads.</p>
              <ul class="tags" aria-label="Tech tags">
                <li class="tag">Node</li><li class="tag">Postgres</li><li class="tag">Queues</li><li class="tag">Tracing</li>
              </ul>
              <div class="project-actions">
                <a class="btn btn-primary" href="#" aria-label="Open repository">Repo</a>
                <a class="btn" href="#" aria-label="Open architecture notes">Notes</a>
              </div>
            </article>

            <article class="card project-card">
              <div class="project-thumb" aria-hidden="true"></div>
              <h3>Studio — Design System</h3>
              <p>Tokens, components, and accessibility standards powering multiple apps consistently.</p>
              <ul class="tags" aria-label="Tech tags">
                <li class="tag">UI</li><li class="tag">A11y</li><li class="tag">Tokens</li><li class="tag">Docs</li>
              </ul>
              <div class="project-actions">
                <a class="btn btn-primary" href="#" aria-label="Open documentation">Docs</a>
                <a class="btn" href="#" aria-label="Open component library">Library</a>
              </div>
            </article>
          </div>
        </div>
      </section>

      <section id="about">
        <div class="container">
          <div class="section-head">
            <div>
              <h2>About</h2>
              <p>Short, skimmable, and specific. Focus on outcomes: speed, quality, and measurable impact.</p>
            </div>
          </div>

          <div class="kpi-row">
            <div class="card kpi">
              <h3>What I do</h3>
              <ul>
                <li>Build modern web apps with crisp UX and strong performance.</li>
                <li>Design and implement reusable components and design tokens.</li>
                <li>Ship dependable APIs and workflows with observability.</li>
              </ul>
            </div>

            <div class="card kpi">
              <h3>How I work</h3>
              <ul>
                <li>Start with user journeys → prototypes → production-quality UI.</li>
                <li>Measure: bundle size, Core Web Vitals, and conversion flows.</li>
                <li>Keep systems simple, consistent, and well documented.</li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section id="skills">
        <div class="container">
          <div class="section-head">
            <div><h2>Skills</h2><p>A tight set of tools. Add or remove to match your real stack.</p></div>
          </div>

          <div class="card skills">
            <ul aria-label="Skill tags">
              <li class="tag">React</li><li class="tag">TypeScript</li><li class="tag">Next.js</li><li class="tag">Node.js</li>
              <li class="tag">PostgreSQL</li><li class="tag">Testing</li><li class="tag">Design Systems</li><li class="tag">Accessibility</li>
              <li class="tag">Performance</li><li class="tag">CI/CD</li>
            </ul>
          </div>
        </div>
      </section>

      <section id="experience">
        <div class="container">
          <div class="section-head">
            <div><h2>Experience</h2><p>Keep it outcome-driven. Use numbers when you can.</p></div>
          </div>

          <div class="card timeline" role="list">
            <div class="timeline-item" role="listitem">
              <time>2024 — Now</time>
              <div><h3>Senior Frontend Engineer — Company</h3><p>Led UI platform work, improved performance, and standardized component patterns.</p></div>
            </div>
            <div class="timeline-item" role="listitem">
              <time>2022 — 2024</time>
              <div><h3>Full-stack Engineer — Company</h3><p>Built product features end-to-end with a focus on reliability and UX polish.</p></div>
            </div>
            <div class="timeline-item" role="listitem">
              <time>Earlier</time>
              <div><h3>Developer / Designer — Freelance</h3><p>Delivered sites, dashboards, and design systems for startups and small teams.</p></div>
            </div>
          </div>
        </div>
      </section>

      <section id="contact">
        <div class="container">
          <div class="section-head">
            <div><h2>Contact</h2><p>The simplest contact section wins. This one supports mailto + a copy button.</p></div>
          </div>

          <div class="card contact">
            <div class="box">
              <h3 style="margin:0 0 10px; font-size: var(--step-2); letter-spacing:-0.01em;">Let’s build something</h3>
              <p style="margin:0 0 var(--space-4); color: var(--muted);">Email is best. I respond within 1–2 business days.</p>

              <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <a class="btn btn-primary" id="emailLink" href="mailto:{{ config('portfolio.email') }}">
                  <span aria-hidden="true">✉</span>{{ config('portfolio.email') }}
                </a>
                <button class="btn" type="button" id="copyEmailBtn2"><span aria-hidden="true">⎘</span>Copy</button>
                <a class="btn" href="{{ config('portfolio.linkedin') }}" target="_blank" rel="noreferrer"><span aria-hidden="true">in</span>LinkedIn</a>
              </div>

              <div style="margin-top: var(--space-5);"><span class="pill">Prefer a quick brief? Use the form →</span></div>
            </div>

            <div class="box">
              <form id="contactForm">
                <div class="field"><label for="name">Name</label><input id="name" name="name" autocomplete="name" placeholder="Jane Doe" /></div>
                <div class="field"><label for="email">Email</label><input id="email" name="email" type="email" autocomplete="email" placeholder="jane@company.com" /></div>
                <div class="field"><label for="message">Message</label><textarea id="message" name="message" placeholder="What are you building? Timeline, scope, links…"></textarea></div>

                <button class="btn btn-primary" type="submit"><span aria-hidden="true">↗</span>Send (opens email)</button>

                <p style="margin:10px 0 0; color: var(--muted-2); font-size: var(--step--1);">
                  This form uses <code>mailto:</code> by default. Swap in a serverless endpoint when you’re ready.
                </p>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <div class="container">
        <div class="footer-row">
          <div>© <span id="year"></span> {{ config('portfolio.name') }}. Built with Laravel.</div>
          <div class="links" aria-label="Footer links">
            <a href="#projects">Projects</a><a href="#about">About</a><a href="#contact">Contact</a>
          </div>
        </div>
      </div>
    </footer>

    <div class="toast" id="toast" role="status" aria-live="polite"></div>

    <script>
      (function () {
        const EMAIL = @json(config('portfolio.email'));

        const toastEl = document.getElementById("toast");
        const themeBtn = document.getElementById("themeBtn");

        const menuBtn = document.getElementById("menuBtn");
        const menuOverlay = document.getElementById("menuOverlay");
        const navLinksEl = document.getElementById("navLinks");

        const navLinks = Array.from(document.querySelectorAll(".nav-links a")).filter(
          (a) => a.getAttribute("href")?.startsWith("#")
        );
        const sections = navLinks.map((a) => document.querySelector(a.getAttribute("href"))).filter(Boolean);

        function showToast(message) {
          toastEl.textContent = message;
          toastEl.classList.add("show");
          window.clearTimeout(showToast._t);
          showToast._t = window.setTimeout(() => toastEl.classList.remove("show"), 1600);
        }

        function setTheme(theme) {
          document.documentElement.setAttribute("data-theme", theme);
          localStorage.setItem("theme", theme);
        }

        function initTheme() {
          const saved = localStorage.getItem("theme");
          if (saved === "light" || saved === "dark") return setTheme(saved);
          const prefersLight = window.matchMedia && window.matchMedia("(prefers-color-scheme: light)").matches;
          setTheme(prefersLight ? "light" : "dark");
        }

        async function copyToClipboard(text) {
          try {
            if (navigator.clipboard?.writeText) {
              await navigator.clipboard.writeText(text);
              return true;
            }
          } catch (_) {}
          try {
            const ta = document.createElement("textarea");
            ta.value = text;
            ta.setAttribute("readonly", "");
            ta.style.position = "absolute";
            ta.style.left = "-9999px";
            document.body.appendChild(ta);
            ta.select();
            const ok = document.execCommand("copy");
            document.body.removeChild(ta);
            return ok;
          } catch (_) {
            return false;
          }
        }

        function setMenuOpen(open) {
          document.documentElement.toggleAttribute("data-menu-open", open);
          menuOverlay.dataset.open = open ? "true" : "false";
          menuBtn.setAttribute("aria-expanded", open ? "true" : "false");
          menuBtn.setAttribute("aria-label", open ? "Close menu" : "Open menu");
          if (!open) menuBtn.focus({ preventScroll: true });
        }

        function isMenuOpen() {
          return document.documentElement.hasAttribute("data-menu-open");
        }

        function wireMenu() {
          menuBtn.addEventListener("click", () => setMenuOpen(!isMenuOpen()));
          menuOverlay.addEventListener("click", () => setMenuOpen(false));

          navLinksEl.addEventListener("click", (e) => {
            const a = e.target.closest("a");
            if (!a) return;
            if (window.matchMedia("(max-width: 720px)").matches) setMenuOpen(false);
          });

          window.addEventListener("keydown", (e) => {
            if (e.key === "Escape" && isMenuOpen()) setMenuOpen(false);
          });

          window.addEventListener("resize", () => {
            if (!window.matchMedia("(max-width: 720px)").matches && isMenuOpen()) setMenuOpen(false);
          });
        }

        function wireCopyButtons() {
          const btns = [document.getElementById("copyEmailBtn"), document.getElementById("copyEmailBtn2")].filter(Boolean);
          btns.forEach((btn) => {
            btn.addEventListener("click", async () => {
              const ok = await copyToClipboard(EMAIL);
              showToast(ok ? "Email copied" : "Copy failed");
            });
          });
        }

        function wireForm() {
          const form = document.getElementById("contactForm");
          const emailLink = document.getElementById("emailLink");
          if (emailLink) emailLink.setAttribute("href", `mailto:${EMAIL}`);

          form.addEventListener("submit", (e) => {
            e.preventDefault();
            const fd = new FormData(form);
            const name = String(fd.get("name") || "").trim();
            const from = String(fd.get("email") || "").trim();
            const msg = String(fd.get("message") || "").trim();

            const subject = encodeURIComponent(`Portfolio inquiry${name ? " — " + name : ""}`);
            const bodyLines = [
              msg || "(no message provided)",
              "",
              "---",
              name ? `Name: ${name}` : null,
              from ? `Email: ${from}` : null,
            ].filter(Boolean);

            const body = encodeURIComponent(bodyLines.join("\n"));
            window.location.href = `mailto:${EMAIL}?subject=${subject}&body=${body}`;
          });
        }

        function wireThemeToggle() {
          themeBtn.addEventListener("click", () => {
            const cur = document.documentElement.getAttribute("data-theme");
            const next = cur === "light" ? "dark" : "light";
            setTheme(next);
            showToast(next === "light" ? "Light mode" : "Dark mode");
          });
        }

        function initYear() {
          document.getElementById("year").textContent = String(new Date().getFullYear());
        }

        function initActiveNav() {
          if (!("IntersectionObserver" in window)) return;

          const obs = new IntersectionObserver(
            (entries) => {
              const visible = entries
                .filter((e) => e.isIntersecting)
                .sort((a, b) => b.intersectionRatio - a.intersectionRatio)[0];
              if (!visible) return;

              const id = "#" + visible.target.id;
              navLinks.forEach((a) => {
                const isActive = a.getAttribute("href") === id;
                a.toggleAttribute("aria-current", isActive ? "page" : false);
              });
            },
            { root: null, rootMargin: "-25% 0px -65% 0px", threshold: [0.08, 0.18, 0.35, 0.55] }
          );

          sections.forEach((s) => obs.observe(s));
        }

        initTheme();
        initYear();
        wireThemeToggle();
        wireCopyButtons();
        wireForm();
        wireMenu();
        initActiveNav();
      })();
    </script>
  </body>
</html>