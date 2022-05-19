<?php 
if(isset($_GET['action'])){// nếu bắt dc action update nút tăng giảm số lượng 
    $orderid=$_GET['order_id'];
    $productid=$_GET['product_id'];
    $condition="where order_id='$orderid' and product_id='$productid'";
    if($_GET['type']=='asc'){
        $query="update orderdetail set quantity=quantity+1 ".$condition;
    }else{
        $query="update orderdetail set quantity=quantity-1 ".$condition;
    }
    $con->query($query);
    header("location: ?option=order_detail&id=".$_GET['id']);
}
if(isset($_POST['status'])){
    $query_status ="update orders set status ='$_POST[status]' where id= '$_GET[id]'";
    $con->query($query_status);
}
?>
<?php 
$id = $_GET['id'];
$sql = "select a.fullname,a.mobile as 'mobilemember',a.address as 'addressmember',
a.email as 'emailmember',b.*,c.name as 'nameordermethod'
from members a join orders b on a.member_id = b.member_id join ordermethod c on b.order_method_id = c.id where b.id= ".$id;
$order = mysqli_fetch_array($con->query($sql));
?>
<div class="show">
    <div class="title">
        <h2 class="heading" style="font-size:32px; text-align:center;">CHI TIẾT ĐƠN HÀNG <br></h2>
        <div style="font-size:18px; text-align:center;"><p >MÃ ĐƠN HÀNG
                (<?=$order['id']?>)</p>
                <p>NGÀY TẠO ĐƠN: <?=$order['orderdate'];?></p>
        </div>

    </div>
</div>
<div class="show">
    <div class="title">
        <p class="heading">THÔNG TIN NGƯỜI ĐẶT HÀNG </p>
    </div>
    <table class="table">
        <thead>
            <th>HỌ TÊN</th>
            <th>ĐIỆN THOẠI</th>
            <th>ĐỊA CHỈ </th>
            <th>EMAIL</th>
            <th>GHI CHÚ </th>
        </thead>
        <tbody>
            <tr>
                <td data-label="HỌ TÊN"><?php echo $order['fullname'];?></td>
                <td data-label="ĐIỆN THOẠI"><?php echo $order['mobilemember'];?></td>
                <td data-label="ĐỊA CHỈ "><?php echo $order['addressmember'];?></td>
                <td data-label="EMAIL"><?php echo $order['emailmember'];?></td>
                <td data-label="GHI CHÚ "><?php echo $order['note'];?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="show">
    <div class="title">
        <p class="heading">THÔNG TIN NGƯỜI NHẬN HÀNG </p>
    </div>
    <table class="table">
        <thead>
            <th>HỌ TÊN</th>
            <th>ĐIỆN THOẠI</th>
            <th>ĐỊA CHỈ </th>
            <th>EMAIL</th>
            <th>PHƯƠNG THỨC THANH TOÁN</th>
        </thead>
        <tbody>
            <tr>
                <td data-label="HỌ TÊN"><?php echo $order['name'];?></td>
                <td data-label="ĐIỆN THOẠI"><?php echo $order['mobile'];?></td>
                <td data-label="ĐỊA CHỈ "><?php echo $order['address'];?></td>
                <td data-label="EMAIL"><?php echo $order['email'];?></td>
                <td data-label="PHƯƠNG THỨC THANH TOÁN"><h2 class="heading" style="color:red;font-size:15px;padding-top:8px;">
        <?= $order['nameordermethod'];?></h2></td>
            </tr>
        </tbody>
    </table>
</div>
<?php 
$query = "select b.*,c.name,c.image from orders a join orderdetail b on a.id = b.order_id join products c on b.product_id = c.product_id where a.id = $order[id]";
$orderdetails = $con->query($query);
?>
<form method="post">
    <div class="show">
        <div class="title">
            <p class="heading">CHI TIẾT CÁC SẢN PHẨM ĐẶT MUA </p>
        </div>
        <table class="table">
            <thead>
                <th>STT</th>
                <th>Tên </th>
                <th>Giá </th>
                <th>Ảnh </th>
                <th>Số lượng </th>
            </thead>
            <tbody>
                <?php 
            $count =1;
            $total =0.000000;
            foreach($orderdetails as $item):?>
                <tr>
                    <td data-label="STT"><?php echo $count++;?></td>
                    <td data-label="TÊN"><?php echo $item['name'];?></td>
                    <td data-label="GIÁ"><?php echo number_format($item['price'],0,',','.');?></td>
                    <td data-label="ẢNH"><img
                            src="../assets/upload_images/<?php echo $item['image'];?>" alt=""
                            height="100" width="100"></td>
                    <td data-label="SỐ LƯỢNG">
                    
                    <?php echo $item['quantity'];?>
                </tr>
                <?php $total += (($item['price']*$item['quantity']));?>
                <?php endforeach;?>
            </tbody>
        </table>

        <div class="totals" style="margin-top:20px;text-align: center;font-size: 24px">TỔNG ĐƠN HÀNG  : <?php echo number_format($total,0,',','.') ?> VNĐ</div>
    </div>
    <div style="font-size:18px;margin-top:8px">TRẠNG THÁI ĐƠN HÀNG </div>
    <p style="font-size:22px; display:<?=$order['status']==2|| $order['status']==3?'none;':''?>">
        <input type="radio" name="status" value="1" <?=$order['status']==1?'checked':''?>>Chưa xử
        lý </p>
    <p style="font-size:22px; display:<?=$order['status']==3?'none':''?>"><input type="radio"
            name="status" value="2" <?=$order['status']==2?'checked':''?>>Đang xử
        lý </p>
    <p style="font-size:22px;"><input type="radio" name="status" value="3"
            <?=$order['status']==3?'checked':''?>>Đã xử
        lý</p>
    <p style="font-size:22px; display:<?=$order['status']==3?'none':''?>"><input type="radio"
            name="status" value="4" <?=$order['status']==4?'checked':''?>>Huỷ
    </p>
    <div class="btn">
        <input <?=$order['status']==3?'disabled':''?> type="submit" value="Cập nhật đơn hàng">
        <a href="?option=order&status=1" style="text-decoration: none;">Trở lại </a>
    </div>
</form>