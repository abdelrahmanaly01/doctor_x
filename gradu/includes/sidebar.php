<div class="col-md-4">

              
               
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    
                    <!-- Start Search engine form-->
                    
                    <form action="search.php" method="POST">
                        <div class="input-group">
                            <input name = "search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name = "submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>

                        </div>
                    </form>
                     
                    <!--End Search engine form-->
                    
                    
                    
                    <!-- /.input-group -->
                </div>
                
                
                
                
                
                
                <?php 
    
                if(!isset($_SESSION['user_name'])){

                    
                    

                    if(isset($_POST['login'])){
                        $user_name          = trim($_POST['user_name']);
                        $user_password      = trim($_POST['user_password']);

                        login_user($user_name , $user_password);

                    }

                    
                


                    ?>
                    
                    
                    <!-- Login -->
                <div class="well">
                    <h4>Login Form</h4>
                    
                    <!-- Start Search engine form-->
                    
                    <form action="" method="POST">
                        <div class="form-group">

                            <input 
                            type = "text" 
                            name = "user_name"  
                            class="form-control" 
                            placeholder="Enter Username"
                            autocomplete = "on"
                            value = "<?php echo isset($user_name) ? $user_name : '' ?>"
                            >

                        </div>
                        <div class="input-group ">

                            <input 
                            type = "password" 
                            name = "user_password"  
                            class="form-control" 
                            placeholder="Enter Password"
                            autocomplete = "on"
                            value = "<?php echo isset($user_password) ? $user_password : '' ?>"
                            >
                            
                            <span class = "input-group-btn">
                               <button class = "btn btn-primary" name = "login" type = "submit">Login</button>   
                            </span>

                        </div>
                       
                    </form>
                     
                    <!--End Search engine form-->
                    
                    
                    
                    <!-- /.input-group -->
                </div>
                
                
                    
                    
                    
                    
                    
                    
                <?php }else{
                
                
                echo   "<div class='well'>
                    <h4>Signed In As {$_SESSION['user_name']} </h4>
                    <a class = 'btn btn-danger btn-block' href = 'includes/logout.php'>Logout</a>
                    </div>"
                    ;
                
                
                }
    
    
    
    
    
    
    ?>
                
                 
                
                

                <!-- Blog Categories Well -->
                
                
                
                
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                      <div class="col-lg-12">
                            <ul class="list-unstyled">
                       <?php
    
                
                    $query = "SELECT * FROM categories";
                    $select_categories_sidebar = mysqli_query($connection , $query);
                    while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                        $cat_id     = $row['id'];
                        $cat_title = $row['cat_title'] ;
                        echo "<li> <a href='categories.php?category=$cat_id'> {$cat_title} </a> </li>";
                    
                    
                    }
                ?>
                
                        
                                
                            </ul>
                        </div>
                        
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widget.php";?>

            </div>