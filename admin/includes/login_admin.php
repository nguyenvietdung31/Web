    <section class="login-wrap">
        <p><?=isset($alert)?$alert:'';?></p>
        <p class="errors"></p>
        <form method="post" onsubmit="return validate()">
            <h2>Đăng nhập</h2>
            <div class="form-group">
                <label for="">Tên đăng nhập </label>
                <input type="text" name="username" id="user" class="form-control" placeholder="Nhập tên đăng nhập">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu </label>
                <input type="password" name="password" id="pass" class="form-control" placeholder="Nhập mật khẩu">
            </div>
            <div class="form-group">
                <input type="submit" class="btn-login" name="login_admin" value="Đăng Nhập ">
            </div>
        </form>
    </section>