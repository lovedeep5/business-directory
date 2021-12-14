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
                    <h1 class="heading text-primary">Create Account</h1>
                    <p> Let's join the world's simplest business directory, its free!! </p>

                    <div class="signup-container shadow-lg rounded p-3">
                        <form method="post" action="./api/create-new-user.php" id='signup-form'>
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="company-name" name="companyName" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name='email' required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name='password' required>
                            </div>
                            <div class="mb-3">
                                <label for="rePassword" class="form-label">Confirm Password</label>
                                <input type="text" class="form-control" id="rePassword" name='rePassword' required>
                            </div>

                            <div class="mb-3">
                                <label for="aboutCompany" class="form-label">About Company</label>
                                <textarea name="aboutCompany" id="about-company" cols="30" rows="3" class='form-control'
                                    required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary submit" name='submit'>Submit</button>
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