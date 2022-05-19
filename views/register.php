<?php 
if(isset($_POST['username'])){
    $username = $_POST['username'];
    // kiểm tra xem username có tồn tại trong database không 
    $query = "select *from members where username = '$username'";
    $result = $con->query($query);
    if(mysqli_num_rows($result) != 0){
        echo "<script>alert('Tên đăng nhập không có sẵn, mời chọn một tên đăng nhập khác !')</script>";
    }else{
        $password = ($_POST['password']);
        $fullname = $_POST['fullname'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $query_register = "insert members(username,password,fullname,mobile,address,email) values('$username','$password','$fullname','$mobile','$address','$email')";
        $resul_register = $con->query($query_register);
        echo "<script>alert('Bạn đã đăng kí thành công tài khoản!!!')</script>";
    }
}
?>
<div class="row">
<div class="form__wrap">
    <form method="post" onsubmit="return validate_register()" class="form-container">
        <p id="error"></p>
        <h2>Đăng kí tài khoản </h2>
        <div class="row">
            <div class="col l-5 l-o-1 m-5 c-5 c-o-1">
                <div class="form-group">
                    <label for="">Tên đăng nhập </label>
                    <input class="register-input" type="text" name="username" id="user">
                    <i class="fa fa-check u_check"></i>
                    <i class="fa fa-times u_times"></i>
                </div>
            </div>
            <div class="col l-5 m-5 c-5 ">
                <div class="form-group">
                    <label for="">Mật khẩu </label>
                    <input class="register-input" type="password" name="password" id="pass">
                    <i class="fa fa-check p_check"></i>
                    <i class="fa fa-times p_times"></i>
                </div>
            </div>
            <div class="col l-5 l-o-1 m-5 c-5 c-o-1">
                <div class="form-group">
                    <label for="">Họ và Tên </label>
                    <input class="register-input" type="text" name="fullname" id="fullname">
                    <i class="fa fa-check f_check"></i>
                    <i class="fa fa-times f_times"></i>
                </div>
            </div>
            <div class="col l-5 m-5 c-5">
                <div class="form-group">
                    <label for="">Điện thoại</label>
                    <input class="register-input" type="tel" name="mobile" pattern="(0|+84)\d{9}" id="mobile">
                    <i class="fa fa-check m_check"></i>
                    <i class="fa fa-times m_times"></i>
                </div>
            </div>
            <div class="col l-5 l-o-1 m-5 c-5 c-o-1">
                <div class="form-group">
                    <label for="">Địa chỉ </label>
                    <input class="register-input" type="text" name="address" id="address">
                    <i class="fa fa-check a_check"></i>
                    <i class="fa fa-times a_times"></i>
                </div>
            </div>
            <div class="col l-5 m-5 c-5">
                <div class="form-group">
                    <label for="">Email</label>
                    <input class="register-input" type="email" name="email" id="email">
                    <i class="fa fa-check e_check"></i>
                    <i class="fa fa-times e_times"></i>
                </div>
            </div>
            <div class="col l-2 l-o-5 m-2 m-o-5 c-4 c-o-4">
                <div class="form-group">
                    <input type="submit" name="register" value="Đăng ký " id="register">
                </div>
            </div>
        </div>
    </form>
</div>
</div>