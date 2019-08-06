@extends('layouts.app')

@section('content')
<div class="container-fluid p-0 white" style="font-weight: 300;">
	<div class="view">
		<img src="{{ asset('themes/premium/royal_cafe.jpg') }}" class="img-fluid" alt="">
		<div class="mask d-flex  align-items-end rgba-black-light">
			<p class="white-text ">
				<div class="flex-grow-1 text-center rgba-black-strong py-2 px-4">			
					<h1 class="h1 font-weight-bolder white-text">Java Cofee House</h1>
					<div class="white-text text-center"><big>New Road, Kathmandu</big></div>
				</div>
			</p>
		</div>
	</div>

	<div class="unique-color-dark white-text">
		<div class="d-flex flex-column flex-md-row p-4">
			<div class="text-center flex-fill">
				<div class="d-flex flex-row flex-md-column">
					<div class="flex-fil"><i class="fa fa-phone fa-2x cyan-text mb-2"></i></div>
					<div class="flex-fill">+977 9865720910</div>
				</div>
			</div>
			<div class="text-center flex-fill">
				<div class="d-flex flex-row flex-md-column">
					<div class="flex-fil"><i class="far fa-envelope fa-2x cyan-text mb-2"></i></div>
					<div class="flex-fill">jmsbhatta@gmail.com</div>
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
						<div class="col-md-6">
							{{-- Opening Hour Card --}}
							<div class="card rounded-0 border-0 z-depth-1 wow">
								<div class="card-header white mdb-color-text">
									<h3 class="h3 d-inline text-uppercase">Opening Hours</h3>
									<i class="far fa-clock float-right fa-2x"></i>
								</div>
								<div class="card-body">
									<table class="table table-striped table-borderless">
										<tbody>
											<tr>
												<th scope="row">Sunday</th>
												<td>10 AM - 4 PM</td>
											</tr>
											<tr>
												<th scope="row">Monday</th>
												<td>10 AM - 4 PM</td>
											</tr>
											<tr>
												<th scope="row">Tuesday</th>
												<td>10 AM - 4 PM</td>
											</tr>
											<tr>
												<th scope="row">Wednesday</th>
												<td>10 AM - 4 PM</td>
											</tr>
											<tr>
												<th scope="row">Thursday</th>
												<td>10 AM - 4 PM</td>
											</tr>
											<tr>
												<th scope="row">Friday</th>
												<td>10 AM - 4 PM</td>
											</tr>
											<tr>
												<th scope="row">Saturday</th>
												<td>Closed</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							{{-- End of Opening hour card --}}
						</div>
						<div class="col-md-6">
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
												<td>PH78+W7 Dhangadhi, Kailali, Nepal</td>
											</tr>

											<tr>
												<th scope="row">Phone : </th>
												<td>+977 091-410362</td>
											</tr>
											<tr>
												<th scope="row"></th>
												<td class="py-0">+977 9865720910</td>
											</tr>
											<tr>
												<th scope="row">Email : </th>
												<td>jmsbhatta@gmail.com</td>
											</tr>
											<tr>
												<th scope="row">Website : </th>
												<td>shivalingkiranapasal.com</td>
											</tr>
										</tbody>
									</table>
									<div class="card-footer white">
										<div class="d-flex flex-column flex-md-row">
											<a class="btn btn-outline-info waves-effect btn-md flex-fill"><i class="fab fa-facebook-f mr-2" aria-hidden="true"></i>Like</a>
											<a class="btn btn-outline-default waves-effect btn-md flex-fill"><i class="fab fa-twitter mr-2"aria-hidden="true"></i>Tweet</a>
											<a class="btn btn-outline-danger waves-effect btn-md flex-fill"><i class="fab fa-google-plus-g mr-2"aria-hidden="true"></i>Follow</a>
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
								<h4 class="h4">Who We Are?</h4>
							</div>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem sequi incidunt optio dolore, repellendus eaque aperiam quas reprehenderit maiores temporibus? Voluptates, ipsa, recusandae. Rem a ex eligendi debitis, quis facilis.
							</p>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem sequi incidunt optio dolore, repellendus eaque aperiam quas reprehenderit maiores temporibus? Voluptates, ipsa, recusandae. Rem a ex eligendi debitis, quis facilis.
							</p>
						</div>
						<div class="col-md-6">
							<div class="text-center mdb-color-text">
								<h4 class="h4">Our Services</h4>
							</div>
							<p>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem sequi incidunt optio dolore,
									</li>
									<li class="list-group-item">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem sequi incidunt optio dolore,Lorem ipsum dolor Quia eum quisquam tenetur laboriosam eos.
									</li>
									<li class="list-group-item">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem sequi incidunt optio dolore,
									</li>
								</ul>
							</p>
						</div>
					</div>

					<div class="mt-2">
						<h3 class="h3 text-center mdb-color-text">Find Us Here</h3>
						<iframe class="w-100" height="500" frameborder="0" style="border:0"
						src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJEwYlXLXsoTkRuUBXavgtflI&key=AIzaSyD8fOm6lOT1YqsXVlXIBPSV-8gbCOf7Dr8" allowfullscreen></iframe>
					</div>
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
@endsection