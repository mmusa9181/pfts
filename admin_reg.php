<?php
session_start();
    include("connection.php");
    include("functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FILE REGISTRATION</title>
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
#pid, #pname{
    color:darkslategray ;
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
        
        var pid ;
        var pname ;
        var user;
        function p(){
             pid = document.getElementById('pid').value;
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
                
                document.getElementById("register").innerHTML = '<p>CHECK THE BOX TO CONFIRM FILE REGISTRATION OF ' + '<em id="user">' +pid + ' with name: ' +pname +  '</em></p>' ;
            }

        }

    
    </script>
    <div class="form ">
        <form method="post">
        <h3>FILE REGISTRATION</h3>
        <?php
        
            $user_data = check_login_admin($con);
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $pid =$_POST['pid'];
                
                $pname = $_POST['pname'];
                $personel_office = $_POST['personel_office'];
                $new_office = $_POST['new_office'];
                $old_office = $_POST['new_office'];
                $file_location = $_POST['new_office'];
                $dom = $_POST['dom'];
                $entry_by = $user_data['phone'];
                if(!empty($pid) && !empty($pname) && !empty($personel_office) && !empty($new_office)){
                    $query = "INSERT INTO personel_data(pid, pname,personel_office,old_office, new_office, file_location, dom,entry_by)   VALUES('$pid','$pname','$personel_office','$new_office','$new_office','$new_office','$dom','$entry_by')";
                    mysqli_query($con, $query);
                    echo"FILE SUCCESSFULLY REGISTERED";

    }

}
    

?>

       
        <input class="text" type="text" name="pid" id="pid" placeholder="PERSONEL'S ID"  required onmouseout="p()" ><br>
        <input class="text" type="text" name="pname" id="pname" placeholder="PERSONEL FULL NAME" onmouseout="p(),reg()" ><br>
        <label for="personel_office">SERVING OFFICE:</label><br>
        <select  name="personel_office" id="position" required>
            <option value="REGISTRY">REGISTRY </option>
            <option value="PERSONEL">PERSONEL </option>
            <option value="ADMIN">ADMIN </option>
            <option value="LOGISTIC">LOGISTIC </option>
            <option value="ICT">ICT </option>
            <option value="LEGAL">LEGAL </option>
            <option value="OPERATIONS">OPERATIONS </option>
            <option value="SECRET REGISTRY">SECRET REGISTRY </option>
            <option value="REC">REC</option>
        
            
        </select><br><br>
        
        
       
        <label for="OFFICE">REGISTER FILE TO:</label><br>
        <select  name="new_office" id="position" required>
            <option value="REGISTRY">REGISTRY </option>
            <option value="PERSONEL">PERSONEL </option>
            <option value="ADMIN">ADMIN </option>
            <option value="LOGISTIC">LOGISTIC </option>
            <option value="ICT">ICT </option>
            <option value="LEGAL">LEGAL </option>
            <option value="OPERATIONS">OPERATIONS </option>
            <option value="SECRET REGISTRY">SECRET REGISTRY </option>
            <option value="REC">REC</option>
        
            
        </select><br><br>
        <label for="dom" >DATE OF FILE REGISTRATION</label>
        <input type="date" id="DOB" name="dom" required ><br><br>
        
       
        
        <p id="register"></p><br>
        <input id="chk" type="checkbox" required> <br> <br> 
        <input type="submit" id="mbt" value="REGISTER FILE" onclick="p(),reg()"><br><br>
        
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
        </script>


        </form>
    </div>
</body>
</html>