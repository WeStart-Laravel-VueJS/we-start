<?php 

// var_dump($_FILES);
$errors = [];

if(isset($_POST['name'])) {
    $name = filter_text($_POST['name']);
    $age = filter_text($_POST['age']);
    $image = $_FILES['image'];
    $cv = $_FILES['cv'];

    if(empty($name)) {
        $errors['name'] = "Name is required";
    }

    if(empty($age)) {
        $errors['age'] = "Age is required";
    }

    if(empty($image['name'])) {
        $errors['image'] = "Image is required";
    }

    if(empty($cv['name'])) {
        $errors['cv'] = "CV is required";
    }

    if(count($errors) == 0) {
        
        if(!file_exists('files')) {
            mkdir('files');
        }

        $newname = rand() . $image['name'];

        move_uploaded_file($image['tmp_name'], 'files/'.$newname);
    }
}

function filter_text($text) {
    return trim(htmlspecialchars($text)); // HTML Entities
}

// foreach ($errors as $key =>
// }

// XSS => Cross Site Scripting
// var_dump($errors);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        * {
            box-sizing: border-box;
        }
        form {
            width: 500px;
            margin: 50px auto;
            font-family: Arial, Helvetica, sans-serif;
        }

        form > div {
            margin-bottom: 10px;
        }

        form > div small {
            font-size: 12px;
            color: red;
        }

        form input, form button {
            display: block;
            width: 100%;
            padding: 8px 15px;
            border: 1px solid #eee;
            border-radius: 5px;
            outline: none;
            margin-top: 2px;
        }

        .has-error {
            border: 1px solid #f00 !important;
        }

        form button {
            cursor: pointer;
            background-color: #0faabc;
            color: #fff;
        }

        .errors {
            background-color: #ffcaca;
            color: #ab4c4c;
            font-size: 12px;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <form 
        action="<?php echo $_SERVER['PHP_SELF'] ?>" 
        method="post" 
        enctype="multipart/form-data"
    >

    <?php //if(count($errors) > 0): ?>
        <!-- <div class="errors">
            <ul> -->
                <?php // foreach($errors as $error): ?>
                    <!-- <li><?= $error ?></li> -->
                <?php // endforeach; ?>
            <!-- </ul>
        </div> -->
    <?php //endif; ?>

    <div>
        <label>Name</label>
        <input type="text" name="name" <?= (isset($errors['name'])) ? 'class="has-error"' : '' ?> placeholder="Name" />
        <?php 
            if(isset($errors['name'])) {
                echo "<small>".$errors['name']."</small>";
            }
        ?>
    </div>

    <div>
        <label>Age</label>
        <input type="text" name="age" placeholder="Age" />
        <?php 
            if(isset($errors['age'])) {
                echo "<small>".$errors['age']."</small>";
            }
        ?>
    </div>

    <div>
        <label>Image</label>
        <input type="file" name="image" />
        <?php 
            if(isset($errors['image'])) {
                echo "<small>".$errors['image']."</small>";
            }
        ?>
    </div>

    <div>
        <label>CV</label>
        <input type="file" name="cv" />
        <?php 
            if(isset($errors['cv'])) {
                echo "<small>".$errors['cv']."</small>";
            }
        ?>
    </div>

    <button>Send</button>

    </form>
</body>
</html>