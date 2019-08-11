<div class="card rounded-0 border-0 z-depth-1 wow">
	<div class="card-header white mdb-color-text">
		<h3 class="h3 d-inline text-uppercase">Opening Hours</h3>
		<i class="far fa-clock float-right fa-2x"></i>
	</div>
	<div class="card-body">
		<table class="table table-striped table-borderless">
			<tbody>
				@foreach ($business->business_hours as $business_hours)
				<tr>
					@switch($business_hours->day)
					@case(1)
					<th scope="row">Sunday</th>
					@break
					@case(2)
					<th scope="row">Monday</th>
					@break
					@case(3)
					<th scope="row">Tuesday</th>
					@break
					@case(4)
					<th scope="row">Wednesday</th>
					@break
					@case(5)
					<th scope="row">Thursday</th>
					@break
					@case(6)
					<th scope="row">Friday</th>
					@break
					@default
					<th scope="row">Saturday</th>
					@endswitch
					<td>
						@if($business_hours->open_time)
						{{ date('g:i A', strtotime($business_hours->open_time)) }} - 
						{{ date('g:i A', strtotime($business_hours->close_time)) }}
						@else
						Closed 
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>