<?php
session_start();
if(isset($_SESSION['verified_user_id']))
{
    $_SESSION['status'] = "You are already Logged in";
            header('Location: home.php');
            exit();
}

 include('includes/header.php')
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
            <?php
                if(isset($_SESSION['status']))
                {
                    echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                    unset($_SESSION['status']);
                }
                ?>


                <div class="card">
                    <div class="card-header">
                        <h4>
                            Login
                            <a href="index.php" class="btn btn-danger float-end"> BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="logincode.php" method="POST">
                            
                            <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
 include('includes/footer.php')
?>
    