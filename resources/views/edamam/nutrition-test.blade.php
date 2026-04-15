<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('portfolio.name') }} || API </title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>

    <div class="hero-section text-center">
    
    <a href="{{ url('/') }}" class="btn btn-outline-light position-absolute top-0 start-0 m-4 rounded-pill px-3 shadow-sm" style="backdrop-filter: blur(5px);">
        <i class="fas fa-arrow-left me-2"></i> Back to Portfolio
    </a>

    <div class="container pt-4"> <h1 class="display-5 fw-bold mb-3"><i class="fas fa-carrot"></i> Nutrition Analyzer</h1>
        <p class="lead mb-4">Instantly analyze calories, macro-nutrients, and diet labels.</p>
        
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <form action="/test-nutrition" method="POST" class="d-flex">
                    @csrf
                    <input type="text" name="ingredient" 
                           class="form-control search-input shadow-sm" 
                           placeholder="e.g., 1 cup cooked rice" 
                           value="{{ $ingredient ?? '' }}" required>
                    <button type="submit" class="btn btn-primary search-btn shadow-sm">
                        ANALYZE
                    </button>
                </form>
            </div>
        </div>
        
        @if($errors->any())
            <div class="alert alert-danger mt-3 d-inline-block px-5">
                <i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}
            </div>
        @endif
    </div>
</div>

    <div class="container pb-5">
        @if(isset($data))
            <div class="row g-5">
                
                <div class="col-md-7">
                    <h2 class="fw-bold text-dark mb-4">
                        Analysis for: <span class="text-primary">"{{ $ingredient }}"</span>
                    </h2>

                    <div class="mb-4">
                        <h5 class="text-muted small text-uppercase fw-bold ls-1">Diet & Health Labels</h5>
                        <div class="d-flex flex-wrap">
                            @foreach($data['dietLabels'] as $label)
                                <span class="badge bg-success badge-custom"><i class="fas fa-check"></i> {{ str_replace('_', ' ', $label) }}</span>
                            @endforeach
                            @foreach(array_slice($data['healthLabels'], 0, 10) as $label) <span class="badge bg-secondary badge-custom">{{ str_replace('_', ' ', $label) }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm bg-white p-4">
                        <h5 class="text-muted small text-uppercase fw-bold mb-3">Macronutrient Breakdown</h5>
                        @php
                            $protein = $data['totalNutrients']['PROCNT']['quantity'] ?? 0;
                            $fat = $data['totalNutrients']['FAT']['quantity'] ?? 0;
                            $carbs = $data['totalNutrients']['CHOCDF']['quantity'] ?? 0;

                            // Convert to calories
                            $protein_cal = $protein * 4;
                            $carbs_cal = $carbs * 4;
                            $fat_cal = $fat * 9;

                            $total_cal = $protein_cal + $carbs_cal + $fat_cal;

                            if ($total_cal > 0) {
                                $p_pct = ($protein_cal / $total_cal) * 100;
                                $f_pct = ($fat_cal / $total_cal) * 100;
                                $c_pct = ($carbs_cal / $total_cal) * 100;
                            } else {
                                $p_pct = $f_pct = $c_pct = 0;
                            }
                        @endphp
                        <div class="progress" style="height: 25px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: {{ $c_pct }}%" title="Carbs"></div>
                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $f_pct }}%" title="Fat"></div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $p_pct }}%" title="Protein"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2 small text-muted">
                            <span class="text-info"><i class="fas fa-circle"></i> Carbs ({{ round($c_pct) }}%)</span>
                            <span class="text-danger"><i class="fas fa-circle"></i> Fat ({{ round($f_pct) }}%)</span>
                            <span class="text-success"><i class="fas fa-circle"></i> Protein ({{ round($p_pct) }}%)</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="nutrition-label">
                        <div class="nutrition-header">Nutrition Facts</div>
                        <div class="nutrition-row">
                            <span class="label-key">Amount Per Serving</span>
                        </div>
                        <div class="nutrition-row thick-border" style="align-items: baseline;">
                            <span class="label-key" style="font-size: 30px;">Calories</span>
                            <span class="label-key" style="font-size: 30px;">{{ $data['calories'] ?? 0 }}</span>
                        </div>
                        
                        <div class="text-end small mb-1">% Daily Value*</div>

                        <div class="nutrition-row">
                            <span><span class="label-key">Total Fat</span> <span class="label-val">{{ round($data['totalNutrients']['FAT']['quantity'] ?? 0, 1) }}g</span></span>
                            <span class="label-key">{{ round($data['totalDaily']['FAT']['quantity'] ?? 0, 1) }}%</span>
                        </div>

                        <div class="nutrition-row indent">
                            <span><span class="label-val">Saturated Fat</span> <span class="label-val">{{ round($data['totalNutrients']['FASAT']['quantity'] ?? 0, 1) }}g</span></span>
                            <span class="label-key">{{ round($data['totalDaily']['FASAT']['quantity'] ?? 0, 1) }}%</span>
                        </div>

                        <div class="nutrition-row">
                            <span><span class="label-key">Cholesterol</span> <span class="label-val">{{ round($data['totalNutrients']['CHOLE']['quantity'] ?? 0, 1) }}mg</span></span>
                            <span class="label-key">{{ round($data['totalDaily']['CHOLE']['quantity'] ?? 0, 1) }}%</span>
                        </div>

                        <div class="nutrition-row">
                            <span><span class="label-key">Sodium</span> <span class="label-val">{{ round($data['totalNutrients']['NA']['quantity'] ?? 0, 1) }}mg</span></span>
                            <span class="label-key">{{ round($data['totalDaily']['NA']['quantity'] ?? 0, 1) }}%</span>
                        </div>

                        <div class="nutrition-row">
                            <span><span class="label-key">Total Carbohydrate</span> <span class="label-val">{{ round($data['totalNutrients']['CHOCDF']['quantity'] ?? 0, 1) }}g</span></span>
                            <span class="label-key">{{ round($data['totalDaily']['CHOCDF']['quantity'] ?? 0, 1) }}%</span>
                        </div>

                        <div class="nutrition-row indent">
                            <span><span class="label-val">Dietary Fiber</span> <span class="label-val">{{ round($data['totalNutrients']['FIBTG']['quantity'] ?? 0, 1) }}g</span></span>
                            <span class="label-key">{{ round($data['totalDaily']['FIBTG']['quantity'] ?? 0, 1) }}%</span>
                        </div>

                        <div class="nutrition-row indent">
                            <span><span class="label-val">Total Sugars</span> <span class="label-val">{{ round($data['totalNutrients']['SUGAR']['quantity'] ?? 0, 1) }}g</span></span>
                        </div>

                        <div class="nutrition-row thick-border">
                            <span><span class="label-key">Protein</span> <span class="label-val">{{ round($data['totalNutrients']['PROCNT']['quantity'] ?? 0, 1) }}g</span></span>
                            <span class="label-key">{{ round($data['totalDaily']['PROCNT']['quantity'] ?? 0, 1) }}%</span>
                        </div>

                        <div class="small mt-2">
                            *Percent Daily Values are based on a 2,000 calorie diet. Your daily values may be higher or lower depending on your calorie needs.
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center text-muted mt-5">
                <i class="fas fa-utensils fa-4x mb-3 text-secondary opacity-25"></i>
                <h4>Ready to Analyze?</h4>
                <p>Enter any food item above to see full nutritional details.</p>
            </div>
        @endif
    </div>

</body>
</html>