<div class="container-fluid p-0 white" style="font-weight: 300;">
	<div class="view">
		@if($business->cover_pic == 'no_image.jpg')
		<img src="https://mdbootstrap.com/img/Photos/Others/images/60.jpg" class="img-fluid" alt="">
		@else
		<img src="{{ asset('uploads/'. $business->cover_pic) }}" class="img-fluid" alt="">
		@endif
		<div class="mask d-flex  align-items-end rgba-black-light">
			<p class="white-text ">
				<div class="flex-grow-1 text-center rgba-black-strong py-2 px-4">			
					<h1 class="h1 font-weight-bolder white-text">{{ $business->name }}</h1>
					<div class="white-text text-center"><big>{{ $business->tagline ?? $business->address }}</big></div>
				</div>
			</p>
		</div>
	</div>

	<div class="unique-color-dark white-text">
		<div class="d-flex flex-column flex-md-row p-4">
			<div class="text-center flex-fill">
				<div class="d-flex flex-row flex-md-column">
					<div class="flex-fil"><i class="fa fa-phone fa-2x cyan-text mb-2"></i></div>
					<div class="flex-fill">{{ $business->contact_one }}</div>
				</div>
			</div>
			<div class="text-center flex-fill">
				<div class="d-flex flex-row flex-md-column">
					<div class="flex-fil"><i class="far fa-envelope fa-2x cyan-text mb-2"></i></div>
					<div class="flex-fill">{{ $business->email }}</div>
				</div>
			</div>
			<div class="text-center flex-fill">
				<div class="d-flex flex-row flex-md-column">
					<div class="flex-fil"><i class="far fa-clock fa-2x cyan-text  mb-2"></i></div>
					<div class="flex-fill">Open Now</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid pl-0">
		<div class="row">
			{{-- Business content --}}
			<div class="col-md-8">
				<div class="p-4">
					<div class="row">
						<div class="col-md-5">
							{{-- Opening Hour Card --}}
							@include('themes.partials.business_hours')
							{{-- End of Opening hour card --}}
						</div>
						<div class="col-md-7">
							{{-- Business Details Card --}}
							<div class="card wow">
								<div class="card-header white mdb-color-text">
									<h3 class="h3 d-inline text-uppercase">Details</h3>
								</div>
								<div class="card-body">
									<table class="table table-borderless">
										<tbody>
											<tr>
												<th scope="row">Address : </th>
												<td>{{ $business->address }} , {{ $business->city->name }}</td>
											</tr>

											<tr>
												<th scope="row">Phone : </th>
												<td>{{ $business->contact_one ?? $business->contact_two }}</td>
											</tr>
											@if($business->contact_two)
											<tr>
												<th scope="row"></th>
												<td class="py-0">{{ $business->contact_two }}</td>
											</tr>
											@endif
											<tr>
												<th scope="row">Email : </th>
												<td>{{ $business->email }}</td>
											</tr>
											@if($business->website)
											<tr>
												<th scope="row">Website : </th>
												<td><a href="{{ $business->website }}" class="text-info">{{ $business->website }}</a></td>
											</tr>
											@endif
										</tbody>
									</table>
									<div class="card-footer white">
										<div class="d-flex flex-column flex-md-row">
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
							{{-- End of Business Details Card --}}
						</div>
					</div>
					{{-- End of row --}}
					<div class="row mt-4">
						<div class="col-md-6">
							<div class="text-center mdb-color-text">
								<h4 class="h4">{{ $business->description_title ?? 'Who We Are?' }}</h4>
							</div>
							<p>
								{!! $business->description !!}
							</p>
						</div>
						<div class="col-md-6">
							<div class="text-center mdb-color-text">
								<h4 class="h4">{{ $business->services_title ?? 'Our Services' }}</h4>
							</div>
							<p>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">
										{!! $business->services !!}
									</li>
								</ul>
							</p>
						</div>
					</div>
					
					{{-- Google Map --}}
					<div class="mt-2">
						<h3 class="h3 text-center mdb-color-text">Find Us Here</h3>
						<iframe class="w-100 z-depth-1" height="500" frameborder="0" style="border:0"
						src="https://www.google.com/maps/embed/v1/place?q=place_id:{{ $business->map_id }}&key=AIzaSyD8fOm6lOT1YqsXVlXIBPSV-8gbCOf7Dr8" allowfullscreen></iframe>
					</div>

					{{-- Contact Form --}}
					<section class="contact-section my-5">
						<div class="card">
							<div class="row">
								<div class="col-md-7">
									<div class="card-body form">
										<h3 class="mt-4"><i class="fas fa-envelope pr-2"></i>Write to us:</h3>
										<div class="row">
											<div class="col-md-6">
												<div class="md-form mb-0">
													<input type="text" id="form-contact-name" class="form-control">
													<label for="form-contact-name" class="">Your name</label>
												</div>
											</div>
											<div class="col-md-6">
												<div class="md-form mb-0">
													<input type="text" id="form-contact-email" class="form-control">
													<label for="form-contact-email" class="">Your email</label>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="md-form mb-0">
													<textarea id="form-contact-message" class="form-control md-textarea" rows="3"></textarea>
													<label for="form-contact-message">Your message</label>
													<a class="btn btn-lg blue">
														<i class="far fa-paper-plane">&nbsp;</i> Send Inquiry
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="card-body unique-color-dark text-center h-100 white-text">
										<h3 class="my-4 pb-2">Contact information</h3>
										<ul class="text-lg-left list-unstyled ml-4">
											<li>
												<p><i class="fas fa-map-marker-alt pr-2"></i>{{ $business->address }}, {{ $business->city->name }}</p>
											</li>
											<li>
												<p><i class="fas fa-phone pr-2"></i>{{ $business->contact_one }}</p>
											</li>
											<li>
												<p><i class="fas fa-envelope pr-2"></i>{{ $business->email }}</p>
											</li>
										</ul>
										<hr class="hr-light my-4">
										<ul class="list-inline text-center list-unstyled">
											<li class="list-inline-item">
												<a class="p-2 fa-lg tw-ic">
													<i class="fab fa-twitter"></i>
												</a>
											</li>
											<li class="list-inline-item">
												<a class="p-2 fa-lg li-ic">
													<i class="fab fa-linkedin-in"> </i>
												</a>
											</li>
											<li class="list-inline-item">
												<a class="p-2 fa-lg ins-ic">
													<i class="fab fa-instagram"> </i>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</section>
					{{-- End of Contact Form --}}

				</div>
			</div>
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
</div>
<script>
	$('.wow').addClass('animated custom-animation bounceInUp slow');
</script>
