<html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Sign in</title>
    <style>
        body {
            /*background-color: #F3EBF6;*/
            background-image: url("https://scontent.fpnh10-1.fna.fbcdn.net/v/t1.6435-9/122069746_4555522061187354_3613821239688722009_n.jpg?_nc_cat=100&ccb=1-3&_nc_sid=e3f864&_nc_ohc=qVbnhVnip2kAX8BssRp&_nc_ht=scontent.fpnh10-1.fna&oh=6d85ce0bd6863fed6692000ee3f1604b&oe=609D8C69");
            font-family: 'Ubuntu', sans-serif;
        }

        .main {
            background-color: #FFFFFF;
            width: 400px;
            height: 400px;
            margin: 7em auto;
            border-radius: 1.5em;
            box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
        }

        .sign {
            padding-top: 40px;
            color: #8C55AA;
            font-family: 'Ubuntu', sans-serif;
            font-weight: bold;
            font-size: 23px;
        }

        .un {
            width: 76%;
            color: rgb(38, 50, 56);
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 1px;
            background: rgba(136, 126, 126, 0.04);
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            outline: none;
            box-sizing: border-box;
            border: 2px solid rgba(0, 0, 0, 0.02);
            margin-bottom: 20px;
            margin-left: 46px;
            text-align: center;
            margin-bottom: 27px;
            font-family: 'Ubuntu', sans-serif;
        }

        form.form1 {
            padding-top: 40px;
        }

        .pass {
            width: 76%;
            color: rgb(38, 50, 56);
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 1px;
            background: rgba(136, 126, 126, 0.04);
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            outline: none;
            box-sizing: border-box;
            border: 2px solid rgba(0, 0, 0, 0.02);
            margin-bottom: 50px;
            margin-left: 46px;
            text-align: center;
            margin-bottom: 27px;
            font-family: 'Ubuntu', sans-serif;
        }


        .un:focus, .pass:focus {
            border: 2px solid rgba(0, 0, 0, 0.18) !important;

        }

        .submit {
            cursor: pointer;
            border-radius: 5em;
            color: #fff;
            background: linear-gradient(to right, #9C27B0, #E040FB);
            border: 0;
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 10px;
            padding-top: 10px;
            font-family: 'Ubuntu', sans-serif;
            margin-left: 35%;
            font-size: 13px;
            box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
        }

        .forgot {
            text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
            color: #E1BEE7;
            padding-top: 15px;
        }

        a {
            text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
            color: #E1BEE7;
            text-decoration: none
        }

        .help-block {
            color: red;
            align-items: center;
            padding: 10px 20px;
            margin-left: 30px;

        }

        @media (max-width: 600px) {
            .main {
                border-radius: 0px;
            }
        }
        [v-cloak] {
            display: none;
        }
    </style>
</head>

<body>
<div id="app">
    <div class="main" id="login-box" v-cloak>
        <p class="sign" align="center">Sign in</p>
        <form class="form1" action="{{ url('admin/login') }}" method="post">
            @csrf
            <div class="form-group" :class="{'has-error' : errors.first('email')}">
                <input type="email"
                       name="email"
                       v-model="email"
                       data-vv-as="Email"
                       v-validate="'required'"
                       id="email"
                       align="center"
                       placeholder="Email"
                       class="un">
                <br>
                <span class="help-block" >@{{ errors.first('email') }}</span>
            </div>
            <div class="form-group" :class="{'has-error' : errors.first('password')}">
                <input type="password"
                       name="password"
                       v-model="password"
                       data-vv-as="Password"
                       v-validate="'required'"
                       id="password"
                       align="center"
                       placeholder="password"
                       class="pass">
                <br>
                <span class="help-block" >@{{ errors.first('password') }}</span>
            </div>
            <button class="submit" type="submit">Sign In</button>
            <br>
            @if(isset($errorMessageDuration))
                <h3 style="color: red" align="center">{{ $errorMessageDuration }}</h3>
            @endif
        </form>
    </div>
</div>

</body>
<script src="{{ mix('/dist/js/app.js') }}"></script>
<script src="{{ mix('/dist/js/adminAuth/login.js') }}"></script>

</html>
