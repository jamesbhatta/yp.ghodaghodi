@extends('layouts.app')

@section('content')

<div class="container">
	<ul class="list-group">
		@forelse($businesses as $business)
		<li class="list-group-item">
			<a href="{{ route('business.view', $business->slug) }}">{{ $business->id }} > {{ $business->name }} > {{ $business->slug }} > Type: {{ $business->account_type == 2 ? 'Premium' : 'Free' }}</a>
		</li>
		@empty
		<h3>Business List is empty.</h3>
		@endforelse
	</ul>
</div>
@endsection