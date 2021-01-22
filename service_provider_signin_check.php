<?php

session_start();

if($_SERVER['REQUEST_METHOD'] != "POST")
    {
        header("Location:mainpage.php");
    }


else
    {
        $name = $_POST['_name'];
        $email = $_POST['_email'];
        $mobile = $_POST['_phnno'];
        $service_type = $_POST['_service_type'];
        $address = $_POST['_address'];
        $password = $_POST['_password'];
        $retyped_password = $_POST['_retyped_password'];
        $phnno = $_POST['_phnno'];
        
        if($password != $retyped_password)
            {
                $_SESSION['signin_error'] = "password_unmatched";
                header("Location:service_provider_login.php");
                die();
            }
        
        // Create connection
        $conn = new mysqli("localhost", "root", "", "tourism");
        // Check connection
        if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            } 
        $sql = "SELECT sp_password FROM sp_table WHERE sp_email='".$email."' limit 1";
        $result = $conn->query($sql) or die("result error");
    
        if(mysqli_num_rows($result) > 0 )
            {
                $_SESSION['signin_error'] = "data_already_exist";
                header("Location:service_provider_login.php");
                die();
            }
        else
            {
                $sql = 'INSERT INTO sp_table (sp_name, sp_email, sp_phnno, sp_service_type, sp_password, sp_address , sp_point, sp_balance)
                VALUES ("'.$name.'", "'.$email.'", "'.$phnno.'", "'.$service_type.'", "'.$password.'", "'.$address.'", 0, 10000)';

                if ($conn->query($sql) === TRUE)
                    {
                        echo "New record created successfully";

                        $_SESSION['sp_email'] = $email;
                        $_SESSION['sp_password'] = $password;
                        header("Location:successful.php");

                    } 
                else 
                    {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
            }
        
        
        $conn->close();
         
     }

?>