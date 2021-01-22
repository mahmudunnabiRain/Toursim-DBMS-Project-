<?php

session_start();

if($_SERVER['REQUEST_METHOD'] != "POST")
    {
        header("Location:mainpage.php");
        die();
    }


else
    {
        $email = $_POST['_email'];
        $password = $_POST['_password'];
    
        // Create connection
        $conn = new mysqli("localhost", "root", "", "tourism");
        // Check connection
        if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            } 
        $sql = "SELECT sp_password FROM sp_table WHERE sp_email='".$email."' limit 1";
        $result = $conn->query($sql) or die("result error");
        $data[] = "";
        if(mysqli_num_rows($result) > 0 )
            {
                $data = mysqli_fetch_assoc($result);
            }
        
        
        $conn->close();
         

        if($password == $data['sp_password'])
            {
                $_SESSION['sp_email'] = $email;
                $_SESSION['sp_password'] = $password;
                header("Location:successful.php");
                die();

            }
        else
            {
                $_SESSION['login_error'] = "wrong_input";
                header("Location:service_provider_login.php");
                die();
            }
     }

?>