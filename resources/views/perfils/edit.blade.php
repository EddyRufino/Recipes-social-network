@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
@endsection

@section('content')
	<div class="container">
		<form action="{{ route('perfils.update', $perfil) }}" method="POST" enctype="multipart/form-data">
			@csrf @method('PUT')

			@if ($perfil->image)
				<div class="row justify-content-center flex-column align-items-center mb-4">
					<p class="text-center">Actual Image</p>
					<img src="/storage/{{ $perfil->image }}" alt="" style="width: 100px">
				</div>
			@endif

            <div class="form-group row col-md-10">
                <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $perfil->user->name) }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row col-md-10">
                <label for="Web" class="col-md-4 col-form-label text-md-right">{{ __('Web') }}</label>

                <div class="col-md-6">
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url', $perfil->user->url) }}" required autocomplete="url" autofocus>

                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row col-md-10">
                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                <div class="col-md-4">
                    
                    <div class="custom-file">
                      <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                      <label class="custom-file-label" for="image">Choose image</label>
                    </div>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-7 m-auto">
                <label for="biography" class="col-md-46 col-form-label text-md-right">{{ __('biography') }}</label>

                <input id="biography" type="hidden"
                    name="biography"
                    value="{{ old('biography', $perfil->biography) }}"
                >
                <trix-editor input="biography"
                    class="form-control @error('biography') is-invalid @enderror"
                    >
                </trix-editor>

                @error('biography')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6 mt-4 row">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Update') }}
                </button>
            </div>
		</form>
	</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
@endsection