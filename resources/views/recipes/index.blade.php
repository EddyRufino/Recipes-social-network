@extends('layouts.app')

@section('content')

<div class="col-md-2 d-inline">
	<a class="btn btn-outline-primary " href="{{ route('recipes.create') }}">
		<svg style="width: 20px" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
		New recipe
	</a>
	<a class="btn btn-outline-success " href="{{ route('perfils.edit', Auth::user()->perfil->slug) }}">
		<svg style="width: 20px" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
		Edit Perfil
	</a>
</div>

<div class="container">
	<h2 class="text-center mt-4 mb-4">Manager your recipes</h2>

	<div class="d-flex flex-column justify-content-center align-items-center">

		
		<div class="col-md-10">
			<ul class="list-group list-group-flush d-block">

				{{-- @dump($recipes) --}}

				@foreach ($recipes as $recipe)

				<div class="list-group">
				  <div class="list-group-item list-group-item-action flex-column align-items-start ">
				    <div class="d-flex w-100 justify-content-between">
				      <a href="{{ route('recipes.show', $recipe) }}" class="mb-1 lead">{{ $recipe->title }}</a>
				      <small>{{ optional($recipe->created_at)->format('M d') }}</small>
				    </div>
				    <p class="mb-1">{!! $recipe->preparation !!}</p>
				    <div class="d-flex w-100 justify-content-between">
				    	<small>{{ $recipe->category->name }}</small>
						<div class="btn-group dropleft">
						  <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    {{-- <span class="sr-only">Toggle Dropdown</span> --}}
						  </button>
						  <div class="dropdown-menu">
						    <a class="dropdown-item" href="{{ route('recipes.show' , $recipe) }}"
						    >
						    	Show
							</a>
						    <a class="dropdown-item" href="{{ route('recipes.edit' , $recipe) }}"
						    >
						    	Edit
							</a>

							<delete-recipe recipe-id="{{ $recipe->slug }}">
							</delete-recipe>

						  </div>
						</div>
				    </div>
				  </div>
				</div>

				

				@endforeach

            	{{-- @dump($recipes)

            	@dd(\DB::getQueryLog()) --}}

				<div class="text-center mt-2">
					{{ $recipes->links() }}
				</div>
			</ul>
		</div>

	</div>

	<h2 class="text-center mt-4 mb-4">Recetas que te gustan</h2>
	
	@foreach ($recipeLike->iLike as $like)
		<div class="card" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">C{{ $like->title }}</h5>
		    <p class="card-text">{!! Illuminate\Support\str::limit($like->preparation, 40) !!}</p>
		    <a href="{{ route('recipes.show' , $recipe) }}" class="card-link">Ver más</a>
		  </div>
		</div>
	@endforeach


</div>


@endsection

{{-- <script type="text/javascript">
	document.getElementById("actions").addEventListener("click", myFunction);

	function myFunction() {
	  document.getElementById("actions").innerHTML = "YOU CLICKED ME!";
	}
</script> --}}