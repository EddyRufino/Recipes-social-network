<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PerfilRequest;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{

    public function show(Perfil $perfil)
    {
        return view('perfils.show', compact('perfil'));
    }

    public function edit(Perfil $perfil)
    {
        return view('perfils.edit', compact('perfil'));
    }

    public function update(PerfilRequest $request, Perfil $perfil)
    {
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
