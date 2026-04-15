<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class EdamamController extends Controller
{
    public function showForm()
    {
        return view('edamam.nutrition-test');
    }

    // public function analyze(Request $request)
    // {
    //     $request->validate([
    //         'ingredient' => 'required|string|max:255',
    //     ]);

    //     $ingredient = $request->input('ingredient');
    //     $cacheKey = 'nutrition_analysis_' . Str::slug($ingredient);

       
    //     $data = Cache::remember($cacheKey, 60 * 60, function () use ($ingredient) {
    //         $response = Http::get('https://api.edamam.com/api/nutrition-data', [
    //             'app_id' => config('services.edamam.app_id'),
    //             'app_key' => config('services.edamam.app_key'),
    //             'ingr' => $ingredient,
    //         ]);

    //         if ($response->successful()) {
    //             return $response->json();
    //         }
    //         return null;
    //     });

        
    //     if (!$data) {
    //          return back()->withErrors('API Connection Failed.');
    //     }

        
    //     if (!isset($data['calories']) && isset($data['ingredients'][0]['parsed'][0])) {
    //         $parsed = $data['ingredients'][0]['parsed'][0];
            
            
    //         $data['totalNutrients'] = $parsed['nutrients'];
            
            
    //         $data['calories'] = $parsed['nutrients']['ENERC_KCAL']['quantity'] ?? 0;
    //         $data['totalWeight'] = $parsed['weight'] ?? 0;
            
            
    //         $data['dietLabels'] = $data['dietLabels'] ?? [];
    //         $data['healthLabels'] = $data['healthLabels'] ?? [];
    //         $data['totalDaily'] = $data['totalDaily'] ?? []; 
    //     }

        
    //     if (!isset($data['totalNutrients'])) {
    //         Cache::forget($cacheKey);
    //         return back()->withErrors('Could not understand that ingredient. Try "100g chicken breast".');
    //     }

    //     return view('edamam.nutrition-test', ['data' => $data, 'ingredient' => $ingredient]);
    // }

    public function analyze(Request $request)
    {
        $request->validate([
            'ingredient' => 'required|string|max:255',
        ]);

        $ingredient = $request->input('ingredient');
        $cacheKey = 'nutrition_analysis_' . Str::slug($ingredient);

        $data = Cache::remember($cacheKey, 60 * 60, function () use ($ingredient) {
            $response = Http::get('https://api.edamam.com/api/nutrition-data', [
                'app_id' => config('services.edamam.app_id'),
                'app_key' => config('services.edamam.app_key'),
                'ingr' => $ingredient,
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            return null;
        });

        
        if (!$data) {
            return back()->withErrors('API Connection Failed.');
        }

        
        if (!isset($data['calories']) && isset($data['ingredients'][0]['parsed'][0])) {
            $parsed = $data['ingredients'][0]['parsed'][0];

            $data['totalNutrients'] = $parsed['nutrients'] ?? [];
            $data['calories'] = $parsed['nutrients']['ENERC_KCAL']['quantity'] ?? 0;
            $data['totalWeight'] = $parsed['weight'] ?? 0;

            $data['dietLabels'] = $data['dietLabels'] ?? [];
            $data['healthLabels'] = $data['healthLabels'] ?? [];
            $data['totalDaily'] = $data['totalDaily'] ?? [];
        }

       
        if (!isset($data['totalNutrients'])) {
            Cache::forget($cacheKey);
            return back()->withErrors('Could not understand that ingredient. Try "100g chicken breast".');
        }

       
        $dailyValues = [
            'FAT' => 78,
            'FASAT' => 20,
            'CHOLE' => 300,
            'NA' => 2300,
            'CHOCDF' => 275,
            'FIBTG' => 28,
            'PROCNT' => 50,
        ];

        if (empty($data['totalDaily'])) {
            $data['totalDaily'] = [];

            foreach ($dailyValues as $key => $dv) {
                $value = $data['totalNutrients'][$key]['quantity'] ?? 0;

                $data['totalDaily'][$key] = [
                    'quantity' => $dv > 0 ? ($value / $dv) * 100 : 0
                ];
            }
        }

        return view('edamam.nutrition-test', [
            'data' => $data,
            'ingredient' => $ingredient
        ]);
    }
}
