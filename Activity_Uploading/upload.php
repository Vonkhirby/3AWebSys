<?php
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$uploadOk = 1;
$message = "";

if (isset($_POST['upload'])) {
    $file_name   = basename($_FILES["myfile"]["name"]);
    $target_file = $target_dir . $file_name;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        $message .= "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }
    
    if ($_FILES["myfile"]["size"] > 50 * 1024 * 1024) {
        $message .= "Sorry, your file is too large (max 50MB).<br>";
        $uploadOk = 0;
    }

    $allowed_types = array(
        "doc", "docx", "xls", "xlsx", "ppt", "pptx", "jpg", "jpeg", "png", "gif", "bmp", "webp"
    );

    if (!in_array($fileType, $allowed_types)) {
        $message .= "Sorry, only Word, Excel, PPT, and Image files are allowed.<br>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $message .= "Your file was not uploaded.<br>";
    } else {
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
            $message .= "The file " . htmlspecialchars($file_name) . " has been uploaded successfully.<br>";
        } else {
            $message .= "Sorry, there was an error uploading your file.<br>";
        }
    }
} else {
    $message = "No file uploaded.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: whitesmoke;
        }
        .container {
            width: 500px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border: 1px solid gray;
        }
        h2 {
            text-align: center;
        }
        input[type=file] {
            margin: 10px 0;
        }
        button {
            padding: 8px 16px;
            background: green;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .message {
            margin-top: 15px;
            padding: 10px;
            background: lightgray;
            border: 1px solid gray;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload a File</h2>
    <p>Allowed: Images, Word, Excel, PPT</p>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label>Select file:</label>
        <input type="file" name="myfile" required
               accept=".doc,.docx,.xls,.xlsx,.ppt,.pptx,.jpg,.jpeg,.png,.gif,.bmp,.webp">
        <br><br>
        <button type="submit" name="upload">Upload</button>
    </form>

    <?php if ($message != "") { ?>
        <div class="message">
            <?php echo $message; ?>
        </div>
    <?php } ?>
</div>
</body>
</html>