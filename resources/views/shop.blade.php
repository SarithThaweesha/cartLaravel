<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <script src= "https://cdn.jsdelivr.net/npm/jquery@3.6/dist/jquery.min.js"></script>
    <title>Laravel Add to cart</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#"> Sarith</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/Books')}}"> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> about</a>
            </li>
        </ul>
        <a class="btn btn-outline-dark" href="{{route('shopping.cart')}}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart<span class="badge bg-danger">{{count((array)session('cart'))}}</span>
        </a>
    </div>
</nav>
<div class="container mt-4">
    <h2 class="mb-3">Laravel add to cart</h2>
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success') }}
    </div>
    @endif
    @yield('content')
</div>
@yield('scripts')
</body>
</html>