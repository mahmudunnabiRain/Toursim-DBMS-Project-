<?php
    session_start();

    if(!empty($_SESSION['tourist_email']))
    {
        header("Location:tourist_logged_in.php");
        die();
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
            background-image: linear-gradient(rgba(0,0,0,1),rgba(0,0,0,0.8)),url(.//images/pubg_crate.jpg);
            height: 170vh;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            }
        
        
        .logo_and_tourist_signin{
            float: left;
        }
        
        .logo img{
            
            width: 200px;
            height: 50px;
            margin-top: 25px;
            margin-left: 40px;
            }
        
        .tourist_signin{  
            margin-top: 100px;
            margin-left: 60px;
            border: 1px solid white;
            
            
        }
        
        .form_signin{
            font-size: 22px;
            color:darkgrey;
            margin: 10px 10px;
        }
        
        .fill_info{
            font-size: 22px;
            margin-bottom: 20px;
            color: navajowhite;
            
            
        }
                
        
        .tourist_signin_inputs{
            width: 400px;
            background: transparent;
            border: none;
            outline: none;
            border-bottom: 1px solid white;
            margin-bottom: 12px;
            color: #fff;
            font-size: 22px;
            display: inherit;
            padding: 3px 0px;
        }
        
          .image_preview{
            border: 1px solid darkgray;
            margin-bottom: 00px;
            float: center;
        }
        
        .tourist_signin_submit{
            color: white;
            font-size: 22px;
            display: inherit;
            background: transparent;
            width: 400px;
            border: 1px solid #fff;
            padding: 4px 20px;
            margin-top: 20px;
            cursor: pointer;
            transition: 0.5s ease;
        }
        
        .tourist_signin_submit:hover{
            background-color: green;
            color: white;
        }
        
        .already_have_acc{
            margin-bottom: 10px;
            color: navajowhite;
            font-size: 20px; 
            cursor: pointer;
            padding: 4px 32px;
        }
        
        
        .log_in_button{
            color: white;
            font-size: 18px;
            display: inherit;
            background: transparent;
            width: 390px;
            border: 1px solid #fff;
            padding: 4px;
            margin-top: 20px;
            cursor: pointer;
            transition: 0.5s ease;
            text-decoration: none;
            text-align: center;
            margin-left: 10px;
        }
        
        .log_in_button:hover{
            background-color: crimson;
            color: white;
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
        
        
        .error{
            margin-top: 10px;
            font-size: 22px;
            color: red;
            text-align: center;
        }
        

        

        
    </style>
    
    
    
     
    <body>
        <header>
            <div class="main">
                
                <div class="logo_and_tourist_signin">
                    
                    <div class="logo">
                        <img src=".//images/logo.png" >
                    </div>
                    
                    <div class="tourist_signin">
                        <form action = "tourist_signin_check.php" method="post" enctype="multipart/form-data" class="form_signin">
                            <p class="fill_info">Fill your informations to sign in</p>
                            name: <input class ="tourist_signin_inputs" type="text" autocomplete="off" name="_name"/>
                            email: <input class ="tourist_signin_inputs" autocomplete="off" type="email" name="_email" required/>
                            mobile: <input class ="tourist_signin_inputs" type="number" name="_phnno"/>
                            image: <input class ="tourist_signin_inputs" accept="image/*" onchange="loadfile(event)" type="file" name="_image"/>
                            <img id="preimage" class="image_preview" width="310px" height="150px"><br>
                            <script>
                                function loadfile(event){
                                    var output = document.getElementById('preimage');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                };
                                
                            </script>
                            address: <input class ="tourist_signin_inputs" type="text" autocomplete="off" name="_address"/>
                            password:<input class ="tourist_signin_inputs" type="password" name="_password" required/>
                            retype password:<input class ="tourist_signin_inputs" type="password" name="_retyped_password"/>
                            <input class ="tourist_signin_submit" type="submit" value="Sign In"/>
                        </form>
                        <a class="log_in_button" href="mainpage.php">Already have an account? Log In</a>
                        
                        
                        <p class="error">
                            <?php
                                if(!empty($_SESSION['error']) && $_SESSION['error'] == "data_already_exist")
                                    {
                                        echo 'this email is already registered';
                                        $_SESSION['error']="";
                                    }
                                
                                if(!empty($_SESSION['error']) && $_SESSION['error'] == "password_unmatched")
                                    {
                                        echo 'passwords dont match';
                                        $_SESSION['error']="";
                                    }
                            
                                if(!empty($_SESSION['error']) && $_SESSION['error'] == "invalid_image")
                                    {
                                        echo 'please select a valid image';
                                        $_SESSION['error']="";
                                    }
                            ?>
                        </p>
                        
                        
                    </div>     
                    
                </div>
                
                 
                
            <div class="other_pages_button">           
                <ul>
                    <a class="opb_button" href="mainpage.php">Home</a>
                    <a class="opb_button" href="#">About</a>
                    <a class="opb_button" href="#">Contact</a>
                    <a class="opb_button" href="mainpage.php">Tourist</a>
                    <a class="opb_button" href="service_provider_login.php">Services</a>
                </ul>
            </div>
        
                
            </div>
        </header>
    </body>
    
    

</html>