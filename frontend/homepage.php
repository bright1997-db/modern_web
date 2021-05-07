<?php
//Initialize the session
session_start();

//Check if user is logged in, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: http://localhost/event-insider/frontend/login.php");
    exit;
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>EventDeb</title>
</head>

<style>
#footer li {
    list-style-type: none;
}

#footer .row {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 30px 0px;
}

.landing {
    background: url('https://seda.college/blog/wp-content/uploads/2018/06/party.jpg');
    background-position: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.intro {
    color: white;
    width: 70vw;
    text-align: center;

}

.intro h1 {
    font-size: 5em;
}

.intro p {
    font-size: 3em;
}
</style>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="homepage.html">EventDeb</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link active text-white" id="create_event" href="create_event.php"><i
                                class="fa fa-plus" aria-hidden="true"></i>
                            Create Event</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active text-white" href="list_event.php"><i class="fa fa-list"
                                aria-hidden="true"></i>
                            List Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" id="logout" href="#"><i class="fa fa-user"
                                aria-hidden="true"></i>
                            Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Landing -->
    <div class="landing">
        <!-- Introduction -->
        <div class="intro">
            <h1>Welcome to Event-Insider</h1>
            <p>Browse the events</p>
        </div>
    </div>
    </div>

    <!-- Events -->
    <div class="container mb-5">
        <div class="row">
            <h3>Online events</h3>
            <div class="col mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="https://images.pexels.com/photos/3171837/pexels-photo-3171837.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        height="250" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Event title</h5>
                        <span>5:00am - 10:00pm</span><br>
                        <span>1 June 2016</span><br>
                        <span>Accra Sports Stadium</span>
                        <button type="submit" class="btn btn-primary w-100 mt-4">Join Event</button>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cGFydHl8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80"
                        height="250" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Event title</h5>
                        <span>5:00am - 10:00pm</span><br>
                        <span>1 June 2016</span><br>
                        <span>Accra Sports Stadium</span>
                        <button type="submit" class="btn btn-primary w-100 mt-4">Join Event</button>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="https://taylormertins.files.wordpress.com/2019/06/top-party-schools-main-image.jpg"
                        height="250" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Event title</h5>
                        <span>5:00am - 10:00pm</span><br>
                        <span>1 June 2016</span><br>
                        <span>Accra Sports Stadium</span>
                        <button type="submit" class="btn btn-primary w-100 mt-4">Join Event</button>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="https://images.unsplash.com/photo-1530103862676-de8c9debad1d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fHBhcnR5fGVufDB8fDB8fA%3D%3D&w=1000&q=80"
                        height="250" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Event title</h5>
                        <p class="card-text">Some quick example text to build on the Event title and make up the bulk of
                            the card's content.</p>
                        <button type="submit" class="btn btn-primary w-100 mt-4">Join Event</button>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="https://taylormertins.files.wordpress.com/2019/06/top-party-schools-main-image.jpg"
                        height="250" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Event title</h5>
                        <p class="card-text">Some quick example text to build on the Event title and make up the bulk of
                            the card's content.</p>
                        <button type="submit" class="btn btn-primary w-100 mt-4">Join Event</button>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cGFydHl8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80"
                        height="250" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Event title</h5>
                        <p class="card-text">Some quick example text to build on the Event title and make up the bulk of
                            the card's content.</p>
                        <button type="submit" class="btn btn-primary w-100 mt-4">Join Event</button>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="https://images.pexels.com/photos/3171837/pexels-photo-3171837.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        height="250" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Event title</h5>
                        <span>5:00am - 10:00pm</span><br>
                        <span>1 June 2016</span><br>
                        <span>Accra Sports Stadium</span>
                        <button type="submit" class="btn btn-primary w-100 mt-4">Join Event</button>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cGFydHl8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80"
                        height="250" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Event title</h5>
                        <span>5:00am - 10:00pm</span><br>
                        <span>1 June 2016</span><br>
                        <span>Accra Sports Stadium</span>
                        <button type="submit" class="btn btn-primary w-100 mt-4">Join Event</button>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="https://taylormertins.files.wordpress.com/2019/06/top-party-schools-main-image.jpg"
                        height="250" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Event title</h5>
                        <span>5:00am - 10:00pm</span><br>
                        <span>1 June 2016</span><br>
                        <span>Accra Sports Stadium</span>
                        <button type="submit" class="btn btn-primary w-100 mt-4">Join Event</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous">
    </script>
    <script src="./js/homepage.js"></script>
</body>

</html>