@extends('layouts.app')

@section('title', 'Server Automation — ' . config('portfolio.name'))

@section('content')
<div class="container" style="padding: var(--space-md) 0;">
    <div style="margin-bottom: 40px;">
        <a href="{{ url('/') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Back to Portfolio
        </a>
    </div>

    <div class="grid-2" style="align-items: end; margin-bottom: var(--space-lg);">
        <div>
            <h1 style="margin-bottom: 16px;">Server Automation Suite</h1>
            <p style="color: var(--muted); font-size: 1.1rem;">
                I build reliable server automation using <span style="color: var(--fg); font-weight: 700;">Bash scripting</span> and 
                <span style="color: var(--fg); font-weight: 700;">cron jobs</span>. 
                My focus is on simplifying repetitive tasks like backups, deployments, and server setup for Linux-based environments.
            </p>
        </div>
        <div class="tag-container">
            <span class="tag">Bash</span>
            <span class="tag">Cron</span>
            <span class="tag">rsync</span>
            <span class="tag">SSH</span>
        </div>
    </div>

    <div class="grid-2 grid-2-wide">
        <div>
            <h6 class="text-mono" style="font-size: 0.8rem; color: var(--muted-2); margin-bottom: 24px; letter-spacing: 1px;">
                <i class="fas fa-clock"></i> AUTOMATION CYCLE
            </h6>

            <div class="feature-card">
                <span class="time-badge"><i class="fas fa-bolt" style="color: #22c55e;"></i> On Demand</span>
                <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Server Provisioning Scripts</h3>
                <p style="font-size: 0.9rem; color: var(--muted);">
                    Bash scripts to quickly bootstrap servers: installing packages, configuring services, and applying basic SSH hardening.
                </p>
            </div>

            <div class="feature-card">
                <span class="time-badge"><i class="fas fa-history" style="color: var(--brand);"></i> Scheduled (Daily)</span>
                <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Automated Backups</h3>
                <p style="font-size: 0.9rem; color: var(--muted);">
                    Cron-driven backup jobs using <code>rsync</code> over SSH to securely sync files to remote servers, ensuring redundancy and data safety.
                </p>
            </div>
        </div>

        <div>
            <h6 class="text-mono" style="font-size: 0.8rem; color: var(--muted-2); margin-bottom: 24px; letter-spacing: 1px;">
                <i class="fas fa-code"></i> SCRIPT ARCHITECTURE
            </h6>

            <div class="ide-window">
                <div class="ide-header">
                    <div class="window-dots">
                        <div class="dot dot-red"></div>
                        <div class="dot dot-yellow"></div>
                        <div class="dot dot-green"></div>
                    </div>
                    <div class="ide-tabs">
                        <div class="tab active">
                            <i class="fas fa-terminal" style="color: #22c55e;"></i> backup.sh
                        </div>
                        <div class="tab">
                            <i class="fas fa-terminal" style="color: #22c55e;"></i> provision.sh
                        </div>
                    </div>
                </div>
                <div class="ide-body">
                    <div><span class="line-num">01</span><span class="comment"># Sync local data to remote backup server</span></div>
                    <div><span class="line-num">02</span>rsync -avz --delete /var/www/ user@backup-server:/backups/www/</div>
                    <div><span class="line-num">03</span></div>
                    <div><span class="line-num">04</span><span class="comment"># Example cron entry (runs daily at 3AM)</span></div>
                    <div><span class="line-num">05</span>0 3 * * * /home/user/scripts/backup.sh</div>
                </div>
            </div>

            <div class="card" style="margin-top: 30px; display: flex; gap: 20px; align-items: start;">
                <i class="fas fa-info-circle" style="color: var(--brand); font-size: 1.2rem; margin-top: 4px;"></i>
                <div>
                    <h4 style="font-size: 1rem; margin-bottom: 4px;">Why Bash Automation?</h4>
                    <p style="font-size: 0.9rem; color: var(--muted);">
                        Lightweight and efficient, Bash scripts are ideal for small to medium environments where simplicity, control, and reliability matter.
                        Using native Linux tools keeps overhead low while maintaining full transparency of the system.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection