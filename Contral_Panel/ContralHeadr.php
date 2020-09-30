<!DOCTYPE html>
<!--  
 - Created by Apache NetBeans IDE 11.2
 - Programming by: shaimaa Raed Zakout
 - Date: 9/6/2020
 - Time: 7:15 pm 
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

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <?php
        ?>

        <aside id="left-panel" class="left-panel" >
            <nav class="navbar navbar-expand-sm navbar-default">
                <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="menu-title"> <i style='font-size:25px' class='fas'>&#xf59c;</i>
                            Menu </li>
                        <li><a class="nav-link" href="../index.php">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Dashboard</span></a></li>
                         <li><a class="nav-link" href="ContralPanel.php">
                                <i class="fas fa-fw fa-table"></i>
                                <span>Tables</span></a></li>
                        <li class="menu-item-has-children dropdown">
                            <a href="../logout.php" > Log out</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </aside>
        <div id="right-panel" class="right-panel">
            <header id="header" class="header">
                <div class="top-left">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="ContralPanel.php"><img src="../layout/img/admin/logo.png" alt="Logo"></a>
                        <a class="navbar-brand hidden" href="ContralPanel.php"><img src="../layout/img/admin/logo2.png" alt="Logo"></a>
                        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
                <div class="top-right">
                    <div class="header-menu">
                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome Admin</a>
                            <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="../LogOut.php"><i class="fa fa-power-off"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <script src="../layout/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
            <script src="../layout/js/popper.min.js" type="text/javascript"></script>
            <script src="../layout/js/plugins.js" type="text/javascript"></script>
            <script src="../layout/js/main.js" type="text/javascript"></script>
    </body>
</html>
