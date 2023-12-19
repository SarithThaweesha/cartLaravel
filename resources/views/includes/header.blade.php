<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#"> Sarith</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}"> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> about</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/books/create')}}"> Add book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/update')}}"> Update book</a>
            </li>
        </ul>
        <a class="btn btn-outline-dark" href="{{route('shopping.cart')}}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart<span class="badge bg-danger">{{count((array)session('cart'))}}</span>
        </a>
    </div>
</nav>