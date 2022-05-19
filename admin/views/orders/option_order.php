<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $querydetails = "delete from orderdetail where order_id = $id";
  $delete_orderdetail_id = $con->query($querydetails);
  $queryorders = "delete from orders where id = $id";
  $delete_order_id = $con->query($queryorders);
  header('location:?option=order&status=4');
}
$status = $_GET['status'];
$query = "select *from  orders where status =".$status;
$result = $con->query( $query);
?>
<div class="show">
    <div class="title">
        <h2 class="heading">ĐƠN HÀNG <?=$status ==1 ?'ĐƠN HÀNG CHƯA XỬ LÝ ':($status ==2?'ĐANG XỬ LÝ ':($status==3?'ĐÃ XỬ LÝ':'HUỶ'))?> </h2>
    </div>
<table class="table">
        <thead>
            <th>STT</th>
            <th>ID</th>
            <th>NGÀY TẠO </th>
            <th>XOÁ </th>
            <th>SỬA</th>
        </thead>
        <tbody>
            <?php 
            $count =1;
            foreach($result as $item):?>
            <tr>
                <td><?php echo $count++;?></td>
                <td><?php echo $item['id'];?></td>
                <td><?php echo $item['orderdate'];?></td>
                <td><a style="display:<?=$status ==4?'':'none';?>"
                        href="?option=order&id=<?=$item['id'];?>"
                        onclick="return confirm('Bạn có chắc muốn xoá sản phẩm  này ?')"
                        class="detete">Xoá </a></td>
                <td><a href="?option=order_detail&id=<?=$item['id'];?>" class="edit">Chi tiết đơn hàng
                    </a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>