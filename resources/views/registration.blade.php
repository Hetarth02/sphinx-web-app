<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="{{ URL::asset('css/base.css'); }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/registrationstyle.css'); }}" />
    </head>
    <body>
        <form class="form" action="/register" method="POST">
            @csrf
            <h3>SignUp</h3>
            <div>
                <input type="email" name="email" id="email" placeholder="E-mail" required="" />
            </div>
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
            <div class="date">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" required="" />
            </div>
            <div class="gender">
                <label for="male">Male</label>
                <input type="radio" name="gender" id="male" value="male" />
                <label for="female">Female</label>
                <input type="radio" name="gender" id="female" value="female" />
            </div>
            <div>
                <input type="text" name="course" id="course" placeholder="Course" />
            </div>
            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
        </form>
    </body>
</html>
