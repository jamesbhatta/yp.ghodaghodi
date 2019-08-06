<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark warning-color lighten-5">

  <!-- Navbar brand -->
  <a class="navbar-brand font-weight-bolder" href="#">{{ config('app.name') }}</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
  aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<!-- Collapsible content -->
<div class="collapse navbar-collapse" id="basicExampleNav">
  <ul class="navbar-nav mr-autos">
    <li class="nav-item active">
      <a class="nav-link" href="#">Home
        <span class="sr-only">(current)</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Features</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Pricing</a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="">Free Listing</a>
    </li>
     <li class="nav-item">
      <a class="nav-link btn btn-success py-1" href="">Premium Listing</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="">Advertise With Us</a>
    </li>
  </ul>
</div>
<!-- Collapsible content -->
</nav>
<!--/.Navbar-->