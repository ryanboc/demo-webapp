<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EdamamController extends Controller
{
    public function showForm()
    {
        return view('edamam.nutrition-test');
    }

    public function analyze(Request $request)
    {
        $ingredient = $request->input('ingredient');

        // Call the Edamam API
        $response = Http::get('https://api.edamam.com/api/nutrition-data', [
            'app_id' => config('services.edamam.app_id'),
            'app_key' => config('services.edamam.app_key'),
            'ingr' => $ingredient,
        ]);

        // If the call fails, return the error
        if ($response->failed()) {
            return back()->withErrors('API Connection failed! Check your keys.');
        }

        // Pass the JSON data to the view
        return view('edamam.nutrition-test', [
            'data' => $response->json(),
            'ingredient' => $ingredient
        ]);
    }
}
