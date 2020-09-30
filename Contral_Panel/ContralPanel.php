<!--  
 - Created by Apache NetBeans IDE 11.2
 - Programming by: shaimaa Raed Zakout
 - Date: 9/6/2020
 - Time: 7:35 pm 
-->

<!doctype html>

<?php
include_once '../include/DbConect.php';
include_once './ContralHeadr.php';
?>
<html class="no-js" lang="">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>contral panel</title>
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

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>

        <div class="content pb-0">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Cars  
                                    <a class="badge badge-complete" href="addCar.php" 
                                       style="    margin-left: 100px; border: 1px solid ;background-color: #00c292; padding: 10px;font-size: 13px;color: white
                                       ">Add car</a> 
                                </h4>

                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>manufacturer</th>
                                                <th>model</th>
                                                <th>price</th>
                                                <th>image</th>
                                                <th>choice</th>
                                            </tr>
                                        </thead>
                                        <tbody> <?php
                                            $query = "SELECT * FROM `cars`";
                                            $result = mysqli_query($connect, $query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $CarId = $row['id'];
                                                $CarManufacturer = $row['manufacturer'];
                                                $carModel = $row['model'];
                                                $CarPrice = $row['price'];
                                                $CarImage = $row['image'];
                                                ?> 
                                                <tr>
                                                    <td class="serial"><?PHP echo $CarId; ?></td>
                                                    <td> <?PHP echo $CarManufacturer; ?> </td>
                                                    <td> <?PHP echo $carModel; ?> </td>
                                                    <td> <?PHP echo $CarPrice; ?> </td>
                                                    <td><img src='<?PHP echo"../uplodes/$CarImage"; ?> '></td>
                                                    <td>

                                                        <a href="ContralPanel.php?action=delete&id=<?php echo $CarId ?> "><span class='badge badge-pending'>delete</span></a>
                                                        <a href="ContralPanel.php?action=update&id=<?php echo $CarId ?>"><span class='badge badge-complete'>Update</span></a>


                                                    </td>
                                                </tr>
                                                <?PHP
                                            }
//                                            delete
                                            if (isset($_GET["action"]) && $_GET["action"] == "delete" && isset($_GET["id"])) {
                                                $id = $_GET["id"];
                                                $qury = "DELETE FROM `cars` WHERE id = $id ";
                                                if (mysqli_query($connect, $qury)) {
                                                    echo "<script>alert('Car is deleted')</script>";
                                                    echo "<script>window.location = 'ContralPanel.php'</script>";
                                                }
                                            }
//                                                  update 
                                            if (isset($_GET["action"]) && $_GET["action"] == "update" && isset($_GET["id"])) {
                                                $id = $_GET["id"];
                                                $query2 = "SELECT * FROM `cars` WHERE id =$id";
                                                if ($row = mysqli_fetch_assoc(mysqli_query($connect, $query2))) { //
                                                    $CarId = $row['id'];
                                                    $CarManufacturer = $row['manufacturer'];
                                                    $carModel = $row['model'];
                                                    $CarPrice = $row['price'];
                                                    $CarImage = $row['image'];
                                                }
                                                ?>

                                            <div>
                                                <div class="content pb-0" style="color: black;">
                                                    <div class="animated fadeIn">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="card">
                                                                    <div class="card-header"style="color: black;font-size: 30px"><strong>Update Car </strong><small> Form</small></div>
                                                                    <div class="card-body card-block">
                                                                        <form method="POST" enctype="multipart/form-data">
                                                                            <div class="form-group"><label for="company" class=" form-control-label">ID</label><input type="number" id="company" value=<?php echo $CarId ?>  class="form-control" name="id"></div>
                                                                            <div class="form-group"><label for="company" class=" form-control-label">manufacturer</label><input type="text" id="company" value="<?php echo $CarManufacturer ?> " class="form-control" name="manF"></div>
                                                                            <div class="form-group"><label for="company" class=" form-control-label">model</label><input type="text" id="company" value="<?php echo $carModel ?> " class="form-control" name="model"></div>
                                                                            <div class="form-group"><label for="street" class=" form-control-label">price</label><input type="number" id="street" value=<?php echo $CarPrice ?>  class="form-control" name="price"></div>
                                                                            <div class="form-group"><label for="country" class=" form-control-label">image </label><input type="file" name="fileToUpload" id="fileToUpload"></div>
                                                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="update">
                                                                                <span id="payment-button-amount">Submit</span>
                                                                            </button></form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div></div>    
                                            <?php
                                        }
                                        if (isset($_POST['update'])) {
                                            $CarId = $_POST['id'];
                                            $CarManufacturer = $_POST['manF'];
                                            $CarPrice = $_POST['price'];
                                            $carModel = $_POST['model'];
                                            $sqlQ11 = "  UPDATE `cars` SET `id`=$CarId,`manufacturer`='$CarManufacturer',`model`='$carModel' ,`price`=$CarPrice   WHERE id=$id";
                                            if (mysqli_query($connect, $sqlQ11)) {
                                                echo "<script>alert('Car info is  updeted')</script>";
                                                echo "<script>window.location = 'ContralPanel.php'</script>";
                                            }
                                        }
                                        ?>

                                        </tbody>
                                    </table>





                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy;2020 
                    </div>
                    <div class="col-sm-6 text-right">

                    </div>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>