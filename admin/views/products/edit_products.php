<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "select *from products where product_id = ".$id;
    $result = $con->query($query);
    $row_product = mysqli_fetch_array($result);
} 
?>
<?php
if(isset($_POST['title'])){
    $pro_title = $_POST['title'];
    $query = "select *from products where name = '$pro_title' and  product_id !=".$row_product['product_id'];
    $result = $con->query($query);
    if(mysqli_num_rows($result) !=0){
        echo "<script>alert('Đã có sản phẩm khác có tên này !!!')</script>";
    }else{
        $cat_id = $_POST['product_cat'];
        $brand_id = $_POST['product_brand'];
        $price = $_POST['price'];
        $desc = $_POST['description'];
        $status = $_POST['status']; 
        $store = "../assets/upload_images/";
        // lấy tên ảnh  
        $imageName = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $exp3 = substr($imageName,strlen($imageName)-3);
        $exp4 = substr($imageName,strlen($imageName)-4);         
            if($exp3 =='jpg'||$exp3=='png'||$exp3 =='bmp'||$exp3=='gif'||$exp3=='JPG'||$exp3=='PNG'||$exp3=='GIF'||$exp3=='BMP'||$exp4=='jpeg'||$exp4=='JPEG'||$exp4=='webp'||$exp4=='WEBP'){
             $imageName= time().'_'.$imageName;
            move_uploaded_file($imageTemp,$store.$imageName);
            unlink($store.$row_product['image']);
            }else{
            echo"<script>alert('File đã chọn ko phải file ảnh  !!!')</script>";
            }
            if(empty($imageName)){
                $imageName = $row_product['image'];
            }
         
            $sql = " update products set product_cat = '$cat_id',product_brand = '$brand_id',name='$pro_title',price = '$price',image='$imageName',description='$desc',status = '$status' where product_id = ".$row_product['product_id'];
            $con->query($sql);
            header('location:?option=list_products');
    }
}
$brand = $con->query("select *from brands");
$category = $con->query("select *from categories");

?>
<div class="form-container">
    <div class="head">CHỈNH SỬA SẢN PHẨM </div>
    <hr class="horiz">
    <div class="div1">
        <form  method="post" enctype="multipart/form-data">
            <div class="form-content">
                <div class="inputdetails">
                    <span class="labels">Tên sản phẩm</span>
                    <input type="text" name="title" value="<?=$row_product['name']?>" required>
                </div>
                <div class="inputdetails">
                    <span class="labels">Danh mục </span>
                    <select name="product_cat"  id="brand-id">
                        <option hidden>--Chọn danh mục--</option>
                        <?php foreach($category as $item):?>
                            <option value="<?=$item['cat_id']?>" <?=$item['cat_id']== $row_product['product_cat'] ? 'selected': '' ?>><?=$item['name'];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="inputdetails">
                    <span class="labels">Thương hiệu</span>
                    <select name="product_brand"  id="brand-id">
                        <option hidden>--Chọn hãng--</option>
                        <?php foreach($brand as $item):?>
                            <option value="<?=$item['brand_id']?>" <?=$item['brand_id']== $row_product['product_brand'] ? 'selected': '' ?> ><?=$item['name'];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="inputdetails">
                    <span class="labels">Giá </span>
                    <input type="number" min="100000" value="<?=$row_product['price']?>" name="price" required>
                </div>
                <div class="inputdetails">
                    <span class="labels">Ảnh</span>
                    <input type="file" name="image" id="image" class="text-input" >
                    <img src="../assets/upload_images/<?php echo $pro['image'];?>"  width="150"  height="150" alt="">
                </div>
                <div class="inputdetails">
                    <span class="labels">Mô tả</span>
                    <textarea name="description"  id="description"><?=$row_product['description']?></textarea>
                </div>
            </div>
            <div class="inputcheck">
                <input type="radio" name="status" value="1" <?=$row_product['status']==1 ?'checked': '' ?> checked>
                <label for="Active"><span></span>Active</label>
                <input type="radio" name="status" value="0" <?=$row_product['status']==0 ?'checked': '' ?> >
                <label for="Unactive"><span></span>Deactive</label>
            </div>
           
            <div class="btn">
                <input type="submit" name="btn_send" value="Thêm mới ">
                <a href="?option=list_products">Trở lại </a>
            </div>
        </form>

    </div>
</div>
