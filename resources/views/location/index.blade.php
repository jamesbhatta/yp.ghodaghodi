@extends('layouts.backend.app')

@section('content')
<div class="container-fluid pt-2">
	@include('partials.heading')

	@include('partials.success')
	@include('partials.warning')
	
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<ul class="list-group list-group-flush">
						@foreach($zones as $zone)
						{{-- Zones --}}
						<li class="list-group-item bg-success lighten text-white z-depth-1">
							<span class="font-weight-bolder h6">{{ $zone->name }}</span>
							<span class="float-right">
								<button class="btn btn-link p-0 edit-zone-btn" data-id="{{ $zone->id }}" data-name="{{ $zone->name }}" >
									<i class="fa fa-edit fa-sm white-text"></i>
								</button>
								&nbsp; &nbsp;
								<form action="{{ Route('zone.destroy', $zone->id) }}" method="POST" class="d-inline">
									@csrf
									@method('delete')
									<button type="submit" onclick="return confirm('Sure to Delete?')" class="btn btn-link m-0 p-0" class="form-control">
										<i class="fa fa-trash fa-sm white-text"></i>
									</button>
								</form>
							</span>
						</li>
						<ol class="list-group">
							@foreach($zone->cities as $city)
							{{-- Cities inside zone --}}
							<li class="list-group-item hoverable">
								{{ $city->name }}
								<span class="float-right">
									<button class="btn btn-link p-0 ">
										<i class="fa fa-edit fa-sm text-warning"></i>
									</button>
									&nbsp; &nbsp;
									<form action="{{ Route('city.destroy', $city->id) }}" method="POST" class="d-inline">
										@csrf
										@method('delete')
										<button type="submit" onclick="return confirm('Sure to Delete?')" class="btn btn-link m-0 p-0" class="form-control">
											<i class="fa fa-trash-alt fa-sm text-danger"></i>
										</button>
									</form>
								</span>
							</li>
							@endforeach
						</ol>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card-deck">
				<div class="card mb-4">
					<div class="card-header success-color white-text">
						Add New Zone
					</div>
					<div class="card-body">
						<form action="{{ route('zone.store') }}" method="POST" class="form">
							@csrf
							<div class="form-group">
								<input type="text" name="name" class="form-control form-control-lg rounded-0 {{ $errors->zone->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Name of Zone">
								@if ($errors->zone->has('name'))
								<div class="invalid-feedback">{{ $errors->zone->first('name') }}</div>
								@endif
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-success">Add</button>
							</div>
						</form>
					</div>
				</div>

				<div class="card mb-4">
					<div class="card-header success-color white-text">
						Add New City
					</div>
					<div class="card-body">
						<form action="{{ route('city.store') }}" method="POST" class="form">
							@csrf
							<div class="form-group">
								<input type="text" name="name" class="form-control form-control-lg rounded-0 {{ hasError('name') }}" value="{{ old('name') }}" placeholder="Name of City">
								@if ($errors->has('name'))
								<div class="invalid-feedback">{{ $errors->first('name') }}</div>
								@endif
							</div>
							<div class="md-form">
								<select name="zone_id" class="form-control {{ hasError('zone_id') }}" id="zone">
									<option></option>
									@foreach($zones as $zone)
									<option value="{{ $zone->id }}" {{ old('zone_id') == $zone->id ?? 'selected' , '' }}>{{ $zone->name }}</option>
									@endforeach
								</select>
								@if ($errors->has('zone_id'))
								<div class="invalid-feedback">{{ $errors->first('zone_id') }}</div>
								@endif
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-success">Add</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			{{-- End of Card Deck --}}

			{{-- Card Deck - Edit --}}
			<div class="card-deck">
				<div class="card mb-4" id="editZoneCard" style="display: none; max-width: 350px;">
					<div class="card-header cyan white-text">
						Edit Zone : <span class="item-name"></span>
					</div>
					<div class="card-body">
						<form action="{{ route('zone.update') }}" method="POST" id="editZone" class="form">
							@csrf
							@method('PUT')
							<input type="number" name="id" class="form-control" hidden="true">
							<div class="form-group">
								<input type="text" name="name" class="form-control form-control-lg rounded-0 {{ $errors->zone->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Name of Zone">
								@if ($errors->zone->has('name'))
								<div class="invalid-feedback">{{ $errors->zone->first('name') }}</div>
								@endif
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-success">Update</button>
							</div>
						</form>
					</div>
				</div>

				<div class="card mb-4" style="display: none;">
					<div class="card-header cyan white-text">
						Edit City
					</div>
					<div class="card-body">
						<form action="{{ route('city.store') }}" method="POST" class="form">
							@csrf
							<div class="form-group">
								<input type="text" name="name" class="form-control form-control-lg rounded-0 {{ hasError('name') }}" value="{{ old('name') }}" placeholder="Name of City">
								@if ($errors->has('name'))
								<div class="invalid-feedback">{{ $errors->first('name') }}</div>
								@endif
							</div>
							<div class="md-form">
								<select name="zone_id" class="form-control {{ hasError('zone_id') }}" id="zone">
									<option></option>
									@foreach($zones as $zone)
									<option value="{{ $zone->id }}" {{ old('zone_id') == $zone->id ?? 'selected' , '' }}>{{ $zone->name }}</option>
									@endforeach
								</select>
								@if ($errors->has('zone_id'))
								<div class="invalid-feedback">{{ $errors->first('zone_id') }}</div>
								@endif
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-success">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			{{-- End of Card Deck - Edit --}}
		</div> 
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#zone').select2({
			placeholder: 'Select Zone'
		});
		
		$('.edit-zone-btn').click(function(){
			console.log('button clicked');
			var id = $(this).data('id');
			var name = $(this).data('name');
			$('#editZoneCard').show();
			$('#editZoneCard .item-name').html($(this).data('name'));
			$('#editZoneCard input[name=id').val($(this).data('id'));
			$('#editZoneCard input[name=name').val($(this).data('name'));
			$('#editZoneCard input[name=name').select();
		});
	});
</script>
@endsection