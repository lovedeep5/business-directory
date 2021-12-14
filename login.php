<?php // Start the session
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './meta-header-includes.php' ?>
</head>

<body class='inner-page'>
    <?php require_once './header.php'; ?>
    <!-- 
        This is started template for new page, header footer is already included, just add content in between the comments
     -->

    <div class="content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-6">
                    <h1 class="heading text-primary">Login</h1>
                    <?php 
                    
                    if(isset($_SESSION['userData'])){
                        echo "<p>You are already logged in, Please <a href='./logout.php'>Logout</a> to continue.</p>";
                    } else {
                        echo "<p> Enter your details to log in to your account!! </p>";
                    } 
                    
                    ?>

                    <div class="signup-container shadow-lg rounded p-3">
                        <form method="post" action="./api/login.php" id="login-form">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name='email' required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name='password' required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content will end here -->

    <?php require_once './footer.php'; ?>


</body>

</html>