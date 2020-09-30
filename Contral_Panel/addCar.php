<!DOCTYPE html>
<!--  
 - Created by Apache NetBeans IDE 11.2
 - Programming by: shaimaa Raed Zakout
 - Date: 10/6/2020
 - Time: 10:47 am 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Parisienne' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../layout/css/normalize.css">
        <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
        <link rel="stylesheet" href="../layout/css/font-awesome.min.css">
        <link rel="stylesheet" href="../layout/css/themify-icons.css">
        <link rel="stylesheet" href="../layout/css/pe-icon-7-filled.css">
        <link rel="stylesheet" href="../layout/css/flag-icon.min.css">
        <link rel="stylesheet" href="../layout/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="../layout/css/style2.css">
    </head>
    <body>
        <?php
        include_once './ContralHeadr.php';
        include_once '../include/DbConect.php';


        if (isset($_POST['add'])) {
            $CarId = $_POST['id'];
            $CarManufacturer = $_POST['manF'];
            $CarPrice = $_POST['price'];
            $carModel = $_POST['model'];
//            $CarImage = $_POST['fileToUpload'];



            $upload = $_FILES['fileToUpload'];
            // print_r($upload);
            $name = $_FILES['fileToUpload']['name'];
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);

// Select file type
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // // Valid file extensions
            $extensions_arr = array("jpg", "jpeg", "png", "gif");




            if (in_array($imageFileType, $extensions_arr)) {

                // Insert record
                $query2 = "INSERT INTO `cars`(`id`, `manufacturer`, `model`, `price`, `image`) VALUES"
                        . " ($CarId ,'$CarManufacturer', '$carModel', $CarPrice,'$name')"
                ;
                if (mysqli_query($connect, $query2)) {
                    echo "<script>alert('Car is  added')</script>";
                    echo "<script>window.location = 'addCar.php'</script>";
                }

                //      // Upload file
                move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir . $name);

//   }}
            }
        }
        ?>

        <div>
            <div class="content pb-0" style="color: black;">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"style="color: black;font-size: 30px"><strong>Add Car </strong><small> Form</small></div>
                                <div class="card-body card-block">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group"><label for="company" class=" form-control-label">ID</label><input type="number" id="company" placeholder="Enter car id" class="form-control" name="id"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">manufacturer</label><input type="text" id="company" placeholder="Enter manufacturer" class="form-control" name="manF"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">model</label><input type="text" id="company" placeholder="Enter model" class="form-control" name="model"></div>
                                        <div class="form-group"><label for="street" class=" form-control-label">price</label><input type="number" id="street" placeholder="Enter price" class="form-control" name="price"></div>
                                        <div class="form-group"><label for="country" class=" form-control-label">image </label><input type="file" name="fileToUpload" id="fileToUpload"></div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="add">
                                            <span id="payment-button-amount">Submit</span>
                                        </button></form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div></div>


    </body>
</html>
