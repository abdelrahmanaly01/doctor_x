<?php include "includes/db.php";?>
<?php include "includes/header.php"; ?>


<body>
    <div class="main">
        <div class="container">
         

        <?php include "includes/navigation2.php" ;?>


        <div class="card o-hidden border-0 shadow-lg my-5" style="">
                <div class="row g-0">
                    
                    <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title text-center about_us_h2">New X Ray !</h2>

                        <hr>
                        
                   
                        <div class="input-group mb-3">


                            <label class="input-group-text" for="inputGroupFile01">Upload The X-ray</label>
                            <input type="file" class="form-control" id="image-selector">



                        </div>

                        <div class="d-grid gap-2 mb-4">
                            
                                <button type="submit" class="btn btn-primary mybtn" id="predict-button" >New X-ray</button>
                            

                                </div>
                  


                    <table class="table">
                        <thead>
                            <tr>
                            <!-- <th scope="col">#</th> -->
                            <th scope="col">Diseases</th>
                            <th scope="col">Result</th>
                            </tr>
                        </thead>
                        <tbody id='container'>

                            <!-- <tr><td> -->
                            <!-- <th scope="row">1</th> -->
                            <!-- <td  > -->
                                

                        </tbody>
                        </table>




                      





                        <hr>

                        <div class="text-center">
                        
                        <p>Copyright © MIS Department 2020</p>
                    </div>



                    </div>
                    </div>
                    <div class="col-md-4 new_x_ray_img">
                    <img id="selected-image" src="" />
                    </div>
                </div>
            </div>

           
               
                
                
                    

        
        </div>
    </div>
    







    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>

    let base64Image;
    $("#image-selector").change(function () {



        let reader = new FileReader();
        reader.onload = function (e) {
            let dataURL = reader.result;
            $('#selected-image').attr("src", dataURL);
            base64Image = dataURL.replace("data:image/jpeg;base64,", "").replace("data:image/png;base64,", "").replace("data:image/jfif;base64,", "");
            console.log(base64Image);
        }
        reader.readAsDataURL($("#image-selector")[0].files[0]);

        $("#prediction").text("");
    });

    $("#predict-button").click(function () {
        $("#container").text("");
        let message = {
            image: base64Image
        }
        console.log(message);
        $.post("http://localhost:5000/predict", JSON.stringify(message), function (response) {
            
            $(document).ready(function () {
            var labels = ['Cardiomegaly',
                'Emphysema',
                'Effusion',
                'Hernia',
                'Infiltration',
                'Mass',
                'Nodule',
                'Atelectasis',
                'Pneumothorax',
                'Pleural_Thickening',
                'Pneumonia',
                'Fibrosis',
                'Edema',
                'Consolidation'];
            $.each(labels, function (index, value) {
                $("#container").append( "<tr> <td>" +value + "</td> <td> " + response[value] + '</td></tr>');
            });
        });
            console.log(response);
        });
    });
</script>

</body>
</html>