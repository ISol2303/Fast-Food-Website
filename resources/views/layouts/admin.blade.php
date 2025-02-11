<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - FastFood</title>
  <!-- Bootstrap 5 CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f1f4f7;
      font-family: 'Roboto', sans-serif;
    }
    /* Header & Navbar styling */
    header {
      background: linear-gradient(135deg, #343a40, #212529);
      padding: 20px 0;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
      margin-bottom: 30px;
    }
    header h1 {
      color: #ffc107;
      margin: 0;
      font-size: 32px;
      font-weight: 700;
      text-align: center;
      margin-bottom: 20px;
    }
    nav {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 20px;
      flex-wrap: wrap;
    }
    nav a {
      color: #fff;
      font-size: 1.1rem;
      font-weight: 500;
      text-decoration: none;
      padding: 8px 12px;
      border-radius: 4px;
      transition: background-color 0.3s, color 0.3s;
    }
    nav a:hover {
      color: #fff;
      background-color: rgba(255, 193, 7, 0.3);
    }
    nav form {
      margin: 0;
    }
    nav button {
      border: none;
      padding: 8px 12px;
      border-radius: 4px;
      background-color: #dc3545;
      color: #fff;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    nav button:hover {
      background-color: #c82333;
    }
    /* Footer styling */
    footer {
      text-align: center;
      padding: 15px 0;
      background-color: #212529;
      color: #ccc;
      font-size: 14px;
    }
    .container {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
      <h1>Admin Panel - FastFood</h1>
      <nav>
        <a href="{{ url('/') }}">Fast Food</a>
        <a href="{{ url('/admin/categories') }}">Categories</a>
        <a href="{{ url('/admin/menu_items') }}">Menu Items</a>
        <a href="{{ url('/admin/orders') }}">Orders</a>
        <a href="{{ url('/admin/promotions') }}">Promotions</a>
        <a href="{{ url('/admin/branches') }}">Branches</a>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit">Logout</button>
        </form>
      </nav>
    </div>
  </header>

  <div class="container">
    @yield('content')
  </div>

  <footer>
    <div class="container">
      <p>&copy; {{ date('Y') }} FastFood Admin. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap 5 JS Bundle CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
