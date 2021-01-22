<?php

session_start();

if(empty($_SESSION['tourist_email']))
    {
        header("Location:mainpage.php");
        die("not logged in");
    }


$result_index = 0;
if(isset($_POST['_area']))
    {
        $conn = new mysqli("localhost", "root", "", "tourism");
        // Check connection
        if ($conn->connect_error) 
            {
              die("Connection failed: " . $conn->connect_error);
            } 
        if($_POST['_sort_by'] == 'point')
            {
                $sql = "SELECT tg_id, tg_place, tg_price, tg_image, tg_description, sp_id, sp_name, sp_point FROM tourguide_table, sp_table WHERE tourguide_table.tg_sp_id=sp_table.sp_id AND tourguide_table.tg_place='".$_POST['_area']."' ORDER BY sp_point DESC";
            }
    
        if($_POST['_sort_by'] == 'price')
            {
                $sql = "SELECT tg_id, tg_place, tg_price, tg_image, tg_description, sp_id, sp_name, sp_point FROM tourguide_table, sp_table WHERE tourguide_table.tg_sp_id=sp_table.sp_id AND tourguide_table.tg_place='".$_POST['_area']."' ORDER BY tg_price DESC";
            }
        $result = $conn->query($sql) or die("result error");
        $data[] = "";
        $alldata[] = array();
        $result_index = 0;
        if(mysqli_num_rows($result) > 0 )
            {
                while($data = $result->fetch_assoc())
                {
                    $alldata[$result_index] = $data;
                    $result_index++;
                }
                    
            }
        $conn->close();
    }

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
        
        .search{
            margin-top: 140px;
            margin-left: 60px; 
            color: white;
            border: 1px solid white;
            width: 420px;
            
        }
        
        .search_form{
            margin: 10px 10px;
        }
        
        .search_input{
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
        
        
        select option{
            background: black;
            font-size: 20px;
        }
        
        .search_button{
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
        
        .search_button:hover{
            background-color: green;
            color: white;
        }
        
        .search_results{
            margin-top: 50px;
            margin-left: 60px; 
            color: azure;
        }
        
        .booking_form{
            margin-top:30px;
            margin-bottom:10px;
            float: right;
         }
        


   
        
     
       
        

        
        
        
    </style>
     
    <body>
        <header>
            <div class="main">
                
                <div class="logo_and_features">
                    <div class="logo">
                        <img src=".//images/logo.png">
                    </div>
                    
                    <div class="search">
                        <form class="search_form" method="post" action="tourguide_list.php">
                            <input class="search_input" type="text" name="_area" placeholder="enter an area or tourist spot name" required autocomplete="off"/>
                            <select class="search_input" name="_sort_by" required>
                            <option value="point">sort by point</option>
                            <option value="price">sort by price</option>
                            </select>
                            <input class="search_button" type="submit" value="search"/>
                        </form>   
                    </div>
                    
                    <div class="search_results">
                        <a class="msg">Search results</a>
                        <?php
                        
                            for($x = 0 ; $x < $result_index ; $x++)
                                {
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
                                                            
                                                            .select_button{
                                                                color:white;
                                                                font-size:18px;
                                                                border:1px solid white;
                                                                padding:0px 4px;
                                                                cursor:pointer;
                                                                float:right;
                                                                text-decoration: none;
                                                                transition: 0.5s ease;
                                                            }
                                                            
                                                            .select_button:hover{
                                                                background-color: forestgreen;
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
                                                                <img width='150px' height='75px' src='.//gig_image/".$alldata[$x]['tg_image']."'> 
                                                            </div>
                                                            <a class='gig_data'>tourguide name: ".$alldata[$x]['sp_name']."</a><br>
                                                            <a class='gig_data'>place: ".$alldata[$x]['tg_place']."</a><br>
                                                            <a class='gig_data'>price per day: ".$alldata[$x]['tg_price']."</a><br>
                                                            <a class='gig_data'>description:</a><br> 
                                                            <a class='gig_data'>".$alldata[$x]['tg_description']."</a>
                                                        </div>
 
                                                        <style>
                                                            .remove_button:hover{
                                                                background-color: crimson;
                                                                color: white;
                                                            }
                                                        </style>
                                                        <a class='select_button' href='tourguide_selected.php?tg_id=".$alldata[$x]['tg_id']."'>select</a>
                                                    </div >
                                                    
                                                    ";
                                }
                        ?>
                        
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







