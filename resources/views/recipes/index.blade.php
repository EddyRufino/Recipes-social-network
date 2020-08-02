@extends('layouts.app')

@section('content')

<div class="container">
	<h2 class="text-center mb-4">Manager your recipes</h2>
		<div class="col-md-2 mb-2">
			<a class="btn btn-primary text-white d-block" href="{{ route('recipes.create') }}">New recipe</a>	
		</div>
	<div class="d-flex flex-column justify-content-center align-items-center">

		
		<div class="col-md-10">
			<ul class="list-group list-group-flush d-block">

				{{-- @dump($recipes) --}}

				@foreach ($recipes as $recipe)

				<div class="list-group">
				  <div class="list-group-item list-group-item-action flex-column align-items-start ">
				    <div class="d-flex w-100 justify-content-between">
				      <h5 class="mb-1">{{ $recipe->title }}</h5>
				      <small>3 days ago</small>
				    </div>
				    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
				    <div class="d-flex w-100 justify-content-between">
				    	<small>{{ $recipe->category->name }}</small>
					{{-- 	<small id="actions">aa
							<button type="button" class="close" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						</small> --}}
						<div class="btn-group dropleft">
						  <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    {{-- <span class="sr-only">Toggle Dropdown</span> --}}
						  </button>
						  <div class="dropdown-menu">
						    <a class="dropdown-item" href="{{ route('recipes.show' , $recipe) }}">Show</a>
						    {{-- <a class="dropdown-item" href="{{ route('recipes.edit') }}">Edit</a>
						    <a class="dropdown-item" href="{{ route('recipes.delete') }}">Delete</a> --}}
						  </div>
						</div>
				    </div>
				  </div>
				</div>

				

				@endforeach

            	{{-- @dump($recipes)

            	@dd(\DB::getQueryLog()) --}}

				<div class="text-center">
					{{ $recipes->links() }}
				</div>
			</ul>
		</div>

	</div>


</div>


@endsection

{{-- <script type="text/javascript">
	document.getElementById("actions").addEventListener("click", myFunction);

	function myFunction() {
	  document.getElementById("actions").innerHTML = "YOU CLICKED ME!";
	}
</script> --}}