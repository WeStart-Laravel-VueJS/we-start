<?php 
$name = 'Mohammed Naji';
$collage = 'Engineering';
$department = "Software Engineer";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span {
            color: #0faabc;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <p>Welcome <span><?= $name ?></span>, 
    your collage <span><?= $collage ?></span>, 
    your department <span><?= $department ?></span></p>
</body>
</html>