<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Web Galeri Sekolah</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-image: linear-gradient(90deg, rgba(210,68,210,1) 0%, rgba(68,175,196,1) 100%);">

    <div class="container mt-5">
        <div class="w-50 d-block mx-auto">
            <div class="card" style="background-color: rgba(255, 255, 255, 0.7); border: none; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); ">
                <div class="card-body px-4 my-4">
                    <h3 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; font-weight: 600;">Welcome back</h3>

                    <form action="/login" method="POST">
                    @csrf
                    @if(session('error'))
                <div class="alert alert-danger fade show" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                        
                        <div class="mb-3">
                            <label for="exampleInputUsername" class="form-label" style="font-family: 'Lato', sans-serif;">Username</label>
                            <input type="text" class="form-control" id="exampleInputUsername" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="font-family: 'Lato', sans-serif;">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-outline-dark d-block mx-auto my-4">Login</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
