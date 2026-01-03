@extends('todos.app')

@section('content')

<div class="max-w-3xl mx-auto">
    
    <div class="mb-6">
        <h2 class="text-xl font-bold text-white"><i class="fas fa-code mr-2 text-green-400"></i> Initiate Process</h2>
        <p class="text-slate-400 text-sm">Define the parameters for the new task below.</p>
    </div>

    <div class="terminal-window">
        <div class="terminal-header">
            <div class="window-controls">
                <div class="control close"></div>
                <div class="control min"></div>
                <div class="control max"></div>
            </div>
            <div class="text-slate-500 text-xs ml-auto">user@laravel: ~/tasks/create</div>
        </div>

        <div class="p-6 sm:p-8 bg-slate-900/90 text-slate-300">
            
            <form action="{{ route('todos.store') }}" method="POST">
                @csrf
                
                <div class="mb-2 font-mono text-sm">
                    <span class="text-green-500">➜</span>
                    <span class="text-blue-400">~/ops</span>
                    <span class="text-slate-100">./create_task.sh --title="<span class="text-yellow-300">input_below</span>"</span>
                </div>

                <div class="mt-6">
                    <label for="title" class="block text-xs uppercase font-bold text-slate-500 mb-2 tracking-wider">
                        Target Name (Title)
                    </label>
                    
                    <input type="text" 
                           name="title" 
                           id="title" 
                           class="w-full bg-slate-800 border border-slate-600 text-white rounded p-3 font-mono focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"
                           placeholder="Enter task name..."
                           value="{{ old('title') }}"
                           autofocus>
                    
                    @error('title')
                        <p class="text-red-400 font-mono text-xs mt-2">
                            <i class="fas fa-exclamation-triangle mr-1"></i> [ERROR] {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mt-8 flex items-center justify-between border-t border-slate-700 pt-6">
                    <a href="{{ route('todos.index') }}" class="text-slate-500 hover:text-white text-sm font-mono transition">
                        <i class="fas fa-times mr-1"></i> ABORT
                    </a>
                    
                    <button type="submit" class="bg-green-600 hover:bg-green-500 text-white px-6 py-2 rounded text-sm font-bold font-mono tracking-wide transition shadow-lg shadow-green-900/20">
                        <i class="fas fa-play mr-2"></i> EXECUTE
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection