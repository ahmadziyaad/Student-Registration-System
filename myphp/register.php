<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles to center the form */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
            margin: 0;
        }
        .card {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="card">
        <h2 class="text-center">Add Student</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add User</button>
        </form>
        
        <!-- PHP Code for inserting data and displaying message -->
        <?php
        include "db.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST['name'];
            $email = $_POST['email'];

            $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

            if (mysqli_query($conn, $sql)){
                echo "<div class='alert alert-success text-center mt-3'>Successfully added.</div>";
            } else {
                echo "<div class='alert alert-danger text-center mt-3'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</div>";
            }
        }
        ?>

        <div class="text-center mt-3">
            <a href="view.php">Back to User List</a>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">Student Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="view.php">List Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Add Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
