<?php 
    $name = $_GET['name'];
    $email = $_GET['email'];
    $phoneNum = $_GET['phoneNum'];
    $address = $_GET['address'];
    $parName = $_GET['parName'];
    $parNum = $_GET['parNum'];
    $prog = $_GET['prog'];
    $careerObj = $_GET['careerObj'];
    $skills = $_GET['skills'];
    $experience = $_GET['experience'];

    $err_name = "";
    $err_email = "";
    $err_phoneNum = "";
    $err_address = "";
    $err_parName = "";
    $err_parNum = "";
    $err_prog = "";
    $err_careerObj = "";
    $err_skills = "";
    $err_experience = "";

    $has_error = false;

    if ($name == "") {
        $err_name = "Name is required";
        $has_error = true;
    }
    if ($email == "") {
        $err_email = "Email is required";
        $has_error = true;
    }
    if ($phoneNum == "") {
        $err_phoneNum = "Phone number is required";
        $has_error = true;
    }
    if ($address == "") {
        $err_address = "Address is required";
        $has_error = true;
    }
    if ($parName == "") {
        $err_parName = "Parent name is required";
        $has_error = true;
    }
    if ($parNum == "") {
        $err_parNum = "Parent phone is required";
        $has_error = true;
    }
    if ($prog == "") {
        $err_prog = "Program is required";
        $has_error = true;
    }
    if ($careerObj == "") {
        $err_careerObj = "Objective is required";
        $has_error = true;
    }
    if ($skills == "") {
        $err_skills = "Skills are required";
        $has_error = true;
    }
    if ($experience == "") {
        $err_experience = "Experience is required";
        $has_error = true;
    }

    if ($has_error == true) {
        header("Location: assignment_4.php?name=$name&email=$email&phoneNum=$phoneNum&address=$address&parName=$parName&parNum=$parNum&prog=$prog&careerObj=$careerObj&skills=$skills&experience=$experience&err_name=$err_name&err_email=$err_email&err_phoneNum=$err_phoneNum&err_address=$err_address&err_parName=$err_parName&err_parNum=$err_parNum&err_prog=$err_prog&err_careerObj=$err_careerObj&err_skills=$err_skills&err_experience=$err_experience");
        exit();
    }
?>

<title><?php echo $name; ?> - Resume</title>
<style>
    
    * {
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    } 
    body {
        background-color: #f8fafc;
        color: #1e293b;
        margin: 0px;
        padding: 40px 20px;
    }
    .resume-container {
        width: 800px;
        margin: 0px auto;
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        overflow: hidden;
    }
    .resume-header {
        background-color: #0f172a;
        color: #ffffff;
        padding: 40px;
        text-align: center;
    }
    .resume-header h1 {
        margin: 0px;
        font-size: 28px;
        font-weight: 700;
    }
    .resume-header p {
        margin: 8px 0px 0px 0px;
        color: #94a3b8;
        font-size: 15px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    td {
        padding: 16px 24px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 14px;
        line-height: 20px;
    }
    td.label {
        width: 220px;
        background-color: #f8fafc;
        font-weight: 600;
        color: #475569;
        vertical-align: top;
    }
    td.value {
        color: #0f172a;
    }
    .footer-action {
        padding: 20px;
        text-align: center;
        background-color: #f8fafc;
    }
    .btn-back {
        display: inline-block;
        text-decoration: none;
        background-color: #ffffff;
        color: #475569;
        border: 1px solid #cbd5e1;
        padding: 8px 20px;
        font-size: 14px;
        font-weight: 500;
        border-radius: 6px;
    }
</style>

<div class="resume-container">
    <div class="resume-header">
        <h1><?php echo $name; ?></h1>
        <p><?php echo $prog; ?></p>
    </div>
    <table>
        <tr>
            <td class="label">Full Name</td>
            <td class="value"><?php echo $name; ?></td>
        </tr>
        <tr>
            <td class="label">Email Address</td>
            <td class="value"><?php echo $email; ?></td>
        </tr>
        <tr>
            <td class="label">Phone Number</td>
            <td class="value"><?php echo $phoneNum; ?></td>
        </tr>
        <tr>
            <td class="label">Home Address</td>
            <td class="value"><?php echo $address; ?></td>
        </tr>
        <tr>
            <td class="label">Parent / Guardian</td>
            <td class="value"><?php echo $parName; ?></td>
        </tr>
        <tr>
            <td class="label">Parent Contact</td>
            <td class="value"><?php echo $parNum; ?></td>
        </tr>
        <tr>
            <td class="label">Degree Program</td>
            <td class="value"><?php echo $prog; ?></td>
        </tr>
        <tr>
            <td class="label">Career Objective</td>
            <td class="value"><?php echo nl2br($careerObj); ?></td>
        </tr>
        <tr>
            <td class="label">Key Skills</td>
            <td class="value"><?php echo nl2br($skills); ?></td>
        </tr>
        <tr>
            <td class="label">Relevant Experience</td>
            <td class="value"><?php echo nl2br($experience); ?></td>
        </tr>
    </table>
    <div class="footer-action">
        <a href="assignment_4.php" class="btn-back">Go back</a>
    </div>
</div>