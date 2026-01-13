<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Task Ops') }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        /* === LIGHT THEME VARIABLES === */
        :root {
            --bg-body: #f8fafc;      /* Slate 50 */
            --bg-card: #ffffff;      /* White */
            --text-main: #0f172a;    /* Slate 900 */
            --text-muted: #64748b;   /* Slate 500 */
            --border: #e2e8f0;       /* Slate 200 */
            --accent: #2563eb;       /* Blue 600 */
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
        }

        /* === COMPONENT STYLES === */
        
        /* The Window/Card Container */
        .terminal-window {
            background: var(--bg-card);
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            font-family: 'JetBrains Mono', monospace;
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .terminal-header {
            background: #f1f5f9; /* Light Gray Header */
            padding: 12px 16px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
        }

        .window-controls { display: flex; gap: 8px; margin-right: 15px; }
        .control { width: 12px; height: 12px; border-radius: 50%; border: 1px solid rgba(0,0,0,0.1); }
        .close { background: #ff5f56; }
        .min { background: #ffbd2e; }
        .max { background: #27c93f; }

        /* Flow Cards for the List */
        .flow-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
        }
        .flow-card:hover {
            transform: translateX(5px);
            border-color: var(--accent);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        /* === CSS OVERRIDES FOR INNER VIEWS === */
        /* These rules force the dark-mode forms (create/edit) to look white/clean */
        
        .bg-slate-900, .bg-slate-900\/90 { 
            background-color: #ffffff !important; 
            color: #1e293b !important; 
        }
        
        .bg-slate-800 {
            background-color: #f8fafc !important; /* Input backgrounds */
            border-color: #cbd5e1 !important;
            color: #0f172a !important;
        }
        
        .text-slate-100, .text-white { color: #0f172a !important; }
        .text-slate-300, .text-slate-400 { color: #64748b !important; }
        .text-slate-500 { color: #94a3b8 !important; }
        
        /* Fix the icons in the list */
        .w-12.bg-slate-900 {
            background-color: #f0f9ff !important; /* Light blue bg for icon */
            border-color: #e0f2fe !important;
        }

        /* Sweet Alert */
        .swal2-popup.swal2-toast {
            background-color: #1e293b !important; /* Matches your UI */
            color: #f1f5f9 !important;           /* Light text */
        }
        .swal2-title {
            color: #f1f5f9 !important;           /* Title text */
        }
        .swal2-success-circular-line-left, 
        .swal2-success-circular-line-right, 
        .swal2-success-fix {
            background-color: transparent !important; /* Fixes white circles in dark mode */
        } 
    </style>
</head>
<body class="antialiased min-h-screen p-6 sm:p-12">

    <div class="max-w-5xl mx-auto">
        
        <div class="flex justify-between items-end mb-12 border-b border-slate-200 pb-6">
            
            <div>
                <div class="h-1 w-16 bg-gradient-to-r from-blue-600 to-indigo-600 mb-4"></div>
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900">System Tasks <span class="text-slate-400">&&</span> Ops</h2>
                <p class="text-slate-500 mt-2 font-light">
                    Orchestrate your daily objectives with high availability.
                </p>
            </div>

            <div class="flex flex-col items-end gap-3">
                
                <div class="bg-white border border-slate-200 rounded px-4 py-2 font-mono text-xs shadow-sm flex items-center">
                    <span class="text-green-600 mr-2">➜</span>
                    <span class="text-blue-600 font-bold">root</span>
                    <span class="text-slate-400">@</span>
                    <span class="text-purple-600">vps-01</span>
                    <span class="ml-3 pl-3 border-l border-slate-200 text-slate-400 cursor-not-allowed uppercase tracking-wider text-[10px]">
                        ssh-session
                    </span>
                </div>

                @if(!request()->routeIs('todos.index'))
                    <a href="{{ route('todos.index') }}" class="group flex items-center text-sm font-semibold text-slate-500 hover:text-blue-600 transition mt-1">
                        <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                        Return to Console
                    </a>
                @endif
            </div>
        </div>
        @yield('content')

        @include('sweetalert::alert')
         @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Success!',
                        text: "{{ session('success') }}",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                });
            </script>
         @endif
    </div>

</body>
</html>