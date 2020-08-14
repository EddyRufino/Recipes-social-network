<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Category;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
    	$votadas = Recipe::withCount('like')->orderBy('like_count', 'desc')->take(3)->get();

    	$recipes = Recipe::latest()->limit(5)->get();
    	$categories = Category::all();

    	$categoryRecipes = [];

    	foreach ($categories as $category) {
    		$categoryRecipes[$category->slug][] = Recipe::where('category_id', $category->id)->get();
    	}
        
        return view('welcome', compact('recipes', 'categoryRecipes', 'votadas'));
    }
}
