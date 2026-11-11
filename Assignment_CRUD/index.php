<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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
        text-align: center;
    }

    form {
        background: whitesmoke;
        padding: 30px 40px;
        border-radius: 8px;
        box-shadow: 0 4px 10px lightgray;
        width: 420px;
        text-align: left;
        box-sizing: border-box;
        border: 1px solid darkgray;
    }

    label {
        font-weight: bold;
        font-size: 13px;

    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    select,
    textarea {
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
    }

    button, input[type="submit"] {
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
        box-sizing: border-box;
    }

    button:hover, input[type="submit"]:hover {
        background-color: darkgray;
    }

    .nav-btn {
        background-color: darkslateblue;
    }

    .nav-btn:hover {
        background-color: darkgray;
    }


</style>
</head>
<body>

    <h2>Add User</h2>
    
    <form method="POST" action="insert.php">
        <label>First Name:</label>
        <input type="text" name="firstname" required>

        <label>Last Name:</label>
        <input type="text" name="lastname" required>

        <label>Middle Name:</label>
        <input type="text" name="middlename" required>

        <label>Birthdate:</label>
        <input type="date" name="birthdate" required>

        <label>Gender:</label>
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="M">M</option>
            <option value="F">F</option>
        </select>

        <label>Email Address:</label>
        <input type="email" name="email" required>

        <label>Course:</label>
        <select name="course_id" required>
            <option value="">Select Course</option>
            <?php
            $course_result = mysqli_query($conn, "SELECT * FROM Course WHERE status='on'");
            if ($course_result && mysqli_num_rows($course_result) > 0) {
                while ($c_row = mysqli_fetch_assoc($course_result)) {
                    echo "<option value='" . $c_row['Course_ID'] . "'>" . $c_row['name'] . " (" . $c_row['course_code'] . ")</option>";
                }
            }
            ?>
        </select>

        <button type="submit" name="allbutton">Save Record</button>
        <button type="button" class="nav-btn" onclick="location.href='view.php'" name="allbutton">View All Records & Filter</button>
        <button type="button" class="nav-btn" onclick="location.href='add_course.php'" name="allbutton">Manage Courses</button>
    </form>

</body>
</html>