<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">

<head>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("C_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <script>
        function validateForm() {

            //if Password || C_password is empty
            var x = document.forms["registerForm"]["password"].value;
            var y = document.forms["registerForm"]["C_password"].value;

            //confirm password
            var pw1 = document.getElementById("password").value;
            var pw2 = document.getElementById("C_password").value;

            if (x == "") {
                alert("Please insert password...");
                return false;
            }

            if (y == "") {
                alert("Confirm Password is Empty ...");
                return false;
            }

            //Check password samo dop dgn C_password
            if (pw1 != pw2) {
                alert("Password are not the same ...");
                return false;
            } else {
                // alert("Your Profile has been created successfully");
            }

        }
    </script>


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

        .fill {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden
        }

        .fill img {
            flex-shrink: 0;
            min-width: 100%;
            min-height: 100%
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
            top: -250px;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #ff512f,
                    #f09819);
            right: -30px;
            bottom: -250px;
        }

        form {
            height: 850px;
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

        ::placeholder {
            color: #000000;
        }

        button {
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
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

        .checkbox {
            height: 20px;
            position: absolute;
            top: 78.34%;
            left: -38%;
        }

        .showpasstxt {
            position: absolute;
            tab-size: 2;
            left: 15%;
            top: 79.1%;
        }

        .back {
            border: 0;
            outline: none;
            border-radius: 0;
            padding: 15px 0;
            font-size: 15px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1em;
            background: main;
            color: white;
            transition: all.5s ease;
            -webkit-appearance: none;

            &:hover,
            &:focus {
                background: main-dark;
            }
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
    </style>
    <?php include "connection.php"; ?>
</head>

<body>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form name="registerForm" method="post" action="registerEngine.php" onsubmit="return validateForm()">
        <h3>Register</h3>

        <label for="username">Name</label>
        <input type="text" placeholder="Name" id="name" name="name" required>

        <label>Email</label>
        <input type="text" placeholder="Email" id="email" name="email" required>

        <label>Phone number</label>
        <input type="text" placeholder="Username" id="Pnumber" name="Pnumber" required>

        <label>Password</label>
        <input type="password" placeholder="Password" id="password" name="password">

        <label>Confirm Password</label>
        <input type="password" placeholder="Password" id="C_password" name="C_password">

        <div>
            <input class="checkbox" type="checkbox" onclick="myFunction()">

            <div class="showpasstxt">
                <p>Show password</p>
            </div>

        </div>

        <input type="hidden" name="option" value="U">
        <button type="submit" name="submit">Register</button>

        <div class="back">
            <a href="login.php">Back</a>

        </div>

    </form>

</body>

</html>