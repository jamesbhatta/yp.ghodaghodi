<div class="white border p-2">
	<div class="my-4 text-center">
		<img class="image-fluid" src="{{ asset('images/watch_netflix.jpg') }}" alt="">
	</div>
	@if(isset($categories))
	<div class="my-4 p-3">
		<div class="border grey lighten-5 p-2">
			<h5 class="h5-reposnsive mb-0 text-uppercase text-center font-weight-bolder">Categories</h5>
		</div>
		<ul class="list-group list-group-flush mt-3">
			@foreach($categories as $category)
			<li class="list-group-item border-bottom pl-2 {{ $loop->first ? 'border-top-0' : '' }} ">
				<a href="{{ route('search') }}?category={{ $category->id }}"><i class="far fa-star fa-sm  mr-2 text-light"></i>{{ $category->name }}</a>
			</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div class="my-4 text-center">
		<img class="image-fluid" src="{{ asset('images/netflix.jpg') }}" alt="" style="max-width: 300px;">
	</div>
</div>