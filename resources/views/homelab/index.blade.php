@extends('layouts.app')

@section('content')
<div class="container" style="padding: var(--space-md) 0;">
    <div style="margin-bottom: 40px;">
        <a href="{{ url('/') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Back to Portfolio
        </a>
    </div>
    
    <div style="margin-bottom: 60px;">
        <div style="width: 50px; height: 4px; background: var(--brand); margin-bottom: 20px;"></div>
        <h1 style="font-size: 2.5rem;">Infrastructure & Automation</h1>
        <p style="color: var(--muted); font-size: 1.1rem; max-width: 800px;">
            I architect the environments apps live in. My home lab simulates enterprise constraints to practice high-availability deployments.
        </p>
    </div>

    <div class="grid-2">
        <div>
            <h3 class="text-mono" style="font-size: 0.8rem; color: var(--muted); letter-spacing: 1px; margin-bottom: 24px;">
                <i class="fas fa-sitemap"></i> CUSTOM DNS CLUSTER
            </h3>
            
            <div class="flow-container">
                <div class="flow-line"></div>
                
                <div class="flow-card">
                    <div class="flow-icon" style="color: #3b82f6;"><i class="fas fa-globe"></i></div>
                    <div class="flow-content" style="margin-left: 15px;">
                        <h5>Ingress Traffic</h5>
                        <p>Dynamic IP Resolution via DuckDNS</p>
                    </div>
                </div>

                <div class="flow-card">
                    <div class="flow-icon" style="color: #eab308;"><i class="fas fa-network-wired"></i></div>
                    <div class="flow-content" style="margin-left: 15px;">
                        <h5>BIND9 Master Server</h5>
                        <p>Split-Horizon DNS & Custom Zone Files</p>
                    </div>
                </div>

                <div class="flow-card">
                    <div class="flow-icon" style="color: #22c55e;"><i class="fas fa-server"></i></div>
                    <div class="flow-content" style="margin-left: 15px;">
                        <h5>Nginx Reverse Proxy</h5>
                        <p>SSL Termination & Load Balancing</p>
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px; display: flex; gap: 8px;">
                <span class="tag">Ubuntu Server</span>
                <span class="tag">Docker</span>
                <span class="tag">UFW Firewall</span>
            </div>
        </div>

        <div>
            <h3 class="text-mono" style="font-size: 0.8rem; color: var(--muted); letter-spacing: 1px; margin-bottom: 24px;">
                <i class="fas fa-code"></i> SERVER AUTOMATION
            </h3>

            <div class="terminal-window">
                <div class="terminal-header">
                    <div class="window-controls">
                        <div class="control close"></div>
                        <div class="control min"></div>
                        <div class="control max"></div>
                    </div>
                    <div style="margin-left: auto; font-family: var(--font-mono); font-size: 0.7rem; opacity: 0.5;">admin@vps-01: ~/scripts</div>
                </div>
                <div class="terminal-body">
                    <div style="margin-bottom: 12px;">
                        <span class="cmd-prompt">➜</span><span class="cmd-path">~/ops</span><span class="cmd-text">./provision.py --target=client_vps</span>
                    </div>
                    <div class="log-info">[INFO] Connecting to target via SSH...</div>
                    <div class="log-info">[INFO] detecting OS: Ubuntu 22.04 LTS</div>
                    <div class="log-comment"># Initiating security hardening protocol</div>
                    
                    <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                        <span>Updating APT repositories</span>
                        <span class="log-success">DONE (2.1s)</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span>Configuring Fail2Ban</span>
                        <span class="log-success">DONE (0.4s)</span>
                    </div>

                    <div class="log-success" style="margin-top: 20px; font-weight: bold;">
                        <i class="fas fa-check-circle"></i> Provisioning Complete. System ready in 14s.
                    </div>
                </div>
            </div>

            <p style="margin-top: 24px; font-size: 0.9rem; color: var(--muted);">
                <strong>Why this matters:</strong> I write Python and Bash scripts to automate the boring stuff, reducing setup time from 30 minutes to seconds.
            </p>
        </div>
    </div>
</div>
@endsection