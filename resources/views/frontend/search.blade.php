@extends('layouts.app')

@push('styles')
<style>
	.category-list-item{
		box-shadow: none;
		position: relative;
		overflow: hidden;
	}
	.category-list-item .label{
		min-width: 30px;
	}
	.category-list-item:hover{
		transition-duration: .5s;
		box-shadow: 0 2px 3px 0px rgba(0,0,0,0.2);
	}
	.category-list-item .premium-tag{
		color: #fff;
		font-size: 11px;
		position: absolute;
		top: 0px;
		left: 10px;
		z-index: 1;
		text-transform: uppercase;
		padding-right: 5px;
		line-height: 2.4;
	}
	.category-list-item .premium-tag::before{
		content: "";
		background-color: #f77426;
		width: 90px;
		height: 100px;
		transform: rotate(55deg);
		position: absolute;
		z-index: -1;
		top: -75px;
		left: -40px;
	}
</style>
@endpush

@section('content')
@include('partials.searchbar')
<div class="container p-0 mt-3" style="font-weight: 300;">
	<div class="row">
		<div class="col-md-8">
			<div class="">
				<div class="white border p-3 mb-3">
					<div class="">
						Showing Results for: &nbsp;
						<span class="font-weight-bolder">
							<i class="fa fa-map-marker-alt mr-2"></i>{{ $city->name ?? 'All Cities' }}
						</span>
						<i class="fas fa-caret-right mx-2" aria-hidden="true"></i>
						<span class="font-weight-bolder">
							<i class="fa fa-sitemap mr-2"></i>{{ $category->name ?? 'All Categories' }}
						</span>
						<i class="fas fa-caret-right mx-2" aria-hidden="true"></i>
						<span class="font-weight-bolder">
							<i class="fa fa-keyboard mr-2"></i>{{ $keyword ?? 'Any' }}
						</span>
					</div>
				</div>

				@forelse ($businesses as $business)
				<div class="card rounded-0 mb-4 category-list-item">
					@if ( $business->account_type == 2 )
					<span class="premium-tag"><i class="fas fa-award" data-toggle="tooltip" title="premium"></i></span>
					@endif
					<div class="card-body  p-2">
						<div class="row">
							<div class="col-md-5 col-sm-12 d-flex">
								@if ($business->thumbnail != 'no_image.jpg')
								<img src="{{ asset('uploads/'.$business->thumbnail) }}" class="align-self-center mr-3 img-fluid">
								@else
								<img src="https://dummyimage.com/500x350/f0f0f0/746f75.png&text=No+Image" class="align-self-center mr-3 img-fluid ">
								@endif
							</div>
							<div class="col-md-7 col-sm-12">
								<div class="mdb-color-text p-2 p-md-0">
									<h4 class="h4-responsive card-title">
										<a class="text-orange" href="{{ route('business.view', $business->slug) }}">{{ $business->name }}</a>
									</h4>
									<span class="badge badge-light font-weight-light z-depth-0">
										{{ $business->category->name }}
									</span>
									<p class="card-text">
										<div class="">
											<i class="fa fa-map-marker-alt label text-orange"></i>{{ $business->address }} , {{ $business->city->name }}
										</div>
										<div>
											<i class="fas fa-phone-volume label text-orange"></i>{{ $business->contact_one }}
										</div>
										<div>
											<a href="mailto:{{ $business->email }}">
												<i class="far fa-envelope label text-orange"></i>{{ $business->email }}
											</a>
										</div>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				@empty
				<div class="card z-depth-0 rounded-0">
					<div class="card-body text-center">
						<h1 class="h1 font-italic text-orange">No Results Found !!</h1>
					</div>
				</div>
				@endforelse

				{{-- Pagination --}}
				@if ($businesses->hasMorePages())
				<div class="card rounded-0 z-depth-1">
					<div class="card-body">
						<div class="paginate-center">
							{{ $businesses->onEachSide(1)->links() }}
						</div>
					</div>
				</div>
				@endif
				{{-- End of Pagination --}}

				<div class="mt-5 text-center">
					<img src="https://www.disruptivestatic.com/wp-content/uploads/2015/03/BOAT-728x90.png" class="img-fluid" alt="Horizental Banner">
				</div>

			</div>
		</div>
		{{-- End of col-md-8 --}}
		<div class="col-md-4">
			@include('components.search-sidebar')
		</div>
		{{-- End of col-md-4 --}}
	</div>
</div>
@endsection