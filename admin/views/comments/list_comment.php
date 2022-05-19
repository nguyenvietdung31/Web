<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = 'delete from comments where id='.$id;
    $con->query($sql);
    header('Location:?option=list_comment');
}
$query = "select *from  comments";
$result = $con->query( $query);
?>
<div class="show">
    <div class="title">
        <h2 class="heading">DANH SÁCH BÌNH LUẬN </h2>
    </div>
<table class="table">
        <thead>
            <th>STT</th>
            <th>ID</th>
            <th>ID NGƯỜI DÙNG </th>
            <th>ID SẢN PHẨM </th>
            <th>NGÀY  </th>
            <th>NỘI DUNG </th>
            <th>XOÁ</th>
            <th>SỬA </th>
            <th>TRẠNG THÁI </th>
            
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach($result as $cmt):?>
            <tr>
                <td data-label="STT"><?php echo $count++;?></td>
                <td data-label="ID"><?php echo $cmt['id'];?></td>
                <td data-label="TÊN"><?php echo $cmt['member_id'];?></td>
                <td data-label="GIÁ"><?php echo $cmt['product_id'];?></td>
              <td data-label="NGÀY "><?php echo $cmt['date'];?></td>
              <td data-label="NỘI DUNG"><?php echo $cmt['content'];?></td>
              <td data-label="XOÁ"><a href="?option=list_comment&id=<?=$cmt['id'];?>" onclick ="return confirm('Bạn có chắc muốn xoá sản phẩm  này ?')" class="detete">Xoá </a></td>
              <td data-label="SỬA"><a href="?option=edit_comment&id=<?=$cmt['id'];?>" class="edit">Sửa</a></td>
              <td data-label="TRẠNG THÁI"><a class="publish">
                <?php if($cmt['status'] == 1){
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