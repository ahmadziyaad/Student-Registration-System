<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Centering the form box */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
            margin: 0;
        }
        .form-box {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-box header {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .message p {
            color: red;
            text-align: center;
        }
        .links {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <?php 
            include "db.php";
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $password = $_POST['password'];

                // Verifying the unique email
                $verify_query = mysqli_query($conn,"SELECT Email FROM userlog WHERE Email='$email'");

                if(mysqli_num_rows($verify_query) != 0){
                    echo "<div class='message'>
                            <p>This email is already in use, please try another one!</p>
                          </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn btn-secondary'>Go Back</button></a>";
                } else {
                    mysqli_query($conn,"INSERT INTO userlog(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Error Occurred");

                    echo "<div class='message'>
                            <p>Registration successful!</p>
                          </div> <br>";
                    echo "<a href='index.php'><button class='btn btn-primary'>Login Now</button></a>";
                }
            } else {
        ?>

        <header>Sign Up</header>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" name="age" id="age" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" autocomplete="off" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="Register">
            </div>
            <div class="links">
                Already a member? <a href="index.php">Sign In</a>
            </div>
        </form>
        <?php } ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
