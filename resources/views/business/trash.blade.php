@extends('layouts.backend/app')

@section('content')
<div class="container-fluid pt-2">
	@include('partials.heading')

	@include('partials.success')

	<table id="businessList" class="table table-hover" data-order="[]">
		<thead class="secondary-color text-white">
			<tr>
				<th>#</th>
				<th>Name</th>
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
					{{ $item->name }}
				</td>
				<td>{{ $item->account_type == 2 ? 'Premium' : 'Free' }}</td>
				<td>{{ $item->expires_at }}</td>
				<td>
					<a href="{{ Route('business.edit', $item->id) }}" class="btn btn-link py-0 my-0">
						<i class="fa fa-edit text-secondary"></i>
					</a>
					<a href="{{ route('restore', $item->id) }}"><i class="fa fa-trash-restore-alt text-success"></i></a>
					<form action="{{ route('business.harddelete', $item->id) }}" class="form-inline d-inline" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-link"><i class="fa fa-minus text-danger"></i></button>
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
<script>
	$(document).ready(function () {
		$('#businessList').DataTable();
		$('.dataTables_length').addClass('bs-select');
	});
</script>
@endsection