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

    <style>
      :root {
        /* Color Palette (Slate / Server Blue) */
        --bg: #ffffff;
        --bg-alt: #f8fafc;
        --bg-card: #ffffff;
        --fg: #0f172a;      /* Dark Slate */
        --muted: #475569;   /* Medium Slate */
        --muted-2: #94a3b8; /* Light Slate */
        --border: #e2e8f0;
        
        --brand: #2563eb;   /* Royal Blue */
        --brand-hover: #1d4ed8;
        --accent: #38bdf8;  /* Cyan for subtle details */

        --radius: 12px;
        --container: 1100px;

        --font-main: 'Inter', system-ui, sans-serif;
        --font-mono: 'JetBrains Mono', monospace;
        
        --shadow-sm: 0 1px 3px rgba(0,0,0,0.1);
        --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);

        --space-xs: 8px;
        --space-sm: 16px;
        --space-md: 32px;
        --space-lg: 64px;
        --space-xl: 96px;
      }

      [data-theme="dark"] {
        --bg: #0f172a;
        --bg-alt: #1e293b;
        --bg-card: #1e293b;
        --fg: #f8fafc;
        --muted: #cbd5e1;
        --muted-2: #64748b;
        --border: #334155;
        --brand: #3b82f6;
        --brand-hover: #60a5fa;
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
      header {
        position: sticky; top: 0; z-index: 100;
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid var(--border);
      }
      [data-theme="dark"] header { background: rgba(15, 23, 42, 0.85); }
      
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
      .avatar {
        width: 100px; height: 100px; border-radius: 50%;
        margin: 0 auto 20px; overflow: hidden;
        border: 4px solid var(--bg-alt);
      }
      .stats-row {
        display: flex; justify-content: space-around;
        margin-top: 20px; padding-top: 20px;
        border-top: 1px solid var(--border);
      }
      .stat h4 { font-size: 1.2rem; margin-bottom: 0; color: var(--fg); }
      .stat span { font-size: 0.75rem; text-transform: uppercase; color: var(--muted-2); letter-spacing: 1px; font-weight: 600; }

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
    </style>
  </head>

  <body>
    <header>
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
          <button class="btn btn-outline btn-sm" id="themeBtn" aria-label="Toggle theme">
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
            <div class="status-pill">
              <div class="dot"></div> Available for New Projects
            </div>
            <h1>{{ config('portfolio.headline', 'Robust Backend Systems & Server Infrastructure.') }}</h1>
            <p class="lead">
              I am <strong>{{ config('portfolio.name') }}</strong>, a <strong>Software Engineer specializing in high-performance Laravel applications and robust Linux infrastructure.</strong> I bridge the gap between complex code and the servers that power them.
            </p>
            
            <div style="display: flex; gap: 16px; margin-top: 30px; flex-wrap: wrap;">
              <a class="btn btn-primary" href="#projects">View My Work</a>
              <a class="btn btn-outline" href="{{ config('portfolio.github') }}" target="_blank">
                <i class="fab fa-github"></i> GitHub
              </a>
            </div>

            <div style="margin-top: 40px; font-size: 0.9rem; color: var(--muted-2); display: flex; gap: 20px; align-items: center;">
              <span><i class="fas fa-map-marker-alt"></i> {{ config('portfolio.location', 'Remote') }}</span>
              <span style="height: 4px; width: 4px; background: var(--border); border-radius: 50%;"></span>
              <span><i class="fas fa-check-circle"></i> Verified Pro</span>
            </div>
          </div>

          <aside class="profile-card">
            <div class="avatar">
               @if(config('portfolio.photo'))
                <img src="{{ config('portfolio.photo') }}" alt="{{ config('portfolio.name') }}" style="width:100%; height:100%; object-fit:cover;">
              @else
                <div style="width:100%; height:100%; background:#e2e8f0; display:grid; place-items:center; color:#64748b;"><i class="fas fa-user fa-2x"></i></div>
              @endif
            </div>
            <h3>Backend & Ops Specialist</h3>
            <p style="font-size: 0.9rem; margin-bottom: 0;">Specializing in high-availability systems and clean code architecture.</p>
            
            <div class="stats-row">
              <div class="stat"><h4>15+</h4><span>Years</span></div>
              <div class="stat"><h4>99.9%</h4><span>Uptime</span></div>
              <div class="stat"><h4>100%</h4><span>Secure</span></div>
            </div>
          </aside>
        </div>
      </section>

      <section id="projects" class="section">
        <div class="container">
          <div class="section-header">
            <div>
              <h2>Technical Implementations</h2>
              <p style="margin-bottom: 0;">Technical Demonstrations of Laravel, backend architecture and server automation capabilities.</p>
            </div>
            <a href="{{ config('portfolio.github') }}" class="btn btn-outline btn-sm">View All Code →</a>
          </div>

          <div class="grid-4">
  
  <a href="/test-nutrition">
    <article class="card">
      <div class="terminal-thumb">
        <i class="fab fa-php"></i>
        <span class="text-mono">api/routes.php</span>
      </div>
      <div class="card-body">
        <h3>SaaS Nutrition API</h3>
        <p>REST API built with Laravel. Features include external API integration (Edamam), caching layers, and rate limiting.</p>
        <div class="tags">
          <span class="tag">Laravel 10</span>
          <span class="tag">REST API</span>
        </div>
      </div>
    </article>
  </a>

  <a href="/todos">
    <article class="card">
      <div class="terminal-thumb">
        <i class="fab fa-laravel"></i>
        <span class="text-mono">crud/todos.php</span>
      </div>
      <div class="card-body">
        <h3>Task Manager CRUD</h3>
        <p>Todo list application demonstrating full Create, Read, Update, Delete operations with database validation.</p>
        <div class="tags">
          <span class="tag">Laravel</span>
          <span class="tag">MySQL</span>
          <span class="tag">Eloquent</span>
        </div>
      </div>
    </article>
  </a>

  <a href="/homelab">
    <article class="card">
      <div class="terminal-thumb">
        <i class="fas fa-network-wired"></i>
        <span class="text-mono">/etc/bind/named.conf</span>
      </div>
      <div class="card-body">
        <h3>Home Lab & DNS</h3>
        <p>Enterprise-grade network simulation. Custom BIND9 setup managed via DuckDNS with Nginx reverse proxies and automated SSL.</p>
        <div class="tags">
          <span class="tag">Linux</span>
          <span class="tag">BIND9</span>
        </div>
      </div>
    </article>
  </a>

  <a href="/server-automation">
    <article class="card">
      <div class="terminal-thumb">
        <i class="fas fa-terminal"></i>
        <span class="text-mono">./provision_vps.sh</span>
      </div>
      <div class="card-body">
        <h3>Server Automation</h3>
        <p>A suite of Bash scripts to automate server provisioning, disaster recovery backups, and log rotation.</p>
        <div class="tags">
          <span class="tag">Bash</span>
          <span class="tag">Cron</span>
        </div>
      </div>
    </article>
  </a>

</div>
        </div>
      </section>

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
                <i class="fas fa-linux fa-2x text-brand mb-3"></i>
                <h3>Linux Administration</h3>
                <ul>
                  <li><i class="fas fa-check"></i> VPS Provisioning (Ubuntu)</li>
                  <li><i class="fas fa-check"></i> Nginx & Apache Config</li>
                  <li><i class="fas fa-check"></i> DNS Management</li>
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
                  <button class="btn btn-primary" id="copyEmailBtn">Copy</button>
                </div>
              </div>
              
              <div style="margin-top: 30px;">
                <a href="{{ config('portfolio.linkedin') }}" class="btn btn-outline" style="width: 100%; justify-content: center;">
                  <i class="fab fa-linkedin"></i> Connect on LinkedIn
                </a>
              </div>
            </div>

            <form id="contactForm">
              <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                  <label>Name</label>
                  <input type="text" name="name" required placeholder="John Doe">
                </div>
                <div>
                  <label>Email</label>
                  <input type="email" name="email" required placeholder="john@company.com">
                </div>
              </div>
              <label>Project Details</label>
              <textarea name="message" rows="5" required placeholder="I need help with..."></textarea>
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
          <span style="opacity: 0.6;">Systems & Backend Architecture.</span>
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
        document.getElementById('copyEmailBtn').addEventListener('click', () => {
          navigator.clipboard.writeText(EMAIL).then(() => showToast('Email copied to clipboard!'));
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
  </body>
</html>