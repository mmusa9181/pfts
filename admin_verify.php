<?php
session_start();
    include("connection.php");
    include("functions.php");
    $user_data = check_login_admin($con);
    $user = $user_data["phone"];
    $output ='';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        IF(!empty($_POST['phone'])){
            $phone =$_POST['phone'] ;
            $query = "SELECT * FROM users WHERE phone ='$phone' || email ='$phone' ";
            $query1 = "SELECT * FROM admin WHERE phone ='$phone' || email ='$phone' ";
            $result = mysqli_query($con,$query);
            $result1 = mysqli_query($con,$query1); 
            if($result && mysqli_num_rows($result)> 0 ){
                $personel_data = mysqli_fetch_assoc($result);
                $output = "THE ID ".$personel_data['phone']." BELONGS TO ".$personel_data['full_name'] . "\nWORKS IN ".$personel_data['department'];
            }else if($result1 && mysqli_num_rows($result1) > 0 || $result1 && mysqli_num_rows($result1) > 0){
                $personel_data = mysqli_fetch_assoc($result1);
                $output = "THE ID  ".$personel_data['phone']." IS AN ADMIN ACCOUNT  \nBELONGS TO ".$personel_data['full_name'] . "\nWORKS IN ".$personel_data['department'];
            
                
            }else{
                $output = "USER NOT REGISTERED";
        }
        }    
    }

  
   

    
    //$query = " SELECT * FROM personel_data WHERE phone = '$phone'";
    //$result = mysqli_query($con,$query);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER VERIFICATION PAGE</title>
    <script src="script.js" defer ></script>
    
    <style>
        
        body{
    text-align: center;
    background: url("bg.jpg");
    background-repeat: no-repeat;
    background-size: cover;
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
           
            
            <li><a href="http://localhost/phpmyadmin/index.php?route=/sql&db=personel_db&table=users&pos=0">MANAGE USERS</a></li>
            
            <li><a href="admin_reg.php">REGISTER FILE</a></li>
            <li><a href="admin_movement.php">MOVE FILE</a></li><br>
            <li> <a href="admin_page.php">TRACK FILE</a>
            </li>
            <p> logged in as <?php echo $user; ?></p>
            <a id="a" href="logout.php">LOG OUT</a>
        </ul>
    </nav> 

</div>
<div class="button">

    <form method="post">
        <input type="text" name="phone" placeholder="INPUT PERSONEL ID ">
        <input type="submit" value="VERIFY">
    </form>
    
   

</div>
<div class="txtarea" id="txt">
    <textarea name="" id="output" cols="40" rows="20"  readonly><?php 
      
    echo $output;
    
    ?></textarea><br>
    <input type="button" id="submit" value="PRINT" onclick="prin()">

</div>
<input type="button" id="cbt" value="CANCEL" onclick="conf()"><br>
        <p id="confirm" ></p>

        <script>
        var count =1;
        var button= document.getElementById("cbt");
        button.addEventListener("click", function (){
        count++;
    
        
        })
        var count1 =1;
        var button= document.getElementById("mbt");
        button.addEventListener("click", function (){
        count++;
    
        
        })
        var phone ;
        var pname ;
        var user;
        function p(){
             phone = document.getElementById('phone').value;
             pname = document.getElementById("pname").value;
            

        }
        
       

        
        function conf(){
            if(count <=1){
                document.getElementById("confirm").innerHTML += '<br> ARE YOU SURE YOU WANT T0 CANCEL <br><input type="button" id="ybt" value="YES" onclick="yes()">  <input type="button" id="ybt" value="NO" onclick="no()">';
            
                
            }
            
        }
        function no(){
            document.getElementById("confirm").innerHTML ='';
            count=1;
        }
        function yes(){
        window.location.replace("admin_page.php");

        }
        function reg(){
            if(count1<=1){
                
                document.getElementById("register").innerHTML = '<p>CHECK THE BOX TO CONFIRM FILE REGISTRATION OF ' + '<em id="user">' +phone + ' with name: ' +pname +  '</em></p>' ;
            }

        }

    
        </script>

</body>
</html>