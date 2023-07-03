<?php 
include 'header.php';
var_dump($_POST);
if(isset($_POST['login'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = sha1(htmlspecialchars($_POST['password']));

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);

        if($user['type'] == 'admin') {
            header("Location: admin/index.php");
        }else {
            header("Location: index.php");
        }

    }else {
        $msg = "User Not Found";
    }
}

?>
<!-- Page Header-->
<header style="padding: 100px 0;" class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Login</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="my-5">

                    <?php if(isset($msg)): ?>
                        <div class="alert alert-danger">
                            <?= $msg; ?>
                        </div>
                    <?php endif; ?>

                    <form id="contactForm" method="post">
                        
                        <div class="form-floating">
                            <input class="form-control" id="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" name="email" />
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="password" type="password" placeholder="Enter your Password..." data-sb-validations="required" name="password" />
                            <label for="password">Password</label>
                            
                        </div>
                        <br />
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase" id="submitButton" type="submit" name="login">Sign In</button>
                        <br>
                        <p>If you dont have an account? <a href="#">Sign Up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'footer.php' ?>        