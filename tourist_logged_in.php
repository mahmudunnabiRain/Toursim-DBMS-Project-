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
$sql = "SELECT tourist_id, tourist_name, tourist_image, tourist_phnno, tourist_address, tourist_balance FROM tourist_table WHERE tourist_email='".$_SESSION['tourist_email']."' limit 1";
$result = $conn->query($sql) or die("result error");
 $data[] = "";
if(mysqli_num_rows($result) > 0 )
     {
        $data = mysqli_fetch_assoc($result);
     }
        
        
$conn->close();
 


$_SESSION['tourist_name'] = $data['tourist_name'];
$_SESSION['tourist_id'] = $data['tourist_id'];
$_SESSION['tourist_phnno'] = $data['tourist_phnno'];
$_SESSION['tourist_address'] = $data['tourist_address'];
$_SESSION['tourist_balance'] = $data['tourist_balance'];
$_SESSION['tourist_image'] = $data['tourist_image'];

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
            height: 400vh;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            }
        
        .logo_and_general_info{
            float: left;
        }
        
        
        .general_info{
            margin-top: 140px;
            margin-left: 60px; 
            width: 310px;
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
            width: 310px;
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
        
        
         .msg_2{
            width: 520px;
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
        
        .manage_acc_button{
            background-color: transparent;
            border: 1px solid white;
            color: white;
            padding: 2px 4px;
            text-decoration: none;
            cursor: pointer;
            transition: 0.5s ease;
            font-size: 18px;
            float: left;
        }
        
        .manage_acc_button:hover{
            background-color: green;
            color: white;
        }
        
        .log_out_button{
            background-color: transparent;
            border: 1px solid white;
            color: white;
            padding: 2px 4px;
            text-decoration: none;
            cursor: pointer;
            transition: 0.5s ease;
            font-size: 18px;
            float: right;
        }
        
        .log_out_button:hover{
            background-color: crimson;
            color: white;
            border: 1px solid red;
        }
        
        .tourist_dp{
            border: 1px solid darkgray;
            margin-bottom: 20px;
        }
        
        .book{
            margin-top: 100px;
            margin-left: 60px; 
            width: 250px;
        }
        
        .book_button{
            display: block;
            background-color: transparent;
            border: 1px solid white;
            color: white;
            padding: 10px 10px;
            text-decoration: none;
            cursor: pointer;
            transition: 0.5s ease;
            font-size: 20px;
        }
        
        .book_button:hover{
            background-color: crimson;
            color: white;
        }
        
          .view_bookings{
            margin-top: 40px;
            margin-left: 60px; 
            color: azure;
        }
        

        
        
        
    </style>
     
    <body>
        <header>
            <div class="main">
                
                <div class="logo_and_general_info">
                    <div class="logo">
                        <img src=".//images/logo.png">
                    </div>
                
                    <div class="general_info">
                        
                        <a class="msg">
                            <?php
                                echo "Hey ".$_SESSION['tourist_name'].", Let's setup your tour";
                            ?>
                        </a>
                        
                        <div class="tourist_dp">
                        <?php
                            echo "<img width='308px' height='150px' src='.//tourist_dp/".$_SESSION['tourist_image']."'>";
                        ?>
                        </div>
                        
                        <a class="infos">
                            <?php
                                echo "id: ".$_SESSION['tourist_id'];
                            ?>
                        </a>
                        <a class="infos">
                            <?php
                                echo "email: ".$_SESSION['tourist_email'];
                            ?>
                        </a>
                        <a class="infos">
                            <?php
                                echo "mobile: ".$_SESSION['tourist_phnno'];
                            ?>
                        </a>
                        <a class="infos">
                            <?php
                                echo "address: ".$_SESSION['tourist_address'];
                            ?>
                        </a>
                        
                        <a class="infos">
                            <?php
                                echo "balance: ".$_SESSION['tourist_balance']." tk";
                            ?>
                        </a>
                        <a class="manage_acc_button">Manage Acc.</a>
                        <a class="log_out_button" href="tourist_logout.php">Log out . .</a>
                        
                    </div>
                    
                    <div class = "book">
                        <a class="msg">Book the service you are seeking for</a>
                        <a class="book_button" href="tourguide_list.php?">Tourguide</a>
                        <a class="book_button" href="food_list.php">Hotel and Restaurant</a>
                    </div>
                    
                    <div class = "view_bookings">
                        <a class="msg_2">Bookings</a>
                            <ul>
                                <?php
                                    // Create connection
                                    $conn = new mysqli("localhost", "root", "", "tourism");
                                    // Check connection
                                    if ($conn->connect_error) 
                                        {
                                            die("Connection failed: " . $conn->connect_error);
                                        } 
                                    $sql = "SELECT sp_name, sp_phnno, tb_id, tb_paid, tb_place, tb_price, tb_done, tb_fromdate, tb_todate, tb_sp_id FROM tourguide_booking_table, sp_table WHERE tb_tourist_id='".$_SESSION['tourist_id']."' AND tb_sp_id = sp_id ";
                                    $result = $conn->query($sql) or die("result error");
                                    $data[] = "";
                                    if(mysqli_num_rows($result) > 0 )
                                        {
                                            while($data = $result->fetch_assoc()){
                                                $show = 'inherit';
                                                if($data['tb_done'] == 'yes')
                                                    $show = 'none';
                                                
                                                echo "
                                                    
                                                    <style>
                                                            .gig{
                                                                border:2px solid white;
                                                                margin-bottom:10px;
                                                                padding:4px 4px;
                                                                width : 500px;
                                                            }
                                                            
                                                            .gig_data{
                                                                font-size: 18px;
                                                                width : 350px;
                                                                display: inherit;
                                                            }
                                                            
                                                            .gig_type{
                                                                font-size: 18px;
                                                                display: inherit;
                                                                border: 1px solid green;
                                                                padding: 0px 10px;
                                                                background-color:black;
                                                                
                                                            }
                                                            
                                                            .remove_button{
                                                                color:white;
                                                                font-size:18px;
                                                                border:1px solid white;
                                                                padding:0px 4px;
                                                                cursor:pointer;
                                                                text-decoration: none;
                                                                text-align: center;
                                                                display: inherit;
                                                                transition: 0.5s ease;
                                                                margin-bottom: 5px;
                                                                
                                                            }
                                                            
                                                            .acquire_button{
                                                                color:white;
                                                                font-size:18px;
                                                                border:1px solid white;
                                                                padding:0px 4px;
                                                                cursor:pointer;
                                                                text-decoration: none;
                                                                text-align: center;
                                                
                                                                transition: 0.5s ease;
                                                                margin-bottom: 5px;
                                                                
                                                            }
                                                            
                                                            .remove_button:hover{
                                                                background-color: crimson;
                                                                color: white;
                                                                border: 1px solid red;
                                                            }
                                                            .acquire_button:hover{
                                                                background-color: crimson;
                                                                color: white;
                                                                border: 1px solid red;
                                                            }
                                                            
                                                            .gig_img{
                                                                margin-top: 5px;
                                                                margin-bottom: 10px;
                                                                border: 1px solid gray;
                                                                width : 150px;
                                                            }
                                                            .gig_data_set{
                                                                width:350px;
                                                            }
                                                            .btn{
                                                                float:right;
                                                            }
                                                            
                                                    </style>
                                                        
                                                    <div class='gig'>
                                                        <div  class='gig_data_set' style='display:inline-block;'>
                                                            <a class='gig_type'>tourguide</a><br>
                                                            <a class='gig_data'>booking no: ".$data['tb_id']."</a><br>
                                                            <a class='gig_data'>place: ".$data['tb_place']."</a><br>
                                                            <a class='gig_data'>from: ".$data['tb_fromdate']."</a><br>
                                                            <a class='gig_data'>to: ".$data['tb_todate']."</a><br>
                                                            <a class='gig_data'>tourguide id: ".$data['tb_sp_id']."</a><br>
                                                            <a class='gig_data'>tourguide name: ".$data['sp_name']."</a><br>
                                                            <a class='gig_data'>mobile: ".$data['sp_phnno']."</a><br>
                                                            <a class='gig_data'>price: ".$data['tb_price']."</a><br>
                                                            <a class='gig_data'>service acquired: ".$data['tb_done']."</a><br>
                                                            <a class='gig_data'>paid: ".$data['tb_paid']."</a><br>
                                                        </div>
                                            
                                                        <div class='btn'>
                                                            <a class='acquire_button' style='display: ".$show.";' href='service_acquired.php?tb_id=".$data['tb_id']."' >Acquired</a>
                                                            <a class='remove_button' >Pay online</a>
                                                        </div>
                                                    </div> 
                                                    ";
                                            }
                                             
                                        }
                                
                                    $sql = "SELECT sp_name, fb_id, fb_paid, fb_name, fb_quantity, fb_price, fb_done, fb_date, fb_hour, fb_sp_id FROM food_booking_table, sp_table WHERE fb_tourist_id='".$_SESSION['tourist_id']."' AND fb_sp_id = sp_id ";
                                    $result = $conn->query($sql) or die("result error");
                                    $data[] = "";
                                    if(mysqli_num_rows($result) > 0 )
                                        {
                                            while($data = $result->fetch_assoc()){
                                                 $show = 'inherit';
                                                if($data['fb_done'] == 'yes')
                                                    $show = 'none';
                                                
                                                echo "
                                                    
                                                    <style>
                                                            .gig{
                                                                border:2px solid white;
                                                                margin-bottom:10px;
                                                                padding:4px 4px;
                                                                width : 500px;
                                                            }
                                                            
                                                            .gig_data{
                                                                font-size: 18px;
                                                                width : 400px;
                                                                display: inherit;
                                                            }
                                                            
                                                            .gig_type{
                                                                font-size: 18px;
                                                                display: inherit;
                                                                border: 1px solid green;
                                                                padding: 0px 10px;
                                                                background-color:black;
                                                                
                                                            }
                                                            
                                                            .remove_button{
                                                                color:white;
                                                                font-size:18px;
                                                                border:1px solid white;
                                                                padding:0px 4px;
                                                                cursor:pointer;
                                                                text-decoration: none;
                                                                text-align: center;
                                                                display: inherit;
                                                                transition: 0.5s ease;
                                                                margin-bottom: 5px;
                                                                
                                                            }
                                                            
                                                            .acquire_button{
                                                                color:white;
                                                                font-size:18px;
                                                                border:1px solid white;
                                                                padding:0px 4px;
                                                                cursor:pointer;
                                                                text-decoration: none;
                                                                text-align: center;
                                                
                                                                transition: 0.5s ease;
                                                                margin-bottom: 5px;
                                                                
                                                            }
                                                            
                                                            .remove_button:hover{
                                                                background-color: crimson;
                                                                color: white;
                                                                border: 1px solid red;
                                                            }
                                                            .acquire_button:hover{
                                                                background-color: crimson;
                                                                color: white;
                                                                border: 1px solid red;
                                                            }
                                                            
                                                            .gig_img{
                                                                margin-top: 5px;
                                                                margin-bottom: 10px;
                                                                border: 1px solid gray;
                                                                width : 150px;
                                                            }
                                                            .gig_data_set{
                                                                width:350px;
                                                            }
                                                            .btn{
                                                                float:right;
                                                            }
                                                            
                                                    </style>
                                                        
                                                    <div class='gig'>
                                                        <div class='gig_data_set' style='display:inline-block;'>
                                                            <a class='gig_type'>hotel and restaurant</a><br>
                                                            <a class='gig_data'>booking no: ".$data['fb_id']."</a><br>
                                                            <a class='gig_data'>name: ".$data['fb_name']."</a><br>
                                                            <a class='gig_data'>quantity: ".$data['fb_quantity']."</a><br>
                                                            <a class='gig_data'>date: ".$data['fb_date']."</a><br>
                                                            <a class='gig_data'>hour: ".$data['fb_hour']."</a><br>
                                                            <a class='gig_data'>restaurant id: ".$data['fb_sp_id']."</a><br>
                                                            <a class='gig_data'>restaurant name: ".$data['sp_name']."</a><br>
                                                            <a class='gig_data'>price: ".$data['fb_price']."</a><br>
                                                            <a class='gig_data'>service acquired: ".$data['fb_done']."</a><br>
                                                            <a class='gig_data'>paid: ".$data['fb_paid']."</a><br>
                                                        </div>
                                                        
                                                        <div class='btn'>
                                                            <a class='acquire_button' style='display: ".$show.";' href='service_acquired.php?fb_id=".$data['fb_id']."' >Acquired</a>
                                                            <a class='remove_button' >Pay online</a>
                                                        </div>
                                                    </div> 
                                                    ";
                                            }
                                             
                                        }
                                


                                    $conn->close();
                                    
                                ?>
                            </ul>
                    
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


