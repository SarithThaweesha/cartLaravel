<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
@include('includes.header')
<div class="container h-100 mt-5">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <h3>Add a Book</h3>
      <form action="{{ route('books.addBook') }}" method="post">
        @csrf
        <!--<div class="form-group">
          <label for="id">ID</label>
          <input type="text" class="form-control" id="id" name="id" required>
        </div>-->
        <div class="form-group">
          <label for="name">Name</label>
          <!--<textarea class="form-control" id="name" name="name" rows="3" required></textarea>-->
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="author">Author</label>
          <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="text" class="form-control" id="image" name="image" required>
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="text" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
          <label for="category">category</label>
          <input type="text" class="form-control" id="category" name="category" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create book</button>
      </form>
    </div>
  </div><br><br>
  <footer class="row">
       @include('includes.footer')
   </footer>
</div>
@yield('scripts')
</body>
</html>