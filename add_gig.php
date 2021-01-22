<?php

session_start();

if($_SERVER['REQUEST_METHOD'] != "POST")
    {
        header("Location:tourguide_profile.php");
    }


else
    {
        // Create connection
        $conn = new mysqli("localhost", "root", "", "tourism");
        // Check connection
        if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            } 
    
        if($_SESSION['sp_service_type'] == 'tourguide')
            {
                $place = $_POST['_place'];
                $price = $_POST['_price'];
                $description = $_POST['_description'];
                $image = $_FILES['_image']['name'];
                $sp_id = $_SESSION['sp_id'];
                move_uploaded_file($_FILES['_image']['tmp_name'], 'gig_image/'.$_FILES['_image']['name']);
                $sql = 'INSERT INTO tourguide_table (tg_place, tg_price, tg_description, tg_image, tg_sp_id)
                    VALUES ("'.$place.'", "'.$price.'", "'.$description.'", "'.$image.'", "'.$sp_id.'")';
            }
    
        if($_SESSION['sp_service_type'] == 'food')
            {
                $name = $_POST['_name'];
                $price = $_POST['_price'];
                $description = $_POST['_description'];
                $image = $_FILES['_image']['name'];
                $hour = $_POST['_hour'];
                $sp_id = $_SESSION['sp_id'];
                move_uploaded_file($_FILES['_image']['tmp_name'], 'gig_image/'.$_FILES['_image']['name']);
                $sql = 'INSERT INTO food_table (food_name, food_price, food_hour, food_description, food_image, food_sp_id)
                    VALUES ("'.$name.'", "'.$price.'", "'.$hour.'", "'.$description.'", "'.$image.'", "'.$sp_id.'")';
            }

          if ($conn->query($sql) === TRUE)
              {
                header("Location:successful.php");
                die();
              } 
          else 
              {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
        
        
        $conn->close();
         
     }

?>