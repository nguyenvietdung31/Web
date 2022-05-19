<?php 
$id = $_GET['id'];
$query = "select *from brands where brand_id = '$id' ";
$result = $con->query($query);
$brand = mysqli_fetch_array($result);
if(isset($_POST['title'])){
    $brand_title = $_POST['title'];
    $query = "select *from brands where name = '$brand_title' and brand_id !=" .$brand['brand_id'];
    $result = $con->query($query);
    if(mysqli_num_rows($result) !=0){
        echo "<script>alert('Đã tồn tại danh mục mang tên này !!!')</script>";
    }else{
        $status = $_POST['status'];
        $query_brand = "update brands set name='$brand_title',status='$status' where brand_id=".$brand['brand_id'];
        $result_brand =$con->query($query_brand);
        header('location:?option=list_brand');
    }
}
?>
<div class="form-container">
    <div class="head">Chỉnh sửa thương hiệu </div>
    <hr class="horiz">
    <div class="div1">
        <form  method="post">
            <div class="form-content">
                <div class="inputdetails">
                    <span class="labels">Tên thương hiệu</span>
                    <input type="text" name="title" value="<?=$brand['name'];?>" class="text-input" required>
                </div>
            </div>
            <div class="inputcheck">
                <input type="radio" name="status" <?=$brand['status']==1?'checked':''?> value="1" id="active" checked>
                <label for="Active"><span></span>Active</label>
                <input type="radio" name="status" <?=$brand['status']==0?'checked':''?> value="0" id="unactive">
                <label for="Unactive"><span></span>Deactive</label>
            </div>
           
            <div class="btn">
                <input type="submit" name="btn_send" value="Cập nhật ">
                <a href="?option=list_cat">Trở lại </a>
            </div>
        </form>
    </div>
</div>