@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Categoria {{ $category->name }}</h2>
		<div class="row">
			@foreach ($categoriesRe as $category)
				<div class="col-md-4 mt-4">
				    <div class="card shadow">
				        <img src="/storage/{{ $category->image }}" alt="" style="width: 200px">
				        <div class="card-body">
				            <h3 class="card-title">{{ $category->title }}</h3>

				            <div class="d-flex justify-content-between">
				                <small>{{ optional($category->created_at)->format('M d') }}
				                </small>
				                <small>{{ count($category->like) }} les gusta</small>
				            </div>

				            <p>{{ Str::words(strip_tags($category->preparation), 20, '...') }}
				            </p>

				            <a class="btn btn-primary btn-block" href="{{ route('recipes.show', $category) }}" title="">Ver más</a>

				        </div>
				    </div>

				</div>
			@endforeach
		</div>
	</div>
@endsection