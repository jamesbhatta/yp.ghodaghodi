@extends('layouts.backend.app')

@section('content')
<div class="container-fluid pt-2">
	@include('partials.heading')

	@include('partials.success')

	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header secondary-color text-white">Add New</div>
				<div class="card-body">
					
					<form action="{{ route('category.store') }}" class="form" method="POST">
						@csrf
						<div class="form-group">
							<input type="text" name="name" class="form-control form-control-lg {{ hasError('name') }}" value="{{ old('name') }}" placeholder="Name">
							@if ($errors->has('name'))
							<div class="invalid-feedback">{{ $errors->first('name') }}</div>
							@endif
						</div>
						<div class="form-group">
							<textarea name="description" id="" class="form-control {{ hasError('description') }}" cols="30" rows="10" placeholder="Description goes here...">{{ old('description') }}</textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-secondary float-right">Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<table id="categoryTable" class="table table-hover" data-order="[]">
						<thead class="secondary-color text-white">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th data-orderable="false"></th>
							</tr>
						</thead>
						<tbody>
							@forelse($categories as $category)
							<tr>
								<td>
									{{ $category->id }}
								</td>
								<td>
									{{ $category->name }}
								</td>
								<td>
									<a href="{{ Route('category.edit', $category->id) }}" class="btn btn-link py-0 my-0">
										<i class="fa fa-edit text-secondary"></i>
									</a>
									
									<form class="form-inline d-inline" action="{{ Route('category.destroy', $category->id) }}" method="POST">
										@csrf
										@method('delete')
										<button type="submit" class="btn btn-link py-0 my-0">
											<i class="fa fa-trash-alt text-danger"></i>
										</button>
									</form>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="3" class="text-center font-italic">No Categories Available.</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
			{{-- End of card --}}
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		$('#categoryTable').DataTable();
		$('.dataTables_length').addClass('bs-select');
	});
</script>
@endsection