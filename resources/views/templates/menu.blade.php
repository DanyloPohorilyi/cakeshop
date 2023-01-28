<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <nav class="navbar bg-body-tertiary">
                <div class="container">
                  <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('image/icons/cake.png') }}" alt="Bootstrap" width="30" height="24">
                  </a>
                </div>
              </nav>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a  class = "nav-link {{ $page == 'Home' ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class = "nav-link {{ $page == 'Shop' ? 'active' : '' }}" href="{{ url('/shop') }}">Shop</a>
              </li>
              <li class="nav-item">
                <a class = "nav-link {{ $page == 'About Us' ? 'active' : '' }}" href="{{ url('/about') }}">About Us</a>
              </li>
              <li class="nav-item">
                <a class = "nav-link {{ $page == 'Contacts' ? 'active' : '' }}" href="{{ url('/contact') }}">Contacts</a>
              </li>
            </ul>
            <div class="d-flex">
                <a class="cart pe-1" href="#">Cart:</a> 0
            </div>
            <div class="d-flex ms-3">
                <a href="{{ url('/login') }}"><img src="{{ asset('image/icons/326497_account_circle_icon.svg') }}" alt="" width="35px"></a>
            </div>
            <!--<form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>-->
          </div>
        </div>
      </nav>
