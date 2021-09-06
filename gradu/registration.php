<?php include "includes/db.php";?>
<?php include "includes/header.php"; ?>



<?php  
checkLogin(); // Check if the user allready login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  
  $email = $_POST['email'];
  $password = $_POST['password'];
  $first = $_POST['first'];
  $last = $_POST['last'];
  $phone = $_POST['phone'];


  addUser(  $email , $password , $first , $last , $phone); // make login request to the website

}
?>


<body>
    <div class="main">
        <div class="container">
          
          <?php include "includes/navigation.php" ;?>

          <div class="card o-hidden border-0 shadow-lg my-5" style="">
            <div class="row g-0">
                <div class="col-md-4 reg_img">
                
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title text-center">Create an Account!</h2>


                    <form class="row g-3 " action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email"  required="required">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" name="password"  required="required">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="inputEmail4" name="first"  required="required">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="inputPassword4" name="last"  required="required">
                    </div>
                
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Enter your phone number" name="phone"  required="required">
                    </div>
                    
                    <!-- <div class="col-12">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                        </div>
                    </div> -->


                    <div class="col-12">
                        <div class="d-grid gap-2 ">
                            <button type="submit" class="btn btn-primary mybtn" >Sign up</button>
                        </div>
                        
                    </div>
                    </form>




                    
                    <hr>

                    <div class="text-center">
                    <p>Alredy user ? ..<a class="small" href="login.php">Login </a> </p>
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