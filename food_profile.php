<?php

session_start();

if(empty($_SESSION['sp_email']))
    {
        header("Location:mainpage.php");
        die();
    }


// Create connection
$conn = new mysqli("localhost", "root", "", "tourism");
// Check connection
if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    } 
$sql = "SELECT sp_id, sp_name, sp_service_type, sp_phnno, sp_email, sp_address, sp_point, sp_balance FROM sp_table WHERE sp_email='".$_SESSION['sp_email']."' limit 1";
$result = $conn->query($sql) or die("result error");
$data[] = "";
if(mysqli_num_rows($result) > 0 )
    {
        $data = mysqli_fetch_assoc($result);
    }
        
$conn->close();
         
$_SESSION['sp_id'] = $data['sp_id'];
$_SESSION['sp_service_type'] = $data['sp_service_type'];
$_SESSION['sp_name'] = $data['sp_name'];
$_SESSION['sp_phnno'] = $data['sp_phnno'];
$_SESSION['sp_address'] = $data['sp_address'];
$_SESSION['sp_email'] = $data['sp_email'];
$_SESSION['sp_point'] = $data['sp_point'];
$_SESSION['sp_balance'] = $data['sp_balance'];

 




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
            height: 800vh;
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
        
        .add_gig{
            margin-top: 100px;
            margin-left: 60px; 
            border: 1px solid white;
            width: 330px;
            
        }
        
        .form_add_gig{
            font-size: 18px;
            color:darkgrey;
            margin: 10px 10px;
        }
        .add_gig_input{
            width: 310px;
            background: transparent;
            border: none;
            outline: none;
            border-bottom: 1px solid white;
            margin-bottom: 6px;
            color: #fff;
            font-size: 18px;
            display: inherit;
            padding: 3px 0px;
        }
        
         .image_preview{
            border: 1px solid darkgray;
            margin-bottom: 20px;
            float: center;
        }
        
        .add_gig_submit{
            color: white;
            font-size: 18px;
            display: inherit;
            background: transparent;
            width: 310px;
            border: 1px solid #fff;
            padding: 2px 4px;
            margin-top: 20px;
            cursor: pointer;
            transition: 0.5s ease;
            margin-bottom: 20px;
        }
        
        .add_gig_submit:hover{
            background-color: green;
            color: white;
        }
        
        .view_gig{
            margin-top: 40px;
            margin-left: 60px; 
            color: azure;
        }
        
        select option{
            background: black;
            font-size: 18px;
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
                                echo "Hey ".$_SESSION['sp_name'].", Let's setup your account";
                            ?>
                        </a>
                        <a class="infos" style="background-color:black; border:1px solid crimson" >Restaurant Account</a>
                        <a class="infos">
                            <?php
                                echo "id: ".$_SESSION['sp_id'];
                            ?>
                        </a>
                        <a class="infos">
                            <?php
                                echo "email: ".$_SESSION['sp_email'];
                            ?>
                        </a>
                        <a class="infos">
                            <?php
                                echo "mobile: ".$_SESSION['sp_phnno'];
                            ?>
                        </a>
                        <a class="infos">
                            <?php
                                echo "address: ".$_SESSION['sp_address'];
                            ?>
                        </a>
                        <a class="infos">
                            <?php
                                echo "point: ".$_SESSION['sp_point'];
                            ?>
                        </a>
                        <a class="infos">
                            <?php
                                echo "balance: ".$_SESSION['sp_balance']." tk";
                            ?>
                        </a>
                        <a class="manage_acc_button">Manage Acc.</a>
                        <a class="log_out_button" href="tourist_logout.php">Log out . .</a>
                        
                    </div>
                    
                    <div class = "add_gig">
                        <form class="form_add_gig" action="add_gig.php" enctype="multipart/form-data" method="post">
                            <a class="msg">Add new food package</a>
                            name:<input class="add_gig_input" type="text" name="_name" required autocomplete="off"/>
                            hour: <select class="add_gig_input" name="_hour" required>
                            <option value="breakfast">Breakfast</option>
                            <option value="lunch">Lunch</option>
                            <option value="dinner">Dinner</option>
                            <option value="snacks">Snacks</option>
                            </select>
                            price per head:<input class="add_gig_input" type="number" name="_price" required autocomplete="off"/>
                            image: <input class ="add_gig_input" accept="image/*" onchange="loadfile(event)" type="file" name="_image"/>
                            <div>
                                <img id="preimage" class="image_preview" width="200" height="100px"><br>
                            </div>
                            <script>
                                function loadfile(event){
                                    var output = document.getElementById('preimage');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                };
                                
                            </script>
                            description:<input class="add_gig_input" type="text" name="_description" required autocomplete="off"/>
                            <input class="add_gig_submit" type="submit" value="Add" />
                        </form>    
                    </div>
                    
                    
                    <div class = "view_gig">
                        <a class="msg_2">Food packages</a>
                            <ul>
                                <?php
                                    // Create connection
                                    $conn = new mysqli("localhost", "root", "", "tourism");
                                    // Check connection
                                    if ($conn->connect_error) 
                                        {
                                            die("Connection failed: " . $conn->connect_error);
                                        } 
                                    $sql = "SELECT food_id, food_name, food_price, food_description, food_image, food_hour FROM food_table WHERE food_sp_id='".$_SESSION['sp_id']."' ";
                                    $result = $conn->query($sql) or die("result error");
                                    $data[] = "";
                                    if(mysqli_num_rows($result) > 0 )
                                        {
                                            while($data = $result->fetch_assoc()){
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
                                                            
                                                            .remove_button{
                                                                color:white;
                                                                font-size:18px;
                                                                border:1px solid white;
                                                                padding:0px 4px;
                                                                cursor:pointer;
                                                                float:right;
                                                                text-decoration: none;
                                                                transition: 0.5s ease;
                                                            }
                                                            
                                                            .remove_button:hover{
                                                                background-color: crimson;
                                                                color: white;
                                                            }
                                                            
                                                            .gig_img{
                                                                margin-top: 5px;
                                                                margin-bottom: 10px;
                                                                border: 1px solid gray;
                                                                width : 150px;
                                                            }
                                                            
                                                    </style>
                                                        
                                                    <div class='gig'>
                                                        <div style='display:inline-block;'>
                                                            <div class='gig_img'>
                                                                <img width='150px' height='75px' src='.//gig_image/".$data['food_image']."'> 
                                                            </div>
                                                            <a class='gig_data'>name: ".$data['food_name']."</a><br>
                                                            <a class='gig_data'>hour: ".$data['food_hour']."</a><br>
                                                            <a class='gig_data'>price per head: ".$data['food_price']."</a><br><br>
                                                            <a class='gig_data'>description:</a><br>
                                                            <a class='gig_data'>".$data['food_description']."</a>
                                                            
                                                            
                                                        </div>
                                                        <style>
                                                            .remove_button:hover{
                                                                background-color: crimson;
                                                                color: white;
                                                                border: 1px solid red;
                                                            }
                                                        </style>
                                                        <a class='remove_button' href='remove_gig.php?food_id=".$data['food_id']."'>Remove</a>
                                                    </div> 
                                                    ";
                                            }
                                             
                                        }


                                    $conn->close();
                                    
                                ?>
                            </ul>
                    
                    </div>
                    
                    
                    <div class = "view_gig">
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
                                    $sql = "SELECT tourist_name, fb_id, fb_paid, fb_name, fb_quantity, fb_price, fb_done, fb_date, fb_hour, fb_tourist_id FROM food_booking_table, tourist_table WHERE fb_sp_id='".$_SESSION['sp_id']."' AND fb_tourist_id = tourist_id ";
                                    $result = $conn->query($sql) or die("result error");
                                    $data[] = "";
                                    if(mysqli_num_rows($result) > 0 )
                                        {
                                            while($data = $result->fetch_assoc()){
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
                                                            
                                                            .remove_button{
                                                                color:white;
                                                                font-size:18px;
                                                                border:1px solid white;
                                                                padding:0px 4px;
                                                                cursor:pointer;
                                                                float:right;
                                                                text-decoration: none;
                                                                text-align: center;
                                                                transition: 0.5s ease;
                                                            }
                                                            
                                                            .remove_button:hover{
                                                                background-color: crimson;
                                                                color: white;
                                                            }
                                                            
                                                            .gig_img{
                                                                margin-top: 5px;
                                                                margin-bottom: 10px;
                                                                border: 1px solid gray;
                                                                width : 150px;
                                                            }
                                                            
                                                    </style>
                                                        
                                                    <div class='gig'>
                                                        <div style='display:inline-block;'>
                                                    
                                                            <a class='gig_data'>booking no: ".$data['fb_id']."</a><br>
                                                            <a class='gig_data'>name: ".$data['fb_name']."</a><br>
                                                            <a class='gig_data'>quantity: ".$data['fb_quantity']."</a><br>
                                                            <a class='gig_data'>date: ".$data['fb_date']."</a><br>
                                                            <a class='gig_data'>hour: ".$data['fb_hour']."</a><br>
                                                            <a class='gig_data'>toursit_id: ".$data['fb_tourist_id']."</a><br>
                                                            <a class='gig_data'>tourist_name: ".$data['tourist_name']."</a><br>
                                                            <a class='gig_data'>price: ".$data['fb_price']."</a><br>
                                                            <a class='gig_data'>service provided: ".$data['fb_done']."</a><br>
                                                            <a class='gig_data'>payment recieved: ".$data['fb_paid']."</a><br>
                                                        </div>
                                                        <style>
                                                            .remove_button:hover{
                                                                background-color: crimson;
                                                                color: white;
                                                                border: 1px solid red;
                                                            }
                                                        </style>
                                                        <a class='remove_button' >Paid<br>offline</a>
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