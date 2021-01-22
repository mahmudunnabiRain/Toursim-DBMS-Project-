<?php

session_start();
if(!empty($_SESSION['sp_email']))
    {
        header("Location:service_provider_logged_in.php");
        die();
    }

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
            background-image: linear-gradient(rgba(0,0,0,1),rgba(0,0,0,0.8)),url(.//images/bagpack.jpg);
            height: 130vh;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            }
        
        
        .logo_and_sp_login{
            float: left;
        }
        
        .logo img{
            width: 200px;
            height: 50px;
            margin-top: 25px;
            margin-left: 40px;
            }
        
        .sp_login{  
            margin-top: 140px;
            margin-left: 60px;
            border: 1px solid white;
            
            
        }
        
        .form_login{
            font-size: 22px;
            color:darkgrey;
            margin: 10px 10px;
        }
        
        .enter_email_pass{
            font-size: 22px;
            margin-bottom: 20px;
            color: navajowhite;
        }
                
        
        .sp_login_inputs{
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
        
        .sp_login_submit{
            color: white;
            font-size: 22px;
            display: inherit;
            background: transparent;
            width: 400px;
            border: 1px solid #fff;
            padding: 4px;
            margin-top: 20px;
            cursor: pointer;
            transition: 0.5s ease;
            margin-bottom: 20px;
        }
        
        .sp_login_submit:hover{
            background-color: green;
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
        
        .sp_signin{
            float: right;
            margin-top: 100px;
            margin-right: 100px;
            color:darkgrey;
            font-size: 22px;
            border: 1px solid white;
        }
        
        .form_signin{
            margin: 10px 10px;   
        }
        
        .enter_info{
            font-size: 22px;
            margin-bottom: 20px;
            color: navajowhite;
        }
        
        .sp_signin_inputs{
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
        
        select option{
            background: black;
            font-size: 20px;
        }
        
        .sp_signin_submit{
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
        
        .sp_signin_submit:hover{
            background-color: green;
            color: white;
        }
        
        .error{
            margin-top: 10px;
            font-size: 22px;
            color: limegreen;
            text-align: center;
        }
        
        .join_sp{
            margin-top: 40px;
            float: left;
            color: white;
        }
        
  
        
    </style>
    
    
    
     
    <body>
        <header>
            <div class="main">
                
                <div class="logo_and_sp_login">
                    
                    <div class="logo">
                        <img src=".//images/logo.png">
                    </div>
                    
                    <div class="sp_login" >
                        <form action = "service_provider_login_check.php" method="post" class="form_login">
                            <p class="enter_email_pass">Enter your email and password<br>to log in to your service provider<br>account</p>
                            email: <input class ="sp_login_inputs" type="email" autocomplete="off" name="_email" required/>
                            password:<input class ="sp_login_inputs" type="password" name="_password" required/>
                            <input class ="sp_login_submit" type="submit" value="Log In"/>
                        </form> 
                        
                        <p class="error">
                            <?php
                                if(!empty($_SESSION['login_error']) && $_SESSION['login_error'] == "wrong_input")
                                    {
                                        echo 'wrong email or password entered';
                                        $_SESSION['login_error']="";
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
                
                <h2 class="join_sp">Join our service provider community</h2>
                 
                <div class="sp_signin">
                        <form action = "service_provider_signin_check.php" method="post" class="form_signin">
                        <p class="enter_info">Enter you info to sign in</p>
                        name/company: <input class ="sp_signin_inputs" type="text" autocomplete="off" name="_name" required/>
                        email: <input class ="sp_signin_inputs" type="email" autocomplete="off" name="_email" required/>
                        mobile: <input class ="sp_signin_inputs" type="number" name="_phnno"/>
                            service type: <select class="sp_signin_inputs" name="_service_type" required>
                            <option value="tourguide">tourguide</option>
                            <option value="food">hotel and restaurant</option>
                            <option value="hotel">residesntial hotel</option>
                            <option value="transport">transport</option>
                            <option value="others">others</option>
                            </select>    
                        address: <input class ="sp_signin_inputs" type="text" autocomplete="off" name="_address" required/>
                        password:<input class ="sp_signin_inputs" type="password" name="_password" required/>
                        retype password:<input class ="sp_signin_inputs" type="password" name="_retyped_password" required/>
                        <input class ="sp_signin_submit" type="submit" value="Sign In"/>
                    </form>
                    <p class="error">
                            <?php
                                if(!empty($_SESSION['signin_error']) && $_SESSION['signin_error'] == "data_already_exist")
                                    {
                                        echo 'this email is already registered';
                                        $_SESSION['signin_error']="";
                                    }
                                
                                if(!empty($_SESSION['signin_error']) && $_SESSION['signin_error'] == "password_unmatched")
                                    {
                                        echo 'passwords dont match';
                                        $_SESSION['signin_error']="";
                                    }
                            ?>
                        </p>
                </div>
                
                     
                
  
            </div>
        </header>
    </body>
    
    

</html>