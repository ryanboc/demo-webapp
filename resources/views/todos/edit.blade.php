@extends('layouts.app')

@section('content')
<div class="container" style="padding: var(--space-md) 0;">
    
    <div style="margin-bottom: 40px;">
        <a href="{{ route('todos.index') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Discard Changes
        </a>
    </div>

    <div style="margin-bottom: var(--space-lg);">
        <h1 style="margin-bottom: 16px;"><i class="fas fa-wrench" style="color: #ffbd2e;"></i> Reconfigure Process</h1>
        <p style="color: var(--muted); font-size: 1.1rem;">Modifying parameters for Task ID: {{ $todo->id }}</p>
    </div>

    <div class="terminal-window">
        <div class="terminal-header">
            <div class="window-controls">
                <div class="control close"></div>
                <div class="control min"></div>
                <div class="control max"></div>
            </div>
            <div style="color: #94a3b8; font-size: 0.75rem; margin-left: auto;">root@laravel: ~/tasks/edit</div>
        </div>

        <div class="terminal-body" style="padding: 32px;">
            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div style="margin-bottom: 24px; font-size: 0.85rem;">
                    <span class="cmd-prompt">➜</span>
                    <span class="cmd-path">~/ops</span>
                    <span class="cmd-text">sudo vim /etc/tasks/{{ $todo->id }}.conf</span>
                </div>

                <div style="margin-bottom: 32px;">
                    <label for="title" style="display: block; font-size: 0.75rem; text-transform: uppercase; font-weight: 700; color: #64748b; margin-bottom: 8px; letter-spacing: 1px;">
                        Configuration Value
                    </label>
                    
                    <input type="text" 
                           name="title" 
                           id="title" 
                           style="width: 100%; box-sizing: border-box; background: rgba(0,0,0,0.2); border: 1px solid #334155; color: #f8fafc; border-radius: 6px; padding: 16px; font-family: var(--font-mono); font-size: 1rem; outline: none; transition: 0.2s;"
                           onfocus="this.style.borderColor='#ffbd2e'; this.style.boxShadow='0 0 0 1px #ffbd2e'"
                           onblur="this.style.borderColor='#334155'; this.style.boxShadow='none'"
                           value="{{ old('title', $todo->title) }}">
                    
                    @error('title')
                        <p style="color: #ff5f56; font-size: 0.8rem; margin-top: 8px; font-family: var(--font-mono);">
                            [ERROR] {{ $message }}
                        </p>
                    @enderror
                </div>

                <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #334155; padding-top: 24px;">
                    <a href="{{ route('todos.index') }}" style="color: #64748b; text-decoration: none; font-size: 0.85rem; font-family: var(--font-mono); transition: 0.2s;" onmouseover="this.style.color='#f8fafc'" onmouseout="this.style.color='#64748b'">
                        :q! (QUIT)
                    </a>
                    
                    <button type="submit" class="btn" style="background: #3b82f6; color: #fff; border: none; font-weight: 800; font-family: var(--font-mono); padding: 10px 24px;">
                        :wq (WRITE & QUIT)
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection