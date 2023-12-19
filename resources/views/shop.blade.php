<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
@include('includes.header')

<div class="container mt-4">
    <h2 class="mb-3">Laravel add to cart</h2>
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success') }}
    </div>
    @endif
    @yield('content')

    <footer class="row">
       @include('includes.footer')
   </footer>
</div>
@yield('scripts')
</body>
</html>