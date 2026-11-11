<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT u.*, uc.course_ID FROM User u LEFT JOIN User_Course uc ON u.user_ID = uc.user_ID WHERE u.user_ID='$id'");
$row = mysqli_fetch_assoc($result);
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
            min-height: 100vh;
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

        input.disabled-id {
            background-color: whitesmoke;
            color: black;
            cursor: not-allowed;
        }

        textarea {
            resize: vertical;
            height: 80px;
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
            box-sizing: border-box;
        }

        button:hover {
            background-color: darkgray;
        }

        .cancel-btn {
            background-color: darkslategray;
        }

        .cancel-btn:hover {
            background-color: darkgray;
        }

    </style>
</head>
<body>

    <h2>Edit User Record</h2>

    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?php echo $row['user_ID']; ?>">

        <label>User ID:</label>
        <input type="text" class="disabled-id" value="<?php echo $row['user_ID']; ?>" disabled>

        <label>First Name:</label>
        <input type="text" name="firstname" value="<?php echo $row['Firstname']; ?>" required>

        <label>Last Name:</label>
        <input type="text" name="lastname" value="<?php echo $row['Lastname']; ?>" required>

        <label>Middle Name:</label>
        <input type="text" name="middlename" value="<?php echo $row['Middlename']; ?>" required>

        <label>Birthdate:</label>
        <input type="date" name="birthdate" value="<?php echo $row['Birthdate']; ?>" required>

        <label>Gender:</label>
        <select name="gender" required>
            <option value="M" <?php if($row['Gender'] == 'M') echo 'selected'; ?>>M</option>
            <option value="F" <?php if($row['Gender'] == 'F') echo 'selected'; ?>>F</option>
        </select>

        <label>Email Address:</label>
        <input type="email" name="email" value="<?php echo $row['Email']; ?>" required>

        <label>Course:</label>
        <select name="course_id" required>
            <?php
            $courses = mysqli_query($conn, "SELECT * FROM Course");
            while ($c = mysqli_fetch_assoc($courses)) {
                $selected = ($c['Course_ID'] == $row['course_ID']) ? 'selected' : '';
                echo "<option value='" . $c['Course_ID'] . "' $selected>" . $c['name'] . " (" . $c['course_code'] . ")</option>";
            }
            ?>
        </select>

        <button type="submit">Update Record</button>
        <button type="button" class="cancel-btn" onclick="location.href='view.php'">Cancel</button>
    </form>

</body>
</html>