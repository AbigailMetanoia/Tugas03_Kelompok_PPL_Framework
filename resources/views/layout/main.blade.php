<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Bookorama</title>
</head>

<body>
    <div class="container">
    <div class="card mt-5">
    <div class="card-header">Books Data</div>
    <div class="card-body">
        <a href="{{ url('/add-books') }}" class="btn btn-primary mb-4">+ Add Book Data</a>
        <br>
        <table class="table table-striped mx-auto">
            <tr>
                <th>ISBN</th>
                <th>Author</th>
                <th>Title</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php
                if (DB::connection()->getPdo()) {
                    echo "Berhasil terhubung ke database: " . DB::connection()->getDatabaseName();
                }

            ?>
            @foreach ($books as $row)
            <tr>
                <td>{{ $row->isbn }}</td>
                <td>{{ $row->author }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ $row->price }}</td>
                <td>
                    <a href="{{ route('edit_books', ['isbn' => $row->isbn]) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form method="post" action="{{ route('delete_books', ['isbn' => $row->isbn]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="isbn" value="{{ $row->isbn }}">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+TTf5PFzRf1wjKv7f5+2ll6h++j2q1f9PvM4GE+U7jo3K5em" crossorigin="anonymous"></script>
    <script src="./ajax.js"></script>
</body>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</div>

