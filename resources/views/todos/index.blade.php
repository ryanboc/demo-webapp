@extends('layouts.app')

@section('content')
<div class="container" style="padding: var(--space-md) 0;">
    
    <div style="margin-bottom: 40px;">
        <a href="{{ url('/') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Back to Portfolio
        </a>
    </div>

    <div class="grid-2" style="align-items: end; margin-bottom: var(--space-lg);">
        <div>
            <h1 style="margin-bottom: 16px;">Laravel CRUD <span style="color: var(--muted-2);">&&</span> Ops</h1>
            <p style="color: var(--muted); font-size: 1.1rem;">
                Orchestrate your daily objectives with high availability. A streamlined Laravel web-app system utilizing 
                <span style="color: var(--fg); font-weight: 700;">Laravel</span> and 
                <span style="color: var(--fg); font-weight: 700;">cron scheduling</span> for automated resource pruning and database maintenance.
            </p>
        </div>
        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <span class="tag">Laravel</span>
            <span class="tag">PHP</span>
            <span class="tag">Cron</span>
            <span class="tag">CRUD</span>
        </div>
    </div>

    <div class="grid-1-2">
        
        <div>
            <h6 class="text-mono" style="font-size: 0.8rem; color: var(--muted-2); margin-bottom: 24px; letter-spacing: 1px;">
                <i class="fas fa-network-wired"></i> CURRENT STATUS
            </h6>
            
            <div class="card">
                <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 8px;">
                    <div style="font-size: 2.5rem; font-weight: 800; color: var(--fg);">{{ $todos->count() }}</div>
                    <span style="font-size: 0.75rem; color: var(--muted); text-transform: uppercase; font-weight: 700; letter-spacing: 1px;">Active Tasks</span>
                </div>
                
                <div style="margin-bottom: 24px; padding-bottom: 24px; border-bottom: 1px solid var(--border);">
                    <a href="{{ route('todos.create') }}" class="btn" style="background: var(--brand); color: #fff; width: 100%; justify-content: center; padding: 12px; font-size: 1rem;">
                        <i class="fas fa-plus"></i> Deploy New Task
                    </a>
                </div>

                <div class="terminal-window">
                    <div class="terminal-body" style="padding: 16px;">
                        <div style="color: #ffbd2e; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; margin-bottom: 12px; letter-spacing: 1px;">
                            <i class="fas fa-microchip" style="animation: pulse 2s infinite;"></i> Auto-Pruning Active
                        </div>
                        <p style="font-size: 0.85rem; margin-bottom: 16px; color: #cbd5e1;">
                            To conserve VPS resources, a Linux Cron Daemon automatically flushes this database daily at 5pm.
                        </p>
                        <div style="background: rgba(0,0,0,0.4); padding: 10px; border-radius: 6px; border: 1px solid #334155;">
                            <span class="cmd-prompt">root@vps:~#</span> <span class="cmd-text">crontab -l</span><br>
                            <span class="cmd-text" style="color: #4ade80;">0 * * * * php artisan schedule:run</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h6 class="text-mono" style="font-size: 0.8rem; color: var(--muted-2); margin-bottom: 24px; letter-spacing: 1px;">
                <i class="fas fa-stream"></i> TASK STREAM
            </h6>

            <div class="flow-container">
                <div class="flow-line"></div>
                
                @forelse($todos as $todo)
                    <div class="flow-card" style="justify-content: space-between;">
                        <div style="display: flex; align-items: center; gap: 16px;">
                            <div class="flow-icon" style="color: var(--brand);">
                                <i class="fas fa-terminal"></i>
                            </div>
                            <div class="flow-content">
                                <h5>{{ $todo->title }}</h5>
                                <p style="font-family: var(--font-mono); margin-top: 4px;">
                                    ID: {{ substr(md5($todo->id), 0, 8) }} &bull; {{ $todo->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('todos.edit', $todo->id) }}" style="color: var(--muted); text-decoration: none; padding: 8px; transition: 0.2s;" onmouseover="this.style.color='var(--brand)'" onmouseout="this.style.color='var(--muted)'">
                                <i class="fas fa-pen"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div style="color: var(--muted); font-style: italic; font-family: var(--font-mono); padding-left: 20px;">
                        // No active processes found. System idle.
                    </div>
                @endforelse

            </div>
        </div>

    </div>
</div>
@endsection