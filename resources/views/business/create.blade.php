@extends('layouts.backend.app')

@section('content')
<style>
	::placeholder {
		opacity: 0.5!important;
	}
/*	.premium-feature{
		display: none;
		}*/
	</style>
	<div class="container-fluid pt-2 grey lighten-3">
		@include('partials.heading')

		@include('partials.success')
		@include('partials.danger')

		<form action="{{ route('business.store') }}" enctype="multipart/form-data" class="form mdb-color-text" method="POST">
			@csrf
			<div class="card border-0 mb-4">
				<div class="card-body">
					<h4 class="h4 d-inline mdb-color-text">Account Information</h4>
					<div class="row">
						<div class="col-md-6">
							<div class="md-form form-lg">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control form-control-lg" value="{{ old('name') }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="md-form form-lg">
								<label for="">Tagline</label>
								<input type="text" name="tagline" class="form-control form-control-lg" value="{{ old('tagline') }}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Business Type</label>
								<select name="business_type" class="form-control rounded-0" id="businessType">
									<option value="1" {{ old('business_type') == '1' ? 'selected' : '' }}>Business House</option>
									<option value="2" {{ old('business_type') == '2' ? 'selected' : '' }}>Freelancer</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Account Type</label>
								<select name="account_type" class="form-control rounded-0" id="accountType">
									<option value="1" {{ old('account_type') == '1' ? 'selected' : '' }}>Free</option>
									<option value="2" {{ old('account_type') == '2' ? 'selected' : '' }}>Premium</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Category</label>
								<select name="category_id" class="form-control rounded-0 selectpicker" id="categories">
									@forelse($categories as $category)
									<option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
									@empty
									<option disabled selected>No Category</option>
									@endforelse
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Licensed Until</label>
								<input type="date" name="expires_at" class="form-control" value="{{ old('expires_at') }}">
							</div>
						</div>
					</div>
					{{-- End of row --}}
				</div>
				{{-- End of card-body --}}
			</div>
			{{-- End of card --}}

			{{-- Contact Information Card --}}
			<div class="card border-0 mb-4">
				<div class="card-body">
					<h4 class="h4 mdb-color-text">Contact Information</h4>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>City *</label>
								<select name="city_id" class="form-control rounded-0" id="district">
									<option></option>
									@foreach($cities as $city)
									<option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="md-form">
								<i class="fa fa-map-marker-alt prefix"></i>
								<label>Address *</label>
								<input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="1234 Main St">
							</div>
						</div>
						{{-- Landline: contact_one --}}
						<div class="col-md-4">
							<div class="md-form">
								<i class="fa fa-phone prefix"></i>
								<label for="">Landline</label>
								<input type="text" name="contact_one" class="form-control" value="{{ old('contact_one') }}" placeholder="+977-xxx-xxxxxx">
								<small class="form-text text-muted">Your business Landline number.</small>
							</div>
						</div>
						{{-- Mobile: contact_two --}}
						<div class="col-md-4">
							<div class="md-form">
								<i class="fa fa-mobile-alt prefix"></i>
								<label for="">Mobile</label>
								<input type="text" name="contact_two" class="form-control" value="{{ old('contact_two') }}" placeholder="+977 98xxxxxxxx">
								<small class="form-text text-muted">Personal or business mobile number.</small>
							</div>
						</div>
						{{-- Email --}}
						<div class="col-md-4">
							<div class="md-form">
								<i class="far fa-envelope prefix"></i>
								<label for="">Email *</label>
								<input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="mailto@email.com">
								<small class="form-text text-muted">Business E-mail.</small>
							</div>
						</div>
						{{-- website --}}
						<div class="col-md-4">
							<div class="md-form">
								<i class="fa fa-globe prefix"></i>
								<label for="">Website</label>
								<input type="text" name="website" class="form-control" value="{{ old('website') }}" placeholder="www.example.com">
								<small class="form-text text-muted">Website URL (if any).</small>
							</div>
						</div>
						{{-- Goole Map Location --}}
						<div class="col-md-4 premium-feature">
							<div class="md-form">
								<i class="far fa-map prefix"></i>
								<label for="">Google Map Place ID</label>
								<input type="text" name="map_id" class="form-control" value="{{ old('map_id') }}" placeholder=" ">
								<small class="form-text text-muted">The Place ID from google map. (Premium)</small>
							</div>
						</div>

					</div>
				</div>
			</div>
			{{-- End of Contact Information Card --}}

			<div class="row">
				<div class="col-md-6">
					{{-- Business Hours Card --}}
					<div class="card border-0 mb-4">
						<div class="card-body">
							<h4 class="h4 d-inline mdb-color-text">Business Hours</h4>
							<small class="form-text">( Leave blank for closed days. )</small>
							<table class="table table-borderless table-sm form-inline">
								<tbody>
									<tr>
										<th>Sunday</th>
										<td class="">
											<input type="time" name="sun_open_time" class="form-control form-control-sm" value="{{ old('sun_start') }}">
											<span class="mx-4">To</span>
											<input type="time" name="sun_close_time" class="form-control form-control-sm" value="{{ old('sun_close') }}">
										</td>
									</tr>
									<tr>
										<th>Monday</th>
										<td>
											<input type="time" name="mon_open_time" class="form-control form-control-sm" value="{{ old('mon_start') }}">
											<span class="mx-4">To</span>
											<input type="time" name="mon_close_time" class="form-control form-control-sm" value="{{ old('mon_close') }}">
										</td>
									</tr>
									<tr>
										<th>Tuesday</th>
										<td>
											<input type="time" name="tues_open_time" class="form-control form-control-sm" value="{{ old('tues_start') }}">
											<span class="mx-4">To</span>
											<input type="time" name="tues_close_time" class="form-control form-control-sm" value="{{ old('tues_close') }}">
										</td>
									</tr>
									<tr>
										<th>Wednesday</th>
										<td>
											<input type="time" name="wednes_open_time" class="form-control form-control-sm" value="{{ old('wednes_start') }}">
											<span class="mx-4">To</span>
											<input type="time" name="wednes_close_time" class="form-control form-control-sm" value="{{ old('wednes_close') }}">
										</td>
									</tr>
									<tr>
										<th>Thursday</th>
										<td>
											<input type="time" name="thurs_open_time" class="form-control form-control-sm" value="{{ old('thurs_start') }}">
											<span class="mx-4">To</span>
											<input type="time" name="thurs_close_time" class="form-control form-control-sm" value="{{ old('thurs_close') }}">
										</td>
									</tr>
									<tr>
										<th>Friday</th>
										<td>
											<input type="time" name="fri_open_time" class="form-control form-control-sm" value="{{ old('fri_start') }}">
											<span class="mx-4">To</span>
											<input type="time" name="fri_close_time" class="form-control form-control-sm" value="{{ old('fri_close') }}">
										</td>
									</tr>
									<tr>
										<th>Saturday</th>
										<td>
											<input type="time" name="satur_open_time" class="form-control form-control-sm" value="{{ old('satur_start') }}">
											<span class="mx-4">To</span>
											<input type="time" name="satur_close_time" class="form-control form-control-sm" value="{{ old('satur_close') }}">
										</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
					{{-- End of Business Hours Card --}}
				</div>
				<div class="col-md-6">
					{{-- Social Card --}}
					<div class="card border-0 mb-4">
						<div class="card-body">
							<h4 class="h4 mdb-color-text">Social</h4>
							{{-- Facebook --}}
							<div class="md-form w-responsive">
								<i class="fab fa-facebook-f prefix text-primary"></i>
								<label>Facebook Link</label>
								<input type="text" name="facebook_link" class="form-control" value="{{ old('facebook_link') }}" placeholder="https://www.facebook.com/[mypage]">
							</div>
							<br>
							{{-- Twitter --}}
							<div class="md-form w-responsive">
								<i class="fab fa-twitter prefix text-info"></i>
								<label>Twitter Link</label>
								<input type="text" name="twitter_link" class="form-control" value="{{ old('twitter_link') }}" placeholder="http://twitter.com/[username]">
							</div>
							<br>
							{{-- Google Plus --}}
							<div class="md-form w-responsive">
								<i class="fab fa-google-plus-g prefix text-danger"></i>
								<label>Google Plus Link</label>
								<input type="text" name="google_link" class="form-control" value="{{ old('google_link') }}" placeholder="https://www.plus.google.com/[account_id]">
							</div>
						</div>
					</div>
					{{-- End of Social Card --}}
				</div>
			</div>




			{{-- Who-we-are Card --}}
			<div class="card border-0 mb-4 premium-feature">
				<div class="card-body">
					<h4 class="h4 d-inline mdb-color-text">Description ( Who We Are? )</h4>
					<div class="md-form">
						<label>Title</label>
						<input type="text" name="description_title" class="form-control w-50" value="{{ old('description_title') }}" placeholder="Default: Who We Are?">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
					</div>
				</div>
			</div>
			{{-- End of Who-we-are Card --}}

			{{-- Services Card --}}
			<div class="card border-0 mb-4 premium-feature">
				<div class="card-body">
					<h4 class="h4 mdb-color-text">Our Services</h4>
					<div class="md-form">
						<label>Title</label>
						<input type="text" name="services_title" class="form-control w-50" value="{{ old('services_title') }}" placeholder="Default: Our Services">
					</div>
					<div class="form-group">
						<label>Services Description</label>
						<textarea name="services" id="services" class="form-control" cols="30" rows="10">{{ old('services') }}</textarea>
					</div>
				</div>
			</div>
			{{-- End of Services Card --}}

			{{-- Pic Upload Card --}}
			<div class="row mb-4">
				<div class="col-md-6">
					<div class="card mx-auto" style="max-width: 300px;">
						<div class="view overlay">
							<img class="card-img-top" id="profile_pic_preview" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg" alt="Card image cap">
							<a href="#!">
								<div class="mask rgba-white-slight"></div>
								<input type="file" name="profile_pic" id="profile_pic" hidden>
							</a>
						</div>
						<div class="card-body text-center">
							<h4 class="card-title">Profile Picture</h4>
							<p class="card-text">Applies to both Free and Premium accounts.</p>
							<label for="profile_pic" class="btn btn-primary">Upload</label>
						</div>
					</div>
				</div>

				<div class="col-md-6 premium-feature">
					<div class="card mx-auto" style="max-width: 300px;">
						<div class="view overlay">
							<img class="card-img-top" id="cover_pic_preview" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg" alt="Card image cap">
							<a href="#!">
								<div class="mask rgba-white-slight"></div>
								<input type="file" name="cover_pic" id="cover_pic" hidden>
							</a>
						</div>
						<div class="card-body text-center">
							<h4 class="card-title">Cover Picture</h4>
							<p class="card-text">Only shown in premium accounts.</p>
							<label for="cover_pic" class="btn btn-primary">Upload</label>
						</div>
					</div>
				</div>
			</div>
			{{-- End of Pic Upload Card --}}

			{{-- Form Buttons --}}
			<div class="form-group">
				<div class="card card-body">
					<div class="row">
						<div class="col-md-6">
							<button class="btn btn-success btn-block">Register</button>
						</div>
						<div class="col-md-6">
							<button class="btn btn-pink btn-block">Save As Draft</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

	@push('scripts')
	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
	<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
	<script>
		$(document).ready(function() {
			$('#businessType').select2();
			$('#accountType').select2();
			$('#categories').select2();
			$('#zone').select2();
			$('#district').select2();

			$('#description').ckeditor();
			$('#services').ckeditor();

			if($('#accountType').val() == '1'){
				$('.premium-feature').hide();
			}

			$('#accountType').change(function() {
			// alert('Changed');
			if($('#accountType').val() == '1'){
				$('.premium-feature').hide();
			}else{
				$('.premium-feature').show();
			}
		});

			function readProfilePicURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$('#profile_pic_preview').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			$("#profile_pic").change(function(){
				readProfilePicURL(this);
			});

			function readCoverPicURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$('#cover_pic_preview').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			$("#cover_pic").change(function(){
				readCoverPicURL(this);
			});
		});
	</script>
	@endpush
	@endsection