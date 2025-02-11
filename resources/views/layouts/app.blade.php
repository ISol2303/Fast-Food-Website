<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Fast Food Website')</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <!-- FontAwesome (for cart icon and others) -->
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-pap6YpX1fzmVObw+gdjP1vXGR4HcIYfLZRta4pplzK7kOZsCnEOM1x+ckG9U1nKf1cBsBnFk+7KzB7+2G1d5Kw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    /* Navbar */
    .navbar {
      background-color: #222222e2;
    }

    /* Updated cart icon style */
    .navbar .nav-link img.cart-icon {
      width: 2rem;
      height: auto;
      transition: transform 0.2s ease-in-out;
    }

    .navbar .nav-link:hover img.cart-icon {
      transform: scale(1.2);
    }

    /* Updated badge style for cart icon */
    .navbar .nav-link .badge {
      position: absolute;
      top: -0.4rem;
      right: -0.8rem;
      font-size: 0.7rem;
      padding: 3px 5px;
      border-radius: 50%;
      background-color: #dc3545;
      color: #fff;
      z-index: 2;
    }

    /* Other navbar link styles */
    .navbar .nav-link {
      color: #fff;
      text-decoration: none;
      margin: 0 10px;
    }

    .navbar .nav-link:hover {
      text-decoration: underline;
    }

    /* Container spacing */
    .container {
      margin-top: 20px;
    }
      /* Footer styling */
      footer {
      text-align: center;
      padding: 15px 0;
      background-color: #212529;
      color: #ccc;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      {{-- Nếu người dùng đã đăng nhập và có role là admin thì chuyển tới admin/categories --}}
      <a class="navbar-brand" href="{{ (Auth::check() && Auth::user()->role == '1') ? url('/admin/categories') : url('/') }}">Fast Food</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/menu">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact">Contact</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <!-- Cart Icon with Item Count -->
          <li class="nav-item">
            <a class="nav-link position-relative" href="{{ route('cart.index') }}">
              <img src="https://img.icons8.com/?size=100&id=Ypj9RsvB5YHH&format=png&color=000000" alt="Cart Icon" class="cart-icon">
              <span class="badge rounded-pill">
                {{ session('cart') ? count(session('cart')) : 0 }}
              </span>
            </a>
          </li>

          <!-- User Authentication Links -->
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="/dashboard">Profile</a>
                </li>
                <li>
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">Logout</button>
                  </form>
                </li>
              </ul>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>


  <!-- Main Content -->
  <div class="container">
    @yield('content')
  </div>

  <footer>
    <div class="container">
      <p>&copy; {{ date('Y') }} FastFood. All rights reserved.</p>
    </div>
  </footer>
  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
