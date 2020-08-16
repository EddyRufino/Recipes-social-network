@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
@endsection

@section('content')
    <div class="container">

        <h2 class="text-uppercase mt-5 mb-4">Últimas Recetas</h2>

        <div class="owl-carousel owl-theme">
            @foreach ($recipes as $recipe)
                <div class="card">
                    <img src="/storage/{{ $recipe->image }}" alt="" class="card-img-top">

                    <div class="card-body">
                        <h3>{{ $recipe->title }}</h3>

                        <p>{{ Str::words(strip_tags($recipe->preparation), 10) }}</p>

                        <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-primary d-block font-weight-bold text-uppercase" title="">
                            Ver Receta
                        </a>
                    </div>
                </div>
            @endforeach    
        </div>

        <h2 class="text-uppercase mt-5 mb-4">Recetas Más Votadas</h2>
            <div class="row">
                @foreach ($votadas as $receta)
                    @include('partials.receta')
                @endforeach   
            </div>


        @foreach ($categoryRecipes as $key => $grupo)
            <h2 class="text-uppercase mt-5 mb-4">{{ str_replace('-', ' ', $key) }}</h2>

            <div class="row">
                @foreach ($grupo as $recetas)
                    @foreach ($recetas as $receta)
                        @include('partials.receta')
                    @endforeach
                @endforeach
            </div>
        @endforeach
    </div>
@endsection