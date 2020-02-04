@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">

<style>
	.event-card{
		border-bottom-right-radius: 25px;
		border-bottom-left-radius: 25px;
	}
	.event-card img{
		border-radius: 0;
		border-bottom-right-radius: 30px;
		border-bottom-left-radius: 30px;
	}
	.event-card .card-footer{
		border-bottom-right-radius: 15px;
		border-bottom-left-radius: 15px;
	}
	.event-card .event-btn{
		border-bottom-right-radius: 15px;
		border-bottom-left-radius: 15px;
	}

</style>

@endpush
@section('content')
<div>
	<div class="row m-0">
		<div class="col-md-8 p-4">
			<div class="row">
				<div class="card-deck">
					@for($count = 1; $count <= 20; $count++)

					@forelse($events as $event)
					<div class="col-md-4 p-0">
						<div class="card event-card overflow-hidden mb-4">
							<div class="card-header border-0 pink  lighten-1 white-text">
								<h4 class="card-title text-center"><a href="{{ route('event.view', $event->slug) }}" class="white-text d-block">{{ $event->name }}</a></h4>
							</div>
							<div class="overflow-hidden">
								<img class="card-img-top px-2 animated slideInDown duration-4s" src="{{ asset('uploads/'.$event->thumbnail) }}" alt="Card image cap">
							</div>
							<div class="card-body rounded-top white animated slideInUp pt-2">
								<div class="text-right mb-2">
									<span class="badge badge-pill badge-secondary p-2 text-right z-depth-0">
										@php
										$eventDate = \Carbon\Carbon::parse($event->start_time)->toDateTimeString();
										@endphp
										{{ Carbon\Carbon::parse($eventDate)->diffForHumans() }}
									</span>
								</div>
								<p class="card-text">
									@if(isset($event->excerpt))
									{{ $event->excerpt }}
									@else
									{!! str_limit($event->description, 180) !!}
									@endif
								</p>
							</div>
							<div class="card-footer border-0 white p-0">
								<a href="{{ route('event.view', $event->slug) }}" class="btn btn-pink event-btn btn-block z-depth-0">Explore</a>
							</div>
						</div>
					</div>
					{{-- End of col-md-4 --}}
					@empty
					<h1>OOPS !! No events being organized.</h1>
					@endforelse
					
					@endfor

				</div>
				{{-- End of card-deck --}}
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

@endsection