<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function show(Category $category)
    {

        $categoriesRe = Recipe::where('category_id', $category->id)->paginate();
        return view('categories.show', compact('categoriesRe', 'category'));
    }
}
