<?php
include "db.php"; // Using database connection file here

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('User Deleted Successfully'); window.location='view.php'</script>";
    } else {
        echo "<script>alert('User Not Deleted'); window.location='view.php'</script>";
    }
}
?>
