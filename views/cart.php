<?php
if(empty($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
if(isset($_GET['action'])){
    $id = isset($_GET['id'])? $_GET['id'] : '';
    switch($_GET['action']){
        case 'add':
            if(array_key_exists($id,array_keys($_SESSION['cart']))){
                $_SESSION['cart'][$id]+=1;
                header("Location:.");
            }else{
                $_SESSION['cart'][$id]=1;
                header("Location:.");
            }
            break;
        case 'update':
            if($_GET['type']== 'asc'){
            $_SESSION['cart'][$id]++;
            }else{
                if($_SESSION['cart'][$id] >1)
                    $_SESSION['cart'][$id]--;
            }
            header('location:?option=cart');
            break;
        case 'order':
            if(isset($_SESSION['member'])){
                header('location:?option=order');
            }else{
                header('location:?option=login&order=1');
            }
        case 'delete':
            unset($_SESSION['cart'][$id]);
            break;
        case 'deleteAll':
            unset($_SESSION['cart']);
    }
}
?>
<?php 
    if(!empty($_SESSION['cart'])):
        $ids = implode(',', array_keys($_SESSION['cart']));
        $query = "select *from products where product_id in($ids)";
        $result = $con->query($query);
    ?>
<div class="product__cart cart">
    <table>
        <tr>
            <th>Sản phẩm </th>
            <th>Số lượng </th>
            <th>Thành tiền </th>
        </tr>
        <?php 
            $toTal = 0;
            foreach($result as $item ):?>
        <tr>
            <td>
                <div class="cart-info">
                    <img src="./assets/upload_images/<?php echo $item['image'];?>" alt="">
                    <div class="cart-description">
                        <p><?php echo $item['name'];?></p>
                        <p>Giá :<?php echo number_format($item['price'],0,',','.');?>đ</p>
                        <p><a href="index.php?option=cart&action=delete&id=<?=$item['product_id']?>">Xoá </a></p>
                    </div>
                </div>
            </td>
            <td>
                <div class="cart-quantity">
                    <input type="button" value="-" onclick="location='?option=cart&action=update&type=desc&id=<?=$item['product_id']?>'">
                    <span><?=$_SESSION['cart'][$item['product_id']]?></span>
                    <input type="button" value="+" onclick="location='?option=cart&action=update&type=asc&id=<?=$item['product_id']?>'">
                </div>
            </td>
            <td><?php echo number_format($subTotal=$item['price'] * $_SESSION['cart'][$item['product_id']],0,',','.')?>đ</td>
            <?php $toTal+=$subTotal;?>
        <?php endforeach;?>
    </table>

    <div class="total__price">
        <table>
            <tr>
                <td><h3>Tổng tiền </h3></td>
                <td> <?php echo number_format($toTal,0,',','.')?>đ</td>
            </tr>
            <tr>
                <td><a href="?option=cart&action=deleteAll">Xoá tất cả </a></td>
                <td><a href="?option=cart&action=order">Đặt hàng </a></td>
            </tr>
        </table>

    </div>
</div>
<?php else:?>
<div class="col l-12 ">
    <h1 class="l-o-3">Giỏ hàng trống...</h1>
    <a class="l-o-3" href="index.php?option=home">Nhấn vào đây để tiếp tục mua hàng </a>
</div>
<?php endif; ?>