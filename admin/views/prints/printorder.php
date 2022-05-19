<?php
error_reporting(0);
$con = new MySQLi('localhost','root','','db_tbvt'); 
$id = $_GET['id'];
$sql = "select a.fullname,a.mobile as 'mobilemember',a.address as 'addressmember',
a.email as 'emailmember',b.*,c.name as 'nameordermethod'
from members a join orders b on a.member_id = b.member_id join ordermethod c on b.order_method_id = c.id where b.id= ".$id;
$order = mysqli_fetch_array($con->query($sql));

$query = "select b.*,c.name,c.image from orders a join orderdetail b on a.id = b.order_id join products c on b.product_id = c.product_id where a.id = $order[id]";
$orderdetails = $con->query($query);
?>
<div class="print-order"  style="position: fixed; z-index:99; background:#e7e7ed;top:0;left:0;right:0; 
 margin-bottom:4px;border:1px solid #ccc; width:100%; margin:0 auto;   height:100%;">
 <a id ="noprint" href="?option=list_order">Trở lại </a>
    <div class="print-wrap" style="max-width:700px; margin:0 auto;">
        <div style="width:100%; max-width:700px; margin:0 auto;">
            <b style="font-size:32px; padding:8px 0px;display:block;">Điện máy trắng</b>
            <p>Địa chỉ : Lĩnh Nam, Hoàng Mai, Hà Nội </p>
            <p>SĐT: 0123456xxx</p>
        </div>
        <div class="show">
        <div class="title">
            <h2 class="heading">HOÁ ĐƠN BÁN HÀNG  <br><span style="font-size:18px">MÃ ĐƠN HÀNG(<?php echo $order['id'];?>)</span></h2>
        </div>
        </div>
        <div style="width:100%; max-width:700px; margin:0 auto;  height:100%;">
        <span style=" font-size:1rem;">NGÀY TẠO ĐƠN </span>
        <div style="color:red; font-size:0.875rem;"><?=$order['orderdate']?></div>
        <hr style="width:585px">
        <div class="info-ecommer">Họ tên người mua hàng :<?=$order['fullname']?></div>
        <div class="info-ecommer">Email : <?=$order['addressmember']?></div>
        <div class="info-ecommer">Địa chỉ : <?=$order['addressmember']?></div>
        <div class="info-ecommer">Số điện thoại : <?=$order['mobilemember']?>.</div>
        <hr style="width:585px">
        <div class="info-ecommer">Họ tên người nhận hàng :<?=$order['fullname']?></div>
        <div class="info-ecommer">Email :<?=$order['emailmember']?></div>
        <div class="info-ecommer">Địa chỉ : <?=$order['addressmember']?></div>
            <table>
                <thead>
                    <th>STT</th>
                    <th>TÊN HÀNG </th>
                    <th>ĐƠN GIÁ </th>
                    <th>SỐ LƯỢNG </th>
                    <th>THÀNH TIỀN </th>
                </thead>
                <tbody>
                <?php 
                $count =1;
                $total =0.000000;
                foreach($orderdetails as $item):?>
                    <tr>
                        <td data-label="STT"><?php echo $count++;?></td>
                        <td data-label="TÊN"><?php echo $item['name']?></td>
                        <td data-label="GIÁ"><?php echo number_format($item['price'],0,',','.')?></td>
                        <td data-label="SỐ LƯỢNG"><?php echo $item['quantity']?></td>
                        <td data-label="THÀNH TIỀN"><?php echo number_format(($item['price']*$item['quantity']),0,',','.');?></td>
                    </tr>
                    <?php $total += (($item['price']*$item['quantity']));?>
                    <?php endforeach;?> 
                </tbody>
            </table>
            <div class="totals" style="margin-top:20px">TỔNG TIỀN  : <?php echo number_format($total,0,',','.') ?>VNĐ</div>
        <p>Phương thức thanh toán : <?php echo $order['nameordermethod']?></p>
        </div>
    </div>
</div>
<script>
    window.print();
</script>
