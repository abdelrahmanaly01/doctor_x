<?php include "includes/db.php";?>
<?php include "includes/header.php"; ?>

<?php  
checkLogin(); // Check if the user allready login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  
  $email = $_POST['email'];
  $password = $_POST['password'];

  loginUser($email , $password); // make login request to the website

}
?>


<body>
    <div class="main">
        <div class="container">
          
          <?php include "includes/navigation.php" ;?>

          <div class="card o-hidden border-0 shadow-lg my-5" style="">
            <div class="row g-0">
                <div class="col-md-4 log_img">
                
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title text-center">Welcome Back!</h2>


                    <form class="row g-3 " action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email"  required="required">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" name="password"  required="required">
                    </div>


                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block mybtn" >Login</button>
                    
                  
                    </form>



                    <hr>

                    <div class="text-center">
                    <a class="small" href="registration.php">Create an Account!</a>
                    <p>Copyright © MIS Department 2020</p>
                  </div>



                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    
</body>
</html>