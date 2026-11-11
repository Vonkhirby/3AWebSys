<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$gender_filter = isset($_GET['gender']) ? $_GET['gender'] : '';
$date_filter = isset($_GET['date_created']) ? $_GET['date_created'] : '';

$sql = "SELECT u.user_ID, u.Firstname, u.Lastname, u.Middlename, u.Birthdate, u.Gender, u.Email, u.Date_Created, 
               c.name AS course_name, c.description, c.course_code, c.status
        FROM User u
        LEFT JOIN User_Course uc ON u.user_ID = uc.user_ID
        LEFT JOIN Course c ON uc.course_ID = c.Course_ID WHERE 1=1";

if (!empty($keyword)) {
    // Searches strictly by Firstname, Lastname, Middlename, description, and course_code
    $sql .= " AND (u.Firstname LIKE '%$keyword%' OR u.Lastname LIKE '%$keyword%' OR u.Middlename LIKE '%$keyword%' OR c.description LIKE '%$keyword%' OR c.course_code LIKE '%$keyword%')";
}
if (!empty($gender_filter)) {
    $sql .= " AND u.Gender = '$gender_filter'";
}
if (!empty($date_filter)) {
    $sql .= " AND DATE(u.Date_Created) = '$date_filter'";
}

$result = mysqli_query($conn, $sql);
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
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .box {
            background: whitesmoke;
            border: 1px solid gray;
            padding: 20px;
            width: 90%;
            max-width: 1200px;
            box-sizing: border-box;
            box-shadow: 0 4px 10px lightgray;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }

        .box form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .box input[type="text"],
        .box input[type="date"],
        .box select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            background-color: darkblue;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        button:hover {
            background-color: darkgray;
        }

        .buttonreset {
            background-color: darkslategray;
            margin: 5px;
        }
        .nav-btn {
            background-color: darkblue;
            margin: 5px;
        }

        .nav-btn:hover {
            background-color: darkgrey;
        }

        table {
            background: white;
            border-collapse: collapse;
            width: 90%;
            max-width: 1200px;
            box-shadow: 0 4px 10px lightgrey;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            font-size: 14px;
        }

        th {
            background-color: darkblue;
            color: white;
        }

        .footer-buttons {
            margin-top: 10px;
            display: flex;
        }
    </style>
</head>
<body>

    <h2>Records</h2>

    <div class="box">
        <form method="GET" action="view.php">
            <input type="text" name="keyword" placeholder="Search name" value="<?php echo htmlspecialchars($keyword); ?>">
            
            <select name="gender">
                <option value="">All Genders</option>
                <option value="M" <?php if($gender_filter=='M') echo 'selected'; ?>>M</option>
                <option value="F" <?php if($gender_filter=='F') echo 'selected'; ?>>F</option>
            </select>

            <input type="date" name="date_created" value="<?php echo htmlspecialchars($date_filter); ?>">

            <button type="submit">Filter</button>
            <button type="button" class="buttonreset" onclick="location.href='view.php'">Reset</button>
        </form>
    </div>

    <table border="1">
        <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Middle Name</th>
            <th>Birthdate</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Date Created</th>
            <th>Course Name</th>
            <th>Description</th>
            <th>Course Code</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['user_ID'] . "</td>";
                echo "<td>" . $row['Firstname'] . "</td>";
                echo "<td>" . $row['Lastname'] . "</td>";
                echo "<td>" . $row['Middlename'] . "</td>";
                echo "<td>" . $row['Birthdate'] . "</td>";
                echo "<td>" . $row['Gender'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . date("M d, Y", strtotime($row['Date_Created'])) . "</td>";
                echo "<td>" . ($row['course_name'] ?? 'None') . "</td>";
                echo "<td>" . ($row['description'] ?? 'None') . "</td>";
                echo "<td>" . ($row['course_code'] ?? 'None') . "</td>";
                echo "<td>" . ($row['status'] ?? 'None') . "</td>";
                echo "<td>
                        <a href='edit.php?id=" . $row['user_ID'] . "'>Edit</a> | 
                        <a href='delete.php?id=" . $row['user_ID'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='13'>No records found.</td></tr>";
        }
        ?>
    </table>

    <div class="footer-buttons">
        <button class="nav-btn" onclick="location.href='index.php'">Add New User</button>
        <button class="nav-btn" onclick="location.href='add_course.php'">Manage Courses</button>
    </div>

</body>
</html>