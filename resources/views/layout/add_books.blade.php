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
    <div class="card-header">Add Book Data</div>
    <div class="card-body">
        <form method="POST" action="{{ route('books.store') }}" autocomplete="ON">
            @csrf
            <br>
            <div class = "form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" class="form-control" id="isbn" name="isbn" maxlength="50" value="<?php if(isset($isbn)) {echo $isbn;} ?>">
                @error('isbn')
                    <div class="error" style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class = "form-group">
                <label for="author">Author</label>
                <textarea type="text" class="form-control" id="author" rows ="3" name="author"><?php if(isset($author)) {echo $author;} ?></textarea>
                @error('author')
                    <div class="error" style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class = "form-group">
                <label for="title">Title:</label>
                <textarea type="text" class="form-control" id="title" rows ="3" name="title"><?php if(isset($title)) {echo $title;} ?></textarea>
                @error('title')
                    <div class="error" style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class = "form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" maxlength="10" value="<?php if(isset($price)) {echo $isbn;} ?>">
                @error('price')
                    <div class="error" style="color: red;">{{ $message }}</div>
                @enderror
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

