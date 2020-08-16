@extends('layouts.app')

@section('content')
	<div class="container">
		
		<div class="row">
			@foreach ($recipes as $recipe)
				<div class="col-md-4 mt-4">
				    <div class="card shadow">
				        <img src="/storage/{{ $recipe->image }}" alt="" style="width: 200px">
				        <div class="card-body">
				            <h3 class="card-title">{{ $recipe->title }}</h3>

				            <div class="d-flex justify-content-between">
				                <small>{{ optional($recipe->created_at)->format('M d') }}
				                </small>
				                <small>{{ count($recipe->like) }} les gusta</small>
				            </div>

				            <p>{{ Str::words(strip_tags($recipe->preparation), 20, '...') }}
				            </p>

				            <a class="btn btn-primary btn-block" href="{{ route('recipes.show', $recipe) }}" title="">Ver más</a>

				        </div>
				    </div>

				</div>
			@endforeach
		</div>
		<div class="">
			<p>{{ $recipes->links() }}</p>
		</div>
	</div>
@endsection