@extends('layouts.app')

@section('content')

@include('partials.searchbar')

<div class="container-fluid p-4 mt-2" style="font-weight: 300;">
	<div class="row">
		<div class="col-md-8">
			<div class=" white py-4 px-5">
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
				<div class="media mb-4 border p-2 hoverable">
					<img src="https://mdbootstrap.com/img/Photos/Others/images/{{ random_int(40, 85) }}.jpg" class="align-self-center mr-3" style="width: 300px;">
					<div class="media-body">
						<h1 class="card-title">
							<a class="text-info" href="{{ route('business.view', $business->slug) }}">{{ $business->name }}</a>
						</h1>
						<span class="badge badge-default">{{ $business->category->name }}</span>
						<p class="card-text">
							<div class="font-weight-bolder">
								<i class="fa fa-map-marker-alt mr-3"></i>{{ $business->address }} , {{ $business->city->name }}
							</div>
							<div>
								<i class="fa fa-mobile-alt mr-3"></i>{{ $business->contact_one }}
							</div>
							<div>
								<i class="far fa-envelope mr-3"></i>{{ $business->email }}
							</div>
						</p>
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
				<div class="card rounded-0 z-depth-1">
					<div class="card-body">
						<div class="paginate-center">
							{{ $businesses->links() }}
						</div>
					</div>
				</div>
				{{-- End of Pagination --}}

				<div class="mt-5 text-center">
					<img src="https://www.disruptivestatic.com/wp-content/uploads/2015/03/BOAT-728x90.png" alt="" class="src">
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