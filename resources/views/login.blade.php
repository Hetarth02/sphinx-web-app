<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="{{ URL::asset('css/base.css'); }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/loginstyle.css'); }}" />
    </head>
    <body>
        <form class="form" action="auth" method="POST">
            @csrf
            <h3>Sphinx Login</h3>
            <div>
                <input
                    type="text"
                    name="username"
                    id="username"
                    placeholder="Username"
                    required=""
                />
            </div>
            <div>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password"
                    required=""
                />
            </div>
            <button type="submit">Login</button>
            <div class="text">
                Not registered,
                <a href="registration">Register!</a>
            </div>
            <div class="question">
                <button type="button" data-toggle="modal" data-target="#pform">Forgot Password!</button>
            </div>
        </form>
        <div id="pform" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div>
                        <form id="form" class="pform" action="forgotpassword" method="POST">
                            @csrf
                            <div>
                                <input type="text" name="username" class="pformtext" placeholder="username" required="">
                                <input type="email" name="email" class="pformtext" placeholder="e-mail" required="">
                            </div>
                            <button type="submit">Send an E-mail!</button>
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
