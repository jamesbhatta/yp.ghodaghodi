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
<div class="container-fluid p-0" style="font-weight: 300;">
	<div class="row mx-0">
		{{-- Main Content --}}
		<div class="col-md-8">
			<div class="card my-4 mx-2 mdb-color-text p-2 z-depth-0 rounded-0">
				<div class="media">
					@if ($business->profile_pic == "no_image.jpg")
					<img class="align-self-center mr-3" src="https://dummyimage.com/600x400/f0f0f0/746f75.png&text=No+Image" alt="{{ $business->name }}" style="max-width: 300px; height: auto">
					@else
					<img class="align-self-center mr-3" src="{{ asset('uploads/'. $business->profile_pic) }}" alt="{{ $business->name }}" style="max-width: 300px; height: auto">
					@endif
					<div class="media-body card-body item-description">
						<h1 class="h2 my-0 text-orange font-weight-bolder">{{ $business->name }}</h1>
						<small class="h6 text-orange">{{ $business->address }} </small>
						<div class="item">
							<span class="label"><i class="fa fa-phone text-orange"></i> Phone </span>
							{{ $business->contact_one }}
						</div>
						<div class="item">
							<span class="label"><i class="fa fa-mobile-alt text-orange"></i> Mobile </span>
							{{ $business->contact_two }}
						</div>
						<div class="item">
							<span class="label"><i class="far fa-envelope text-orange"></i> E-mail </span>
							{{ $business->email }}
						</div>
						@if($business->website)
						<div class="item">
							<span class="label"><i class="fab fa-internet-explorer text-orange"></i> Website</span>
							<a class="text-orange" href="{{ $business->website }}" target="_blank">{{ $business->website }}</a>
						</div>
						@endif
					</div>
				</div>
			</div>

			<div class="row mx-2 mb-2">
				<div class="col-md-5 pl-0">
					{{-- Opening Hour Card --}}
					@include('themes.partials.business_hours')
					{{-- End of Opening hour card --}}
				</div>
				<div class="col-md-7 pr-0">
					<div class="white p-3">
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
			</div>
			{{-- End of row --}}

			{{-- Similar Businesses --}}
			@if (isset($similarBusinesses) && count($similarBusinesses))
			<div class=" p-4 mt-4">
				<div class="mdb-color-text">
					<h4 class="h4 d-inline-block border-bottom border-warning">Similar Businesses </h4>
				</div>
				<div class="row">
					<style>
						.business-list-item-verticle{
							position: relative;
							overflow: hidden;
						}
						.business-list-item-verticle .premium-tag{
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
						.business-list-item-verticle .premium-tag::before{
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
					@foreach ($similarBusinesses as $business)
					<div class="col-md-4 mb-4">
						<div class="business-list-item-verticle">
							@if ($business->account_type == 2)
							<span class="premium-tag"><i class="fas fa-award" data-toggle="tooltip" title="premium"></i></span>
							@endif
							<div class="card border rounded-0 z-depth-0">
								<img class="card-image-top img-fluid" src="{{ asset('uploads/'. $business->thumbnail) }}" alt="">
								<div class="card-body">
									<div class="text-center">
										<a class="h6-responsive text-orange" href="{{ route('business.view', $business->slug) }}">{{ $business->name }}</a>
										<div class="card-text">
											{{ $business->address }}, {{ $business->city->name }}
										</div>
									</div>
								</div>
								<a class="btn btn-sm btn-outline-amber rounded-0 z-depth-0" href="">View Profile</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			@endif
			{{-- End of Similar Businesses --}}
		</div>
		{{-- End of Main Content --}}

		{{-- Sidebar content --}}
		<div class="col-md-3">
			@include('components.search-sidebar')
		</div>
		{{-- End of Sidebar --}}
	</div>
</div>