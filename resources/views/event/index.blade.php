@extends('layouts.backend.app')

@section('content')
<div class="container-fluid pt-2">
	@include('partials.heading')

	@include('partials.success')
	<div class="card">
		<div class="card-header white py-1">
			<a href="{{ route('event.create') }}" class="btn btn-success float-right px-3" style="border-radius: 50%;"><i class="fa fa-plus fa-lg"></i></a>	
		</div>
		<div class="card-body">
			<table id="eventTable" class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Date</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@forelse($events as $event)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td><a href="{{ route('event.view', $event->slug) }}" target="_blank">{{ $event->name }}</a></td>
						<td>{{ $event->start_time }}</td>
						<td>
							<a href="{{ route('event.edit', $event->id) }}">
								<i class="fa fa-edit text-info"></i>
							</a>

							<form action="{{ route('event.destroy', $event->id) }}" method="post" class="form d-inline">
								@csrf
								@method('delete')
								<button class="btn btn-link py-0 my-0">
									<i class="fa fa-times text-danger"></i>
								</button>
							</form>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="4" class="font-italic text-center">No Events Found !!</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
		<div class="card-footer white">
			
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		$('#eventTable').DataTable();
	});
</script>
@endsection