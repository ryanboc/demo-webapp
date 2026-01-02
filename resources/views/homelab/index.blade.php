<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infrastructure & DevOps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --terminal-bg: #1e293b;
            --terminal-header: #0f172a;
        }
        
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }

        /* Section Styling */
        .section-header h2 { font-weight: 800; letter-spacing: -1px; }
        .section-header .line { width: 60px; height: 4px; background: var(--primary-gradient); margin-bottom: 20px; }

        /* Left Column: Network Flow Cards */
        .flow-container { position: relative; padding-left: 20px; }
        .flow-line {
            position: absolute;
            left: 45px; /* Aligns with icon center */
            top: 20px;
            bottom: 20px;
            width: 2px;
            background: #e2e8f0;
            z-index: 0;
            border-left: 2px dashed #cbd5e1;
        }
        
        .flow-card {
            position: relative;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            transition: transform 0.2s, box-shadow 0.2s;
            z-index: 1; /* Sits above the line */
            display: flex;
            align-items: center;
        }
        .flow-card:hover {
            transform: translateX(5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            border-color: #cbd5e1;
        }
        .flow-icon {
            width: 50px;
            height: 50px;
            background: #f8fafc;
            color: #64748b;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
            border: 1px solid #e2e8f0;
        }
        .flow-content h5 { font-weight: 700; margin-bottom: 2px; font-size: 1rem; }
        .flow-content p { font-size: 0.85rem; color: #64748b; margin: 0; }

        /* Right Column: The Terminal */
        .terminal-window {
            background: var(--terminal-bg);
            border-radius: 12px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
            font-family: 'Fira Code', monospace;
            overflow: hidden;
            border: 1px solid #334155;
        }
        .terminal-header {
            background: var(--terminal-header);
            padding: 12px 16px;
            border-bottom: 1px solid #334155;
            display: flex;
            align-items: center;
        }
        .window-controls { display: flex; gap: 8px; margin-right: 15px; }
        .control { width: 12px; height: 12px; border-radius: 50%; }
        .close { background: #ff5f56; }
        .min { background: #ffbd2e; }
        .max { background: #27c93f; }
        .terminal-title { color: #94a3b8; font-size: 0.8rem; margin-left: auto; }

        .terminal-body { padding: 25px; color: #e2e8f0; font-size: 0.9rem; line-height: 1.6; }
        .cmd-prompt { color: #22c55e; margin-right: 8px; }
        .cmd-path { color: #3b82f6; }
        .cmd-text { color: #fff; font-weight: 500; }
        
        .log-success { color: #22c55e; }
        .log-warn { color: #f59e0b; }
        .log-info { color: #94a3b8; }
        .log-comment { color: #64748b; font-style: italic; }

        /* Animation for cursor */
        .cursor { display: inline-block; width: 8px; height: 15px; background: #cbd5e1; animation: blink 1s infinite; vertical-align: middle; }
        @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }

        /* Button Hover Effect */
        .btn-back:hover { transform: translateX(-5px); }
    </style>
</head>
<body class="p-5">

<div class="container">

    <div class="row mb-5">
        <div class="col-12">
            <a href="{{ url('/') }}" class="btn btn-outline-dark rounded-pill px-4 shadow-sm btn-back" style="border-width: 2px; font-weight: 600;">
                <i class="fas fa-arrow-left me-2"></i> Back to Portfolio
            </a>
        </div>
    </div>
    
    <div class="row mb-5">
        <div class="col-lg-7 section-header">
            <div class="line"></div>
            <h2>Infrastructure & Automation</h2>
            <p class="text-muted lead mt-3">
                I don't just build apps; I architect the environments they live in. 
                My home lab simulates enterprise constraints to practice high-availability deployments.
            </p>
        </div>
    </div>

    <div class="row g-5">
        
        <div class="col-lg-5">
            <h5 class="fw-bold mb-4 text-uppercase text-secondary small ls-1">
                <i class="fas fa-sitemap me-2"></i> Custom DNS Cluster
            </h5>
            
            <div class="flow-container">
                <div class="flow-line"></div> 
                
                <div class="flow-card">
                    <div class="flow-icon me-3 text-primary"><i class="fas fa-globe"></i></div>
                    <div class="flow-content">
                        <h5>Ingress Traffic</h5>
                        <p>Dynamic IP Resolution via DuckDNS</p>
                    </div>
                </div>

                <div class="flow-card">
                    <div class="flow-icon me-3 text-warning"><i class="fas fa-network-wired"></i></div>
                    <div class="flow-content">
                        <h5>BIND9 Master Server</h5>
                        <p>Split-Horizon DNS & Custom Zone Files</p>
                    </div>
                </div>

                <div class="flow-card">
                    <div class="flow-icon me-3 text-success"><i class="fas fa-server"></i></div>
                    <div class="flow-content">
                        <h5>Nginx Reverse Proxy</h5>
                        <p>SSL Termination & Load Balancing</p>
                    </div>
                </div>

                <div class="mt-4 ps-2">
                    <span class="badge bg-white text-dark border me-1">Ubuntu Server</span>
                    <span class="badge bg-white text-dark border me-1">Docker</span>
                    <span class="badge bg-white text-dark border">UFW Firewall</span>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <h5 class="fw-bold mb-4 text-uppercase text-secondary small ls-1">
                <i class="fas fa-code me-2"></i> Server Automation
            </h5>

            <div class="terminal-window">
                <div class="terminal-header">
                    <div class="window-controls">
                        <div class="control close"></div>
                        <div class="control min"></div>
                        <div class="control max"></div>
                    </div>
                    <div class="terminal-title">admin@vps-01: ~/scripts</div>
                </div>
                <div class="terminal-body">
                    <div class="mb-2">
                        <span class="cmd-prompt">➜</span>
                        <span class="cmd-path">~/ops</span>
                        <span class="cmd-text">./provision.py --target=client_vps</span>
                    </div>

                    <div class="log-info mb-1">[INFO] Connecting to target via SSH...</div>
                    <div class="log-info mb-1">[INFO] detecting OS: Ubuntu 22.04 LTS</div>
                    <div class="log-comment mb-2"># Initiating security hardening protocol</div>
                    
                    <div class="d-flex justify-content-between text-muted small mb-1" style="max-width: 400px;">
                        <span>Updating APT repositories</span>
                        <span class="log-success">DONE (2.1s)</span>
                    </div>
                    <div class="d-flex justify-content-between text-muted small mb-1" style="max-width: 400px;">
                        <span>Configuring Fail2Ban</span>
                        <span class="log-success">DONE (0.4s)</span>
                    </div>
                    <div class="d-flex justify-content-between text-muted small mb-1" style="max-width: 400px;">
                        <span>Rotating Logs</span>
                        <span class="log-warn">SKIPPED (Clean)</span>
                    </div>

                    <div class="log-success mt-3">
                        <i class="fas fa-check-circle me-1"></i> 
                        <strong>Provisioning Complete.</strong> System ready in 14s.
                    </div>

                    <div class="mt-3">
                        <span class="cmd-prompt">➜</span>
                        <span class="cmd-path">~/ops</span>
                        <span class="cursor"></span>
                    </div>
                </div>
            </div>

            <div class="mt-4 text-muted small">
                <p>
                    <strong>Why this matters:</strong> I write Python and Bash scripts to automate the boring stuff. 
                    This script reduces VPS setup time from 30 minutes to seconds, ensuring consistent security compliance for client instances.
                </p>
            </div>
        </div>

    </div>
</div>

</body>
</html>