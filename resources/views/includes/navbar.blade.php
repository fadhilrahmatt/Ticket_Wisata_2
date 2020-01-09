{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-white ftco-navbar-dark" id="ftco-navbar">
  <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ url('frontend/images/logo.png') }}" alt="" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link">About</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Tour</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Hotels</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Contact</a></li> 
      </ul>
      </div>
      
      @guest
          <!-- Mobile button -->
          <form class="form-inline d-sm-block d-md-none">
          <button class="btn btn-login my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}';">
              Login
          </button>
          </form>
          <!-- Desktop Button -->
          <form class="form-inline my-2 my-lg-0 d-none d-md-block">
          <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}';">
              Login
          </button>
          </form>
      @endguest

      @auth
          <!-- Mobile button -->
          <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST">
          @csrf
          <button class="btn btn-login my-2 my-sm-0" type="submit">
              Logout
          </button>
          </form>
          <!-- Desktop Button -->
          <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST">
          @csrf
          <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
              Logout
          </button>
          </form>
      @endauth
      <!-- <li class="nav-item cta"><a href="contact.html" class="nav-link"><span>Add listing</span></a></li> -->
  </div>
</nav>
