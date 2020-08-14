<div class="col-md-4 mt-4">
    <div class="card shadow">
        <img src="/storage/{{ $receta->image }}" alt="" style="width: 200px">
        <div class="card-body">
            <h3 class="card-title">{{ $receta->title }}</h3>

            <div class="d-flex justify-content-between">
                <small>{{ optional($recipe->created_at)->format('M d') }}
                </small>
                <small>{{ count($receta->like) }} les gusta</small>
            </div>

            <p>{{ Str::words(strip_tags($receta->preparation), 20, '...') }}
            </p>

            <a class="btn btn-primary btn-block" href="{{ route('recipes.show', $receta) }}" title="">Ver más</a>

        </div>
    </div>

</div>