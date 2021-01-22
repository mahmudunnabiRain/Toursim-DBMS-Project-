
<?php

session_start();
if(!empty($_SESSION['tourist_email']))
    {
        header("Location:tourist_logged_in.php");
        die();
    }

if(!empty($_SESSION['sp_email']))
    {
        header("Location:service_provider_logged_in.php");
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
            background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url(.//images/bagpack.jpg);
            height: 100vh;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            }
        
        
        .logo_and_tourist_login{
            float: left;
        }
        
        .logo img{
            
            width: 200px;
            height: 50px;
            margin-top: 25px;
            margin-left: 40px;
            }
        
        .tourist_login{  
            margin-top: 110px;
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
                
        
        .tourist_login_inputs{
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
        
        .tourist_login_submit{
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
        
        .tourist_login_submit:hover{
            background-color: green;
            color: white;
        }
              
        .sign_in_button{
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
        
        .sign_in_button:hover{
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
            color: limegreen;
            text-align: center;
        }
        
    </style>
    
    
    
     
    <body>
        <header>
            <div class="main">
                
                <div class="logo_and_tourist_login">
                    
                    <div class="logo">
                        <img src=".//images/logo.png">
                    </div>
                    
                    <div class="tourist_login">
                        <form action = "tourist_login_check.php" method="post" class="form_login">
                            <p class="enter_email_pass">Enter your email and password<br>to log in to your tourist account</p>
                            email: <input class ="tourist_login_inputs" autocomplete="off" type="email" name="_email" required/>
                            password:<input class ="tourist_login_inputs" type="password" name="_password" required/>
                            <input class ="tourist_login_submit" type="submit" value="Log In"/>
                        </form>
                        <a class="sign_in_button" href="tourist_sign_in.php">Don't have an account? Sign In</a>
                        
                        
                        <p class="error">
                            <?php
                                if(!empty($_SESSION['error']) && $_SESSION['error'] == "wrong_input")
                                    {
                                        echo 'wrong email or password entered';
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


