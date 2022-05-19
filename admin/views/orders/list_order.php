<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $querydetails = "delete from orderdetail where order_id = $id";
  $delete_orderdetail_id = $con->query($querydetails);
  $queryorders = "delete from orders where id = $id";
  $delete_order_id = $con->query($queryorders);
  header('location:?option=order&status=4');
}
$query = "select *from  orders ";
$result = $con->query( $query);
?>
<table class="table" style="margin-top:8px">
        <thead>
            <th>STT</th>
            <th>ID</th>
            <th>NGÀY TẠO </th>
            <th>XOÁ </th>
            <th>ĐƠN HÀNG  </th>
            <th>IN HOÁ ĐƠN </th>
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
                <td><a target="_blank" href="?option=printorder&id=<?=$item['id'];?>">In đơn hàng </a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
