<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;

class SearchController extends Controller
{
    // public function autocomplete() {
    //     $term = Input::get('term');
    //     $results = [];
    //     $queryIngredient = DB::table('ingredients')
    //         ->where('title', 'LIKE', '%'.$term.'%')->get();

    //     foreach ($queryIngredient as $query) {
    //         $results[] = ['value' => $query->title ];
    //     }

    //     $results = array_map("unserialize", array_unique(array_map("serialize", $results)));
    //     return Response::json($results);
    // }

    public function result(Request $request) {
        $query = $request->query();
        $ingredient = Ingredient::where('title', $query)->get();
        return response()->json($ingredient, 201);
    }
}
