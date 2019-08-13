@extends('layouts.app')

@section('content')
<div class="container-fluid white p-4">
  <div class="container">

    <h2 class="h1-responsive font-weight-bold text-center mdb-text-color">Our pricing plans</h2>
    <p class="text-center w-responsive mx-auto mb-5 mdb-text-color">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
      Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam
      eum porro a pariatur veniam.
    </p>

    <div class="row">
      <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">

        <!-- Pricing card -->
        <div class="card pricing-card">

          <!-- Price -->
          <div class="price header white-text blue rounded-top text-center py-4">
            <h2 class="h1-responsive">FREE</h2>
            <h5 class="mb-0">Basic</h5>
          </div>

          <!-- Features -->
          <div class="card-body mb-1">

            <ul class="list-group list-group-flush">
              <li class="list-group-item pb-0">
                <p class="mt-2"><i class="fas fa-check green-text pr-2"></i>Business Listing</p>
              </li>
              <li class="list-group-item pb-0">
                <p><i class="fas fa-check green-text pr-2"></i>Contact Information</p>
              </li>
              <li class="list-group-item pb-0">
                <p><i class="fas fa-check green-text pr-2"></i>Business Hours</p>
              </li>
              <li class="list-group-item pb-0">
                <p><i class="fas fa-times red-text pr-2"></i>Custom Profile</p>
              </li>
              <li class="list-group-item pb-0">
                <p><i class="fas fa-times red-text pr-2"></i>Google Maps</p>
              </li>
              <li class="list-group-item pb-0">
                <p><i class="fas fa-times red-text pr-2"></i>Client Contact Form</p>
              </li>
            </ul>
            <div class="text-center mt-2">
              <button class="btn btn-blue">Buy now</button>
            </div>
          </div>
          <!-- Features -->

        </div>
        <!-- Pricing card -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
        <!-- Pricing card -->
        <div class="card pricing-card">
          <!-- Price -->
          <div class="price header white-text deep-purple rounded-top text-center py-4">
            <h2 class="h1-responsive">NRs. 2500 /-</h2>
            <h5 class="mb-0">Premium</h5>
          </div>
          <!-- Features -->
          <div class="card-body mb-1">
            <ul class="list-group list-group-flush">
              <li class="list-group-item pb-0">
                <p class="mt-2"><i class="fas fa-check green-text pr-2"></i>Business Listing</p>
              </li>
              <li class="list-group-item pb-0">
                <p><i class="fas fa-check green-text pr-2"></i>Contact Information</p>
              </li>
              <li class="list-group-item pb-0">
                <p><i class="fas fa-check green-text pr-2"></i>Business Hours</p>
              </li>
              <li class="list-group-item pb-0">
                <p><i class="fas fa-check green-text pr-2"></i>Custom Profile</p>
              </li>
              <li class="list-group-item pb-0">
                <p><i class="fas fa-check green-text pr-2"></i>Google Maps</p>
              </li>
              <li class="list-group-item pb-0">
                <p><i class="fas fa-check green-text pr-2"></i>Client Contact Form</p>
              </li>
            </ul>
            <div class="text-center mt-4">
              <button class="btn btn-deep-purple">Buy now</button>
            </div>          
          </div>
          <!-- Features -->
        </div>
        <!-- Pricing card -->
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-4 col-md-6">
        <!-- Pricing card -->
        <div class="card pricing-card">
          <!-- Price -->
          <div class="price header white-text secondary-color rounded-top text-center py-4">
            <h2 class="h1-responsive">NRs. 5000 /-</h2>
            <h5 class="mb-0">Sponser</h5>
          </div>
          <!-- Features -->
          <div class="card-body mb-1">
            <ul class="list-group list-group-flush">
              <li class="list-group-item pb-0">
                <p><i class="fas fa-check green-text pr-2"></i>Banner Advertisement</p>
              </li>
              <li class="list-group-item pb-0">
                <p class="mt-2"><i class="fas fa-check green-text pr-2"></i>Free Profile</p>
              </li>
             {{--  <li class="list-group-item pb-0">
                <p><i class="fas fa-check green-text pr-2"></i>Email Adertisement</p>
              </li>
              <li class="list-group-item pb-0">
                <p><i class="fas fa-check green-text pr-2"></i>300 GB Bandwidth</p>
              </li>
              <li class="list-group-item pb-0">
                <p><i class="fas fa-check green-text pr-2"></i>User Management</p>
              </li> --}}
            </ul>
            <div class="text-center mt-5">
              <button class="btn btn-secondary">Buy now</button>
            </div>
          </div>
          <!-- Features -->
        </div>
        <!-- Pricing card -->

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
</div>
<!-- Section: Pricing v.1 -->
@endsection