@extends('layouts.app')

@section('content')
<div class="container" style="padding: var(--space-md) 0;">
    
    <div style="margin-bottom: 40px;">
        <a href="{{ url('/') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Back to Portfolio
        </a>
    </div>

    <div style="text-align: center; margin-bottom: var(--space-lg); padding: 40px 0;">
        <h1 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 16px;">
            <i class="fas fa-carrot" style="color: #f97316;"></i> Nutrition Analyzer
        </h1>
        <p style="color: var(--muted); font-size: 1.1rem; max-width: 600px; margin: 0 auto 30px;">
            Instantly analyze calories, macro-nutrients, and diet labels.
        </p>
        
        <form action="/test-nutrition" method="POST" style="display: flex; gap: 8px; max-width: 500px; margin: 0 auto;">
            @csrf
            <input type="text" name="ingredient" 
                   placeholder="e.g., 1 cup cooked rice" 
                   value="{{ $ingredient ?? '' }}" required
                   style="flex: 1; padding: 12px 16px; border: 1px solid var(--border); border-radius: var(--radius); background: var(--bg-card); color: var(--fg); font-family: var(--font-main); outline: none;">
            <button type="submit" class="btn" style="background: var(--brand); color: #fff; border: none;">
                ANALYZE
            </button>
        </form>
        
        @if($errors->any())
            <div style="color: #ef4444; margin-top: 16px; font-weight: 600;">
                <i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}
            </div>
        @endif
    </div>

    @if(isset($data))
        <style>
            .grid-nutrition { display: grid; grid-template-columns: 1.4fr 1fr; gap: 40px; }
            @media (max-width: 900px) { .grid-nutrition { grid-template-columns: 1fr; } }
            
            /* Custom Nutrition Label matching Dark/Light Mode */
            .nutri-label { border: 2px solid var(--fg); padding: 16px; font-family: var(--font-main); background: var(--bg-card); border-radius: 8px; }
            .nutri-header { font-size: 2.2rem; font-weight: 900; border-bottom: 10px solid var(--fg); margin-bottom: 8px; line-height: 1; color: var(--fg); }
            .nutri-row { display: flex; justify-content: space-between; border-bottom: 1px solid var(--border); padding: 6px 0; font-size: 0.95rem; color: var(--fg); }
            .nutri-row.thick { border-bottom: 5px solid var(--fg); align-items: baseline; }
            .nutri-row.indent { padding-left: 20px; }
            .label-b { font-weight: 800; color: var(--fg); }
            .label-val { color: var(--fg); }
        </style>

        <div class="grid-nutrition">
            
            <div>
                <h2 style="font-weight: 800; margin-bottom: 32px;">
                    Analysis for: <span style="color: var(--brand);">"{{ $ingredient }}"</span>
                </h2>

                <div style="margin-bottom: 40px;">
                    <h5 class="text-mono" style="font-size: 0.8rem; color: var(--muted-2); margin-bottom: 16px; letter-spacing: 1px;">DIET & HEALTH LABELS</h5>
                    <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                        @foreach($data['dietLabels'] as $label)
                            <span class="tag" style="background: rgba(34, 197, 94, 0.1); color: #22c55e; border-color: rgba(34, 197, 94, 0.2);">
                                <i class="fas fa-check"></i> {{ str_replace('_', ' ', $label) }}
                            </span>
                        @endforeach
                        @foreach(array_slice($data['healthLabels'], 0, 10) as $label) 
                            <span class="tag">{{ str_replace('_', ' ', $label) }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="card">
                    <h5 class="text-mono" style="font-size: 0.8rem; color: var(--muted-2); margin-bottom: 16px; letter-spacing: 1px;">MACRONUTRIENT BREAKDOWN</h5>
                    @php
                        $protein = $data['totalNutrients']['PROCNT']['quantity'] ?? 0;
                        $fat = $data['totalNutrients']['FAT']['quantity'] ?? 0;
                        $carbs = $data['totalNutrients']['CHOCDF']['quantity'] ?? 0;

                        $protein_cal = $protein * 4; $carbs_cal = $carbs * 4; $fat_cal = $fat * 9;
                        $total_cal = $protein_cal + $carbs_cal + $fat_cal;

                        if ($total_cal > 0) {
                            $p_pct = ($protein_cal / $total_cal) * 100;
                            $f_pct = ($fat_cal / $total_cal) * 100;
                            $c_pct = ($carbs_cal / $total_cal) * 100;
                        } else {
                            $p_pct = $f_pct = $c_pct = 0;
                        }
                    @endphp
                    
                    <div style="height: 25px; border-radius: 12.5px; overflow: hidden; display: flex; background: var(--bg-alt);">
                        <div style="width: {{ $c_pct }}%; background: #38bdf8;" title="Carbs"></div>
                        <div style="width: {{ $f_pct }}%; background: #f43f5e;" title="Fat"></div>
                        <div style="width: {{ $p_pct }}%; background: #22c55e;" title="Protein"></div>
                    </div>
                    
                    <div style="display: flex; justify-content: space-between; margin-top: 12px; font-size: 0.85rem; font-weight: 600;">
                        <span style="color: #38bdf8;"><i class="fas fa-circle"></i> Carbs ({{ round($c_pct) }}%)</span>
                        <span style="color: #f43f5e;"><i class="fas fa-circle"></i> Fat ({{ round($f_pct) }}%)</span>
                        <span style="color: #22c55e;"><i class="fas fa-circle"></i> Protein ({{ round($p_pct) }}%)</span>
                    </div>
                </div>
            </div>

            <div>
                <div class="nutri-label">
                    <div class="nutri-header">Nutrition Facts</div>
                    
                    <div class="nutri-row">
                        <span class="label-b">Amount Per Serving</span>
                    </div>
                    
                    <div class="nutri-row thick" style="align-items: baseline;">
                        <span class="label-b" style="font-size: 32px;">Calories</span>
                        <span class="label-b" style="font-size: 32px;">{{ $data['calories'] ?? 0 }}</span>
                    </div>
                    
                    <div style="text-align: right; font-size: 0.8rem; font-weight: 600; padding: 4px 0;">% Daily Value*</div>

                    <div class="nutri-row">
                        <span><span class="label-b">Total Fat</span> <span class="label-val">{{ round($data['totalNutrients']['FAT']['quantity'] ?? 0, 1) }}g</span></span>
                        <span class="label-b">{{ round($data['totalDaily']['FAT']['quantity'] ?? 0, 1) }}%</span>
                    </div>

                    <div class="nutri-row indent">
                        <span><span class="label-val">Saturated Fat</span> <span class="label-val">{{ round($data['totalNutrients']['FASAT']['quantity'] ?? 0, 1) }}g</span></span>
                        <span class="label-b">{{ round($data['totalDaily']['FASAT']['quantity'] ?? 0, 1) }}%</span>
                    </div>

                    <div class="nutri-row">
                        <span><span class="label-b">Cholesterol</span> <span class="label-val">{{ round($data['totalNutrients']['CHOLE']['quantity'] ?? 0, 1) }}mg</span></span>
                        <span class="label-b">{{ round($data['totalDaily']['CHOLE']['quantity'] ?? 0, 1) }}%</span>
                    </div>

                    <div class="nutri-row">
                        <span><span class="label-b">Sodium</span> <span class="label-val">{{ round($data['totalNutrients']['NA']['quantity'] ?? 0, 1) }}mg</span></span>
                        <span class="label-b">{{ round($data['totalDaily']['NA']['quantity'] ?? 0, 1) }}%</span>
                    </div>

                    <div class="nutri-row">
                        <span><span class="label-b">Total Carbohydrate</span> <span class="label-val">{{ round($data['totalNutrients']['CHOCDF']['quantity'] ?? 0, 1) }}g</span></span>
                        <span class="label-b">{{ round($data['totalDaily']['CHOCDF']['quantity'] ?? 0, 1) }}%</span>
                    </div>

                    <div class="nutri-row indent">
                        <span><span class="label-val">Dietary Fiber</span> <span class="label-val">{{ round($data['totalNutrients']['FIBTG']['quantity'] ?? 0, 1) }}g</span></span>
                        <span class="label-b">{{ round($data['totalDaily']['FIBTG']['quantity'] ?? 0, 1) }}%</span>
                    </div>

                    <div class="nutri-row indent">
                        <span><span class="label-val">Total Sugars</span> <span class="label-val">{{ round($data['totalNutrients']['SUGAR']['quantity'] ?? 0, 1) }}g</span></span>
                    </div>

                    <div class="nutri-row thick">
                        <span><span class="label-b">Protein</span> <span class="label-val">{{ round($data['totalNutrients']['PROCNT']['quantity'] ?? 0, 1) }}g</span></span>
                        <span class="label-b">{{ round($data['totalDaily']['PROCNT']['quantity'] ?? 0, 1) }}%</span>
                    </div>

                    <div style="font-size: 0.75rem; color: var(--muted); margin-top: 12px; line-height: 1.4;">
                        *Percent Daily Values are based on a 2,000 calorie diet. Your daily values may be higher or lower depending on your calorie needs.
                    </div>
                </div>
            </div>
        </div>
    @else
        <div style="text-align: center; color: var(--muted); margin-top: 60px;">
            <i class="fas fa-utensils fa-3x" style="opacity: 0.3; margin-bottom: 16px;"></i>
            <h4 style="color: var(--fg);">Ready to Analyze?</h4>
            <p>Enter any food item above to see full nutritional details.</p>
        </div>
    @endif
</div>
@endsection