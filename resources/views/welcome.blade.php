<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="color-scheme" content="light dark" />
    <title>{{ config('portfolio.name', 'Portfolio') }} — Backend & Systems</title>
    <meta name="description" content="Laravel Developer and Linux Systems Administrator available for freelance. Expert in backend architecture, server management, and DNS configuration." />

    <style>
      :root {
        /* Light Mode (Default) */
        --bg: #ffffff;
        --bg-alt: #f9fafb; /* Very light gray */
        --bg-card: #ffffff;
        --fg: #111827;     /* Gray 900 */
        --muted: #4b5563;  /* Gray 600 */
        --muted-2: #6b7280; /* Gray 500 */
        --border: #e5e7eb; /* Gray 200 */
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.025);

        /* Changed Brand Color to a "Server/Tech" Blue */
        --brand: #2563eb; 
        --brand-hover: #1d4ed8;
        
        --radius: 8px;
        --container: 1024px;

        --font-main: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, sans-serif;
        
        --step--1: 0.875rem;
        --step-0: 1rem;
        --step-1: 1.125rem;
        --step-2: 1.5rem;
        --step-3: 2.25rem;
        --step-4: 3rem;

        --space-1: 8px;
        --space-2: 12px;
        --space-3: 16px;
        --space-4: 24px;
        --space-5: 32px;
        --space-6: 48px;
        --space-7: 64px;

        --focus-ring: 0 0 0 3px rgba(37, 99, 235, 0.3);
      }

      [data-theme="dark"] {
        --bg: #0f172a;
        --bg-alt: #1e293b;
        --bg-card: #1e293b;
        --fg: #f8fafc;
        --muted: #cbd5e1;
        --muted-2: #94a3b8;
        --border: #334155;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.5);
        --brand: #3b82f6;
        --brand-hover: #60a5fa;
      }

      * { box-sizing: border-box; }
      html { scroll-behavior: smooth; }

      body {
        margin: 0;
        font-family: var(--font-main);
        font-size: var(--step-0);
        line-height: 1.6;
        color: var(--fg);
        background: var(--bg);
        transition: background-color 0.3s ease, color 0.3s ease;
      }

      a { color: inherit; text-decoration: none; transition: color 0.2s; }
      a:focus-visible { outline: none; box-shadow: var(--focus-ring); border-radius: 2px; }
      
      img { max-width: 100%; display: block; }
      button { font-family: inherit; }

      .sr-only {
        position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px;
        overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0;
      }

      .container { 
        width: min(var(--container), calc(100% - 40px)); 
        margin: 0 auto; 
      }

      /* === Typography === */
      h1, h2, h3, h4 { line-height: 1.1; margin: 0; font-weight: 700; color: var(--fg); }
      p { margin: 0 0 var(--space-3); color: var(--muted); }
      strong { font-weight: 600; color: var(--fg); }
      code { font-family: ui-monospace, monospace; font-size: 0.9em; background: var(--bg-alt); padding: 2px 4px; border-radius: 4px; border: 1px solid var(--border); }

      /* === Header === */
      header {
        position: sticky;
        top: 0;
        z-index: 50;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(8px);
        border-bottom: 1px solid var(--border);
        transition: background 0.3s, border-color 0.3s;
      }
      [data-theme="dark"] header { background: rgba(15, 23, 42, 0.9); }

      .nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 0;
      }

      .brand {
        font-weight: 700;
        font-size: var(--step-1);
        letter-spacing: -0.02em;
        display: flex;
        align-items: center;
        gap: 12px;
      }

      .nav-links { display: flex; gap: 24px; align-items: center; }
      .nav-links a {
        font-size: var(--step--1);
        font-weight: 500;
        color: var(--muted);
      }
      .nav-links a:hover, .nav-links a[aria-current="page"] { color: var(--brand); }

      .nav-actions { display: flex; gap: 12px; align-items: center; }

      /* === Buttons === */
      .btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        border-radius: var(--radius);
        font-size: var(--step--1);
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        border: 1px solid var(--border);
        background: var(--bg-card);
        color: var(--fg);
        text-decoration: none;
      }
      .btn:hover { border-color: var(--muted-2); background: var(--bg-alt); }
      
      .btn-primary {
        background: var(--brand);
        color: #fff;
        border-color: transparent;
      }
      .btn-primary:hover { background: var(--brand-hover); border-color: transparent; color: #fff; }
      
      .btn-ghost { border-color: transparent; background: transparent; padding: 8px; }
      .btn-ghost:hover { background: var(--bg-alt); }

      /* === Hero === */
      .hero { padding: var(--space-7) 0 var(--space-6); }
      .hero-grid {
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: var(--space-6);
        align-items: center;
      }
      
      .hero h1 {
        font-size: var(--step-4);
        margin-bottom: var(--space-3);
        letter-spacing: -0.03em;
      }
      .hero p.lead { font-size: var(--step-1); max-width: 50ch; margin-bottom: var(--space-5); line-height: 1.5; }

      .pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 999px;
        background: var(--bg-alt);
        color: var(--muted);
        font-size: var(--step--1);
        font-weight: 500;
        margin-bottom: var(--space-3);
        border: 1px solid var(--border);
      }
      .pill span[aria-hidden="true"] { color: #22c55e; font-size: 8px; } /* Green dot */

      .profile-card {
        background: var(--bg-card);
        padding: var(--space-5);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        box-shadow: var(--shadow-lg);
      }
      .avatar {
        width: 80px; height: 80px;
        border-radius: 999px;
        background: var(--bg-alt);
        overflow: hidden;
        margin-bottom: var(--space-3);
        border: 1px solid var(--border);
      }
      .avatar img { width: 100%; height: 100%; object-fit: cover; }

      .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
        margin-top: var(--space-4);
        padding-top: var(--space-4);
        border-top: 1px solid var(--border);
      }
      .stat-item strong { display: block; font-size: var(--step-0); }
      .stat-item span { font-size: 0.75rem; color: var(--muted-2); text-transform: uppercase; letter-spacing: 0.05em; }

      /* === Sections & Cards === */
      section { padding: var(--space-6) 0; }
      
      .section-head { margin-bottom: var(--space-5); display: flex; justify-content: space-between; align-items: flex-end; }
      .section-head h2 { font-size: var(--step-3); margin-bottom: 8px; }

      .card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
      }

      /* === Projects === */
      .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-4); }
      
      .project-card { display: flex; flex-direction: column; height: 100%; }
      .project-card:hover { transform: translateY(-2px); box-shadow: var(--shadow); border-color: var(--brand); }
      
      .project-content { padding: var(--space-4); flex: 1; display: flex; flex-direction: column; }
      
      /* Changed thumb to be code/terminal aesthetic */
      .project-thumb {
        height: 140px;
        background: var(--bg-alt);
        border-bottom: 1px solid var(--border);
        position: relative;
        font-family: monospace;
        color: var(--muted-2);
        display:flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        opacity: 0.3;
      }

      .tags { display: flex; flex-wrap: wrap; gap: 8px; margin-top: auto; padding: 0; list-style: none; }
      .tag {
        font-size: 0.75rem; padding: 4px 8px; border-radius: 4px;
        background: var(--bg-alt); color: var(--muted); border: 1px solid var(--border);
        font-family: monospace;
      }

      /* === Experience / About === */
      .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); }
      .kpi-card { padding: var(--space-4); }
      .kpi-card ul { padding-left: 20px; color: var(--muted); }
      .kpi-card li { margin-bottom: 8px; }

      .timeline { padding: var(--space-4); }
      .timeline-item {
        display: grid;
        grid-template-columns: 120px 1fr;
        gap: var(--space-4);
        padding: var(--space-3) 0;
        border-bottom: 1px solid var(--border);
      }
      .timeline-item:last-child { border-bottom: none; }
      .timeline-date { color: var(--muted-2); font-size: var(--step--1); font-variant-numeric: tabular-nums; }

      /* === Contact === */
      .contact-grid { display: grid; grid-template-columns: 1fr 1.5fr; gap: var(--space-6); align-items: start; }
      .form-group { margin-bottom: 16px; }
      label { display: block; font-size: var(--step--1); font-weight: 600; margin-bottom: 6px; color: var(--fg); }
      input, textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid var(--border);
        border-radius: var(--radius);
        background: var(--bg);
        color: var(--fg);
        font-size: var(--step--1);
        transition: border-color 0.2s, box-shadow 0.2s;
      }
      input:focus, textarea:focus {
        outline: none;
        border-color: var(--brand);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
      }
      textarea { resize: vertical; min-height: 120px; }

      /* === Footer === */
      footer {
        margin-top: var(--space-7);
        padding: var(--space-5) 0;
        border-top: 1px solid var(--border);
        background: var(--bg-alt);
        font-size: var(--step--1);
        color: var(--muted-2);
      }
      .footer-flex { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px; }

      /* === Responsive === */
      @media (max-width: 900px) {
        .hero-grid, .grid-3, .grid-2, .contact-grid { grid-template-columns: 1fr; }
        .nav-links { display: none; }
        .timeline-item { grid-template-columns: 1fr; gap: 4px; }
      }

      /* === Toast === */
      .toast {
        position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%) translateY(20px);
        background: #111827; color: #fff; padding: 12px 24px; border-radius: 999px;
        opacity: 0; pointer-events: none; transition: 0.3s; z-index: 100;
        font-size: var(--step--1);
      }
      .toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }
    </style>
  </head>

  <body>
    <header>
      <div class="container nav">
        <a class="brand" href="#top">
          <span style="color:var(--brand);"></span>{{ config('portfolio.name', 'name') }}
        </a>

        <nav class="nav-links">
          <a href="#projects">Projects</a>
          <a href="#services">Services</a>
          <a href="#stack">Tech Stack</a>
          <a href="#contact">Contact</a>
        </nav>

        <div class="nav-actions">
          <button class="btn btn-ghost" id="themeBtn" aria-label="Toggle theme">
            Theme
          </button>
          <a class="btn btn-primary" href="#contact">Hire Me</a>
        </div>
      </div>
    </header>

    <main id="top">
      <section class="hero">
        <div class="container hero-grid">
          <div>
            <div class="pill" aria-label="Status">
              <span aria-hidden="true">●</span> Accepting freelance contracts
            </div>
            <h1>{{ config('portfolio.headline', 'Robust Backend Systems & Server Infrastructure.') }}</h1>
            <p class="lead">
              I am <strong>{{ config('portfolio.name') }}</strong>, a <strong>{{ config('portfolio.subheadline', 'Laravel Developer & Systems Administrator') }}</strong>. I build secure APIs, manage Linux servers, and optimize backend performance.
            </p>
            <div style="display: flex; gap: 12px; flex-wrap: wrap;">
              <a class="btn btn-primary" href="#services">My Services</a>
              <a class="btn" href="{{ config('portfolio.github') }}" target="_blank">GitHub</a>
              <button class="btn" id="copyEmailBtn">Copy Email</button>
            </div>
            
            <div style="margin-top: var(--space-4); color: var(--muted-2); font-size: var(--step--1);">
              📍 {{ config('portfolio.location', 'Remote') }} &nbsp;•&nbsp; Laravel &nbsp;•&nbsp; Linux &nbsp;•&nbsp; Networking
            </div>
          </div>

          <aside class="profile-card">
            <div class="avatar">
               @if(config('portfolio.photo'))
                <img src="{{ config('portfolio.photo') }}" alt="{{ config('portfolio.name') }}">
              @else
                <div style="width:100%; height:100%; display:grid; place-items:center; background:#f1f5f9; color:#64748b; font-weight:bold;">IMG</div>
              @endif
            </div>
            <h3>Backend & Ops</h3>
            <p style="font-size: 0.9em; margin-top:8px;">Focusing on server stability, security, and clean architecture.</p>
            
            <div class="stats-grid">
              <div class="stat-item"><strong>99.9%</strong><span>Uptime</span></div>
              <div class="stat-item"><strong>API</strong><span>First</span></div>
              <div class="stat-item"><strong>Root</strong><span>Access</span></div>
            </div>
          </aside>
        </div>
      </section>

      <section id="projects">
        <div class="container">
          <div class="section-head">
            <div>
              <h2>Recent Projects</h2>
              <p>Backend logic, server automation, and system administration.</p>
            </div>
            <a class="btn btn-ghost" href="{{ config('portfolio.github') }}">View Code on GitHub →</a>
          </div>

          <div class="grid-3">
            <a href="/test-nutrition">
            <article class="card project-card">
              <div class="project-thumb">PHP</div>
              <div class="project-content">
                <h3>SaaS Backend API</h3>
                <p>Architected a multi-tenant API using Laravel. Handled authentication, subscription billing, and job queues.</p>
                <ul class="tags">
                  <li class="tag">Laravel 10</li><li class="tag">Redis</li><li class="tag">MySQL</li>
                </ul>
              </div>
            </article>
            </a>

            <article class="card project-card">
              <div class="project-thumb">SSH</div>
              <div class="project-content">
                <h3>Home Lab & DNS Cluster</h3>
                <p>Custom BIND9 setup managed via DuckDNS. Self-hosted services behind Nginx reverse proxies with automated SSL.</p>
                <ul class="tags">
                  <li class="tag">Linux</li><li class="tag">BIND9</li><li class="tag">DuckDNS</li>
                </ul>
              </div>
            </article>

            <article class="card project-card">
              <div class="project-thumb">./sh</div>
              <div class="project-content">
                <h3>Server Automation Scripts</h3>
                <p>Bash and Python scripts to automate server provisioning, backups, and log rotation for client VPS instances.</p>
                <ul class="tags">
                  <li class="tag">Bash</li><li class="tag">Cron</li><li class="tag">Python</li>
                </ul>
              </div>
            </article>
          </div>
        </div>
      </section>

      <section id="services" style="background: var(--bg-alt);">
        <div class="container">
          <div class="section-head">
            <h2>What I Offer</h2>
          </div>
          <div class="grid-2">
            <div class="card kpi-card">
              <h3>Laravel Development</h3>
              <p>I build custom software solutions that are secure and scalable.</p>
              <ul>
                <li>API Development (REST/GraphQL)</li>
                <li>Database Design & Optimization</li>
                <li>Payment Gateway Integration</li>
              </ul>
            </div>
            <div class="card kpi-card">
              <h3>Linux & Server Management</h3>
              <p>I handle the infrastructure so you can focus on your business.</p>
              <ul>
                <li>VPS Setup (Ubuntu/Debian/CentOS)</li>
                <li>DNS Configuration (BIND9, DuckDNS)</li>
                <li>Web Server Tuning (Nginx/Apache)</li>
                <li>Security Hardening & Firewalls</li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section id="stack">
        <div class="container">
          <div class="section-head">
            <h2>Technical Stack</h2>
          </div>
          <div class="card" style="padding: var(--space-4);">
             <p style="margin-bottom: 12px;"><strong>Languages & Frameworks:</strong> PHP (Laravel), Python, Bash, SQL.</p>
             <p style="margin-bottom: 12px;"><strong>Server & OS:</strong> Ubuntu Server, Debian, CentOS.</p>
             <p style="margin-bottom: 0;"><strong>Tools:</strong> Git, Docker, Composer, Nginx, BIND9, UFW, Fail2Ban.</p>
          </div>
        </div>
      </section>

      <section id="contact">
        <div class="container">
          <div class="section-head">
            <h2>Hire Me</h2>
          </div>
          <div class="card" style="padding: var(--space-6);">
            <div class="contact-grid">
              <div>
                <h3>Available for Freelance</h3>
                <p>Need a Laravel expert or someone to fix your server config? Send me the details and I'll get back to you with a quote.</p>
                
                <div style="margin-top: 24px;">
                   <a class="btn" href="mailto:{{ config('portfolio.email') }}" style="width:100%; justify-content:center;">
                     ✉️ &nbsp; {{ config('portfolio.email') }}
                   </a>
                </div>
                <div style="margin-top: 12px; display:flex; gap:10px;">
                   <a class="btn btn-ghost" href="{{ config('portfolio.linkedin') }}" style="flex:1; justify-content:center;">LinkedIn</a>
                   <a class="btn btn-ghost" href="{{ config('portfolio.github') }}" style="flex:1; justify-content:center;">GitHub</a>
                </div>
              </div>

              <form id="contactForm">
                <div class="form-group">
                  <label for="name">Name / Company</label>
                  <input type="text" id="name" name="name" placeholder="John from Agency X" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" placeholder="john@example.com" required>
                </div>
                <div class="form-group">
                  <label for="message">Project Details</label>
                  <textarea id="message" name="message" placeholder="I need a Laravel backend for..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Request Quote</button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <div class="container footer-flex">
        <div>&copy; <span id="year"></span> {{ config('portfolio.name') }}. Built with Laravel.</div>
        <div style="display:flex; gap:20px;">
            <a href="#top">Back to Top</a>
            <a href="mailto:{{ config('portfolio.email') }}">Email</a>
        </div>
      </div>
    </footer>

    <div id="toast" class="toast"></div>

    <script>
      (function() {
        const EMAIL = @json(config('portfolio.email'));
        
        // Theme Toggle
        const themeBtn = document.getElementById('themeBtn');
        function setTheme(theme) {
          document.documentElement.setAttribute('data-theme', theme);
          localStorage.setItem('theme', theme);
        }
        themeBtn.addEventListener('click', () => {
          const cur = document.documentElement.getAttribute('data-theme');
          setTheme(cur === 'light' ? 'dark' : 'light');
        });
        
        // Init Theme
        const saved = localStorage.getItem('theme');
        if(saved) {
           setTheme(saved);
        } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
           setTheme('dark');
        }

        // Year
        document.getElementById('year').textContent = new Date().getFullYear();

        // Toast
        const toast = document.getElementById('toast');
        function showToast(msg) {
          toast.textContent = msg;
          toast.classList.add('show');
          setTimeout(() => toast.classList.remove('show'), 2000);
        }

        // Copy Email
        const copyBtn = document.getElementById('copyEmailBtn');
        if(copyBtn) {
            copyBtn.addEventListener('click', () => {
                navigator.clipboard.writeText(EMAIL).then(() => showToast('Email copied!'));
            });
        }

        // Form (Mailto fallback)
        const form = document.getElementById('contactForm');
        form.addEventListener('submit', (e) => {
          e.preventDefault();
          const fd = new FormData(form);
          const subject = `Freelance Inquiry: ${fd.get('name')}`;
          const body = `${fd.get('message')}\n\nFrom: ${fd.get('name')} (${fd.get('email')})`;
          window.location.href = `mailto:${EMAIL}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
        });
      })();
    </script>
  </body>
</html>