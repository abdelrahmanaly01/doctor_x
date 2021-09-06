<?php include "includes/db.php";?>
<?php include "includes/header.php"; ?>


<body>
    <div class="main">
        <div class="container">
          
          <?php include "includes/navigation.php" ;?>

          <div class="card o-hidden border-0 shadow-lg my-5" style="">
            <div class="row g-0">
                <div class="col-md-4 feedback_img">
                
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title text-center">waiting your feedback!</h2>


                    <form class="row g-3 ">
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Email</label>
                        <input type="text" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Feedback</label>
                        <textarea class="form-control" placeholder="Leave a feedback here" id="floatingTextarea"></textarea>
                    </div>


                   
                    <button class="btn btn-primary btn-user btn-block mybtn" >Send</button>
                    
                  
                    </form>



                    <hr>

                    <div class="text-center">
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