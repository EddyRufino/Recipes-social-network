<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class LikeController extends Controller
{
 
    public function update(Request $request, Recipe $recipe)
    {
        return auth()->user()->iLike()->toggle($recipe);
    }
}
