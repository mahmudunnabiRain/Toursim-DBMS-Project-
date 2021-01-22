<?php

session_start();

if(empty($_SESSION['sp_email']))
    {
        header("Location:mainpage.php");
        die();
    }

        $email = $_SESSION['sp_email'];
        $password = $_SESSION['sp_password'];
    
        // Create connection
        $conn = new mysqli("localhost", "root", "", "tourism");
        // Check connection
        if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            } 
        $sql = "SELECT sp_service_type FROM sp_table WHERE sp_email='".$email."' limit 1";
        $result = $conn->query($sql) or die("result error");
        $data[] = "";
        if(mysqli_num_rows($result) > 0 )
            {
                $data = mysqli_fetch_assoc($result);
            }
        
        
        $conn->close();
         

        if("tourguide" == $data['sp_service_type'])
            {
                header("Location:tourguide_profile.php");
                die();

            }
        else if("food" == $data['sp_service_type'])
            {
                header("Location:food_profile.php");
                die();

            }
        else
            {
                echo 'service_type_invalid';
            }





?>
