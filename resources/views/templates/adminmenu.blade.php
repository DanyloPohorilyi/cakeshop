<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/admin') }}">Admin Panel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('taste.index') }}">Tastes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('category.index') }}">Categories</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{ route('confectionery.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Confectioneries
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item"  href="{{ route('confectionery.index') }}">Confectioneries</a></li>
              <li><a class="dropdown-item"  href="{{ route('discount.index') }}">Discounts</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Orders
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item"  href="{{ route('orderstatuses.index') }}">Order status</a></li>
              <li><a class="dropdown-item"  href="#">Orders</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('customer.index') }}">Customers</a>
          </li>
        </ul>


      </div>
      <form class="d-flex" role="search">
        <a class="btn btn-primary" href="{{ url('/') }}">To the site</a>
  </form>

    </div>
  </nav>
