@extends('layouts.backend.app')

@section('content')
<div class="container-fluid pt-2">
	@include('partials.heading')

	@include('partials.success')

	<div class="card rounded-0">
		<div class="card-body">
			@if ($errors->any())
			<p class="text-danger">*<strong>Sorry,</strong> your form have some errors.</p>
			@endif
			<form action="{{ route('event.store') }}" class="form" enctype="multipart/form-data" method="POST">
				@csrf
				<div class="form-group">
					<label>Event Name</label>
					<input type="text" name="name" class="form-control form-control-lg {{ errorClass('name') }}" value="{{ old('name') }}">
					{!! feedback('name') !!}
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Hosted By</label>
							<input type="text" name="host" class="form-control {{ errorClass('host') }}" value="{{ old('host') }}">
							{!! feedback('host') !!}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Location</label>
							<input type="text" name="location" class="form-control {{ errorClass('location') }}" value="{{ old('location') }}">
							{!! feedback('location') !!}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Starts </label>
							<input type="datetime-local" name="start_time" class="form-control {{ errorClass('start_time') }}" value="{{ old('start_time') }}">
							{!! feedback('start_time') !!}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Ends </label>
							<input type="datetime-local" name="end_time" class="form-control {{ errorClass('end_time') }}" value="{{ old('end_time') }}">
							{!! feedback('end_time') !!}
						</div>
					</div>
					<div class="col-md-8">
						<textarea name="description" id="description" class="form-control {{ errorClass('description') }}" cols="30" rows="10">{{ old('description') }}</textarea>
						{!! feedback('description') !!}
					</div>
					<div class="col-md-4">
						<div class="card">
							<input type="file" name="pic" class="{{ errorClass('pic') }}" id="pic" hidden>
							<img id="picPreview" class="card-img-top" src="https://dummyimage.com/1240x720">
							<div class="card-body text-center">
								<h4 class="card-title"><a>Event Image</a></h4>
								<p class="card-text">Min Image Size: 600 x 400px</p>
								<label for="pic" class="btn btn-primary">Choose</label>
								{!! feedback('pic') !!}
							</div>
						</div>
						<div class="card mt-4">
							<div class="card-body">
								<label>Excerpt</label>
								<textarea name="excerpt" cols="30" rows="10" class="form-control {{ errorClass('excerpt') }}">{{ old('excerpt') }}</textarea>
								{!! feedback('excerpt') !!}
							</div>
						</div>
					</div>
					
				</div>
				<div class="form-group mt-4">
					<button type="submit" class="btn btn-success">Add Event</button>
				</div>
			</form>
		</div>
	</div>
</div>
@push('scripts')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
	$(document).ready(function() {
		// $('#description').ckeditor({
		// 	config.height: 500;
		// });
		CKEDITOR.replace('description', {
			height: 550
		});
		function readPic(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#picPreview').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#pic").change(function(){
			readPic(this);
		});
	});
</script>
@endpush
@endsection