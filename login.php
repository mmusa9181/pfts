<?php
session_start();
    include("connection.php");
    include("functions.php");
    $invalid = '';
    if($_SERVER['REQUEST_METHOD']== 'POST'){
       
        $phone = $_POST['login'];
        
        $password = $_POST['password'];
        
        if(!empty($phone) && !empty($password)){
            $query = "SELECT * FROM users where phone = '$phone' || email= '$phone' limit 1" ;
            $result = mysqli_query($con, $query);
            if($result){
                if($result && mysqli_num_rows($result)>0){
                    $user_data= mysqli_fetch_assoc($result);

                    if($user_data['password']==$password){
                        $_SESSION['phone'] = $user_data['phone'];
                        header("Location: index.php");
                        die;
                    }else{
                        $invalid ="ERROR: INVALID PASSWORD";
                    }
                }else{
                    $invalid ="ERROR: INVALID USER";
                } 
            }
            
        }    
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        body{
            
            text-align: center;
            background: url("bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            color:rgb(69, 182, 69);
        }
     .head{
        background-color: rgba(44, 62, 80, 0.5);
        border: 1px solid;
        border-color: rgba(440, 620, 80, 0.5);
        width: auto;
        height: auto;
        margin: auto;
        text-align: center;
        padding: 10px;
    
        box-shadow: 1px 1px 25px  ;
        color: rgb(69, 182, 69);
        border-radius: 10px;
        box-shadow: 5px 5px 25px black ;
     }
        form{
            background-color: rgba(44, 62, 80, 0.5);
            border: 1px solid;
            border-color: rgba(440, 620, 80, 0.5);
            width: 300px auto;
            height: auto;
            margin: auto;
            text-align: center;
            padding: 20px;
            margin-top: 10% ;
            border-radius: 10px;
            box-shadow: 5px 5px 25px black ;
          
        }
        input{
            background-color: rgb(234, 234, 236);
            border: 1px solid;
            width: 300px;
            border-color:transparent;
            margin: auto;
            margin-top: 15px;
            padding: 10px;
            outline: none;
            border-radius: 10px;
        }
        #bt{
            width: 320px;
            background-color: rgb(69, 182, 69);
            color: white;
            cursor: pointer;
            border-radius: 10px;
         
           
        }
        #bt:hover{
            background-color: whitesmoke;
            color:rgb(69, 182, 69);
        }
        p{
            font-size: small;
            color:rgb(143, 137, 137) ;
        }
        a{
            color: rgb(111, 206, 17) ;
            text-decoration: none ;
        }
        ::placeholder{
            color: rgb(143, 137, 137);
            font-size: 25;
        }
        
    </style>
</head>
<body>
    <div class="head">
        <h3>PERSONEL FILES TRACKING SYSTEM</h3>
    </div>
  <div class="form">
    <form method="post">
        <P>
        <?php

        echo"$invalid";


?>
        </P>
        <input type="text" placeholder="phone nuber or email" name="login" required><br>
        <input type="password" placeholder="password" name="password" required><br>
        <input type="submit" id="bt" value="LOGIN">
        <p>Refer to H.O.D ICT for account creation </p>
        <p><a href="admin_page.php">ADMIN</a></p>
    </form>
  </div>  
</body>
</html>