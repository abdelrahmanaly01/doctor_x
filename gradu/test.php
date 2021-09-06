<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo "Heloo Froيسشيسشيشسشيشسيسشيسشيسm PHP"?>
        <input id="image-selector" type="file">
    <button id="predict-button">Predict</button>
    <p style="font-weight:bold">Predictions</p>
    <p id='container'></p>
    <img id="selected-image" src="" />
</body>

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
                $("#container").append(value + ": " + response[value] + '<br>');
            });
        });
            console.log(response);
        });
    });
</script>


</html>
