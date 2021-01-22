<html>

    <head>
        <title>Website title</title>
            
    </head>
    
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family:monospace;
            font-size: 25px;
            }

        header{
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(.//images/pubg_crate.jpg);
            height: 100vh;
            background-size: cover;
            background-position: center;
            }

         .otherPagesButton{
            float: right;
            margin-top: 20px;
            margin-right: 35px;
            }
        
        .otherPagesButton form{
            display: inline-block;

            }

        .opb_button{
            background-color: transparent;
            border: 1px solid #fff;
            color: white;
            padding: 5px 20px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            }


        opb_button:hover{
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
    </style>
     
    <body>
        <header>
            <div class="main">
                
                <div class="logo">
                    <img src=".//images/logo.png">
                </div>
                
                <div class="otherPagesButton">
                    
                    <ul>
                        <a class="opb_button" href="mainpage.php">Home</a>
                        <a class="opb_button" href="#">About</a>
                        <a class="opb_button" href="#">Contact</a>
                        <a class="opb_button" href="mainpage.php">Tourist</a>
                    </ul>
                    
                </div>
            
            
                
            </div>
        </header>
    </body>
    
    

</html>