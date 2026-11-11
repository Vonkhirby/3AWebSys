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
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $course_code = trim($_POST['course_code']);
    $status = $_POST['status'];

    $sql = "INSERT INTO Course (name, description, course_code, status) VALUES ('$name', '$description', '$course_code', '$status')";
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
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
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        form {
            background: whitesmoke;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px lightgray;
            width: 400px;
            text-align: left;
            box-sizing: border-box;
            border: 1px solid darkgray;
        }

        label {
            font-weight: bold;
            font-size: 13px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid black;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            height: 80px;
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid black;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        button {
            background-color: darkblue;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: darkgray;
        }

        .back-btn {
            background-color: darkslateblue;
        }

        .back-btn:hover {
            background-color: darkgray;
        }
    </style>
</head>
<body>

    <h2>Add Course Details</h2>

    <form method="POST">
        <label>Course Name:</label>
        <input type="text" name="name" required>

        <label>Description:</label>
        <textarea name="description" required></textarea>

        <label>Course Code:</label>
        <input type="text" name="course_code" required>

        <label>Status:</label>
        <select name="status" required>
            <option value="on">on</option>
            <option value="off">off</option>
        </select>

        <button type="submit">Save Course</button>
        <button type="button" class="back-btn" onclick="location.href='index.php'">Back to Registration</button>
    </form>

</body>
</html>