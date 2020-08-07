@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				@if ($perfil->image)
					<img src="/storage/{{ $perfil->image }}" alt=""
					class="w-100 rounded-circle">
				@endif
			</div>
			<div class="col-md-7 mt-2 mt-md-0">
				<h2 class="text-center mb-2 text-primary">
					{{ $perfil->user->name }}
				</h2>
				<a href="{{ $perfil->user->url }}" title="">
					Visita mi página web.
				</a>
				<div class="">
					<p>{{ $perfil->biography }}</p>
				</div>
			</div>
		</div>
	</div>
@endsection