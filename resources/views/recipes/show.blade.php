@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="d-flex">
            @if($recipe->image)
                <img class="card-img-top"
                    src="/storage/{{ $recipe->image }}"
                    alt="{{ $recipe->title }}"
                >
            @endif
			{{-- <img src="{{ asset($recipe->image) }}"> --}}
			{{-- <img src="/storage/{{ $recipe->image }}"> --}}
			<div class="d-flex flex-column">
				<h1>{{ $recipe->title }}</h1>
				<p>{{ $recipe->category->name }}</p>
				<p>By for {{ $recipe->user->name }}</p>
			</div>
		</div>

		<div class="">
			<h3>Ingredients</h3>
			<p>{!! $recipe->ingredient !!}</p>
		</div>

		<div class="">
			<h3>Praparation</h3>
			<p>{!! $recipe->preparation !!}</p>
		</div>
		
		<like-button
			recipe-id="{{ $recipe->slug }}"
			like="{{ $like }}"
			likes="{{ $likes }}"
		>
		</like-button>

	</div>
@endsection