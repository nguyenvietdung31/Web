<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "select *from products where product_cat = $id";
  $pro = $con->query($query);
  if(mysqli_num_rows($pro) !=0){
    $con->query("update categories set status = 0 where cat_id = $id");
  }else{
    $con->query("delete from categories where cat_id = $id");
  }
}
$result = $con->query("select *from categories ");
?>
<div class="show">
    <div class="title">
        <h2 class="heading">Danh sách danh mục </h2>
    </div>
<table class="table">
        <thead>
            <th>STT</th>
            <th>ID</th>
            <th>TÊN HÃNG </th>
            <th>XOÁ</th>
            <th>SỬA </th>
            <th>TRẠNG THÁI </th>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach($result as $cat):?>
            <tr>
                <td data-label="STT"><?php echo $count++;?></td>
                <td data-label="ID"><?php echo $cat['cat_id'];?></td>
                <td data-label="TÊN HÃNG "><?php echo $cat['name'];?></td>
                <td data-label="XOÁ"><a href="?option=list_cat&id=<?=$cat['cat_id'];?>"
                    onclick="return confirm('Bạn có chắc muốn xoá Danh mục này ?')"
                    class="detete">Xoá </a></td>
                <td data-label="SỬA"><a href="?option=edit_cat&id=<?=$cat['cat_id'];?>" class="edit">Sửa</a></td>
                <td data-label="TRẠNG THÁI "><a class="publish">
                    <?php if($cat['status'] == 1){
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