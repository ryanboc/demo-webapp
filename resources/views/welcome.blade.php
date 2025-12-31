<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="color-scheme" content="light dark" />
    <title>{{ config('portfolio.name', 'Portfolio') }}</title>
    <meta name="description" content="{{ config('portfolio.name') }} — selected work, skills, and contact." />

    <style>
      :root {
        /* Light Mode (Default) */
        --bg: #ffffff;
        --bg-alt: #f9fafb; /* Very light gray for contrast */
        --bg-card: #ffffff;
        --fg: #111827;     /* Gray 900 */
        --muted: #4b5563;  /* Gray 600 */
        --muted-2: #6b7280; /* Gray 500 */
        --border: #e5e7eb; /* Gray 200 */
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.025);

        --brand: #4f46e5; /* Professional Indigo */
        --brand-hover: #4338ca;
        
        --radius: 8px; /* Tighter, more professional radius */
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
        --space-8: 96px;

        --focus-ring: 0 0 0 3px rgba(79, 70, 229, 0.3);
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
        --brand: #6366f1;
        --brand-hover: #818cf8;
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
      .project-thumb {
        height: 160px;
        background: var(--bg-alt);
        border-bottom: 1px solid var(--border);
        position: relative;
      }
      .project-thumb::after { content: "Image Placeholder"; position: absolute; inset:0; display: grid; place-items:center; color: var(--muted-2); font-size: var(--step--1); }

      .tags { display: flex; flex-wrap: wrap; gap: 8px; margin-top: auto; padding: 0; list-style: none; }
      .tag {
        font-size: 0.75rem; padding: 4px 8px; border-radius: 4px;
        background: var(--bg-alt); color: var(--muted); border: 1px solid var(--border);
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
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
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
        .nav-links { display: none; } /* Simplified mobile menu hiding for this snippet */
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
          {{ config('portfolio.name', 'Ryan') }}
        </a>

        <nav class="nav-links">
          <a href="#projects">Work</a>
          <a href="#about">Process</a>
          <a href="#experience">Experience</a>
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
              <span aria-hidden="true">●</span> Available for new projects
            </div>
            <h1>{{ config('portfolio.headline', 'Building digital products with purpose.') }}</h1>
            <p class="lead">
              I’m <strong>{{ config('portfolio.name') }}</strong>, a <strong>{{ config('portfolio.subheadline', 'Senior Frontend Engineer') }}</strong> specializing in scalable web applications and design systems.
            </p>
            <div style="display: flex; gap: 12px; flex-wrap: wrap;">
              <a class="btn btn-primary" href="#projects">View Selected Work</a>
              <a class="btn" href="{{ config('portfolio.github') }}" target="_blank">GitHub</a>
              <button class="btn" id="copyEmailBtn">Copy Email</button>
            </div>
            
            <div style="margin-top: var(--space-4); color: var(--muted-2); font-size: var(--step--1);">
              📍 {{ config('portfolio.location', 'Remote') }} &nbsp;•&nbsp; TypeScript, React, Node &nbsp;•&nbsp; Product Design
            </div>
          </div>

          <aside class="profile-card">
            <div class="avatar">
               @if(config('portfolio.photo'))
                <img src="{{ config('portfolio.photo') }}" alt="{{ config('portfolio.name') }}">
              @else
                <div style="width:100%; height:100%; display:grid; place-items:center; background:#e5e7eb; color:#6b7280; font-weight:bold;">IMG</div>
              @endif
            </div>
            <h3>Engineering & Design</h3>
            <p style="font-size: 0.9em; margin-top:8px;">Bridging the gap between complex backends and beautiful user interfaces.</p>
            
            <div class="stats-grid">
              <div class="stat-item"><strong>8+</strong><span>Years</span></div>
              <div class="stat-item"><strong>40+</strong><span>Projects</span></div>
              <div class="stat-item"><strong>100%</strong><span>Commitment</span></div>
            </div>
          </aside>
        </div>
      </section>

      <section id="projects">
        <div class="container">
          <div class="section-head">
            <div>
              <h2>Selected Projects</h2>
              <p>Case studies in performance, accessibility, and scale.</p>
            </div>
            <a class="btn btn-ghost" href="{{ config('portfolio.github') }}">View all on GitHub →</a>
          </div>

          <div class="grid-3">
            <article class="card project-card">
              <div class="project-thumb"></div>
              <div class="project-content">
                <h3>Analytics Dashboard</h3>
                <p>A real-time data visualization platform handling high-volume event streams.</p>
                <ul class="tags">
                  <li class="tag">React</li><li class="tag">D3.js</li><li class="tag">TypeScript</li>
                </ul>
              </div>
            </article>

            <article class="card project-card">
              <div class="project-thumb"></div>
              <div class="project-content">
                <h3>E-Commerce Core</h3>
                <p>Headless Shopify implementation with Next.js achieving a 99 Lighthouse score.</p>
                <ul class="tags">
                  <li class="tag">Next.js</li><li class="tag">GraphQL</li><li class="tag">Stripe</li>
                </ul>
              </div>
            </article>

            <article class="card project-card">
              <div class="project-thumb"></div>
              <div class="project-content">
                <h3>Design System UI</h3>
                <p>A comprehensive component library used across 5 different internal products.</p>
                <ul class="tags">
                  <li class="tag">Storybook</li><li class="tag">A11y</li><li class="tag">Tokens</li>
                </ul>
              </div>
            </article>
          </div>
        </div>
      </section>

      <section id="about" style="background: var(--bg-alt);">
        <div class="container">
          <div class="section-head">
            <h2>How I Work</h2>
          </div>
          <div class="grid-2">
            <div class="card kpi-card">
              <h3>Technical Strategy</h3>
              <p>I don't just write code; I architect solutions that are maintainable and scalable.</p>
              <ul>
                <li>Component-Driven Development</li>
                <li>Automated Testing (Unit & E2E)</li>
                <li>Performance Budgeting</li>
              </ul>
            </div>
            <div class="card kpi-card">
              <h3>User Experience</h3>
              <p>Performance is a feature. Accessibility is a requirement, not an afterthought.</p>
              <ul>
                <li>Semantic HTML & WAI-ARIA</li>
                <li>Core Web Vitals Optimization</li>
                <li>Responsive Design Patterns</li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section id="experience">
        <div class="container">
          <div class="section-head">
            <h2>Experience</h2>
          </div>
          <div class="card timeline">
            <div class="timeline-item">
              <div class="timeline-date">2023 — Present</div>
              <div>
                <h3>Senior Frontend Engineer</h3>
                <p>Leading the frontend platform team, establishing coding standards, and migrating legacy codebases to modern React stacks.</p>
              </div>
            </div>
            <div class="timeline-item">
              <div class="timeline-date">2020 — 2023</div>
              <div>
                <h3>Full Stack Developer</h3>
                <p>Built and maintained multiple client projects using Laravel and Vue.js. Managed deployment pipelines and server infrastructure.</p>
              </div>
            </div>
            <div class="timeline-item">
              <div class="timeline-date">2018 — 2020</div>
              <div>
                <h3>UI/UX Designer & Dev</h3>
                <p>Bridged design and engineering. Created high-fidelity prototypes and implemented them in HTML/CSS/JS.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="contact">
        <div class="container">
          <div class="section-head">
            <h2>Get in Touch</h2>
          </div>
          <div class="card" style="padding: var(--space-6);">
            <div class="contact-grid">
              <div>
                <h3>Let's collaborate</h3>
                <p>I’m currently open to new opportunities. Whether you have a question or just want to say hi, I’ll try my best to get back to you!</p>
                
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
                  <label for="name">Name</label>
                  <input type="text" id="name" name="name" placeholder="Jane Doe" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" placeholder="jane@example.com" required>
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea id="message" name="message" placeholder="How can I help you?" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <div class="container footer-flex">
        <div>&copy; <span id="year"></span> {{ config('portfolio.name') }}. All rights reserved.</div>
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
           setTheme('dark'); // Respect OS, but default HTML is light
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
          const subject = `New message from ${fd.get('name')}`;
          const body = `${fd.get('message')}\n\nFrom: ${fd.get('name')} (${fd.get('email')})`;
          window.location.href = `mailto:${EMAIL}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
        });
      })();
    </script>
  </body>
</html>