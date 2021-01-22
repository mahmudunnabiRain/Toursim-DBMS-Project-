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
        $sql = "SELECT tourist_password FROM tourist_table WHERE tourist_email='".$email."' limit 1";
        $result = $conn->query($sql) or die("result error");
        $data[] = "";
        if(mysqli_num_rows($result) > 0 )
            {
                $data = mysqli_fetch_assoc($result);
            }
        
        
        $conn->close();
         

        if($password == $data['tourist_password'])
            {
                $_SESSION['tourist_email'] = $email;
                $_SESSION['tourist_password'] = $password;
                header("Location:successful.php");
                die();

            }
        else
            {
                $_SESSION['error'] = "wrong_input";
                header("Location:mainpage.php");
                die();
            }
     }

?>