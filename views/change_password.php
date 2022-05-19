<?php 
if(isset($_POST['change_password'])){
    $current_pass = trim($_POST['current_pass']);
    $hash_current_pass = ($current_pass);

    $new_pass = trim($_POST['new_pass']);
    $hash_new_pass = ($new_pass);
    $confirm_new_password = trim($_POST['ck_pass']);

    $select_password = $con->query("select *from members where password ='$hash_current_pass' and  username ='$_SESSION[member]'");
    // check if current password not empty 
    if(mysqli_num_rows($select_password)== 0){
        echo "<script>alert('Mật khẩu cũ của bạn không đúng ')</script>";
    }else if($new_pass != $confirm_new_password){
        echo "<script>alert('Mật khẩu mới của bạn không khớp với mật khẩu xác nhận  ')</script>";
    }else{
        $update = $con->query("update members set password = '$hash_new_pass' where username = '$_SESSION[member]'");
        if($update){
        echo "<script>alert('Cập nhật mật khẩu mới thành công !!!')</script>";
        echo "<script>window.open(window.location.href,'_self')</script>";
        }else{
        echo "<script>alert('Truy vấn database bị lỗi... ')</script>";
        }
    }
}
?>
<div class="row">
    <div class="col l-4 l-o-4 m-6 m-o-3 c-8 c-o-2">
        <div class="form__wrap">
            <form method="post" onsubmit="return validate_register()" class="form-container">
                <p id="error"></p>
                <h2>Thay đổi mật khẩu </h2>

                <div class="form-group">
                    <label for="">Mật khẩu hiện tại </label>
                    <input class="register-input" type="password" name="current_pass" id="pass">
                    <i class="fa fa-check p_check"></i>
                    <i class="fa fa-times p_times"></i>
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu mới </label>
                    <input class="register-input" type="password" name="new_pass" id="new_pass">
                    <i class="fa fa-check p_check"></i>
                    <i class="fa fa-times p_times"></i>
                </div>
                <div class="form-group">
                    <label for="">Xác nhận mật khẩu </label>
                    <input class="register-input" type="password" name="ck_pass" id="ck_pass">
                    <i class="fa fa-check p_check"></i>
                    <i class="fa fa-times p_times"></i>
                </div>

                <div class="form-group">
                    <input type="submit" name="change_password" value="Lưu lại " id="register">
                </div>
            </form>
        </div>
    </div>
</div>