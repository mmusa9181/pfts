<?php
function check_login($con) {
    if(isset ($_SESSION['phone'])){
        $id = $_SESSION['phone'];
        $query = "SELECT * from users where phone = '$id'";
        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result)>0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location: login.php");
    die;
}
function check_login_admin($con) {
    if(isset ($_SESSION['phone'])){
        $id = $_SESSION['phone'];
        $query = "SELECT * from admin where phone = '$id'";
        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result)>0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location:admin_Login.php");
    die;
}
/*function get_personel_data($con) {
    $pid = $_POST['pid'];
    $query = "SELECT * from personel_data where pid = '$pid'";
    $result = mysqli_query($con,$query);
    if($result && mysqli_num_rows($result)>0){
        $personel_data = mysqli_fetch_assoc($result);
        return $personel_data;
        }
    }
    header("Location: adminlogin.php");
    die;
    */
