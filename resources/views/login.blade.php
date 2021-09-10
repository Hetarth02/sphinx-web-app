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
        </form>
    </body>
</html>
