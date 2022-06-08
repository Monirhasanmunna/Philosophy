<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Google Font CDN Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&family=Playfair+Display:wght@500&display=swap"
        rel="stylesheet">

    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <!-- Bootstrap CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Style.Css Link -->
    <link rel="stylesheet" href="{{asset('frontend/css/login/style.css')}}">

</head>

<body>

    <div class="container-fluid px-0">
        <div class="wraper">
            <div class="login-form">
                <div class="row">
                    <div class="icon">
                        <a href="#"><i class="icon-1 fab fa-facebook-f"></i></a>
                        <a href="#"><i class="icon-2 fab fa-google"></i></a>
                    </div>
                    <div class="title mb-3 text-center text-white text-capitalize">
                        <h2>log in</h2>
                    </div>
                    <div class="col-12">

                        <form  method="POST" action="{{ route('login') }}" class="form">
                            @csrf

                            <div class="form-group mb-3">
                                <input class="form-control user-name" type="email" name="email" placeholder="Enter Your Email" required>
                            </div>

                            <div class="form-group mb-3">
                                <input class="form-control password" type="password" name="password" placeholder="Enter Your Password" required>
                            </div>

                            <div class="button mb-4">
                                <button class="btn waves-effect form-btn" type="submit">Submit</button>
                            </div>

                            <div class="forgot-pass  text-light ">
                                <a href="{{ route('register') }}">
                                    <h6>Register Here</h6>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
</body>

</html>
