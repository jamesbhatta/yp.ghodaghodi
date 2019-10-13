<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light yellow darken-1 sticky-top scrolling-navbar z-depth-0">

  <!-- Navbar brand -->
  <a class="navbar-brand font-weight-bolder white-text" href="{{ route('home') }}">{{ config('app.name') }}</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
  aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<!-- Collapsible content -->
<div class="collapse navbar-collapse" id="basicExampleNav">
  <ul class="navbar-nav mr-autos font-weight-bolder">
    <li class="nav-item {{ setActive('home') }}">
      <a class="nav-link mdb-color-text" href="{{ route('home') }}">Home
        <span class="sr-only">(current)</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link mdb-color-text" href="{{ route('event.list') }}">Events</a>
    </li>
    <li class="nav-item">
      <a class="nav-link mdb-color-text" href="{{ route('features') }}">Features</a>
    </li>
    <li class="nav-item">
      <a class="nav-link mdb-color-text {{ setActive('pricing') }}" href="{{ route('pricing') }}">Pricing</a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto font-weight-bolder">
    <li class="nav-item">
      <a class="nav-link mdb-color-text" href="{{ route('listing') }}">Free Listing</a>
    </li>
    <li class="nav-item">
      <a class="nav-link success-color white-text py-2 z-depth-0" href="">Premium Listing</a>
    </li>
    <li class="nav-item">
      <a class="nav-link mdb-color-text" href="">Advertise With Us</a>
    </li>
    @auth
    <li class="nav-item">
      <a class="nav-link white-text" href="{{ route('dashboard') }}"><i class="fa fa-chart-line"></i></a>
    </li>
    @endauth
  </ul>
</div>
<!-- Collapsible content -->
</nav>
<!--/.Navbar-->