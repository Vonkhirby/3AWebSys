<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    mysqli_query($conn, "DELETE FROM User_Course WHERE user_ID='$id'");
    $sql = "DELETE FROM User WHERE user_ID='$id'";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: view.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

?>