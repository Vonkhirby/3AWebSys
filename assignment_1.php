<?php
$fullname = "Von Khirby J. Eupalao";
$email = "khirbyvooon13@gmail.com";
$address = "San Jose, Aguilar, Pangasinan";
$phoneNumber = "09674420784";
$parentName = "Mrs.Rheggie J. Eupalao and Mr.Rafael P. Eupalao jr.";
$parentContact = "09241411011";
$program = "BS Information Technology";
$photo = "profilePic/profile.jpg";
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Resume</title>
</head>
<body>

<h1><?php echo $fullname; ?></h1>

<img src="<?php echo $photo; ?>" alt="my photo" width="150" height="150">
<br><br>

<strong>Email:</strong> <?php echo $email; ?><br>
<strong>Address:</strong> <?php echo $address; ?><br>
<strong>Phone Number:</strong> <?php echo $phoneNumber; ?><br>
<strong>Parents:</strong> <?php echo $parentName; ?><br>
<strong>Parent's Contact#:</strong> <?php echo $parentContact; ?><br>
<strong>Program:</strong> <?php echo $program; ?><br>

<?php
if ($program == "BS Information Technology") {
    $careerTrack = "Systems Administrator";
} elseif ($program == "BS Computer Science") {
    $careerTrack = "Software Developer";
} else {
    $careerTrack = "IT Professional";
}
?>

<h3>Career Objective</h3>
<p>I want to be a <?php echo $careerTrack; ?>. I am hardworking and I like computers. I want to get a good job where I can use my skills.</p>

<?php
if ($careerTrack == "Systems Administrator") {
    $coreSkills = "Linux OS, Apache Server Configuration, Hardware Troubleshooting";
} elseif ($careerTrack == "Software Developer") {
    $coreSkills = "PHP, MySQL, Conditional Logic, Object-Oriented Programming";
} else {
    $coreSkills = "General IT Skills";
}
?>

<h3>Technical Skills</h3>
<p><?php echo $coreSkills; ?></p>

</body>
</html>