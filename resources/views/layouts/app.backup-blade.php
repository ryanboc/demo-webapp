<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', config('portfolio.name'))</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
      :root {
        --bg: #ffffff; --bg-alt: #f8fafc; --bg-card: #ffffff;
        --fg: #0f172a; --muted: #475569; --muted-2: #94a3b8;
        --border: #e2e8f0; --brand: #2563eb; --brand-hover: #1d4ed8;
        --radius: 12px; --container: 1100px;
        --font-main: 'Inter', sans-serif; --font-mono: 'JetBrains Mono', monospace;
        --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1);
        --space-md: 32px; --space-lg: 64px;
      }

      [data-theme="dark"] {
        --bg: #0f172a; --bg-alt: #1e293b; --bg-card: #1e293b;
        --fg: #f8fafc; --muted: #cbd5e1; --muted-2: #64748b;
        --border: #334155; --brand: #3b82f6;
      }

      body { font-family: var(--font-main); background: var(--bg); color: var(--fg); margin: 0; line-height: 1.6; }
      .container { width: min(var(--container), calc(100% - 40px)); margin: 0 auto; }
      
      /* Header & Nav */
      header { position: sticky; top: 0; z-index: 100; background: var(--bg); border-bottom: 1px solid var(--border); backdrop-filter: blur(12px); }
      .nav-inner { display: flex; justify-content: space-between; align-items: center; height: 70px; }
      .logo { font-weight: 800; text-decoration: none; color: var(--fg); display: flex; align-items: center; gap: 8px; }
      .text-brand { color: var(--brand); }

      /* Grid & Components */
      .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; }
      @media (max-width: 900px) { .grid-2 { grid-template-columns: 1fr; } }
      
      .card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius); padding: 24px; }
      .tag { font-size: 0.75rem; padding: 4px 10px; border-radius: 6px; background: var(--bg-alt); border: 1px solid var(--border); color: var(--muted); font-family: var(--font-mono); }
      .btn { display: inline-flex; align-items: center; gap: 8px; padding: 8px 16px; border-radius: var(--radius); font-weight: 600; cursor: pointer; text-decoration: none; font-size: 0.85rem; transition: 0.2s; }
      .btn-outline { border: 1px solid var(--border); background: transparent; color: var(--fg); }
      .btn-outline:hover { background: var(--bg-alt); }

      /* Terminal */
      .terminal-window { background: #1e293b; border-radius: 8px; overflow: hidden; color: #cbd5e1; font-family: var(--font-mono); box-shadow: var(--shadow-md); }
      .terminal-header { background: #334155; padding: 10px; display: flex; align-items: center; }
      .window-controls { display: flex; gap: 6px; }
      .control { width: 12px; height: 12px; border-radius: 50%; }
      .close { background: #ff5f56; } .min { background: #ffbd2e; } .max { background: #27c93f; }
      .terminal-body { padding: 20px; font-size: 0.9rem; }
      .log-success { color: #4ade80; }
      .text-mono { font-family: var(--font-mono); }

      .flow-container { position: relative; padding-left: 20px; }
      
      .flow-line { 
        position: absolute; 
        left: 8px; /* Adjusted to align with the center of icons */
        top: 20px; 
        bottom: 20px; 
        width: 0; /* Changed from 2px to 0 */
        border-left: 2px dotted var(--border); /* Better control over the dots */
        z-index: 0;
     }
    .flow-card {
        position: relative;
        z-index: 1; /* Ensures cards sit on top of the line */
        background: var(--bg-card);
        display: flex; align-items: center; background: var(--bg-card);
        border: 1px solid var(--border); padding: 16px; border-radius: var(--radius);
        margin-bottom: 20px; transition: transform 0.2s;
    }
    .flow-card:hover { transform: translateX(5px); border-color: var(--brand); }
    .flow-icon { 
        width: 40px; height: 40px; border-radius: 8px; 
        background: var(--bg-alt); display: grid; place-items: center; font-size: 1.2rem;
    }
    .flow-content h5 { margin: 0; font-size: 1rem; color: var(--fg); }
    .flow-content p { margin: 0; font-size: 0.85rem; color: var(--muted); }

    /* --- Advanced Terminal Styling --- */
    .terminal-window { 
        background: #0f172a; border-radius: 12px; overflow: hidden; 
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2); border: 1px solid #334155;
    }
    .terminal-body { 
        padding: 24px; font-family: var(--font-mono); font-size: 0.85rem; 
        line-height: 1.7; color: #94a3b8; 
    }
    .cmd-prompt { color: #38bdf8; margin-right: 8px; }
    .cmd-path { color: #818cf8; margin-right: 8px; }
    .cmd-text { color: #f8fafc; }
    .log-info { color: #64748b; }
    .log-comment { color: #475569; font-style: italic; }

    /* --- Feature Cards (Automation Cycle) --- */
.feature-card {
    background: var(--bg-card);
    border: 1px solid var(--border);
    padding: 24px;
    border-radius: var(--radius);
    margin-bottom: 20px;
    position: relative;
    transition: transform 0.2s, border-color 0.2s;
}
.feature-card:hover { transform: translateY(-3px); border-color: var(--brand); }
.time-badge {
    display: inline-block;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    color: var(--muted-2);
    margin-bottom: 12px;
    letter-spacing: 0.5px;
}

/* --- IDE Window Styles --- */
.ide-window {
    background: #1e293b; /* Keep dark for code contrast */
    border-radius: 12px;
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    border: 1px solid #334155;
}
.ide-header {
    background: #0f172a;
    padding: 0 16px;
    display: flex;
    align-items: center;
    height: 40px;
}
.window-dots { display: flex; gap: 8px; margin-right: 20px; }
.dot { width: 12px; height: 12px; border-radius: 50%; }
.dot-red { background: #ff5f56; }
.dot-yellow { background: #ffbd2e; }
.dot-green { background: #27c93f; }

.ide-tabs { display: flex; height: 100%; }
.tab {
    padding: 0 16px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.75rem;
    color: #94a3b8;
    border-right: 1px solid #1e293b;
    cursor: pointer;
}
.tab.active { background: #1e293b; color: #f8fafc; }

.ide-body {
    padding: 24px;
    font-family: var(--font-mono);
    font-size: 0.85rem;
    line-height: 1.6;
    color: #cbd5e1;
    overflow-x: auto;
}
.line-num { color: #475569; margin-right: 20px; user-select: none; }
.kwd { color: #c678dd; } /* Keyword */
.func { color: #61afef; } /* Function */
.var { color: #e06c75; } /* Variable */
.str { color: #98c379; } /* String */
.comment { color: #5c6370; font-style: italic; }
    </style>
</head>
<body>
    <header>
      <div class="container nav-inner">
        <a href="{{ url('/') }}" class="logo">
          <i class="fas fa-server text-brand"></i> {{ config('portfolio.name') }}
        </a>
        <button class="btn btn-outline" id="themeBtn">
          <i class="fas fa-moon"></i>
        </button>
      </div>
    </header>

    <main>@yield('content')</main>

    <script>
        const themeBtn = document.getElementById('themeBtn');
        const themeIcon = themeBtn?.querySelector('i');
        const setTheme = (theme) => {
          document.documentElement.setAttribute('data-theme', theme);
          localStorage.setItem('theme', theme);
          if(themeIcon) themeIcon.className = theme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
        };
        setTheme(localStorage.getItem('theme') || 'light');
        themeBtn?.addEventListener('click', () => {
          setTheme(document.documentElement.getAttribute('data-theme') === 'light' ? 'dark' : 'light');
        });
    </script>
</body>
</html>