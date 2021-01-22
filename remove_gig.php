<?php
session_start();


if(empty($_SESSION['sp_email']))
    {
        header("Location:mainpage.php");
        die();
    }


if(empty($_GET['tg_id']) && empty($_GET['food_id']) )
    {
        header("Location:mainpage.php");
        die();
    }



$conn = new mysqli("localhost", "root", "", "tourism");
// Check connection
if ($conn->connect_error) 
    {
         die("Connection failed: " . $conn->connect_error);
    } 

if($_SESSION['sp_service_type'] == 'tourguide')
{
    $sql = "DELETE FROM tourguide_table WHERE tg_id='".$_GET['tg_id']."' ";   
}

else if($_SESSION['sp_service_type'] == 'food')
{
    $sql = "DELETE FROM food_table WHERE food_id='".$_GET['food_id']."' ";   
}

if ($conn->query($sql) === TRUE)
    {
        header("Location:mainpage.php");
        die();

    } 
else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }



?>