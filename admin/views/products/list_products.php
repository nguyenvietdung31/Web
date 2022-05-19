<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "select *from orderdetail where product_id = $id";
  $pro = $con->query($query);
  if(mysqli_num_rows($pro) !=0){
    $con->query("update products set status = 0 where product_id = $id");
  }else{
    $con->query("delete from products where product_id = $id");
    unlink("../assets/upload_images/".$_GET['image']);
  }
}
$query = "select *from  products";
$result = $con->query( $query);
?>
<div class="show">
    <div class="title">
        <h2 class="heading">Danh sách sản phẩm </h2>
    </div>
<table class="table">
        <thead>
            <th>STT</th>
            <th>ID</th>
            <th>TÊN</th>
            <th>GIÁ </th>
            <th>ẢNH </th>
            <th>MÔ TẢ</th>
            <th>XOÁ </th>
            <th>SỬA</th>
            <th>TRẠNG THÁI</th>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach($result as $pro):?>
            <tr>
                <td data-label="STT"><?php echo $count++;?></td>
                <td data-label="ID"><?php echo $pro['product_id'];?></td>
                <td data-label="TÊN"><?php echo $pro['name'];?></td>
                <td data-label="GIÁ"><?php echo number_format($pro['price'],0,',','.');?></td>
              <td data-label="ẢNH"><img src="../assets/upload_images/<?php echo $pro['image'];?>" alt="" height="100" width="100"></td>
              <td data-label="MÔ TẢ"><?php echo $pro['description'];?></td>
              <td data-label="XOÁ"><a href="?option=list_product&id=<?=$pro['product_id'];?>&image=<?=$pro['image']?>" onclick ="return confirm('Bạn có chắc muốn xoá sản phẩm  này ?')" class="detete">Xoá </a></td>
              <td data-label="SỬA"><a href="?option=edit_product&id=<?=$pro['product_id'];?>" class="edit">Sửa</a></td>
              <td data-label="TRẠNG THÁI"><a class="publish">
                <?php if($pro['status'] == 1){
                  echo "Active";
                }else{
                  echo "Deactive"; 
                }?>
              </a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>