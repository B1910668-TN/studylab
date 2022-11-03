<?php
        require "connect-select-db.php";

        // Get in4 from user
        $fullname = $_POST["fullname"];
        $email  = $_POST["email"];
        $password = $_POST["password"];
        $cfpass = $_POST["cfpass"];


        if($fullname == '' || $email == '' || $password == '' || $cfpass == ''){
                echo "No empty, please!";
                die();
        }

        //Check email already exist or not
        $sql1 = "SELECT email from users where email = '$email'";
        $result1 = $conn->query($sql1)
            or die("Query failed: " . $conn->error);
        if($result1->num_rows > 0){
            echo "Email already exist!";
            die();
        }

        //Mã hoá mật khẩu
        $password = md5($password);
        $cfpass = md5($cfpass);

        // Confirm password
        if($password === $cfpass){
            echo "";
        }else{
            echo "Confirmation password does not match!";
            die();
        }

        //Save in4 user

        $sql2 = "INSERT INTO users(fullname, email, password) value ('$fullname','$email', '$password')"; 
        
        $result2 = $conn->query($sql2);

        if($result2 === TRUE){
            echo "Success!";
        }else{
            echo "Fail!";
        }
?>