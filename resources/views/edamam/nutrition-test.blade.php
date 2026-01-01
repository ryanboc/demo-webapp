<!DOCTYPE html>
<html>
<head>
    <title>Edamam API Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">

    <div class="container">
        <h1>Nutrition API Tester</h1>

        <form action="/test-nutrition" method="POST" class="mb-4">
            @csrf
            <div class="mb-3">
                <label>Enter an Ingredient:</label>
                <input type="text" name="ingredient" class="form-control" 
                       placeholder="e.g., 1 large apple" 
                       value="{{ $ingredient ?? '' }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Analyze</button>
        </form>

        @if(isset($data))
            <hr>
            <h3>Results for: <i>{{ $ingredient }}</i></h3>
            
            <div class="card p-3 bg-light">
                <p><strong>Calories:</strong> {{ $data['calories'] ?? 'N/A' }} kcal</p>
                <p><strong>Total Weight:</strong> {{ $data['totalWeight'] ?? 'N/A' }} g</p>
                
                @if(isset($data['totalNutrients']['PROCNT']))
                   <p><strong>Protein:</strong> 
                      {{ round($data['totalNutrients']['PROCNT']['quantity'], 1) }} 
                      {{ $data['totalNutrients']['PROCNT']['unit'] }}
                   </p>
                @endif
            </div>

            <div class="mt-4">
                <h5>Raw API Response (For Debugging):</h5>
                <pre class="bg-dark text-white p-3 rounded">{{ json_encode($data, JSON_PRETTY_PRINT) }}</pre>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
    </div>

</body>
</html>