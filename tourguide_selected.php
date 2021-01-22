<?php

session_start();

if(empty($_SESSION['tourist_email']))
    {
        header("Location:mainpage.php");
        die("not logged in");
    }

//create connection
$conn = new mysqli("localhost", "root", "", "tourism");
// Check connection
if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    } 


if(empty($_GET['tg_id']))
    {
        if(empty($_POST['_fromdate']))
            {
                header("Location:mainpage.php");
                die();
            }
        else
            {
                $fromdate = date_create($_POST['_fromdate']);
                $todate = date_create($_POST['_todate']);
                $tb_place = $_SESSION['tg_info']['tg_place'];
                $tb_sp_id = $_SESSION['tg_info']['sp_id'];
                $diff=date_diff($fromdate,$todate);
                $total_price = ($diff->days + 1) * $_SESSION['tg_info']['tg_price'];
                //insert into db
            
                $sql = 'INSERT INTO tourguide_booking_table (tb_place, tb_fromdate, tb_todate, tb_price, tb_sp_id, tb_tourist_id)
                VALUES ("'.$tb_place.'", "'.$_POST['_fromdate'].'", "'.$_POST['_todate'].'", "'.$total_price.'", "'.$tb_sp_id.'", "'.$_SESSION['tourist_id'].'" )';
            
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
        $sql = "SELECT tg_id, tg_place, tg_price, tg_description, sp_id, sp_name, sp_phnno FROM tourguide_table, sp_table WHERE tourguide_table.tg_sp_id=sp_table.sp_id AND tourguide_table.tg_id='".$_GET['tg_id']."' LIMIT 1";
        $result = $conn->query($sql) or die("result error");
        $data[] = "";
        if(mysqli_num_rows($result) > 0 )
            {
                $data = $result->fetch_assoc();
                    
            }
        $tg_info = $data;
        $_SESSION['tg_info'] = $data;
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
            background-image: linear-gradient(rgba(0,0,0,1),rgba(0,0,0,0.8)),url(.//images/bagpack.jpg);
            height: 200vh;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            }
        
        .logo_and_features{
            float: left;
        }
        

        .other_pages_button{
            float: right;
            margin-top: 20px;
            margin-right: 35px;
            }
        
        .opb_button{
            background-color: transparent;
            border: 1px solid #fff;
            color: white;
            padding: 0px 20px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            transition: 0.5s ease;
            }

        .opb_button:hover{
            background-color: crimson;
            color: white;
            }


        .logo img{
            float: left;
            width: 200px;
            height: 50px;
            margin-top: 25px;
            margin-left: 40px;
            }
        
        
        .msg{
            width: 400px;
            background: transparent;
            border: none;
            outline: none;
            border-bottom: 1px solid white;
            margin-bottom: 12px;
            color: #fff;
            font-size: 20px;
            display: inherit;
            padding: 3px 0px;
        }
        
        .infos{
            width: 300px;
            background: transparent;
            outline: none;
            border: 1px solid gray;
            margin-bottom: 12px;
            color: #fff;
            font-size: 18px;
            display: inherit;
            padding: 2px 4px;
            font-family: monospace;
        }
        
        .tg_info{
            margin-top: 140px;
            margin-left: 60px; 
        }
        
        .confirm{
            margin-top: 40px;
            margin-left: 60px; 
            color: white;
            color: gray;
            border: 1px solid white;
            
        }
        
        .confirm_form{
            margin: 10px 10px;
        }
        
        .confirm_input{
            width: 400px;
            background: transparent;
            border: none;
            outline: none;
            border-bottom: 1px solid white;
            margin-bottom: 12px;
            color: #fff;
            font-size: 18px;
            display: inherit;
            padding: 3px 0px;
        }
        
        .confirm_button{
            color: white;
            font-size: 20px;
            background: transparent;
            width: 400px;
            border: 1px solid #fff;
            padding: 3px 4px;
            margin-top: 10px;
            cursor: pointer;
            transition: 0.5s ease;
            display: inherit;
            margin-bottom: 20px;
        }
        
        .confirm_button:hover{
            background-color: green;
            color: white;
        }
        



   
        
     
       
        

        
        
        
    </style>
     
    <body>
        <header>
            <div class="main">
                
                <div class="logo_and_features">
                    <div class="logo">
                        <img src=".//images/logo.png">
                    </div>
                    
                    
                    <div class="tg_info">
                        
                        <a class="msg">
                            <?php
                                echo "Hey ".$_SESSION['tourist_name'].", You have selected";
                            ?>
                        </a>
                        
                        <a class="infos">
                            <?php
                                echo "tourguide name: ".$_SESSION['tg_info']['sp_name'];
                            ?>
                        </a>
                        <a class="infos">
                            <?php
                                echo "place: ".$_SESSION['tg_info']['tg_place'];
                            ?>
                        </a>
                        <a class="infos">
                            <?php
                                echo "mobile: ".$_SESSION['tg_info']['sp_phnno'];
                            ?>
                        </a>
                        <a class="infos">
                            <?php
                                echo "price per day: ".$_SESSION['tg_info']['tg_price'];
                            ?>
                        </a>
                        
                    </div>
                    
                    <div class="confirm">
                        <form class="confirm_form" method="post" action="tourguide_selected.php">
                            <a class="msg">enter the date you want to book</a>
                            from:<input class="confirm_input" type="date" name="_fromdate" required/>
                            to:<input class="confirm_input" type="date" name="_todate" required/>
                            <input class="confirm_button" type="submit" value="confirm"/>
                        </form>   
                    </div>
                    
  
                </div>
                
                
                
                
                
                
                <div class="other_pages_button">     
                    <ul>
                        <a class="opb_button" href="mainpage.php">Home</a>
                        <a class="opb_button" href="#">About</a>
                        <a class="opb_button" href="#">Contact</a>
                    </ul>
                </div>
            
            
                
            </div>
        </header>
    </body>
    
    

</html>







