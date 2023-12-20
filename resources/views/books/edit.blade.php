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
            <h3>Search Book</h3>

            <form action="{{ route('searchBook') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="search_id">Search by ID</label>
                    <input type="text" class="form-control" id="search_id" name="search_id" required>
                </div>
                <button type="submit" class="btn mt-3 btn-primary">Search</button>
            </form>

            @if(isset($book))
                <h3>Edit Book</h3>
                <form action="{{ route('books.updateBook', ['books' => $book->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $book->id ?? '' }}" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $book->name ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ $book->author ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="text" class="form-control" id="image" name="image" value="{{ $book->image ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $book->price ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{ $book->category ?? '' }}" required>
                    </div>

                    <button type="submit" class="btn mt-3 btn-primary">Update Book</button>

                    <button type="button" class="btn mt-3 btn-danger" onclick="confirmDelete()">
                     Delete Book
                    </button>

   
                </form>
                <!-- Delete form outside the main form -->
               <form id="deleteForm" action="{{ route('books.destroy', ['books' => $book->id]) }}" method="post" style="display: none;">
                 @csrf
                 @method('DELETE')
               </form>
            @endif
        </div>
    </div><br><br>
    <footer class="row">
        @include('includes.footer')
    </footer>
</div>
@yield('scripts')
</body>
</html>

<!-- JavaScript for SweetAlert -->
<script>
    function confirmDelete() {
        Swal.fire({
            title: 'Confirm Delete',
            text: 'Are you sure you want to delete this book?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with the form submission for delete
                document.getElementById('deleteForm').submit();
            }
        });
    }
</script>

