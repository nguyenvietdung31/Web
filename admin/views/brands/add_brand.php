<?php 
if(isset($_POST['title'])){
    $brand_title = $_POST['title'];
    $query = "select *from brands where name = '$brand_title' ";
    $result = $con->query($query);
    if(mysqli_num_rows($result) !=0){
        echo "<script>alert('Tên thương hiệu  đã tồn tại mời bạn nhập tên khác!!!')</script>";
    }else{
        $status = $_POST['status'];
        $query_brand = "insert brands(name,status) values('$brand_title','$status')";
        $result_brand =$con->query($query_brand);
        header('location:?option=list_brand');
    }
}
?>
<div class="form-container">
    <div class="head">Thêm thương hiệu </div>
    <hr class="horiz">
    <div class="div1">
        <form  method="post">
            <div class="form-content">
                <div class="inputdetails">
                    <span class="labels">Tên thương hiệu</span>
                    <input type="text" name="title" placeholder="Nhập tên thương hiệu "required>
                </div>
            </div>
            <div class="inputcheck">
                <input type="radio" name="status" value="1" id="active" checked>
                <label for="Active"><span></span>Active</label>
                <input type="radio" name="status" value="0" id="unactive">
                <label for="Unactive"><span></span>Deactive</label>
            </div>
           
            <div class="btn">
                <input type="submit" name="btn_send" value="Thêm mới ">
                <a href="?option=list_cat">&lt;&lt;Trở lại </a>
            </div>
        </form>

    </div>
</div>
