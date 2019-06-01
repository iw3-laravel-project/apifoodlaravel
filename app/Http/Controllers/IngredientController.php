<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;

class IngredientController extends Controller
{
    public function index()
    {
        return Ingredient::all();
    }

    public function show(Ingredient $ingredient)
    {
        return $ingredient;
    }

    public function store(Request $request)
    {
        $ingredient = Ingredient::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, Article $ingredient)
    {
        $ingredient->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Ingredient $article)
    {
        $ingredient->delete();

        return response()->json(null, 204);
    }
}
