<?php

namespace App\Http\Controllers;

use App\TmpIngredient;
use Illuminate\Http\Request;
use App\Events\IngredientPublished;

class TmpIngredientController extends Controller
{

    public function index()
    {
        return TmpIngredient::all();
    }

  /**
   * Saves a new ingredient to the database
   */
  public function store(Request $request) {
    // ...
    // validation can be done here before saving 
    // with $this->validate($request, $rules)
    // ...

    // get data to be saved in an associative array using $request->only()
    $data = $request->only(['title']);

    //  save post and assign return value of created post to $post array
    $tmpingredient = TmpIngredient::create($data);

    event(new IngredientPublished($tmpingredient));

    // return post as response, Laravel automatically serializes this to JSON
    return response($tmpingredient, 201);
  }
}

