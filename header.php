<div class="header-wrapper">
    <div class="header bg-primary">
        <div class="nav-menu">
            <nav class="navbar navbar-expand-lg navbar-dark ">
                <div class="container-fluid">
                    <a class="navbar-brand text-white" href="./index.php">Business Directory</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active" aria-current="page" href="./">Home</a>
                            <a class="nav-link" href="./about.php">About</a>
                            <a class="nav-link" href="./search.php">Search</a>
                            <a class="nav-link" href="./login.php">Login</a>
                            <a class="nav-link" href="./Signup.php">Signup</a>
                            <?php 

                              if(isset($_SESSION['userData'])){
                                  echo '<a class="nav-link" href="./logout.php">Logout</a>';
                              }
                              
                              ?>

                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>