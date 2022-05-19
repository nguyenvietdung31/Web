<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "select *from comments where id = '$id' ";
    $result = $con->query($query);
    $cmt = mysqli_fetch_array($result);
    if(isset($_POST['btn_send'])){
        $content = $_POST['content'];
        $status = $_POST['status'];
        $query ="UPDATE comments SET content ='$content', status = '$status' where id = '$id' ";
        $con->query($query);
        header('Location:?option=list_comment');
    }
}

?>
<div class="form-container">
    <form method="post">
        <textarea name="content" rows="5" cols="60"><?= $cmt['content'] ?></textarea>
        <div class="inputcheck">
            <input type="radio" name="status" <?=$cmt['status']==1?'checked':''?> value="1" id="active" checked>
            <label for="Active"><span></span>Active</label>
            <input type="radio" name="status" <?=$cmt['status']==0?'checked':''?> value="0" id="unactive">
            <label for="Unactive"><span></span>Deactive</label>
        </div>
        <div class="btn">
            <input type="submit" name="btn_send" value="Cập nhật ">
            <a href="?option=list_comment">Trở lại </a>
        </div>
    </form>
</div>