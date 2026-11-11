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
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $middlename = trim($_POST['middlename']);
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $email = trim($_POST['email']);
    $course_id = $_POST['course_id'];

    $check_email = mysqli_query($conn, "SELECT * FROM User WHERE Email='$email'");
    if (mysqli_num_rows($check_email) > 0) {
        $error_message = "Error: The email address '$email' is already registered!";
    } else {
        $sql_user = "INSERT INTO User (Firstname, Lastname, Middlename, Birthdate, Gender, Email) VALUES ('$firstname', '$lastname', '$middlename', '$birthdate', '$gender', '$email')";
        
        if (mysqli_query($conn, $sql_user)) {
            $user_id = mysqli_insert_id($conn);

            $sql_uc = "INSERT INTO User_Course (user_ID, course_ID) VALUES ('$user_id', '$course_id')";
            mysqli_query($conn, $sql_uc);

            header("Location: view.php");
            exit();
        } else {
            $error_message = "Error inserting record: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            color: darkslategray;
            margin: 0;
            padding: 50px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .box {
            background: whitesmoke;
            border: 1px solid gray;
            padding: 30px;
            width: 100%;
            max-width: 450px;
            box-sizing: border-box;
            box-shadow: 0 4px 10px lightgray;
            border-radius: 4px;
            text-align: center;
        }

        h3 {
            color: red;
            margin-top: 0;
            margin-bottom: 20px;
        }

        button {
            background-color: darkblue;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        button:hover {
            background-color: darkgray;
        }
    </style>
</head>
<body>

    <div class="box">
        <h3>Error</h3>
        <p><?php echo htmlspecialchars($error_message ?? 'An error occurred.'); ?></p>
        <br>
        <button onclick="location.href='index.php'">Back to Form</button>
    </div>

</body>
</html>