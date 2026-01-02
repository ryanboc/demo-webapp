<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('portfolio.name') }} || DevOps</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])


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