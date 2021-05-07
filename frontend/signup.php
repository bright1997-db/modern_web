<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="homepage.html">Event-insider</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link active text-white" href="create_event.html"><i class="fa fa-plus"
                                aria-hidden="true"></i>
                            Create Event</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active text-white" href="list_event.html"><i class="fa fa-list"
                                aria-hidden="true"></i>
                            List Event</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active text-white" href="homepage.html"><i class="fa fa-home"
                                aria-hidden="true"></i>
                            Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="signup.html"><i class="fa fa-user" aria-hidden="true"></i>
                            Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="signin.html"><i class="fa fa-user" aria-hidden="true"></i>
                            Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form class="box">
                        <h2>Login</h2>
                        <p class="text-muted"> Please enter your credentials</p>
                        <input type="text" id="fname" name="fname" placeholder="firstname">
                        <input type="text" id="lname" name="lname" placeholder="lastname">
                        <input type="text" id="email" name="email" placeholder="email">
                        <input type="password" id="password" name="password" placeholder="password">
                        <input type="password" id="confirm_password" name="con_password" placeholder="confirm password">
                        <input type="submit" name="" value="Signup" href="#">
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>
    <script src="./js/signup.js"></script>
</body>

</html>