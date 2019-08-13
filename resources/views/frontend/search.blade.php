@extends('layouts.app')

@push('styles')
<style>
	.category-list-item{

	}
	.category-list-item .label{
		min-width: 30px;
	}
</style>
@endpush

@section('content')
@include('partials.searchbar')
<div class="container-fluid p-4 mt-2" style="font-weight: 300;">
	<div class="row p-0 p-md-4">
		<div class="col-md-8">
			<div class=" white py-4 px-4 px-md-5">
				<div class="card mb-4">
					<div class="card-body mdb-color-text">
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
							<i class="fa fa-keyboard mr-2"></i>{{ $keyword->name ?? 'Any' }}
						</span>
					</div>
				</div>

				@forelse ($businesses as $business)
				<div class="card mb-4 border category-list-item">
					<div class="card-body  p-2 hoverable">
						<div class="row">
							<div class="col-md-5 col-sm-12 d-flex">
								@if ($business->profile_pic)
								<img src="{{ asset('uploads/'.$business->thumbnail) }}" class="align-self-center mr-3 img-fluid rounded">
								@else
								<img src="https://mdbootstrap.com/img/Photos/Others/images/{{ random_int(40, 85) }}.jpg" class="align-self-center mr-3 img-fluid rounded">
								@endif
							</div>
							<div class="col-md-7 col-sm-12">
								<div class="mdb-color-text p-2 p-md-0">
									<h1 class="h2-responsive card-title">
										<a class="text-info" href="{{ route('business.view', $business->slug) }}">{{ $business->name }}</a>
									</h1>
									<span class="badge badge-secondary">{{ $business->category->name }}</span>
									<p class="card-text">
										<div class="font-weight-bolder">
											<i class="fa fa-map-marker-alt label amber-text"></i>{{ $business->address }} , {{ $business->city->name }}
										</div>
										<div>
											<i class="fas fa-phone-volume label amber-text"></i>{{ $business->contact_one }}
										</div>
										<div>
											<i class="far fa-envelope label amber-text"></i>{{ $business->email }}
										</div>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				@empty
				<div class="card">
					<div class="card-body text-center">
						<h1 class="h1 font-italic">No Results Found !!</h1>
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
			<div class="white p-2">
				
				<div class="my-4 text-center">
					<img class="image-fluid" src="{{ asset('images/watch_netflix.jpg') }}" alt="">
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
				<div class="my-2 text-center">
					<img class="image-fluid" src="{{ asset('images/netflix.jpg') }}" alt="" style="max-width: 300px;">
				</div>


			</div>
		</div>
		{{-- End of col-md-4 --}}
	</div>


</div>
@endsection