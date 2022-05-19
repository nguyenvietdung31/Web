<?php 
if(isset($_POST['title'])){
    $cat_title = $_POST['title'];
    $query = "select *from categories where name = '$cat_title' ";
    $result = $con->query($query);
    if(mysqli_num_rows($result) !=0){
        echo "<script>alert('Tên danh mục đã tồn tại mời bạn nhập tên khác!!!')</script>";
    }else{
        $status = $_POST['status'];
        $query_cat = "insert categories(name,status) values('$cat_title','$status')";
        $result_cat =$con->query($query_cat);
        echo"<script>alert('Thêm danh mục thành công !!!')</script>";
        header('location:?option=list_cat');
    }
}
?>
<div class="form-container">
    <div class="head">Thêm danh mục</div>
    <hr class="horiz">
    <div class="div1">
        <form  method="post">
            <div class="form-content">
                <div class="inputdetails">
                    <span class="labels">Tên danh mục</span>
                    <input type="text" name="title" placeholder="Nhập tên danh mục "required>
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
                <a href="?option=list_cat" >Trở lại </a>
            </div>
        </form>

    </div>
</div>
