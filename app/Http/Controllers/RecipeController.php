<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Category;
use Illuminate\Http\Request;
use App\Events\RecipeSaved;
use App\Http\Requests\RecipeRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        // \DB::connection()->enableQueryLog();

        // $recipes = auth()->user()->recipes()->latest()->paginate();

        // Esta consulta no es muy rápida ???
        $recipes = Recipe::with('category')->latest()
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
        $recipe = new Recipe( $request->validated() );

        $recipe->image = $request->file('image')->store('recipes');

        $recipe->user_id = auth()->id();

        $recipe->save();

        RecipeSaved::dispatch($recipe);

        return redirect()->route('recipes.index');
    }

    public function show(Recipe $recipe)
    {
        // dd(auth()->user()->iLike->contains);
        // Contains -> Si le pasas un ID revisa si le existe.
        $like = auth()->user() ? auth()->user()->iLike->contains($recipe->id) : false;

        // dd($like);

        return view('recipes.show', compact('recipe', 'like'));
    }

    public function edit(Recipe $recipe)
    {
        $this->authorize('view', $recipe);

        $categories = Category::pluck('name', 'id');

        return view('recipes.edit', compact('recipe', 'categories'));
    }

    public function update(RecipeRequest $request, Recipe $recipe)
    {
        $this->authorize('update', $recipe);

        if ($request->hasFile('image')) {
            Storage::delete($recipe->image);

            $recipe->fill( $request->validated() );

            $recipe->image = $request->file('image')->store('recipes');

            $recipe->save();

            RecipeSaved::dispatch($recipe);
        } else {
            $recipe->update( array_filter($request->validated()) );
        }

        return redirect()->route('recipes.index');
    }

    public function destroy(Recipe $recipe)
    {
        $this->authorize('delete', $recipe);

        $recipe->delete();

        return redirect()->route('recipes.index'); 
    }
}

