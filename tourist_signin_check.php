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
        $image = $_FILES['_image']['name'];
        $address = $_POST['_address'];
        $password = $_POST['_password'];
        $retyped_password = $_POST['_retyped_password'];
        $phnno = $_POST['_phnno'];
        
        if($password != $retyped_password)
            {
                $_SESSION['error'] = "password_unmatched";
                header("Location:tourist_sign_in.php");
                die();
            }
    
    
        move_uploaded_file($_FILES['_image']['tmp_name'], 'tourist_dp/'.$_FILES['_image']['name']);
        
        // Create connection
        $conn = new mysqli("localhost", "root", "", "tourism");
        // Check connection
        if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            } 
        $sql = "SELECT tourist_password FROM tourist_table WHERE tourist_email='".$email."' limit 1";
        $result = $conn->query($sql) or die("result error");
    
        if(mysqli_num_rows($result) > 0 )
            {
                $_SESSION['error'] = "data_already_exist";
                header("Location:tourist_sign_in.php");
                die();
            }
        else
            {
                $sql = 'INSERT INTO tourist_table (tourist_name, tourist_email, tourist_phnno, tourist_image, tourist_password, tourist_address)
                VALUES ("'.$name.'", "'.$email.'", "'.$phnno.'", "'.$image.'", "'.$password.'" , "'.$address.'")';

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    
                    $_SESSION['tourist_email'] = $email;
                    $_SESSION['tourist_password'] = $password;
                    header("Location:successful.php");
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        
        
        $conn->close();
         
     }

?>