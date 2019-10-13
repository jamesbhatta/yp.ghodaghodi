@extends('layouts.app')

@push('styles')
<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
<style>
	.event-content{
		font-family: 'Open Sans', sans-serif;
		font-size: 1.1rem;
		letter-spacing: 0.5px;
		line-height: 1.5;
		color: #525252;
	}

	.event-content a{
		color: #ff5722!important;
	}
</style>
@endpush

@section('content')
<div class="mt-5 event-content" style="max-width: 1200px; margin: 0 auto">
	<div class="row">
		<div class="col-md-8">
			<div class="card event-card overflow-hidden mb-4 z-depth-0-half">
				<img class="card-img-top" src="{{ asset('uploads/'.$event->thumbnail) }}" alt="Card image cap">
				<div class="card-body rounded-top px-5">
					<h1 class="card-title text-center mdb-color-text my-4">
						{{ $event->name }}
					</h1>
					<div>
						<h6 class="h6-responsive text-muted">
							Starts From <span class="deep-orange-text">{{ Carbon\Carbon::parse($event->start_time)->isoFormat('MMMM Do YYYY, h:mm A') }}</span> To <span class="deep-orange-text">{{ Carbon\Carbon::parse($event->end_time)->isoFormat('MMMM Do, h:mm A') }}</span>
						</h6>
						
						@if ($event->host)
						<h6 class="h6-responsive text-muted">Hosted By <span class="deep-orange-text">{{ $event->host }}</span></h6>
						@endif

						@if ($event->location)
						<h6 class="h6-responsive text-muted">Location <span class="deep-orange-text">{{ $event->location }}</span></h6>
						@endif


					</div>
					<p class="card-text mdb-color-text">
						{!! $event->description !!}
					</p>
				</div>
				<div class="card-footer white mx-5">
					<h4 class="h4-responsive text-center">Enjoy this? Get Events delivered straight to your inbox and be the first one to know about it.</h4>

					<div class="small text-center"><span class="font-weight-bolder">No Spam, ever.</span> We'll never share your email address and you can opt out at any time.</div>
					
					<form action="" class="form my-4 w-responsive mx-auto">
						<div class="input-group mb-3">
							<input type="text" class="form-control form-control-lg rounded-" placeholder="EMAIL ADDRESS" aria-label="Email address"
							aria-describedby="button-addon2">
							<div class="input-group-append">
								<button class="btn btn-md btn-deep-orange m-0 px-3 py-2 z-depth-0 waves-effect" type="button" id="button-addon2">Subscribe</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
@endsection