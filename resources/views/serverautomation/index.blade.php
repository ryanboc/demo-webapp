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
                I build self-healing infrastructure. Using <span style="color: var(--fg); font-weight: 700;">Python</span> and <span style="color: var(--fg); font-weight: 700;">Bash</span>, 
                I automate the critical lifecycle of client VPS instances.
            </p>
        </div>
        <div style="display: flex; gap: 8px; justify-content: flex-end;">
            <span class="tag">Python 3.11</span>
            <span class="tag">Bash</span>
            <span class="tag">Cron</span>
        </div>
    </div>

    <div class="grid-2" style="grid-template-columns: 1fr 2fr;">
        <div>
            <h6 class="text-mono" style="font-size: 0.8rem; color: var(--muted-2); margin-bottom: 24px; letter-spacing: 1px;">
                <i class="fas fa-clock"></i> AUTOMATION CYCLE
            </h6>

            <div class="feature-card">
                <span class="time-badge"><i class="fas fa-bolt" style="color: #22c55e;"></i> On Demand</span>
                <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Zero-Touch Provisioning</h3>
                <p style="font-size: 0.9rem; color: var(--muted);">Bash scripts that bootstrap a fresh VPS: SSH hardening and dependencies in < 60s.</p>
            </div>

            <div class="feature-card">
                <span class="time-badge"><i class="fas fa-history" style="color: var(--brand);"></i> Daily @ 03:00 UTC</span>
                <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Auto-Healing Backups</h3>
                <p style="font-size: 0.9rem; color: var(--muted);">Python utilizing <code>boto3</code> to compress and sync encrypted archives to S3 storage.</p>
            </div>
        </div>

        <div>
            <h6 class="text-mono" style="font-size: 0.8rem; color: var(--muted-2); margin-bottom: 24px; letter-spacing: 1px;">
                <i class="fas fa-code"></i> SCRIPT ARCHITECTURE
            </h6>

            <div class="ide-window">
                <div class="ide-header">
                    <div class="window-dots"><div class="dot dot-red"></div><div class="dot dot-yellow"></div><div class="dot dot-green"></div></div>
                    <div class="ide-tabs">
                        <div class="tab active"><i class="fab fa-python" style="color: #eab308;"></i> backup_core.py</div>
                        <div class="tab"><i class="fas fa-terminal" style="color: #22c55e;"></i> provision.sh</div>
                    </div>
                </div>
                <div class="ide-body">
                    <div><span class="line-num">01</span><span class="kwd">import</span> boto3</div>
                    <div><span class="line-num">02</span><span class="kwd">import</span> os</div>
                    <div><span class="line-num">03</span><span class="comment"># Connect to S3 for Off-site Storage</span></div>
                    <div><span class="line-num">04</span><span class="kwd">def</span> <span class="func">upload_backup</span>(<span class="var">file_name</span>):</div>
                    <div><span class="line-num">05</span>&nbsp;&nbsp;&nbsp;&nbsp;s3 = boto3.client(<span class="str">'s3'</span>)</div>
                    <div><span class="line-num">06</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="kwd">try</span>:</div>
                    <div><span class="line-num">07</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;s3.upload_file(<span class="var">file_name</span>, <span class="str">'backups'</span>, <span class="var">file_name</span>)</div>
                </div>
            </div>

            <div class="card" style="margin-top: 30px; display: flex; gap: 20px; align-items: start;">
                <i class="fas fa-info-circle" style="color: var(--brand); font-size: 1.2rem; margin-top: 4px;"></i>
                <div>
                    <h4 style="font-size: 1rem; margin-bottom: 4px;">Why Custom Scripts?</h4>
                    <p style="font-size: 0.9rem; color: var(--muted);">
                        Custom scripts offer lower overhead for lightweight VPS instances, providing built-in error handling and direct Slack/SMS alerts.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection