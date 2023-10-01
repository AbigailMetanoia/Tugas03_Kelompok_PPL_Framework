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
    <br>
    <div class="container">
    <div class="card mt-5">
    <div class="card-header">Edit Book Data</div>
    <div class="card-body">
        <form method="POST" action="{{ route('update_books', ['isbn' => $books->isbn]) }}" autocomplete="ON">
            @csrf
            @method('PUT')
            <br>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control" id="author" name="author" maxlength="50" value="{{ $books->author }}">
            </div>
            <br>
            <div class="form-group">
                <label for="title">Title:</label>
                <textarea class="form-control" id="title" name="title" rows="3">{{ $books->title }}</textarea>
            </div>
            <br>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" maxlength="10" value="{{ $books->price }}">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="{{ url('/') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
</body>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="./ajax.js"></script>
</div>

