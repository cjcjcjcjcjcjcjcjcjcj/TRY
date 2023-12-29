<?php
@include 'config.php';
session_start();

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = ($_POST['password']);

    $select = " SELECT * FROM login WHERE username = '$username' && password = '$pass' ";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['user_type'] == 'New student') {
            $_SESSION['user_name'] = $row['username'];
            header('location:page1.html');
        }
    } else {
        $error[] = 'Incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="scrpt.js"></script>
    <style>
        body {
            background-image: url('lourdes.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
            padding: 300px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }


        .error-msg {
            margin: 10px 0;
            display: block;
            background: crimson;
            color: #fff;
            border-radius: 5px;
            font-size: 20px;
            padding: 10px;
        }

        .login-container {
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 1);
            text-align: center;
            background-image: linear-gradient(to top, rgba(1, 0, 0, 0), rgba(59, 79, 190, 1));
            animation: popUp 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .login-form input {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: darkblue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        @keyframes popUp {
            from {
                opacity: 0;
                transform: scale(0.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="POST" class="login-form">
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <input type="text" name="username" required placeholder="Username">
            <input type="password" name="password" required placeholder="Password"><br>
            <button name="submit" type="submit">Log In</button>
        </form>
    </div>

    <script>
        function toggleMenu() {
            var navbar = document.querySelector('.navbar');
            navbar.classList.toggle('active');
        }
    </script>
</body>

</html>
