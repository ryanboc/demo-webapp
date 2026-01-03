@extends('todos.app')

@section('content')

<div class="max-w-3xl mx-auto">
    
    <div class="mb-6">
        <h2 class="text-xl font-bold text-white"><i class="fas fa-wrench mr-2 text-yellow-400"></i> Reconfigure Process</h2>
        <p class="text-slate-400 text-sm">Modifying parameters for Task ID: {{ $todo->id }}</p>
    </div>

    <div class="terminal-window">
        <div class="terminal-header">
            <div class="window-controls">
                <div class="control close"></div>
                <div class="control min"></div>
                <div class="control max"></div>
            </div>
            <div class="text-slate-500 text-xs ml-auto">root@laravel: ~/tasks/edit</div>
        </div>

        <div class="p-6 sm:p-8 bg-slate-900/90 text-slate-300">
            
            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-2 font-mono text-sm">
                    <span class="text-green-500">➜</span>
                    <span class="text-blue-400">~/ops</span>
                    <span class="text-slate-100">sudo vim /etc/tasks/{{ $todo->id }}.conf</span>
                </div>

                <div class="mt-6">
                    <label for="title" class="block text-xs uppercase font-bold text-slate-500 mb-2 tracking-wider">
                        Configuration Value
                    </label>
                    <input type="text" 
                           name="title" 
                           class="w-full bg-slate-800 border border-slate-600 text-white rounded p-3 font-mono focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition"
                           value="{{ old('title', $todo->title) }}">
                    
                    @error('title')
                        <p class="text-red-400 font-mono text-xs mt-2">[ERROR] {{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-8 flex items-center justify-between border-t border-slate-700 pt-6">
                    <a href="{{ route('todos.index') }}" class="text-slate-500 hover:text-white text-sm font-mono transition">
                        :q! (QUIT)
                    </a>
                    
                    <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-2 rounded text-sm font-bold font-mono tracking-wide transition shadow-lg shadow-blue-900/20">
                        :wq (WRITE & QUIT)
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection