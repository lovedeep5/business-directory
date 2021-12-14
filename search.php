<?php session_start(); ?>
<?php require_once './api/db.php'; ?>
<?php

if(isset($_POST['setSearch'])){
    $setSearch = strtolower($_POST['search-text']);

    $query = $mysqli->query("SELECT * FROM `users` WHERE `companyName` LIKE '%$setSearch%' OR `companyDetails` LIKE '%$setSearch%'" );        
} else {
    $query = $mysqli->query("SELECT * FROM `users`" );
}
    

    
?>
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
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="heading">Search Company</h1>
                    <p>User can search through all the users/companies here, search is aplicable on both company
                        name, and the details. <b>Only logged in users can edit their own details.</b> </p>
                    <div class="search-form-container">
                        <form class='company-search-form' method='post'>
                            <div class="input-group py-3">
                                <input type="text" name="search-text" class='form-control'
                                    placeholder='Type & Press Search...' required>
                                <button type='submit' class='btn btn-primary' name='setSearch'><i
                                        class="fas fa-search"></i>
                                    Search</button>
                            </div>
                        </form>
                    </div>

                    <div class="search-result-container">
                        <div class="search-results">
                            <?php
                                while($data = mysqli_fetch_assoc($query)){
                                   ?>

                            <div class="search-item d-flex justify-content-between align-items-center border p-3 mb-3 bg-light"
                                companyId='<?php echo $data['id']; ?>'>
                                <div class="search-item-content ">
                                    <span
                                        class='search-company-name d-block text-success bold'><?php echo $data['companyName']; ?></span>
                                    <span class='search-company-detailes'><?php echo $data['companyDetails']; ?></span>
                                </div>
                                <div class="search-items-controles">
                                    <span class="edit-company">
                                        <?php
                                            if(isset($_SESSION['userData']) && $data['id'] == $_SESSION['userData']['id'] ){
                                                echo '<i class="fas fa-edit edit-record" data-bs-toggle="modal" data-bs-target="#exampleModal" recordId="'.$data['id'].'"></i>';
                                            }
                                        ?>
                                    </span>

                                </div>
                            </div>

                            <?php
                                }
                            ?>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>






    <!-- Content will end here -->
    <?php include_once './modal.php'?>
    <?php require_once './footer.php'; ?>


</body>

</html>