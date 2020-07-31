<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\RecipeRequest;
use Intervention\Image\Facades\Image;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $recipes = Recipe::latest()
                ->where('user_id', auth()->id())
                ->paginate();

        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('recipes.create', compact('categories'));
    }

    public function store(RecipeRequest $request)
    {
        $data = $request->validated();

        $image = $request['image']->store('recipes', 'public');

        $imageFit = Image::make(public_path("storage/{$image}"))->fit(1000, 550);
        $imageFit->save();

        Recipe::create([
            'title' => $data['title'],
            'ingredient' => $data['ingredient'],
            'preparation' => $data['preparation'],
            'image' => $image,
            'user_id' => auth()->id(),
            'category_id' => $data['category_id']
        ]);

        return back();
    }

    public function show(Recipe $recipe)
    {
        //
    }

    public function edit(Recipe $recipe)
    {
        //
    }

    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    public function destroy(Recipe $recipe)
    {
        //
    }
}

