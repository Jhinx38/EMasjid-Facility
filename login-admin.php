<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">

<head>

    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <script>
        function validateForm() {

            var x =
                document.forms["loginForm"]["password"].value;

            if (x == "") {

                alert("Please insert password...");

                return false;

            }

        }
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Design by foolishdeveloper.com -->
    <title>Login page</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <!--Stylesheet-->
    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: #000 url(/loginast/background-img.jpeg) no-repeat center center;
            background-attachment: fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 100%;
        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(#1845ad,
                    #23a2f6);
            left: -80px;
            top: -80px;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #9B12D1,
                    #B972D5);
            right: -80px;
            bottom: -100px;
        }

        form {
            height: 520px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #000000;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            color: #000000;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label {
            display: block;
            color: #000000;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        p {
            color: #000000;
        }

        a {
            color: #000000;
        }

        span {
            color: #000000;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: #FFFFFF;
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        .checkbox {
            display: block;
            height: 100px;
            width: 100%;
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        .showpasstxt {
            position: absolute;
            tab-size: 2;
            left: 15%;
            top: 64.1%;
        }


        .checkbox {
            height: 20px;
            position: absolute;
            top: 62.6%;
            left: -39%;
        }

        ::placeholder {
            color: #000000;
        }

        button {
            margin-top: 50px;
            width: 100%;
            background-color: #FFFFFF;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            box-shadow: 0 1px 15px rgba(145, 92, 182, .4);
            color: #080710;
        }

        .register {
            border: 0;
            outline: none;
            border-radius: 0;
            padding: 8px;
            font-size: 15px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: .1em;
            background: main;
            color: white;
            text-align: center;
            transition: all.5s ease;
            -webkit-appearance: none;

            &:hover,
            &:focus {
                background: main-dark;
            }

            .social {
                margin-top: 30px;
                display: flex;
            }

            .social div {
                background: red;
                width: 200px;
                border-radius: 3px;
                padding: 5px 10px 10px 5px;
                background-color: rgba(255, 255, 255, 0.27);
                color: #eaf0fb;
                text-align: center;
            }

            .social div:hover {
                background-color: rgba(255, 255, 255, 0.47);
            }

            .social .fb {
                margin-left: 20%;
            }

            .social i {
                margin-right: 4px;
            }
        }
    </style>

    <?php include "connection.php"; ?>

</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form name="loginForm" method="post" action="loginEngine.php" onSubmit="return validateForm()">
        <h3>Admin Login</h3>

        <label name="username">Username</label>
        <input type="text" placeholder="Email or Phone" id="email" name="email">

        <label name="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">

        <input class="checkbox" type="checkbox" onclick="myFunction()">

        <div class="showpasstxt">
            <p>Show password</p>
        </div>

        <input type="hidden" name="option" value="A">
        <button type="submit">Log In</button>

        <div class="register">
            <a href="login.php">Login User</a> <span> | </span> <a href="login-itcomm.php">Login Staff</a>
        </div>
    </form>
</body>

</html>