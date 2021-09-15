<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="{{ URL::asset('css/base.css'); }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/homestyle.css'); }}" />
    </head>
    <body>
        <nav class="navbar sticky-top navbar-dark menu">
            <a class="navbar-brand" href="home">Sphinx</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="credits">Credits</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout">Logout</a></li>
                </ul>
            </div>
        </nav>

        <h1 class="headtitle">Ask Your Doubts!</h1>
        <section class="content container">
            @foreach ($data as $data)
                <p>
                    Q: <span class="questionlink"><a href="displayquestion/{{ $data->qid }}">{{ $data->question }}</a></span>
                    <br>
                    <small class="username">By: <a href="/user/{{ $data->username }}">{{ $data->username }}</a></small>
                </p>
            @endforeach
        </section>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
