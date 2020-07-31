@extends('layouts.app')

@section('content')

<div class="container">
	<h2 class="text-center mb-4">Manager your recipes</h2>

	<div class="d-flex">
		<div class="col-md-2">
			<a class="btn btn-primary text-white d-block" href="{{ route('recipes.create') }}">New recipe</a>	
		</div>
		
		<div class="col-md-10">
			<ul class="list-group list-group-flush d-block">
				@foreach ($recipes as $recipe)
					<li class="list-group-item">{{ $recipe->title }}</li>
				@endforeach
				<div class="text-center">
					{{ $recipes->links() }}
				</div>
			</ul>
		</div>

	</div>


</div>


@endsection