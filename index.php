<!--  
 - Created by Apache NetBeans IDE 11.2
 - Programming by: shaimaa Raed Zakout
 - Date: 9/6/2020
 - Time: 7:05 pm 
-->

<!DOCTYPE HTML>
<?php
include_once 'include/DbConect.php';
?>
<head>
    <title>Classic White</title>
    <meta charset="utf-8">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Parisienne' rel='stylesheet' type='text/css'>
    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" media="screen" href="layout/css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="layout/css/simple_menu.css">
    <!-- JS Files -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="layout/js/jquery.tools.min.js"></script>
    <script>
        $(function () {
            $("#prod_nav ul").tabs("#panes > div", {
                effect: 'fade',
                fadeOutSpeed: 400
            });
        });
    </script>

</head>
<body>
    <?PHP include_once './include/Header.php'; ?>

    <div id="container">
        <!-- tab panes -->
        <div id="prod_wrapper">
            <div id="panes">
                <div> <img src="layout/img/demo/1.jpg" alt="">
                    <h2>Welcome to Classic White</h2>
                    <p>Nulla hendrerit commodo tortor, vitae elementum magna convallis nec. Nam tempor nibh a purus aliquam et adipiscing elit gravida. Ut vitae nunc a libero volutpat gravida. Nullam egestas mi sit amet dui scelerisque eu laoreet nisi ultrices. Ut vitae nunc a libero volutpat gravida. Nam tempor nibh a purus aliquam. </p>
                    <p style="text-align:right; margin-right: 16px"><a href="#" class="button">More Info</a> <a href="#" class="button">Buy Now</a></p>
                </div>
            </div>
            <!-- END tab panes -->
            <br clear="all">
            <!-- navigator -->
            <div id="prod_nav">
                <ul>
<!--                    <li><a href="#1"><img src="layout/img/demo/1.jpg" width="160" alt=""><strong>Class aptent</strong> $ 199</a></li>-->

                    <?PHP
                    $query2 = "SELECT * FROM `cars`";
                    $result = mysqli_query($connect, $query2);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $CarId = $row['id'];
                        $CarManufacturer = $row['manufacturer'];
                        $carModel = $row['model'];
                        $CarPrice = $row['price'];
                        $CarImage = $row['image'];
                        $img = "uplodes/$CarImage";
                        ?>

                        <li><a href="#"><img src=<?PHP echo $img; ?> width="160" alt="">
                                <?PHP
                                echo "<strong>$carModel  </strong>    <strong>$CarManufacturer </strong> <strong>$CarPrice $</strong>"
                                . "<button> Buy now</button>"
                                ?>



                            </a></li>
                    <?PHP } ?>
                </ul>
            </div>
            <!-- END navigator -->
        </div>
        <!-- END prod wrapper -->

        <div style="clear:both"></div>
    </div>
    <!-- END footer -->
</body>
</html>