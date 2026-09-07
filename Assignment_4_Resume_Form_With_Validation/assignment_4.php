<?php
$name = isset($_GET['name']) ? $_GET['name'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$phoneNum = isset($_GET['phoneNum']) ? $_GET['phoneNum'] : '';
$address = isset($_GET['address']) ? $_GET['address'] : '';
$parName = isset($_GET['parName']) ? $_GET['parName'] : '';
$parNum = isset($_GET['parNum']) ? $_GET['parNum'] : '';
$prog = isset($_GET['prog']) ? $_GET['prog'] : '';
$careerObj = isset($_GET['careerObj']) ? $_GET['careerObj'] : '';
$skills = isset($_GET['skills']) ? $_GET['skills'] : '';
$experience = isset($_GET['experience']) ? $_GET['experience'] : '';

$err_name = isset($_GET['err_name']) ? $_GET['err_name'] : '';
$err_email = isset($_GET['err_email']) ? $_GET['err_email'] : '';
$err_phoneNum = isset($_GET['err_phoneNum']) ? $_GET['err_phoneNum'] : '';
$err_address = isset($_GET['err_address']) ? $_GET['err_address'] : '';
$err_parName = isset($_GET['err_parName']) ? $_GET['err_parName'] : '';
$err_parNum = isset($_GET['err_parNum']) ? $_GET['err_parNum'] : '';
$err_prog = isset($_GET['err_prog']) ? $_GET['err_prog'] : '';
$err_careerObj = isset($_GET['err_careerObj']) ? $_GET['err_careerObj'] : '';
$err_skills = isset($_GET['err_skills']) ? $_GET['err_skills'] : '';
$err_experience = isset($_GET['err_experience']) ? $_GET['err_experience'] : '';
?>
<title>Resume Application Form</title>
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
    .container {
        width: 800px;
        margin: 0px auto;
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        overflow: hidden;
    }
    .header {
        background-color: #0f172a;
        color: #ffffff;
        padding: 32px;
        text-align: center;
    }
    .header h1 {
        margin: 0px;
        font-size: 24px;
        font-weight: 600;
    }
    .header p {
        margin: 8px 0px 0px 0px;
        color: #94a3b8;
        font-size: 14px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    td {
        padding: 14px 24px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }
    td.label {
        width: 220px;
        background-color: #f8fafc;
        font-weight: 600;
        font-size: 14px;
        color: #475569;
    }
    input[type="text"],
    input[type="number"],
    textarea {
        width: 300px;
        padding: 9px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        font-size: 14px;
        color: #0f172a;
        background-color: #ffffff;
        outline: none;
    }
    textarea {
        width: 340px;
        vertical-align: top;
        resize: vertical;
    }
    .error {
        color: red;
        font-size: 13px;
        font-weight: 500;
        margin-left: 10px;
        display: inline-block;
    }
    .btn-wrapper {
        padding: 24px;
        text-align: center;
        background-color: #f8fafc;
    }
    button {
        background-color: #2563eb;
        color: #ffffff;
        border: none;
        padding: 10px 24px;
        font-size: 15px;
        font-weight: 500;
        border-radius: 6px;
        cursor: pointer;
    }
</style>

<div class="container">
    <div class="header">
        <h1>Resume Information Form</h1>
        <p>Please enter all required details below</p>
    </div>
    <form action="assignment_4(2).php" method="get">
        <table>
            <tr>
                <td class="label">Full Name</td>
                <td>
                    <input type="text" name="name" value="<?php if(isset($_GET['name'])){ echo $_GET['name']; } ?>">
                    <span class="error"><?php if(isset($_GET['err_name'])){ echo $_GET['err_name']; } ?></span>
                </td>
            </tr>
            <tr>
                <td class="label">Email Address</td>
                <td>
                    <input type="text" name="email" value="<?php if(isset($_GET['email'])){ echo $_GET['email']; } ?>">
                    <span class="error"><?php if(isset($_GET['err_email'])){ echo $_GET['err_email']; } ?></span>
                </td>
            </tr>
            <tr>
                <td class="label">Phone Number</td>
                <td>
                    <input type="number" name="phoneNum" value="<?php if(isset($_GET['phoneNum'])){ echo $_GET['phoneNum']; } ?>">
                    <span class="error"><?php if(isset($_GET['err_phoneNum'])){ echo $_GET['err_phoneNum']; } ?></span>
                </td>
            </tr>
            <tr>
                <td class="label">Address</td>
                <td>
                    <input type="text" name="address" value="<?php if(isset($_GET['address'])){ echo $_GET['address']; } ?>">
                    <span class="error"><?php if(isset($_GET['err_address'])){ echo $_GET['err_address']; } ?></span>
                </td>
            </tr>
            <tr>
                <td class="label">Parent / Guardian Name</td>
                <td>
                    <input type="text" name="parName" value="<?php if(isset($_GET['parName'])){ echo $_GET['parName']; } ?>">
                    <span class="error"><?php if(isset($_GET['err_parName'])){ echo $_GET['err_parName']; } ?></span>
                </td>
            </tr>
            <tr>
                <td class="label">Parent / Guardian Phone</td>
                <td>
                    <input type="number" name="parNum" value="<?php if(isset($_GET['parNum'])){ echo $_GET['parNum']; } ?>">
                    <span class="error"><?php if(isset($_GET['err_parNum'])){ echo $_GET['err_parNum']; } ?></span>
                </td>
            </tr>
            <tr>
                <td class="label">Degree Program</td>
                <td>
                    <input type="text" name="prog" value="<?php if(isset($_GET['prog'])){ echo $_GET['prog']; } ?>">
                    <span class="error"><?php if(isset($_GET['err_prog'])){ echo $_GET['err_prog']; } ?></span>
                </td>
            </tr>
            <tr>
                <td class="label">Career Objective</td>
                <td>
                    <textarea name="careerObj" rows="3"><?php if(isset($_GET['careerObj'])){ echo $_GET['careerObj']; } ?></textarea>
                    <span class="error"><?php if(isset($_GET['err_careerObj'])){ echo $_GET['err_careerObj']; } ?></span>
                </td>
            </tr>
            <tr>
                <td class="label">Key Skills</td>
                <td>
                    <textarea name="skills" rows="3"><?php if(isset($_GET['skills'])){ echo $_GET['skills']; } ?></textarea>
                    <span class="error"><?php if(isset($_GET['err_skills'])){ echo $_GET['err_skills']; } ?></span>
                </td>
            </tr>
            <tr>
                <td class="label">Relevant Experience</td>
                <td>
                    <textarea name="experience" rows="3"><?php if(isset($_GET['experience'])){ echo $_GET['experience']; } ?></textarea>
                    <span class="error"><?php if(isset($_GET['err_experience'])){ echo $_GET['err_experience']; } ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="btn-wrapper">
                    <button type="submit">Submit Details</button>
                </td>
            </tr>
        </table>
    </form>
</div>