<style>
	.item-description .item{
		display: block;
		margin: 10px auto;
	}
	.item-description .label{
		display: inline-block;
		min-width: 100px;
		font-weight: 600;
	}
	.item-description .label i{
		min-width: 30px;
	}
</style>
<div class="container-fluid p-0 white" style="font-weight: 300;">
	<div class="row mx-0">
		{{-- Main Content --}}
		<div class="col-md-8">
			<div class="card my-4 mx-2 mdb-color-text p-2">
				<div class="media">
					<img class="align-self-center mr-3" src="https://dummyimage.com/600x400" alt="Generic placeholder image" style="max-width: 300px; height: auto">
					<div class="media-body card-body item-description">
						<h1 class="h2 my-0 text-default font-weight-bolder">{{ $business->name }}</h1>
						<small class="h6 text-default">{{ $business->address }} </small>
						<div class="item">
							<span class="label"><i class="fa fa-phone"></i> Phone </span>
							{{ $business->contact_one }}
						</div>
						<div class="item">
							<span class="label"><i class="fa fa-mobile-alt"></i> Mobile </span>
							{{ $business->contact_two }}
						</div>
						<div class="item">
							<span class="label"><i class="far fa-envelope"></i> E-mail </span>
							{{ $business->email }}
						</div>
						@if($business->website)
						<div class="item">
							<span class="label"><i class="fab fa-internet-explorer"></i> Website</span>
							<a class="text-default" href="http://www.manojbhatta.com.np">{{ $business->website }}</a>
						</div>
						@endif
					</div>
				</div>
			</div>

			<div class="row mx-2 mb-2">
				<div class="col-md-6">
					{{-- Opening Hour Card --}}
					<div class="card rounded-0 border-0 z-depth-1 animated slideInUp">
						<div class="card-header white mdb-color-text">
							<h3 class="h3 d-inline text-uppercase">Opening Hours</h3>
							<i class="far fa-clock float-right fa-2x"></i>
						</div>
						<div class="card-body">
							<table class="table table-striped table-borderless table-sm">
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
					{{-- End of Opening hour card --}}
				</div>
				<div class="col-md-6">
					<div class="d-flex flex-column flex-md-row animated slideInUp">
						@if( $business->facebook_link )
						<a class="btn btn-outline-info waves-effect btn-md flex-fill" href="{{ $business->facebook_link }}" target="_blank"><i class="fab fa-facebook-f mr-2" aria-hidden="true"></i>Like</a>
						@endif
						@if( $business->twitter_link )
						<a class="btn btn-outline-default waves-effect btn-md flex-fill" href="{{ $business->twitter_link }}" target="_blank"><i class="fab fa-twitter mr-2"aria-hidden="true"></i>Tweet</a>
						@endif
						@if( $business->google_link )
						<a class="btn btn-outline-danger waves-effect btn-md flex-fill" href="{{ $business->google_link }}"  target="_blank"><i class="fab fa-google-plus-g mr-2"aria-hidden="true"></i>Follow</a>
						@endif
					</div>
				</div>
			</div>
			{{-- End of row --}}
		</div>
		{{-- End of Main Content --}}

		{{-- Sidebar content --}}
		<div class="col-md-4 border-left">
			<div class="p-2">
				<div class="text-center mb-2">
					<img class="" src="{{ asset('themes/premium/watch_netflix.jpg') }}" alt="">
				</div>
				<div class="my-4">
					<div class="card border-0 mx-auto w-responsive">
						<div class="card-body">
							<h3>Other Categories</h3>
							<ul class="list-group list-group-flush">
								<li class="list-group-item border-0"><a href="">Automobile</a></li>
								<li class="list-group-item border-0"><a href="">Bank & Finance</a></li>
								<li class="list-group-item border-0"><a href="">Computer & Internet</a></li>
								<li class="list-group-item border-0"><a href="">Construction</a></li>
								<li class="list-group-item border-0"><a href="">Education</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="text-center mb-2">
					<img class="img" src="{{ asset('themes/premium/download.png') }}" alt="">
				</div>
			</div>
		</div>
		{{-- End of Sidebar --}}
	</div>
</div>