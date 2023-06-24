<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<section class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">{{ (session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-header">
            User Create
        </div>
        <div class="card-body">
<form action="{{ route('user.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
        @error('name')<p class="text text-danger">Call me by your name</p>@enderror
    </div>
    <div class="form-group">
        <label>Email Address</label>
        <input type="email" name="email" class="form-control">
        @error('email')<p class="text text-danger">You cant be sure</p>@enderror
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="passwoed" class="form-control">
        @error('password')<p class="text text-danger">{{ $message }}</p>@enderror
    </div>
    <div>
        <button type="submit">Save</button>
    </div>
</form>
        </div>
        <div class="card-footer">

        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
