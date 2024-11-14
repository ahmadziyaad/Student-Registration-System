<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for centering the login form */
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
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);

                // Check for matching credentials in the database
                $result = mysqli_query($conn, "SELECT * FROM userlog WHERE Email='$email' AND Password='$password'") or die("Query Failed");

                // If credentials match, set session and redirect
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];

                    // Redirect to the view page after setting session
                    header("Location: view.php");
                    exit;
                } else {
                    // Display error message if credentials are invalid
                    echo "<div class='message'>
                            <p>Wrong Username or Password</p>
                          </div> <br>";
                    echo "<a href='index.php'><button class='btn btn-secondary'>Go Back</button></a>";
                }
            } else {
        ?>
        <header>Login</header>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" autocomplete="off" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="Login">
            </div>
            <div class="links">
                Don't have an account? <a href="createacc.php">Sign Up Now</a>
            </div>
        </form>
        <?php } ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
