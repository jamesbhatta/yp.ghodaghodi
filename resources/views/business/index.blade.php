@extends('layouts.backend.app')

@section('content')
<div class="container-fluid pt-2">
	@include('partials.heading')

	@include('partials.success')

	<div class="card border-0 my-2">
		<div class="card-body py-1">
			<a href="{{ route('business.create') }}" class="btn btn-pink float-right px-3 z-depth-0" style="border-radius: 50%;"><i class="fa fa-plus fa-2x"></i></a>
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
					<a href="{{ route('business.view', $item->slug) }}" target="_blank" data-toggle="tooltip" title="View Profile">
						{{ $item->name }}
					</a>
				</td>
				<td>
					<a class="search-field" data-toggle="tooltip" title="Click to Filter">{{ $item->category->name }}</a>
				</td>
				<td>{{ $item->account_type == 2 ? 'Premium' : 'Free' }}</td>
				@if ($item->expires_at)
				<td data-toggle="tooltip" title="{{ Carbon\Carbon::parse($item->expires_at)->diffForHumans() }}">
					{{ Carbon\Carbon::parse($item->expires_at)->format('d M Y') }}
				</td>
				@else
				<td></td>
				@endif
				<td>
					<a href="{{ Route('business.edit', $item->id) }}" class="btn btn-link py-0 my-0"  data-toggle="tooltip" title="Edit">
						<i class="fa fa-edit text-secondary"></i>
					</a>

					<form class="form-inline d-inline" onsubmit="return confirm('Sure to Delete?');" action="{{ Route('business.destroy', $item->id) }}" method="POST">
						@csrf
						@method('delete')
						<button type="submit" class="btn btn-link py-0 my-0" data-toggle="tooltip" title="Delete">
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

<script>
	$(document).ready(function () {
		var businessList = $('#businessList').DataTable({
			'pageLength': 25
		});
		$('.dataTables_length').addClass('bs-select');

		$('.search-field').on( 'click', function (e) {
			e.preventDefault();
			businessList.search( $(this).text() ).draw();
		} );
	});
</script>
@endsection