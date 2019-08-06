@extends('layouts.backend.app')

@section('content')
<div class="container-fluid pt-2">
	@include('partials.heading')

	@include('partials.success')

	<div class="card w-responsive">
		<div class="card-header secondary-color text-white">Edit Category</div>
		<div class="card-body">
			<form action="{{ route('category.update', $category->id) }}" class="form" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
					<input type="text" name="name" class="form-control form-control-lg {{ hasError('name') }}" value="{{ old('name') ?? $category->name }}" placeholder="Name">
					@if ($errors->has('name'))
					<div class="invalid-feedback">{{ $errors->first('name') }}</div>
					@endif
				</div>
				<div class="form-group">
					<textarea name="description" class="form-control {{ hasError('description') }}" cols="30" rows="10" placeholder="Description goes here...">{{ old('description') ?? $category->description }}</textarea>
					@if ($errors->has('description'))
					<div class="invalid-feedback">{{ $errors->first('description') }}</div>
					@endif
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-secondary float-right">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection