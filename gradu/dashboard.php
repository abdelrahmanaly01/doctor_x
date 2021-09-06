<?php include "includes/db.php";?>
<?php include "includes/header.php"; ?>


<body>
    <div class="main">
        <div class="container">
         

        <?php include "includes/navigation.php" ;?>


            <div class="card o-hidden border-0 shadow-lg my-5" style="">
                <div class="dashboard">
                <h2 class = "text-center" > Dashboard</h2>
                
                </div>

                <div class="d-grid gap-2 mb-4">
                            <a href="new-xray.php" class = "text-center">
                                <button type="submit" class="btn btn-primary mybtn" formtarget= "index.php" >New X-ray</button>
                            </a>
                                </div>

                <!-- <div class="table-responsive ps-4 pe-4 ">


                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Situation</th>
                        <th scope="col">Details</th>
                        <th scope="col">Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>20/1/2020 At 02:00 PM</td>

                        <td>
                            <div class="d-grid gap-2 ">
                                <button type="submit" class="btn btn-danger" >Danger</button>
                            </div>
                        </td>
                        
                        <td>
                            <div class="d-grid gap-2 ">
                                <button type="submit" class="btn btn-secondary" >View Details</button>
                            </div>
                        </td>
                        
                            <td>
                            <a class="btn btn-success" href="#" role="button">Edit</a>
                            <a class="btn btn-danger" href="#" role="button">Delete</a>

                            </td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>20/1/2020 At 02:00 PM</td>
                        
                        <td>
                            <div class="d-grid gap-2 ">
                                <button type="submit" class="btn btn-warning" >Warning</button>
                            </div>
                        </td>
                        <td>
                            <div class="d-grid gap-2 ">
                                <button type="submit" class="btn btn-secondary" >View Details</button>
                            </div>
                        </td>

                        <td>
                            <a class="btn btn-success" href="#" role="button">Edit</a>
                            <a class="btn btn-danger" href="#" role="button">Delete</a>

                            </td>


                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td>20/1/2020 At 02:00 PM</td>
                        
                        <td>
                            <div class="d-grid gap-2 ">
                                <button type="submit" class="btn btn-primary" >Normal</button>
                            </div>
                        </td>
                       <td>
                            <div class="d-grid gap-2 ">
                                <button type="submit" class="btn btn-secondary" >View Details</button>
                            </div>
                        </td>


                        <td>
                            <a class="btn btn-success" href="#" role="button">Edit</a>
                            <a class="btn btn-danger" href="#" role="button">Delete</a>

                            </td>


                        </tr>
                    </tbody>

                            <div class="d-grid gap-2 mb-4">
                            <a href="new-xray.php" class = "text-center">
                                <button type="submit" class="btn btn-primary mybtn" formtarget= "index.php" >New X-ray</button>
                            </a>
                                </div>
                    </table>

                 



                </div> -->

            </div>
        
        </div>
    </div>
    
</body>
</html>