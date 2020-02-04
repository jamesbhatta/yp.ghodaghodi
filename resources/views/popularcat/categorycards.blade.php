<div class="white my-3 p-2">
	<div class="pl-2 pb-2">
		<h1 class="h1-responsive">Popular Searches</h1>
	</div>
	<div class="row m-0">
		@foreach($categoryCards as $item)
		<div class="col-md-3 pb-3">
			<div class="hoverable">
				<div class="card z-depth-0">
					<div class="view overlay">
						<img class="card-img-top image-fluid rounded-0" src="{{ asset('uploads/'. $item->avatar) }}" alt="{{ $item->display_name }}" height="150" width="300">
						<a href="{{ route('search') }}?category={{ $item->category_id }}">
							<div class="mask rgba-white-slight"></div>
						</a>
					</div>
					<div class="card-body p-0">
						<a href="{{ route('search') }}?category={{ $item->category_id }}" class="btn {{ $item->button_class }} btn-block rounded-0">{{ $item->display_name }}</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>