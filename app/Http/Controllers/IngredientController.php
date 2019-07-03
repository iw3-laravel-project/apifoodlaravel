<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Ingredient;

class IngredientController extends Controller
{
    public function index()
    {
        return Ingredient::all();
    }

    public function show(Request $request)
    {
        $title = Input::get('search_ing');
        $ingredient = Ingredient::where('title', 'LIKE', $title)->get();
        return response()->json($ingredient, 201);
    }

    public function store(Request $request)
    {
        $ingredient = Ingredient::create($request->all());

        return response()->json($ingredient, 201);
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $ingredient->update($request->all());

        return response()->json($ingredient, 200);
    }

    public function delete(Ingredient $ingredient)
    {
        $ingredient->delete();

        return response()->json(null, 204);
    }
}


// public function index()
//     {
//         return Ingredient::all();
//     }

//     public function find(Request $request)
//     {
//         $title = Input::get('search_ing');
//         $ingredient = Ingredient::where('title', 'LIKE', $title)->get();
//         return response()->json($ingredient, 201);
//     }
    
//     public function show($id)
//     {
//         $ingredient = Ingredient::find($id);
//         return response()->json($ingredient, 201);
//     }

//     public function store(Request $request)
//     {
//         $ingredient = Ingredient::create($request->all());

//         return response()->json($ingredient, 201);
//     }

//     public function update(Request $request, Ingredient $ingredient)
//     {
//         $ingredient->update($request->all());

//         return response()->json($ingredient, 200);
//     }

//     public function delete(Ingredient $ingredient)
//     {
//         $ingredient->delete();

//         return response()->json(null, 204);
//     }