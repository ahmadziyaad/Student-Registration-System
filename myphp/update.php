<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for centering the form */
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
        <h2 class="text-center">Update Student</h2>

        <?php
        include "db.php";

        // Fetch the existing user details if 'id' is set
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM users WHERE id=$id";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
            } else {
                echo "<div class='alert alert-danger'>Error fetching record: " . mysqli_error($conn) . "</div>";
            }
        }
        ?>

        <form action="update.php?id=<?php echo $row['id']; ?>" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update User</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
            $id = $_GET['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];

            // Use UPDATE instead of INSERT to modify the existing record
            $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success text-center mt-3'>Record updated successfully.</div>";
            } else {
                echo "<div class='alert alert-danger text-center mt-3'>Error updating record: " . mysqli_error($conn) . "</div>";
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
