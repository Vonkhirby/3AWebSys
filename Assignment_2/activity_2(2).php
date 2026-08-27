<?php 
    if(isset($_GET['name'])){
        $name = $_GET['name'];
        $email = $_GET['email'];
        $phoneNum = $_GET['phoneNum'];
        $address = $_GET['address'];
        $prog = $_GET['prog'];
        $parName = $_GET['parName'];
        $parNum = $_GET['parNum'];
        $careerObj = $_GET['careerObj'];
        $skills = $_GET['skills'];
        $experience = $_GET['experience'];
?>
    <table style="width:100%; border: 20px solid #c7b700; border-collapse: collapse; color: #004a91">
        <tr>
            <td colspan="2" style="background-color: #004a91; padding: 50px; text-align:center">
                <h1 style="color: white; margin: 0;"><?php echo $name; ?></h1>
            </td>
        </tr>
        <tr>
            <td style="background-color: #d3d3d3; padding: 8px; font-weight: bold; width: 30%;">Name: </td>
            <td style="padding: 8px;"><?php echo $name; ?></td>
        </tr>
        <tr>
            <td style="background-color: #d3d3d3; padding: 8px; font-weight: bold;">Email: </td>
            <td style="padding: 8px;"><?php echo $email; ?></td>
        </tr>
        <tr>
            <td style="background-color: #d3d3d3; padding: 8px; font-weight: bold;">PhoneNumber: </td>
            <td style="padding: 8px;"><?php echo $phoneNum; ?></td>
        </tr>
        <tr>
            <td style="background-color: #d3d3d3; padding: 8px; font-weight: bold;">Address: </td>
            <td style="padding: 8px;"><?php echo $address; ?></td>
        </tr>
        <tr>
            <td style="background-color: #d3d3d3; padding: 8px; font-weight: bold;">Parent Name: </td>
            <td style="padding: 8px;"><?php echo $parName; ?></td>
        </tr>
        <tr>
            <td style="background-color: #d3d3d3; padding: 8px; font-weight: bold;">Parent Number: </td>
            <td style="padding: 8px;"><?php echo $parNum; ?></td>
        </tr>
        <tr>
            <td style="background-color: #d3d3d3; padding: 8px; font-weight: bold;">Program: </td>
            <td style="padding: 8px;"><?php echo $prog; ?></td>
        </tr>
        <tr>
            <td style="background-color: #d3d3d3; padding: 8px; font-weight: bold;">Career Objectives: </td>
            <td style="padding: 8px;"><?php echo $careerObj; ?></td>
        </tr>
        <tr>
            <td style="background-color: #d3d3d3; padding: 8px; font-weight: bold;">Key Skills: </td>
            <td style="padding: 8px;"><?php echo $skills; ?></td>
        </tr>
        <tr>
            <td style="background-color: #d3d3d3; padding: 8px; font-weight: bold;">Experience: </td>
            <td style="padding: 8px;"><?php echo $experience; ?></td>
        </tr>
    </table>
<?php 
    }
?>