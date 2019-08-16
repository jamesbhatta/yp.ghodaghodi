@extends('layouts.backend.app')

@section('content')
<div class="container-fluid pt-2">
	@include('partials.heading')

	@include('partials.success')

	<div class="card border-0 my-2">
		<div class="card-body py-1">
			<a href="{{ route('business.create') }}" class="btn btn-pink float-right px-3" style="border-radius: 50%;"><i class="fa fa-plus fa-2x"></i></a>
		</div>
	</div>
	<table id="businessList" class="table table-hover white" data-order="[]">
		<thead class="secondary-color text-white">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Category</th>
				<th>Acoount Type</th>
				<th>Expires On</th>
				<th data-orderable="false"></th>
			</tr>
		</thead>
		<tbody>
			@forelse($businesses as $item)
			<tr>
				<td>
					{{ $item->id }}
				</td>
				<td>
					<a href="{{ route('business.view', $item->slug) }}" target="_blank">
						{{ $item->name }}
					</a>
				</td>
				<td>{{ $item->category->name }}</td>
				<td>{{ $item->account_type == 2 ? 'Premium' : 'Free' }}</td>
				<td>{{ $item->expires_at }}</td>
				<td>
					<a href="{{ Route('business.edit', $item->id) }}" class="btn btn-link py-0 my-0">
						<i class="fa fa-edit text-secondary"></i>
					</a>

					<form class="form-inline d-inline" action="{{ Route('business.destroy', $item->id) }}" method="POST">
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
				<td colspan="5" class="text-center font-italic">No Businesses Registered.</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>


<div class="card">
	<div class="card-body">
		<table id="testTable" class="table">
			<thead class="primary-color text-white">
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Category</th>
					<th>Acoount Type</th>
					<th>Expires On</th>
					<th data-orderable="false"></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
<script>
	$(document).ready(function () {
		$('#businessList').DataTable();
		$('.dataTables_length').addClass('bs-select');

		$('#testTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: '/api/businessDatatables',
			columnDefs: [{
				// targets: [0, 1, 2],
				// className: 'mdl-data-table__cell--non-numeric'
			}],
			columns: [
			{data: 'id', name: 'id'},
			{data: 'name', name: 'name'},
			{data: 'category', name: 'category.name'},
			{data: 'account_type', name: 'account_type'},
			{data: 'expires_at', name: 'expires_at'},
			{
				data: 'id', render:  function ( data, type, row ) {
					return '<a href="'+ data + '/edit"><i class="fa fa-edit"></i></a>';
				}
			}
			]
		});
	});
</script>
@endsection