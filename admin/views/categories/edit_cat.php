<?php 
$id = $_GET['id'];
$query = "select *from categories where cat_id = '$id' ";
$result = $con->query($query);
$cat = mysqli_fetch_array($result);
if(isset($_POST['title'])){
    $cat_title = $_POST['title'];
    //check xem tên có trùng với tên trong bảng đó k và id cũng vậy 
    $query = "select *from categories where name = '$cat_title' and cat_id !=" .$cat['cat_id'];
    $result = $con->query($query);
    if(mysqli_num_rows($result) !=0){
        echo "<script>alert('Đã tồn tại danh mục mang tên này !!!')</script>";
        $alert ="Đã tồn tại danh mục tên này";
    }else{
        $status = $_POST['status'];
        $query_cat = "update categories set name='$cat_title',status='$status' where cat_id=".$cat['cat_id'];
        $con->query($query_cat);
        header('location: ?option=list_cat');
    }
}
?>
<div class="form-container">
    <div class="head">Chỉnh sửa danh mục </div>
    <hr class="horiz">
    <p style="color:red;"><?=isset($alert)?$alert: ''?></p>
    <div class="div1">
        <form  method="post">
            <div class="form-content">
                <div class="inputdetails">
                    <span class="labels">Tên danh mục </span>
                    <input type="text" name="title" value="<?=$cat['name'];?>" >
                </div>
            </div>
            <div class="inputcheck">
                <input type="radio" name="status" <?=$cat['status']==1?'checked':''?> value="1" id="active" checked>
                <label for="Active"><span></span>Active</label>
                <input type="radio" name="status" <?=$cat['status']==0?'checked':''?> value="0" id="unactive">
                <label for="Unactive"><span></span>Deactive</label>
            </div>
           
            <div class="btn">
                <input type="submit" name="btn_send" value="Cập nhật ">
                <a href="?option=list_cat">Trở lại </a>
            </div>
        </form>
    </div>
</div>
