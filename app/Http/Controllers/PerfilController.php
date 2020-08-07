<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Perfil;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PerfilRequest;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function show(Perfil $perfil)
    {
        // Esta parte trata de hacerla con vue-loading
        // $recipes = $perfil->user->recipes;

        $recipes = Recipe::where('user_id', $perfil->user_id)->paginate();

        return view('perfils.show', compact('perfil', 'recipes'));
    }

    public function edit(Perfil $perfil)
    {
        $this->authorize('view', $perfil);

        return view('perfils.edit', compact('perfil'));
    }

    public function update(PerfilRequest $request, Perfil $perfil)
    {
        $this->authorize('update', $perfil);

        $data = $request->validated();

        if ($request->hasFile('image')) {

            Storage::delete($perfil->image);
            $ruta_image = $request->file('image')->store('users');
            $array_image = ['image' => $ruta_image];
            
        }

        // Guarda en la tabla USERS
        auth()->user()->update([
            'name' => $data['name'],
            'url' => $data['url'],
        ]);
        // auth()->user()->name = $data['name'];
        // auth()->user()->url = $data['url'];
        // auth()->user()->save();

        // Elimina los datos de "name", "url"
        unset($data['url']);

        // ARRAY_MERGE recibe arrays, por eso pongo esto:
        $data = [
            'slug' => Str::slug($data['name']),
            'biography' => $data['biography'],
        ];

        auth()->user()->perfil()->update(array_merge(
            $data,
            $array_image ?? []
        ));

        // dd($data);
        return redirect()->route('recipes.index');
    }

    public function destroy(Perfil $perfil)
    {
        //
    }
}
