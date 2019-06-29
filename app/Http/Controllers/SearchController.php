<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Ingredient;

class SearchController extends Controller
{

    public function result(Request $request) {
        $term = Input::get('search_ing');
        $ingredient = Ingredient::where('title', 'LIKE', '%'.$term.'%')->get();
        return response()->json($ingredient, 201);
    }
}
