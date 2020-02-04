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
				@if ($item->expires_at)
				<td data-toggle="tooltip" title="{{ Carbon\Carbon::parse($item->expires_at)->diffForHumans() }}">
					{{ Carbon\Carbon::parse($item->expires_at)->format('d M Y') }}
				</td>
				@else
				<td></td>
				@endif
				<td>
					<div class="d-flex justify-content-between">
						<div class="align-self-center">
							<a href="{{ route('restore', $item->id) }}" data-toggle="tooltip" title="Restore">
								<i class="fa fa-trash-restore-alt text-success"></i>
							</a>
						</div>
						<div class="align-self-center">
							<form action="{{ route('business.harddelete', $item->id) }}" class="form-inine d-nline p-0 m-0" method="POST">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-link my-0 p-0" data-toggle="tooltip" title="Delete Permanently">
									<i class="fa fa-minus text-danger"></i>
								</button>
							</form>
						</div>
					</div>
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