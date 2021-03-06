<style>
	.profile-pic{
		max-width: 300px;
		z-index: 999;
	}
</style>
<div class="container-fluid p-0 " style="font-weight: 300;">
	@if($business->cover_pic != 'no_image.jpg')
	<div class="view">
		<img class="img-fluid" src="{{ asset('uploads/'. $business->cover_pic) }}" alt="{{ $business->name }}" style="width:100%;">
		<div class="mask d-flex align-items-end">
			<p class="white-text">
				<div class="m-2">
					<div class="d-flex align-items-end">
						@if ($business->prifile_pic != "no_image.jpg")
						<div class="mr-2">
							<img class="img-fluid img-thumbnail profile-pic" src="{{ asset('uploads/'. $business->profile_pic) }}" alt="{{ $business->name }}">
						</div>
						@endif
						<div class="rgba-black-light p-4">
							<h1 class="h1-responsive font-weight-bold white-text text-orange">{{ $business->name }}</h1>
							<div class="white-text text-center font-weight-bolder text-monospace">{{ $business->tagline ?? $business->address }}</div>
						</div>
					</div>
				</div>
			</p>
		</div>
	</div>
	@elseif( $business->profile_pic != "no_image.jpg" )
	@else
	@endif

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
					<div class="flex-fill"><a class="text-white" href="mailto:{{ $business->email }}">{{ $business->email }}</a></div>
				</div>
			</div>
			<div class="text-center flex-fill">
				<div class="d-flex flex-row flex-md-column">
					<div class="flex-fil"><i class="far fa-clock fa-2x cyan-text  mb-2"></i></div>
					<div class="flex-fill">
						@php
						$dayOfWeek = \Carbon\Carbon::now()->dayOfWeek;
						$now = \Carbon\Carbon::now('+5:45')->format('H:i:s');
						@endphp
						@foreach ($business->business_hours as $business_hours)
						@if ($business_hours->day == $dayOfWeek)
						{{ ($business_hours->open_time < $now && $now < $business_hours->close_time) ? 'Open Now' : 'Closed Now' }}
						@endif
						@endforeach
					</div>
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
							<div class="card z-depth-0">
								<div class="card-header white mdb-color-text">
									<h3 class="h3 d-inline text-uppercase">Details</h3>
								</div>
								<div class="card-body">
									<table class="table table-borderless">
										<tbody>
											<tr>
												<th scope="row">Address</th>
												<td>{{ $business->address }} , {{ $business->city->name }}</td>
											</tr>

											<tr>
												<th scope="row">Phone</th>
												<td>{{ $business->contact_one ?? $business->contact_two }}</td>
											</tr>
											@if($business->contact_two)
											<tr>
												<th scope="row"></th>
												<td class="py-0">{{ $business->contact_two }}</td>
											</tr>
											@endif
											<tr>
												<th scope="row">Email</th>
												<td><a href="mailto:{{ $business->email }}">{{ $business->email }}</a></td>
											</tr>
											@if($business->website)
											<tr>
												<th scope="row">Website</th>
												<td><a class="text-info" href="{{ $business->website }}" target="_blank" data-toggle="tooltip" title="Open Link">{{ $business->website }}</a></td>
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

					<div class="white my-4 p-4">
						<div class="mdb-color-text">
							<h4 class="h4 d-inline-block border-bottom border-warning">{{ $business->description_title ?? 'Who We Are?' }}</h4>
						</div>
						<div class="">
							{!! $business->description !!}
						</div>
						<div class="mdb-color-text">
							<h4 class="h4 d-inline-block border-bottom border-warning">{{ $business->services_title ?? 'Our Services' }}</h4>
						</div>
						<div>
							{!! $business->services !!}
						</div>
					</div>

					{{-- Google Map --}}
					<div class="mt-2">
						<h3 class="h3 text-center mdb-color-text">Find Us Here</h3>
						<iframe class="w-100 z-depth-1" height="500" frameborder="0" style="border:0"
						src="https://www.google.com/maps/embed/v1/place?q=place_id:{{ $business->map_id }}&key=AIzaSyD8fOm6lOT1YqsXVlXIBPSV-8gbCOf7Dr8" allowfullscreen></iframe>
					</div>

					{{-- Contact Form --}}
					<section class="contact-section my-6">
						<div class="card my-4">
							<div class="row">
								<div class="col-md-7">
									<div class="card-body">
										<form id="contactForm" onsubmit="return sendEmail()" method="POST" class="form">
											<h3 class="mt-4"><i class="fas fa-envelope pr-2"></i>Write to us:</h3>
											<div class="row">
												<div class="col-md-6">
													<div class="md-form mb-0">
														<input type="text" name="name" id="form-contact-name" class="form-control" required="true">
														<label for="form-contact-name" class="">Your name</label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="md-form mb-0">
														<input type="email" name="email" id="form-contact-email" class="form-control" required>
														<label for="form-contact-email" class="">Your email</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="md-form mb-0">
														<textarea name="message" id="form-contact-message" class="form-control md-textarea" rows="3" required></textarea>
														<label for="form-contact-message">Your message</label>
													</div>
													{{-- Form Error --}}
													<div class="text-danger" id="contactFormError" style="display: none;">
														<strong>Sorry</strong>, an error occured while submiting. Please try again.
													</div>
													{{-- Button --}}
													<button type="submit" id="btnContactUs" class="btn btn-lg blue white-text">
														<i class="far fa-paper-plane">&nbsp;</i> Send Inquiry
													</button>
													{{-- Form Submitting --}}
													{{-- Form Success  --}}
													<div id="contactFormSuccess" class="alert white text-success border border-success m-4 alert-dismissible fade show" role="alert" style="display: none;">
														<h4 class="alert-heading">
															<i class="fa fa-check">&nbsp;</i>Your Message has been sent !
														</h4>
														<hr>
														<p class="mb-0"><strong>Thank you</strong> we will  get to you as soon as possible.</p>
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
												</div>
											</div>
										</form>
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
			<div class="col-md-4">
				@include('components.search-sidebar')
			</div>
			{{-- End of Sidebar --}}
		</div>

	</div>
</div>

@push('scripts')
<script>
	$('.wow').addClass('animated custom-animation bounceInUp slow');
</script>

<script>
	function sendEmail(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var name = $('#contactForm input[name="name"]').val();
		var email = $('#contactForm input[name="email"]').val();
		var message = $('#contactForm textarea[name="message"]').val();

		console.log(name);
		console.log(email);
		console.log(message);

		$('#btnContactUs').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');

		$.ajax({
			type:'post',
			url:'/api/contact-us',
			data: {_token: CSRF_TOKEN, name: name, email: email, message: message},
			dataType: 'JSON',
			success:function(data){
				console.log(data);
				$('#contactFormError').hide();
				$('#btnContactUs').hide();
				$('#contactFormSuccess').show();
			},
			error: function(XMLHttpRequest, textStatus, errorThrown, request) {
				console.log("Form Status: " + textStatus);
				console.log("Form Error: " + errorThrown);
				console.log(name, email, message);
				$('#contactFormError').show();
				$('#btnContactUs').html('<i class="far fa-paper-plane">&nbsp;</i> Send Inquiry').removeClass('disabled');
			}
		});
		return false;
	}
</script>
@endpush
