<?php
        session_start();

        require 'connect-select-db.php';

        $email = $_POST['email'];
        $password = $_POST['password'];

        $password = md5($password);

        $sql = "SELECT * FROM users where email = '$email'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($password == $row['password']){
                        $_SESSION['email'] = $email;
                        header("Location: ../index.php");
                        exit;
                }else{
                    echo '<script>alert("Email or password is incorrect!")</script>';
                }
            }
        }else{
            echo 0;
            die();
        }

?>
