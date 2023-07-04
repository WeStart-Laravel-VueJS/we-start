<?php
ob_start();
include 'header.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id = $id";
    $res = mysqli_query($conn, $sql);
    $post = mysqli_fetch_assoc($res);
    
}else {
    header("Location: posts.php");
}


if(isset($_POST['update'])) {
    $title    = htmlspecialchars( trim( $_POST['title'] ) );
    $subtitle = htmlspecialchars( trim( $_POST['subtitle'] ) );
    $image    = $_FILES['image'];
    $details  = $_POST['details'];

    $imgname = $post['image'];
    if(!empty($image['name'])) {
        unlink('../uploads/'. $imgname);
        $ex = pathinfo($image['name'], PATHINFO_EXTENSION);
        $imgname = str_replace(' ', '-', strtolower($title)).time().'.'.$ex;
        move_uploaded_file($image['tmp_name'], '../uploads/'.$imgname);
    }
    

    $details = str_replace('<script>', '', $details);
    $details = str_replace('</script>', '', $details);

    $sql = "UPDATE posts SET title = '$title', subtitle = '$subtitle', details = '$details', image = '$imgname' WHERE id = $id";
    // echo $sql;
    if(mysqli_query($conn, $sql)) {
        header("location: posts.php");
    }

}

?>
<div class="container-fluid">
    <div class="row">

        <?php include 'sidebar.php' ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Post : <span><?= $post['title'] ?></span></h1>
                <!-- <a class="btn btn-outline-dark" href="posts.php">All Posts</a> -->
                <a class="btn btn-outline-dark" onclick="history.back()"  >Return Back</a>
            </div>

            <form action="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" placeholder="Title" class="form-control" name="title" value="<?= $post['title'] ?>" />
                </div>
                <div class="mb-3">
                    <label>Subtitle</label>
                    <input type="text" placeholder="Subtitle" class="form-control" name="subtitle" value="<?= $post['subtitle'] ?>" />
                </div>
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image" />
                    <img width="80" src="../uploads/<?= $post['image'] ?>" alt="">
                </div>
                <div class="mb-3">
                    <label>Details</label>
                    <textarea placeholder="Details" class="form-control" name="details" rows="5"><?= $post['details'] ?></textarea>
                </div>
                <button class="btn btn-success px-5" name="update"> Update</button>
            </form>
        </main>
    </div>
</div>
<script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js" integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous"></script>
<script src="https://getbootstrap.com/docs/5.3/examples/dashboard/dashboard.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.5.1/tinymce.min.js"></script>

<script>

    tinymce.init({
        selector: 'textarea',
        plugins: ['code']
    })

    function deletePost(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = e.target.closest('a').href;
            }
        })
    }

    
</script>


</body>


</html>