<!DOCTYPE html>
<!--  
 - Created by Apache NetBeans IDE 11.2
 - Programming by: shaimaa Raed Zakout
 - Date: 14/6/2020
 - Time: 7:40 am
-->
<html>
    <?PHP
    include_once 'include/DbConect.php';
    session_start();
    if (!empty($_POST['remember'])) {
        setcookie("remember", 1, time() + 3600);
        setcookie("username", $_POST['uname'], time() + 3600);
        setcookie("password", $_POST['pswd'], time() + 3600);
        setcookie("fullName", $_POST['name'], time() + 3600);
    }

    if (isset($_POST['send'])) {
        $_SESSION['user'] = ['name' => $_POST['uname'], 'password' => md5($_POST['pswd'])];
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <style>
            body {font-family: Arial, Helvetica, sans-serif;
                  background-color: #ddd

            }
            * {box-sizing: border-box;}
            .error {color: #FF0000;}
            .correct{color: green;
                     font-family: fantasy;
                     font-size: 30px;}
            .form-inline {  
                display: flex;
                flex-flow: row wrap;
                align-items: center;
            }

            .form-inline label {
                margin: 5px 10px 5px 0;
            }

            .form-inline input {
                vertical-align: middle;
                margin: 5px 10px 5px 0;
                padding: 10px;
                background-color: #fff;
                border: 1px solid #ddd;
            }

            .form-inline button {
                padding: 10px 20px;
                background-color: blueviolet;
                border: 1px solid #ddd;
                color: white;
                cursor: pointer;
                margin: 10px;
            }

            .form-inline button:hover {
                background-color: royalblue;
            }



            .form-inline {
                flex-direction: column;
                align-items: stretch;
            }

            div{
                padding: 30px;
                width: 800px;
                height: 600px;
                margin: auto;
                background-color: antiquewhite;

            }
            h1{
                text-align: center;
            }


        </style>
    </head>
    <body>


        <?php

// هذه الميثود تتأكد من ان المدخل خالي من الفراغات ومن السلاش ومن اي تاغ بلغة الاتش تي ام ال
        function check($input) {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }

// هذه المتغيرات لوضع المدخل الذي يدخله المستخدم والاخرى لتخزين رسالة الخطأ إن وجد
        $name = $email = $password = " ";
        $nameErr = $emailErr = $passwordErr = " ";
        $correct = " ";
        if (isset($_POST["send"])) {    // هنا نتحقق من أن المستخدم قد ضغط زر الادخال فعلا أم لا
            // هنا للفحص الاسم إن كان مكان الادخال ليس فارغا أعمل التالي 
            if (!empty($_POST["name"])) {
                $name = check($_POST["name"]);
                $uname = check($_POST["uname"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $name, $uname)) {  // تأكد من خلو الاسم من هذه الرموز
                    $nameErr = "Name	Should only contain letters, numbers"; //إن كانت موجودة نطبع رسالة بالخطأ
                }
            } else {
                $nameErr = "You Forgot to Enter Your  Name ";  // هنا ان لم يدخل الاسم نذكره بإدخاله برسالة خطأ
            }


            // هنا لفحص كلمة المرور وهي كاالتالي
            if (!empty($_POST["pswd"])) {    //نتأكد أنه فعلا ادخل كلمة قبل الفحص
                $password = check($_POST["pswd"]);
                if (strlen($password) < '7') {    // نتأكد من كون كلمة المرور اكبر من 8 
                    $passwordErr = "  Password Must Contain At Least 8 Characters";
                } elseif (!preg_match("#[0-9]+#", $password)) {    // هذه الحالة تتأكد من كون كلمة المرور تحتوي على ارقام
                    $passwordErr = "  Password Must Contain At Least 1 Number";
                } elseif (!preg_match("#[A-Z]+#", $password)) { //هنا للفحص هل تحتوي على حروف كبيرة ام لا
                    $passwordErr = "  Password Must Contain At Least 1 Capital Letter";
                } elseif (!preg_match("#[a-z]+#", $password)) {  //للفحص هل تحتوي على حروف صغيرة ام لا
                    $passwordErr = "  Password Must Contain At Least 1 Lowercase Letter ";
                }
            } else {
                $passwordErr = "You Forgot to Enter Your Password ";
            }
        }

        if (isset($_POST["send"]) && ($passwordErr === " " && $nameErr === " " && $emailErr === " ")) {
            $name = $_POST["name"];
            $uname = $_POST["uname"];
            $password = $_POST["pswd"];
            $query4 = "INSERT INTO `users`(`username`, `password`, `full_name`) VALUES ('$uname','$password','$name')";
            if (mysqli_query($connect, $query4)) {
                if ($_POST["uname"] != "admin" && $_POST["pswd"] != "Admin111") {
                    header("Location:index.php");
                } else {
                    header("Location:Contral_Panel/ContralPanel.php");
                }
            }
        }
        ?>
        <h1>login to go  :) </h1>
        <div>
            <h3><span class="error">* required field</span></h3>
            <form class="form-inline"  method="post">
                <label>Username:</label>
                <input type="text" id="name" placeholder="Enter Username" name="uname"value="<?php
        if (isset($_COOKIE["remember"])) {
            echo $_COOKIE["username"];
        }
        ?>">  
                <span class="error">* <?php echo $nameErr; ?></span><br>
                <label>Full Name:</label>
                <input type="text" id="name" placeholder="Enter full Name" name="name" value="<?php
                       if (isset($_COOKIE["remember"])) {
                           echo $_COOKIE["fullName"];
                       }
        ?>">  
                <span class="error">* <?php echo $nameErr; ?></span><br>


                <label>Password:</label>
                <input type="password" id="pwd" placeholder="Enter password" name="pswd"value="<?php
                       if (isset($_COOKIE["remember"])) {
                           echo $_COOKIE["password"];
                       }
        ?>" >
                <span class="error">* <?php echo $passwordErr; ?></span><br>
                <span class="correct"> <?php echo $correct; ?></span>
                <span><input type="checkbox" name="remember">remember me</span>
                <button type="submit" name="send">Submit</button>
            </form></div>



    </body>
</html>
