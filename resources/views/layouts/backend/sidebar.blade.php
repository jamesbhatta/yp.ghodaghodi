<ul id="sidebar" class="nav white flex-column pb-4 vh-100">
  <li class="nav-item waves-effect">
    <a class="nav-link {{ setActive('dashboard') }}" href="{{ route('dashboard') }}">
      <i class="fa fa-chart-line"> &nbsp; </i> Dashboard
    </a>
  </li>
  <li class="nav-item waves-effect">
    <a class="nav-link  {{ setActive('category*') }}" href="{{ route('category.index') }}">
      <i class="fas fa-code-branch"> &nbsp; </i> Categories
    </a>
  </li>
  <li class="nav-item waves-effect">
    <a class="nav-link {{ setActive('business*') }}" href="{{ route('business.index') }}">
      <i class="fa fa-briefcase"> &nbsp; </i> Businesses
    </a>
  </li>
  <li class="nav-item waves-effect">
    <a class="nav-link {{ setActive('location*') }}" href="{{ route('location.index') }}">
      <i class="fa fa-map-marker-alt"> &nbsp; </i> Location
    </a>
  </li>
  <li class="nav-item waves-effect">
    <a class="nav-link" href="#!">
      <i class="fa fa-ad"> &nbsp; </i> Advertisements
    </a>
  </li>
  <li class="nav-item waves-effect">
    <a class="nav-link" href="#!">
      <i class="fa fa-cogs"> &nbsp; </i> Settings
    </a>
  </li>
  <li class="nav-item waves-effect">
    <a class="nav-link {{ setActive('trash*') }}" href="{{ route('trash') }}">
      <i class="far fa-trash-alt"> &nbsp; </i> Trash
    </a>
  </li>
</ul>