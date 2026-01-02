<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('portfolio.name') }} || Server Automation</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    
</head>
<body class="p-4 p-md-5">

<div class="container">

    <div class="row mb-5">
        <div class="col-12">
            <a href="{{ url('/') }}" class="btn btn-outline-light rounded-pill px-4 shadow-sm btn-back bg-white">
                <i class="fas fa-arrow-left me-2"></i> Back to Portfolio
            </a>
        </div>
    </div>

    <div class="row mb-5 align-items-end">
        <div class="col-lg-8 page-header">
            <h1 class="mb-3">Server Automation Suite</h1>
            <p class="lead text-muted">
                I build self-healing infrastructure. Using <span class="text-dark fw-bold">Python</span> and <span class="text-dark fw-bold">Bash</span>, 
                I automate the critical lifecycle of client VPS instances—from provisioning to disaster recovery.
                
            </p>
        </div>
        <div class="col-lg-4 text-lg-end">
            <span class="badge bg-dark rounded-pill me-1">Python 3.11</span>
            <span class="badge bg-secondary rounded-pill me-1">Bash</span>
            <span class="badge bg-primary rounded-pill">Cron</span>
        </div>
    </div>

    <div class="row g-5">
        
        <div class="col-lg-4">
            <h6 class="text-uppercase text-muted fw-bold mb-4 ls-1 small">
                <i class="fas fa-clock me-2"></i> Automation Cycle
            </h6>

            <div class="feature-card card-provision">
                <span class="time-badge"><i class="fas fa-bolt text-success me-1"></i> On Demand</span>
                <h5 class="fw-bold">Zero-Touch Provisioning</h5>
                <p class="text-muted small mb-0">
                    Bash scripts that bootstrap a fresh VPS: configuring users, SSH hardening, and installing dependencies (Nginx/PHP) in < 60s.
                </p>
            </div>

            <div class="feature-card card-backup">
                <span class="time-badge"><i class="fas fa-history text-primary me-1"></i> Daily @ 03:00 UTC</span>
                <h5 class="fw-bold">Auto-Healing Backups</h5>
                <p class="text-muted small mb-0">
                    Python scripts utilizing <code>boto3</code> to compress databases and sync encrypted archives to off-site S3 storage buckets.
                </p>
            </div>

            <div class="feature-card card-logs">
                <span class="time-badge"><i class="fas fa-sync-alt text-warning me-1"></i> Weekly @ Sunday</span>
                <h5 class="fw-bold">Log Rotation & Cleanup</h5>
                <p class="text-muted small mb-0">
                    Automated maintenance to compress old access logs, prune temp files, and ensure 99.9% disk availability.
                </p>
            </div>
        </div>

        <div class="col-lg-8">
            <h6 class="text-uppercase text-muted fw-bold mb-4 ls-1 small">
                <i class="fas fa-code me-2"></i> Script Architecture
            </h6>

            <div class="ide-window">
                <div class="ide-header">
                    <div class="window-dots">
                        <div class="dot dot-red"></div>
                        <div class="dot dot-yellow"></div>
                        <div class="dot dot-green"></div>
                    </div>
                    <div class="ide-tabs">
                        <div class="tab active"><i class="fab fa-python text-warning"></i> backup_core.py</div>
                        <div class="tab"><i class="fas fa-terminal text-success"></i> provision.sh</div>
                        <div class="tab"><i class="fas fa-cog text-muted"></i> config.json</div>
                    </div>
                </div>

                <div class="ide-body">
                    <div>
                        <span class="line-num">01</span>
                        <span class="kwd">import</span> boto3
                    </div>
                    <div>
                        <span class="line-num">02</span>
                        <span class="kwd">import</span> os
                    </div>
                    <div>
                        <span class="line-num">03</span>
                        <span class="kwd">from</span> datetime <span class="kwd">import</span> datetime
                    </div>
                    <div><span class="line-num">04</span></div>
                    <div>
                        <span class="line-num">05</span>
                        <span class="comment"># Connect to S3 for Off-site Storage</span>
                    </div>
                    <div>
                        <span class="line-num">06</span>
                        <span class="kwd">def</span> <span class="func">upload_backup</span>(<span class="var">file_name</span>):
                    </div>
                    <div>
                        <span class="line-num">07</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;s3 = boto3.client(<span class="str">'s3'</span>)
                    </div>
                    <div>
                        <span class="line-num">08</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="kwd">try</span>:
                    </div>
                    <div>
                        <span class="line-num">09</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;response = s3.upload_file(
                    </div>
                    <div>
                        <span class="line-num">10</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="var">file_name</span>, 
                        <span class="str">'client-backups-vps1'</span>, 
                        <span class="var">file_name</span>
                    </div>
                    <div>
                        <span class="line-num">11</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                    </div>
                    <div>
                        <span class="line-num">12</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="func">print</span>(<span class="str">f"[SUCCESS] {file_name} pushed to S3 Cloud."</span>)
                    </div>
                    <div>
                        <span class="line-num">13</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="kwd">except</span> Exception <span class="kwd">as</span> e:
                    </div>
                    <div>
                        <span class="line-num">14</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="func">log_error</span>(e)
                        <span class="comment"># Trigger SMS alert via Twilio API</span>
                    </div>
                </div>
            </div>

            <div class="mt-4 p-3 bg-white rounded border border-light shadow-sm">
                <div class="d-flex align-items-start">
                    <i class="fas fa-info-circle text-primary mt-1 me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Why Custom Scripts?</h6>
                        <p class="text-muted small mb-0">
                            While tools like Ansible are great, custom Python/Bash scripts offer lower overhead for lightweight VPS instances. 
                            My scripts include built-in error handling and integrate directly with client notification systems (Slack/SMS) for instant alerts.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>