@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
@endsection

@section('content')
	<div class="container">
		<h2 class="text-center mb-4">Write a wonderful recipe</h2>

		<div class="row justify-content-center">
			<div class="col-md-8">
				<form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title recipe') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Photo recipe') }}</label>

                        <div class="col-md-6">
                            
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

                    <div class="form-group row">
                        <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category recipe') }}</label>

                        <div class="col-md-6">
                            <select name="category_id" class="custom-select form-control @error('category_id') is-invalid @enderror"
                            >
                              <option selected>Open this select menu</option>
                              @foreach ($categories as $id => $category)
                              {{-- Usamos eso porque en el controller estamos usando PLUCK --}}
                                    <option value="{{ $id }}"
                                        {{ old('category_id') == $id ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                              @endforeach
                              
                            </select>

                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ingredient" class="col-md-46 col-form-label text-md-right">{{ __('Ingredient') }}</label>

                        <input id="ingredient" type="hidden"
                            name="ingredient"
                            value="{{ old('ingredient') }}"
                        >
                        <trix-editor input="ingredient"
                            class="form-control @error('ingredient') is-invalid @enderror"
                        >
                        </trix-editor>

                        @error('ingredient')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="preparation" class="col-md-46 col-form-label text-md-right">{{ __('Preparation') }}</label>

                        <input id="preparation" type="hidden"
                            name="preparation"
                            value="{{ old('preparation') }}"
                        >
                        <trix-editor input="preparation"
                            class="form-control @error('preparation') is-invalid @enderror"
                            >
                        </trix-editor>

                        @error('preparation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-10 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>				


				</form>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
@endsection