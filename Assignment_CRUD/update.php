<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $middlename = trim($_POST['middlename']);
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $email = trim($_POST['email']);
    $course_id = $_POST['course_id'];

    $sql = "UPDATE User SET Firstname='$firstname', Lastname='$lastname', Middlename='$middlename', Birthdate='$birthdate', Gender='$gender', Email='$email' WHERE user_ID='$id'";
    
    if (mysqli_query($conn, $sql)) {
        mysqli_query($conn, "DELETE FROM User_Course WHERE user_ID='$id'");
        mysqli_query($conn, "INSERT INTO User_Course (user_ID, course_ID) VALUES ('$id', '$course_id')");

        header("Location: view.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn) . "<br><br>";
        echo "<button onclick=\"location.href='view.php'\">Back to List</button>";
    }
}

?>