<?php
session_start();
    include("connection.php");
    include("functions.php");
    $user_data = check_login_admin($con);
   
    


    if($_SERVER['REQUEST_METHOD']== 'POST'){
        $full_name = $_POST['full_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $department = $_POST['department'];
        
        if(!empty($full_name) && !empty($phone) && !empty($email) && !empty($password)){
            $query = "INSERT INTO users(full_name,phone,email,department,password) values('$full_name','$phone','$email','$department','$password')";
            mysqli_query($con, $query);
            header("Location: admin_page.php");
            die;
        }    
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER REGISTRATION</title>
    
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
select{
    background-color:  rgb(69, 182, 69);
    border: 1px solid;
    
    border-color:transparent;
    margin: auto;
    
    padding: 10px;
    outline: none;
    color:  rgb(234, 234, 236);
    border-radius: 10px;
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
#bt{
    width: 320px;
    height: 50px;
    background-color:  rgb(69, 182, 69);
    color: white;
    cursor: pointer;
    border-radius: 10px;

 
   
}
#bt:hover{
    background-color: whitesmoke;
    color:rgb(69, 182, 69) ;
}
p{
    font-size: small;
    color:black ;
}
a{
    color: rgb(111, 206, 17) ;
    text-decoration: none ;
    
}
::placeholder{
    color: rgb(143, 137, 137);
    font-size: 25;
}
input{
    color: rgb(52, 49, 49);
}
/* margin-top: 50px;
    border:1px solid;
    border-radius: 30%;
    color: rgb(192, 146, 21);
    padding: 20px;
    */
    
    </style>
    <script type="text/javascript">
        const fName = document.getElementById("firstName");
        document.write(fName.DOCUMENT_TYPE_NODE);
    
    </script>
</head>
<body>
    <div class="form" aria-autocomplete="none" >
        <form method="post">
        <h3>REGISTRATION PAGE</h3>
       
        <input class="text" type="text" value="" name="full_name" placeholder="FULL NAME" required><br>
       
        <input class="text" type="text" name="phone" placeholder="PONE NUMBER" ><br>
        
        
        <input class="text" type="email" name="email" placeholder="EMAIL"><br><br>
        <label for="department">DEPARTMENT</label>
        <select   name="department" id="position" required>
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
        
       
        <input class="text" type="password" name="password"  placeholder="PASSWORD" autocomplete="false" ><br>
        <p><em>By continuing you have accepted the <a >terms</a>
             and <a >conditions</a></em>.<br>
         <input type="checkbox" required> <br>   
        <input type="submit" id="bt" value="CREATE NEW ACCOUNT">




        </form>
    </div>
</body>
</html>