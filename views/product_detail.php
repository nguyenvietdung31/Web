<?php 
// bắt lại comment sản phẩm người dùng 
if(isset($_POST['comment'])){
// nếu tồn tại đăng nhập 
    $comment = $_POST['comment'];
    $product_id = $_GET['id'];
    if(isset($_SESSION['member'])){
        $member_id = mysqli_fetch_array($con->query("select *from members where username ='$_SESSION[member]'"));
        $member_id =$member_id['member_id'];
        $con->query("insert comments(member_id,product_id,date,content) values('$member_id','$product_id',now(),'$comment')");
        echo "<script>alert('Bình luận đã được thêm thành công !!!')</script>";
    }else{
        // lưu lại comment hiện thời của người dùng nếu chưa đăng nhập 
        $_SESSION['comment'] = $comment;
        
        header("location:?option=login&id=$product_id");
    }
}
?>
<?php
// lấy sản phẩm từ thanh trình duyệt truyền lên từ bên sản phẩm 
$id =$_GET['id'];
// tạo truy vấn 
$query = "select *from products where product_id = '$id'";
$result = $con->query($query);
?>
<div class="row">
<?php foreach($result as $pro):?>
<div class="col l-5 m-5 c-5">
    <div class="product__detail-img">
        <img src="./assets/upload_images/<?php echo $pro['image']?>" alt="<?php echo $pro['name']?>">
    </div>
</div>
<div class="col l-7 m-7 c-7">
    <div class="product__detail-info">
        <h3><?php echo $pro['name']?></h3>
        <h3><?php echo number_format($pro['price'],0,',','.');?>đ</h3>
        <p><?php echo $pro['description'];?></p>
        <!--<div class="colors">
            <span id="blockA"></span>
            <span id="blockB"></span>
            <span id="blockC"></span>
            <span id="blockD"></span>
            <span id="blockE"></span>
            <span id="blockF"></span>
        </div>-->
        <a href="?option=cart&action=add&id=<?=$pro['product_id'];?>">Mua Hàng </a>
    </div>
</div>
<?php endforeach;?>
</div>
<div class="row">
    <div class="comment-wrap" style="padding: 40px 0px 0px 15px">
        <h2>Bình luận sản phẩm </h2>
        <?php 
        $comments= $con->query("select *from members a join comments b on a.member_id =b.member_id join products c on b.product_id = c.product_id where b.status=1 and b.product_id ='$_GET[id]' ");
        if(mysqli_num_rows($comments)==0){
            echo "Không có comment nào !";
        }else{
            foreach($comments as $com):
        ?>
        <div class="user-comment"><i class="fas fa-user-tie"></i><span><?=$com['fullname'];?></span></div>
        <div class="comment-desc"><span><?=$com['content'];?></span></div>
        <?php
            endforeach;
        }
        ?>
        <form class="cmt-form" action="" method="post">
            <textarea name="comment" placeholder="Nhập bình luận của bạn tại đây" style="width: 415px;height: 50px"></textarea>

            <input type="submit" value="Gửi">
        </form>
    </div>
</div>