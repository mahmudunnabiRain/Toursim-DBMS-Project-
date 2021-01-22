<?php

session_start();

if(empty($_SESSION['tourist_email']))
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


if(empty($_GET))
    {   
        if($_SERVER['REQUEST_METHOD'] != "POST")
        {
            header("Location:mainpage.php");
            die();
        }
        else
        {
           
            
            if(!empty($_SESSION['delete_tb_id']))
            {
                $sql = 'UPDATE tourguide_booking_table SET tb_point="'.$_POST['_point'].'", tb_done="yes" WHERE tb_id="'.$_SESSION['delete_tb_id'].'" ';
                $_SESSION['delete_tb_id']="";
            }
            
            if(!empty($_SESSION['delete_fb_id']))
            {
                $sql = 'UPDATE food_booking_table SET fb_point="'.$_POST['_point'].'", fb_done="yes" WHERE fb_id="'.$_SESSION['delete_fb_id'].'" ';
                $_SESSION['delete_fb_id']="";
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
            
        }
    }
else
    {
        if(!empty($_GET['tb_id']))
           {
               $_SESSION['delete_tb_id'] = $_GET['tb_id'];
           }
        if(!empty($_GET['fb_id']))
           {
               $_SESSION['delete_fb_id'] = $_GET['fb_id'];
           }
    }


$conn->close();

?>

<html>

    <head>
        <title>TRAVELCATION</title>
    </head>
    
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family:monospace;
            font-size: 25px;
            }

        header{
            background-image: linear-gradient(rgba(0,0,0,1),rgba(0,0,0,0.8)),url(.//images/pubg_crate.jpg);
            height: 100vh;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            }
        
        .msg{
            color: antiquewhite;
            text-align: center;
            margin: auto;
            width: 500px;
            margin-bottom: 10px;
            font-size: 30px;
        }
        
        .review{
            color: antiquewhite;
            float: inherit;
            text-align: center;
        }
        
        review_form{
            
        }
        
        .confirm_button{
            margin-top: 10px;
            color:white;
            font-size:18px;
            border:1px solid white;
            padding:0px 20px;
            cursor:pointer;
            background-color: transparent;
            text-decoration: none;
            transition: 0.5s ease;
        }
        
        .confirm_button:hover{
            background-color: forestgreen;
            border: 1px solid green;
        }
        
        
            
    </style>
     
    <body>
        <header>
            <div class="main">
                
                <h1>lol</h1>
                <h1 class="msg">Thanks for using our service</h1>
                <h1 class="msg"> give us a review</h1>
                <div class="review">
                    <form class="review_form" method="post" action="service_acquired.php">
                    <input type="radio" name="_point" value="1" required> 1<br>
                    <input type="radio" name="_point" value="2" required> 2<br>
                    <input type="radio" name="_point" value="3" required> 3<br>
                    <input type="radio" name="_point" value="4" required> 4<br>
                    <input type="radio" name="_point" value="5" required> 5<br>
                    <input type="submit" class="confirm_button" value="Confirm"/>
                </form>
                </div>
                
                
                
            
            
                
            </div>
        </header>
    </body>
    
    

</html>