@if (isset($heading))
<div class="card rounded-0 p-3 mb-4 z-depth-0">
	<h5 class="h5 text-secondary">
		<i class="fas fa-hashtag">&nbsp;</i> {{ $heading ?? 'Dashboard' }}
	</h5>
</div>
@endif
