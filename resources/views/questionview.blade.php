<!DOCTYPE html>
<html>
    <head>
        <title>Question</title>
        <link rel="stylesheet" href="{{ URL::asset('css/base.css'); }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/qviewstyle.css'); }}" />
    </head>
    <body>
        <nav class="navbar sticky-top navbar-dark menu">
            <a class="navbar-brand" href="../home">Sphinx</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="../home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../profile">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="../about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="../credits">Credits</a></li>
                    <li class="nav-item"><a class="nav-link" href="../logout">Logout</a></li>
                </ul>
            </div>
        </nav>

        <section class="content container">
            <p>Q: {{ $data[0]->question }}</p>
            <small class="username">By: <a href="../{{ $data[0]->username }}">{{ $data[0]->username }}</a></small>
            <div class="answer">
                <button type="button" data-toggle="modal" data-target="#aform">Submit Answer</button>
            </div>
            <hr>
            <h3>Answers</h3>
            @foreach ($data[1] as $answer)
                <p>
                    A: {{ $answer->answer }}
                    <br>
                    <small class="username">By: <a href="../{{ $answer->username }}">{{ $answer->username }}</a></small>
                </p>
            @endforeach
            <div id="aform" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div>
                            <form id="form" class="form" action="../asub/{{ $data[0]->qid }}" method="POST">
                                @csrf
                               <h3>Answer</h3>
                                <div>
                                    <textarea
                                        id="textarea"
                                        class="textarea"
                                        name="answer"
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
        </section>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
