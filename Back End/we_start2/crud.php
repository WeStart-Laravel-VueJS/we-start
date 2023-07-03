<?php 

$conn = mysqli_connect('localhost', 'root', '', 'westart_blog');

// if($conn) {
//     echo 'Done';
// }

// CRUD Application

// C => Create -> INSERT
// $title = 'title';	
// $subtitle = 'subtitle';	
// $details = 'details';	
// $image = 'image';

// $sql = "INSERT into posts (title, subtitle, details, image) VALUES ('$title', '$subtitle', '$details', '$image')";
// echo $sql;
// mysqli_query($conn, $sql);
// if(mysqli_query($conn, $sql)) {
//     echo 'New Record Added';
//     header("Location: crud.php");
//     // exit;
//     // die;
// }


// R => Read -> SELECT

// $posts = Post::all();
 
    // $posts = [];
    // $sql = "SELECT * FROM posts";
    // $result = mysqli_query($conn, $sql);    
    // while($post = mysqli_fetch_assoc($result)):
    //     $posts[] = $post;
    // endwhile;


// UPDATE -> UPDATE 
// $sql = "UPDATE posts SET title = 'New Value' WHERE id = 1";
// mysqli_query($conn, $sql);


// DELETE -> DELETE 
// $sql = "DELETE FROM posts WHERE id = 3";
// mysqli_query($conn, $sql);
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Title</th>
        <th>Subtitle</th>
    </tr>
    <?php 
    foreach($posts as $post): ?>
        <tr>
            <td><?= $post['id'] ?></td>
            <td><?= $post['image'] ?></td>
            <td><?= $post['title'] ?></td>
            <td><?= $post['subtitle'] ?></td>
        </tr>
    <?php endforeach; ?>
    
</table>