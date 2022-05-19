<?php
session_start();
$con = new MySQLi('localhost','root','','db_tbvt');
if(isset($_POST['username'])){
    $user = $_POST['username'];
    $pass = md5($_POST['password']);
    $query = "select *from admin where username = '$user' and password = '$pass'";
    $result = $con->query($query);
    if(mysqli_num_rows($result)== 0){
        $alert = "Sai tên đăng nhập hoặc mật khẩu ";
    }else{
        $result = mysqli_fetch_array($result);
        if($result['status'] == 0){
            $alert =" Tài khoản đang bị khoá ";
        }else{
        $_SESSION['admin'] = $user;
        header("Location: .");
        }
    }
}
include "includes/header.php";
?>
<section style="background-image: url('../assets/upload_images/bglogin.jfif');" class="admin-wraper">
    <?php
    if(isset($_SESSION['admin'])){
        include "includes/sidebar.php";
        include "includes/content.php";
    }else{
        include "includes/login_admin.php";
    }
    ?>
</section>
</body>
</html>