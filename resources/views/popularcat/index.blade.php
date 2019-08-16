@extends('layouts.backend.app')

@section('content')
<div class="container-fluid pt-2">
	@include('partials.heading')

	@include('partials.success')
	@include('partials.danger')

	<div class="card">
		<div class="card-body">
			<form action="{{ route('popularcat.store') }}" class="form" enctype="multipart/form-data" method="POST">
				@csrf
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label>Category</label>
							<select name="category_id" class="form-control categories rounded-0 selectpicker {{ errorClass('category_id') }}">
							</select>
							@invalid('category_id')
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label>Display Name</label>
							<input type="text" name="display_name" class="form-control" value="{{ old('display_name') }}">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label>Avatar (300x 200)</label>
							<input type="file" name="avatar" class="form-control {{ errorClass('avatar') }}" value="{{ old('avatar') }}">
							@invalid('avatar')
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label>Button Color</label>
							<select name="button_class" id="" class="form-control {{ errorClass('button_class') }}">
								<option value="btn-info">Blue</option>
								<option value="btn-success">Green</option>
								<option value="btn-deep-orange">Orange</option>
								<option value="btn-pink">Pink</option>
								<option value="btn btn-danger">Red</option>
								<option value="btn btn-secondary">Purple</option>
								<option value="btn btn-cyan">Cyan</option>
							</select>
							@invalid('button_class')
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-success">Save</button>
			</form>
		</div>
	</div>

	<div class="card mt-3">
		<div class="card-header bg-info white-text">
			<h3 class="h3-responsive">Popular Category List</h3>
		</div>
		<div class="card-body">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Display Name</th>
						<th>Avatar</th>
						<th>Button Class</th>
						<th>Option</th>
					</tr>
				</thead>
				<tbody>
					@forelse($popularCats as $item)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $item->display_name }}</td>
						<td>
							<img src="{{ asset('uploads/'.$item->avatar) }}" alt="" class="img-fluid" height="50" width="80">
						</td>
						<td>{{ $item->button_class }}</td>
						<td>
							<button class="btn btn-link" data-toggle="modal" data-target="#delModal{{ $item->id }}">
								<i class="fa fa-edit text-info"></i>
							</button>
							<form action="{{ route('popularcat.destroy', $item->id) }}" onsubmit="return confirm('Sure to delete?');" method="POST" class="d-inline">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-link"><i class="fa fa-times text-danger"></i></button>
							</form>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="4">No Items in List.</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
{{-- Delete Modals --}}
@forelse($popularCats as $item)
<div class="modal fade" id="delModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<form action="{{ route('popularcat.update', $item->id) }}" class="form" enctype="multipart/form-data" method="POST">
		@csrf
		@method('put')
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Update Form</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Category</label>
								<select name="category_id" class="form-control rounded-0 selectpicker categories">
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Display Name</label>
								<input type="text" name="display_name" class="form-control" value="{{ $item->display_name }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Avatar (300 x 200)</label>
								<input type="file" name="avatar" class="form-control" value="{{ $item->avatar }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Button Color</label>
								<select name="button_class" id="" class="form-control">
									<option value="btn-info">Blue</option>
									<option value="btn-success">Green</option>
									<option value="btn-deep-orange">Orange</option>
									<option value="btn-pink">Pink</option>
									<option value="btn btn-danger">Red</option>
									<option value="btn btn-secondary">Purple</option>
									<option value="btn btn-cyan">Cyan</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</form>
</div>
@empty
@endforelse

@push('scripts')
<script>
	$(document).ready(function() {
		$('.categories').select2({
			placeholder: 'Select Category',
			ajax: {
				url: '/api/categories',
				processResults: function (data) {
					return {
						results: data.category.map(function (category) {
							return {
								id: category.id,
								text: category.name
							};
						})
					};
				}
			}
		});

	});
</script>
@endpush
@endsection