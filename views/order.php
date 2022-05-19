<?php
$query_member = "select *from members where username ='".$_SESSION['member']."'";
$member = mysqli_fetch_array($con->query($query_member));

if(isset($_POST['name'])){

    $order_method_id = $_POST['order_method_id'];
    $member_id = $member['member_id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $note = $_POST['note'];
    $query_orders = "insert orders(order_method_id,member_id,name,address,mobile,email,note) values('$order_method_id','$member_id','$name','$address','$mobile','$email','$note')";
    $con->query($query_orders);
    // lấy ra id trong bảng order  vừa được người dùng đặt 
    $query_order_id = "select id from orders order by id desc limit 1 ";
    $order_id = mysqli_fetch_array($con->query($query_order_id))['id'];
    foreach($_SESSION['cart'] as $key=>$value){
        $product_id = $key;
        $quantity = $value;
        $query_price = "select price from products where product_id = $key";
        // do chỉ lấy dc 1 nên ta sẽ dùng hàm mysqli_fetch_array()
        $price = mysqli_fetch_array($con->query($query_price))['price'];
        // mỗi 1 lần lấy là 1 lần insert vào orderdetail
        $query_order_detail = "insert orderdetail values($product_id,$order_id,$quantity,$price) ";
        $con->query($query_order_detail);
    }
    unset($_SESSION['cart']);
    header('location: ?option=ordersuccess');
} 
?>
<div class="form__wrap">
    <form method="post" onsubmit="return info_order()" class="form-container">
        <p id="error"></p>
        <h2>Thông tin người nhận hàng </h2>
        <div class="row">
            <div class="col l-5 l-o-1 m-5 c-5 c-o-1">
                <div class="form-group">
                    <label for="">Họ tên </label>
                    <input class="register-input" type="text" name="name" value="<?=$member['fullname'];?>" id="user">
                    <i class="fa fa-check u_check"></i>
                    <i class="fa fa-times u_times"></i>
                </div>
            </div>
            <div class="col l-5 m-5 c-5 ">
                <div class="form-group">
                    <label for="">Điện thoại </label>
                    <input class="register-input" type="tel" name="mobile" value="<?=$member['mobile'];?>" id="mobile">
                    <i class="fa fa-check p_check"></i>
                    <i class="fa fa-times p_times"></i>
                </div>
            </div>
            <div class="col l-5 l-o-1 m-5 c-5 c-o-1">
                <div class="form-group">
                    <label for="">Địa chỉ :</label>
                    <textarea name="address" id="address" rows="3"><?=$member['address'];?></textarea>
                </div>
            </div>
            <div class="col l-5 m-5 c-5">
                <div class="form-group">
                    <label for="">Ghi chú :</label>
                    <textarea name="note" id="note" rows="3"></textarea>
                </div>
            </div>
            <div class="col l-5 l-o-1 m-5 c-5 c-o-1">
                <div class="form-group">
                    <label for="">Email :</label>
                    <input type="email" name="email" id="email" value="<?=$member['email'];?>">
                </div>
            </div>
            <div class="col l-5 m-5 c-5">
                <div class="form-group">
                    <label for="">Chọn hình thức thanh toán </label>
                    <?php 
                        $query = "select *from ordermethod where status";
                        $result = $con->query($query);
                    ?>
                    <select name="order_method_id" id="order-method-id">
                        <?php foreach($result as $key):?> -->
                            <option value="<?=$key['id'];?>"><?=$key['name'];?></option>
                         <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="col l-2 l-o-5 m-2 m-o-5 c-4 c-o-4">
                <div class="form-group">
                    <input type="submit" name="ordersave" id="ordersave" value="Đặt hàng ">
                </div>
            </div>
        </div>
    </form>
</div>