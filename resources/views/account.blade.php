<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" href="{{ URL::asset('css/base.css'); }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/profilestyle.css'); }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/qastyle.css'); }}" />
    </head>
    <body>
        <nav class="navbar sticky-top navbar-dark menu">
            <a class="navbar-brand" href="home">Sphinx</a>
            <div class="mbutton">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
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

        <div class="outerbox">
            <div>
                <img
                    class="userimg"
                    src="/images/pfp.png"
                    width="100px"
                    height="auto"
                />
            </div>
            <div class="question">
                <button type="button" data-toggle="modal" data-target="#qform">Ask Your Doubts!</button>
            </div>
            <h1 class="usertitle">{{ $data[0]->username }}</h1>
            <p class="course">{{ $data[0]->course }}</p>
            <p class="dob">{{ $data[0]->dob }}</p>
            <i class="material-icons">facebook</i>
            <i class="material-icons email">email</i>
        </div>

        <div id="qform" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div>
                        <form id="form" class="form" action="qsub" method="POST">
                            @csrf
                            <h3>Question!?</h3>
                            <div>
                                <textarea
                                    id="textarea"
                                    class="textarea"
                                    name="question"
                                    form="form"
                                    rows="4"
                                    cols="50"
                                    wrap="soft"
                                    placeholder="Enter text here..."
                                ></textarea>
                            </div>
                            <button type="submit">Submit</button>
                            <button type="button" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
