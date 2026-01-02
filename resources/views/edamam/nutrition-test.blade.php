<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edamam Nutrition Analyzer</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        /* Hero Section Styling */
        .hero-section {
            position: relative; /* <--- ADD THIS LINE */
            background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%);
            color: white;
            background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%);
            color: white;
            padding: 60px 0;
            margin-bottom: 40px;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .search-input {
            height: 60px;
            font-size: 1.2rem;
            border-radius: 30px 0 0 30px;
            border: none;
            padding-left: 30px;
        }

        .search-btn {
            border-radius: 0 30px 30px 0;
            font-weight: 600;
            padding: 0 30px;
            background-color: #2c3e50;
            border: none;
        }

        .search-btn:hover {
            background-color: #1a252f;
        }

        /* The FDA Nutrition Label Style */
        .nutrition-label {
            border: 2px solid #000;
            padding: 20px;
            width: 100%;
            max-width: 380px;
            margin: 0 auto;
            background: white;
            font-family: 'Arial Black', 'Helvetica', sans-serif;
            color: #000;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .nutrition-header {
            font-size: 36px;
            font-weight: 900;
            line-height: 1;
            border-bottom: 10px solid #000;
            padding-bottom: 5px;
        }
        .nutrition-row {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #000;
            padding: 5px 0;
        }
        .nutrition-row.thick-border {
            border-bottom: 5px solid #000;
        }
        .nutrition-row.indent {
            padding-left: 20px;
        }
        .label-val { font-weight: 400; font-family: 'Arial', sans-serif; }
        .label-key { font-weight: 900; }
        
        /* Health Badges */
        .badge-custom {
            font-size: 0.8rem;
            padding: 8px 12px;
            margin: 3px;
            border-radius: 50px;
            font-weight: 500;
        }
    </style>
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
                            $total = $protein + $fat + $carbs;
                            
                            // Prevent division by zero
                            if($total > 0) {
                                $p_pct = ($protein / $total) * 100;
                                $f_pct = ($fat / $total) * 100;
                                $c_pct = ($carbs / $total) * 100;
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
                            <span class="label-key">{{ round($data['totalDaily']['FAT']['quantity'] ?? 0) }}%</span>
                        </div>

                        <div class="nutrition-row indent">
                            <span><span class="label-val">Saturated Fat</span> <span class="label-val">{{ round($data['totalNutrients']['FASAT']['quantity'] ?? 0, 1) }}g</span></span>
                            <span class="label-key">{{ round($data['totalDaily']['FASAT']['quantity'] ?? 0) }}%</span>
                        </div>

                        <div class="nutrition-row">
                            <span><span class="label-key">Cholesterol</span> <span class="label-val">{{ round($data['totalNutrients']['CHOLE']['quantity'] ?? 0, 1) }}mg</span></span>
                            <span class="label-key">{{ round($data['totalDaily']['CHOLE']['quantity'] ?? 0) }}%</span>
                        </div>

                        <div class="nutrition-row">
                            <span><span class="label-key">Sodium</span> <span class="label-val">{{ round($data['totalNutrients']['NA']['quantity'] ?? 0, 1) }}mg</span></span>
                            <span class="label-key">{{ round($data['totalDaily']['NA']['quantity'] ?? 0) }}%</span>
                        </div>

                        <div class="nutrition-row">
                            <span><span class="label-key">Total Carbohydrate</span> <span class="label-val">{{ round($data['totalNutrients']['CHOCDF']['quantity'] ?? 0, 1) }}g</span></span>
                            <span class="label-key">{{ round($data['totalDaily']['CHOCDF']['quantity'] ?? 0) }}%</span>
                        </div>

                        <div class="nutrition-row indent">
                            <span><span class="label-val">Dietary Fiber</span> <span class="label-val">{{ round($data['totalNutrients']['FIBTG']['quantity'] ?? 0, 1) }}g</span></span>
                            <span class="label-key">{{ round($data['totalDaily']['FIBTG']['quantity'] ?? 0) }}%</span>
                        </div>

                        <div class="nutrition-row indent">
                            <span><span class="label-val">Total Sugars</span> <span class="label-val">{{ round($data['totalNutrients']['SUGAR']['quantity'] ?? 0, 1) }}g</span></span>
                        </div>

                        <div class="nutrition-row thick-border">
                            <span><span class="label-key">Protein</span> <span class="label-val">{{ round($data['totalNutrients']['PROCNT']['quantity'] ?? 0, 1) }}g</span></span>
                            <span class="label-key">{{ round($data['totalDaily']['PROCNT']['quantity'] ?? 0) }}%</span>
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