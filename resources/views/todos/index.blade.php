@extends('todos.app')

@section('content')
<div class="mb-10">
    <a href="{{ url('/') }}" 
       class="inline-flex items-center bg-white border border-slate-600 rounded-full px-6 py-2 text-slate-700 font-semibold shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
        <i class="fas fa-arrow-left mr-2"></i> Back to Portfolio
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
    
    <div class="lg:col-span-4">
        <h5 class="font-bold text-slate-500 uppercase text-xs tracking-wider mb-6">
            <i class="fas fa-network-wired mr-2"></i> Current Status
        </h5>
        
        <div class="bg-slate-800/50 rounded-xl p-6 border border-slate-700">
            <div class="flex items-baseline justify-between mb-1">
                <div class="text-4xl font-bold text-slate-200">{{ $todos->count() }}</div>
                <span class="text-xs text-slate-200 uppercase font-bold tracking-wider">Active Tasks</span>
            </div>
            
            <div class="mb-6 pt-6 border-b border-slate-700 pb-6">
                <a href="{{ route('todos.create') }}" 
                   class="block w-full text-center py-3 px-4 bg-blue-600 hover:bg-blue-500 text-slate-200 rounded-lg font-semibold transition shadow-lg shadow-blue-900/20">
                    <i class="fas fa-plus mr-2"></i> Deploy New Task
                </a>
            </div>

            <div class="bg-slate-900/50 rounded-lg p-4 border border-slate-700/50">
                <div class="flex items-center text-amber-500 mb-2 text-xs font-bold uppercase tracking-wider">
                    <i class="fas fa-microchip mr-2 animate-pulse"></i> Auto-Pruning Active
                </div>
                <p class="text-xs text-slate-200 leading-relaxed mb-3">
                    To conserve VPS resources, a Linux Cron Daemon automatically flushes this database daily at 5pm.
                </p>
                <div class="font-mono text-[10px] text-slate-500 bg-black/20 p-2 rounded border border-slate-800">
                    <span class="text-green-500">root@vps:~#</span> crontab -l<br>
                    0 * * * * php artisan schedule:run
                </div>
            </div>
            </div>
    </div>

    <div class="lg:col-span-8">
        <h5 class="font-bold text-slate-500 uppercase text-xs tracking-wider mb-6">
            <i class="fas fa-stream mr-2"></i> Task Stream
        </h5>

        <div class="relative pl-8 border-l-2 border-dashed border-slate-700 ml-4 space-y-6">
            
            @forelse($todos as $todo)
                <div class="flow-card relative p-5 flex items-center justify-between group">
                    <div class="absolute -left-[43px] top-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-slate-800 border-2 border-slate-600 group-hover:border-blue-500 group-hover:bg-blue-900 transition-colors"></div>

                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-lg bg-slate-900 border border-slate-700 flex items-center justify-center text-blue-400 mr-4">
                            <i class="fas fa-terminal"></i>
                        </div>
                        <div>
                            <h5 class="text-lg font-bold text-slate-100">{{ $todo->title }}</h5>
                            <p class="text-xs text-slate-500 font-mono mt-1">
                                ID: {{ substr(md5($todo->id), 0, 8) }} &bull; {{ $todo->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>

                    <div class="flex space-x-3 opacity-0 group-hover:opacity-100 transition-opacity">
                        <a href="{{ route('todos.edit', $todo->id) }}" class="p-2 text-slate-400 hover:text-yellow-400 transition">
                            <i class="fas fa-pen"></i>
                        </a>
                        
                    </div>
                </div>
            @empty
                <div class="text-slate-500 italic font-mono pl-4">
                    // No active processes found. System idle.
                </div>
            @endforelse

        </div>
    </div>

</div>
@endsection