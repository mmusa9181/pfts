<?php
session_start();
    include("connection.php");
    include("functions.php");
$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FILE MOVEMENT</title>
    <style>
        body{
    text-align: center;
            background: url("bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
}

form{
    background-color: rgba(44, 62, 80, 0.5);
    border: 1px solid;
    border-color: rgba(440, 620, 80, 0.5);
    width: 350px;
    height: auto;
    margin: auto;
    text-align: center;
    padding: 20px;
    margin-top: auto ;
    box-shadow: 5px 5px 25px black ;
    color:  rgb(212, 226, 15);
    border-radius: 10px;

}
input,select{
    background-color: rgb(69, 182, 69);
    border: 1px solid;
    
    border-color:transparent;
    margin: auto;
    
    padding: 10px;
    outline: none;
    color:  rgb(234, 234, 236);
    border-radius: 10px;
}
#pid{
    color: darkslategray;
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
#cbt,#mbt{
    width: 320px;
    background-color:  rgb(69, 182, 69);
    color: white;
    cursor: pointer;
    border-radius: 10px;
 
   
}
#cbt:hover{
    background-color: whitesmoke;
    color:rgb(69, 182, 69) ;
}
#mbt:hover{
    background-color: whitesmoke;
    color:rgb(69, 182, 69) ;

}
#ybt:hover{
    background-color:  rgb(69, 182, 69);
    color: white;
}
#ybt {
    cursor: pointer;
}
p{
    font-size: small;
    color:rgb(111, 206, 17);
}
a{
    color: rgb(111, 206, 17) ;
    text-decoration: none ;
    
}
::placeholder{
    color: rgb(143, 137, 137);
    font-size: 25;
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
    <script>
    
        var user;
        function prin(){
        
            
            user =document.getElementById("pid").value;
            document.getElementById("user").innerHTML = user +" File";

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
        window.location.replace("index.php")
    }
    </script>
    <div class="form">
        <form method="post">
        <h3>FILE MOVEMENT</h3>
        <?php

    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $pid =$_POST['pid'];
        $query = "SELECT * FROM personel_data WHERE pid = '$pid'";
        $result = mysqli_query($con,$query);
        $dom = $_POST['dom'];
        if(!empty($pid) && ($dom)){
            if($result && mysqli_num_rows($result)> 0){

                $personel_data = mysqli_fetch_assoc($result);
                if($personel_data['pid']== $pid){
            
                    $new_office = $_POST['new_office'];
                    $old_office = $_POST['old_office'];
                    $file_location = $_POST['new_office'];
                   
                    $entry_by = $user_data['phone'];
                    $update_query = "UPDATE personel_data SET new_office ='$new_office', old_office ='$old_office', entry_by ='$entry_by', dom ='$dom' WHERE pid ='$pid'";
                    
                    mysqli_query($con, $update_query);
                    echo"FILE MOVED SUCCESSFULLY";
                }
                }elseif($result && mysqli_num_rows($result)<=0){
                    echo" ERROR: FILE NOT FOUND";
            }
                

    }  

    }





?>

       
        <input class="text" type="text" value="" name="pid" id="pid" placeholder="PERSONEL'S ID"  required onmouseout="prin()"><br><br>
       
        
        <label for="DOB" >DATE OF MOVEMENT</label>
        <input type="date" id="dom" name="dom" required ><br><br>
        <label for="old_office">MOVING FROM :</label>
        <select  name="old_office" id="position"  required>
            <option value="REGISTRY">REGISTRY</option>
            <option value="PERSONEL">PERSONEL</option>
            <option value="ADMIN">ADMIN</option>
            <option value="LOGISTIC">LOGISTIC</option>
            <option value="ICT">ICT</option>
            <option value="LEGAL">LEGAL</option>
            <option value="OPERATINS">OPERATIONS</option>
            <option value="SECRET REGISTRY">SECRET REGISTRY</option>
            <option value="REC">REC</option>
            
        </select><br><br>
        <label for="new_office">MOVING TO   :   </label>
        <select  name="new_office" id="position" required>
            <option value="PERSONEL">PERSONEL</option>
            <option value="REGISTRY">REGISTRY</option>
            <option value="ADMIN">ADMIN</option>
            <option value="LOGISTIC">LOGISTIC</option>
            <option value="ICT">ICT</option>
            <option value="LEGAL">LEGAL</option>
            <option value="OPERATIONS">OPERATIONS</option>
            <option value="SECRET REGISTRY">SECRET REGISTRY</option>
            <option value="REC">REC</option>
        
            
        </select><br><br>
        
        <p>CHECK THE BOX TO CONFIRM MOVEMENT OF <em id="user"></em></p>
         <input type="checkbox" required> <br> <br> 
        <input type="submit" id="mbt" value="MOVE FILE"><br><br>
        <input type="button" id="cbt" value="CANCEL" onclick="conf()"><br>
        <p id="confirm" ></p>

        <script>
            var count =1;
        var button= document.getElementById("cbt");
        button.addEventListener("click", function (){
        count++;
    
    
})
        </script>


        </form>
    </div>
</body>
</html>