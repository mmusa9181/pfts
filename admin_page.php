<?php
session_start();
    include("connection.php");
    include("functions.php");
    $user_data = check_login_admin($con);
    $user = $user_data["phone"];
    $output ='';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        IF(!empty($_POST['pid'])){
            $pid =$_POST['pid'] ;
            $query = "SELECT * FROM personel_data WHERE pid ='$pid' ";
            $result = mysqli_query($con,$query);
            if($result && mysqli_num_rows($result)> 0){
                $personel_data = mysqli_fetch_assoc($result);
                $output = "THE ID ".$personel_data['pid']." BELONGS TO ".$personel_data['pname'] . "\nWORKS IN ".$personel_data['personel_office']. "\nTHE FILE IS CURRENLY IN ".$personel_data['new_office']. " OFFICE\nMOVED ON ".$personel_data['dom']."\nLOGGED IN BY ".$personel_data['entry_by']. " ON ".$personel_data['date_of_entry']."\nFORMER FILE LOCATION IS : ".$personel_data['old_office']." OFIICE";
            }else{
                $output = "ID NOT REGISTERED";
            }
        }    
    }

  
   

    
    //$query = " SELECT * FROM personel_data WHERE pid = '$pid'";
    //$result = mysqli_query($con,$query);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN TRACKING PAGE</title>
    <script src="script.js" defer ></script>
    
    <style>
        
        body{
    text-align: center;
    background: url("bg.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}
h5{
    color: aquamarine;
}
li, h1{
    list-style: none;
    display: inline-block;
    box-shadow: 2px 2px 25px black ;
    margin-right: 10px;
    border-radius: 10px;
    
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
    color: rgb(149, 189, 29);
    border-radius: 10px;
    box-shadow: 5px 5px 25px black ;
}
textarea{
    background-color: rgb(234, 234, 236);
    border: 1px solid;
    margin-top: 10px;
    border-color:transparent;
    
    
    padding: 10px;
    outline: none;
    color: rgb(149, 189, 29);
    border-radius: 10px;
    box-shadow: 5px 5px 25px black ;
}
.text{
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
#track, input{
    margin-top: 10px;
    border:1px solid;
    border-radius: 15px;
    background-color: rgb(149, 189, 29);
    color: rgb(212, 226, 15);
    cursor: pointer;
    background-color: rgba(44, 62, 80, 0.5);
    padding: 20px;
    box-shadow: 5px 5px 25px black ;
 
   
}
#bt:hover{
    background-color: whitesmoke;
    color:rgb(149, 189, 29) ;
}
p{
    font-size: small;
    color:rgb(143, 137, 137) ;
    margin-bottom: -5px;
    margin-top: 15px;
}
a{
    color: rgb(111, 206, 17) ;
    text-decoration: none ;
    margin-right: 5px;
    border-radius: 5px;
}
#a{
    margin-right: 0px;
    font-size: x-small;
    margin-top:0px;
}
::placeholder{
    color: rgb(143, 137, 137);
    font-size: 25;
}
h6{
    margin-top: -20px;
    border-radius: 10px;
    box-shadow: 5px 5px 25px black ;
    width: 100px;
    
}
/* margin-top: 50px;
    border:1px solid;
    border-radius: 30%;
    color: rgb(192, 146, 21);
    padding: 20px;
    */
    
    </style>
        
  
</head>

<body>
    
   
    <div class="head">
    <h1>PERSONEL FILE TRACKING SYSTEM</h1>
    <h6>ADMIN PAGE</h6> 
    <nav>
        <ul>
           
            <li><a href="user_registration.php">REGISTER USER</a></li>
            <li><a href="http://localhost/phpmyadmin/index.php?route=/sql&db=personel_db&table=users&pos=0">MANAGE USERS</a></li>
            <li><a href="admin_verify.php" >VERIFY ID</a></li><br><br>
            <li><a href="admin_reg.php">REGISTER FILE</a></li>
            <li><a href="admin_movement.php">MOVE FILE</a></li><br>
            <p> logged in as <?php echo $user; ?></p>
            <a id="a" href="logout.php">LOG OUT</a>
        </ul>
    </nav> 

</div>
<div class="button">


    <form method="post">
        <input type="text" name="pid" placeholder="INPUT PERSONEL ID ">
        <input type="submit" value="TRACK">
    </form>
    
   

</div>

<div class="txtarea" id="txt">
    <textarea name="" id="output" cols="40" rows="20"  readonly><?php 
      
    echo $output;
    
    ?></textarea><br>
    <input type="button" id="submit" value="PRINT" onclick="prin()">

</div>

</body>
</html>