<?php 
if(isset($_POST['title'])){
    $pro_title = $_POST['title'];
    $query = "select *from products where name = '$pro_title' ";
    $result = $con->query($query);
    if(mysqli_num_rows($result) !=0){
        echo "<script>alert('Tên sản phẩm đã tồn tại mời bạn nhập tên khác!!!')</script>";
    }else{
        $cat_id = $_POST['product_cat'];
        $brand_id = $_POST['product_brand'];
        $price = $_POST['price'];
        $desc = $_POST['description'];
        $status = $_POST['status']; 
        $store = "../assets/upload_images/";
        $imageName = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $exp3 = substr($imageName,strlen($imageName)-3); 
        $exp4 = substr($imageName,strlen($imageName)-4);         
        if($exp3 =='jpg'||$exp3=='png'||$exp3 =='bmp'||
        $exp3=='gif'||$exp3=='JPG'||$exp3=='PNG'||
         $exp3=='GIF'||$exp3=='BMP'||$exp4=='jpeg'||$exp4=='JPEG'||$exp4=='webp'||$exp4=='WEBP'){
             $imageName= time().'_'.$imageName;
            move_uploaded_file($imageTemp,$store.$imageName);
              $sql = " insert products(product_cat,product_brand,name,price,image,description,status)
               values('$cat_id','$brand_id','$pro_title','$price','$imageName','$desc','$status')";
              $con->query($sql);
             header('location:?option=list_product');
         }else{ 
             echo"<script>alert('File đã chọn ko phải file ảnh  !!!')</script>";
         }
    }
}
$brand = $con->query("select *from brands");
$category = $con->query("select *from categories");
?>
<div class="form-container diffirent">
    <div class="head">THÊM SẢN PHẨM</div>
    <hr class="horiz">
    <div class="div1">
        <form  method="post" enctype="multipart/form-data">
            <div class="form-content diffirent">
                <div class="inputdetails">
                    <span class="labels">Tên sản phẩm</span>
                    <input type="text" name="title" class="text-input" required>
                </div>
                <div class="inputdetails">
                    <span class="labels">Giá </span>
                    <input type="number" min="100000" name="price" class="text-input" required>
                </div>
                <div class="inputdetails">
                    <span class="labels">Thương hiệu</span>
                    <select name="product_brand"  id="brand-id">
                        <option hidden>--Chọn hãng--</option>
                        <?php foreach($brand as $item):?>
                            <option value="<?=$item['brand_id']?>"><?=$item['name'];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="inputdetails">
                    <span class="labels">Danh mục </span>
                    <select name="product_cat"  id="brand-id">
                        <option hidden>--Chọn danh mục--</option>
                        <?php foreach($category as $item):?>
                            <option value="<?=$item['cat_id']?>"><?=$item['name'];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="inputdetails">
                    <span class="labels">Ảnh</span>
                    <input type="file" name="image" id="image" class="text-input" >
                </div>
                <div class="inputdetails">
                    <span class="labels">Mô tả</span>
                    <textarea name="description" id="description"></textarea>
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
                <a href="?option=list_products">&lt;&lt;Trở lại </a>
            </div>
        </form>

    </div>
</div>