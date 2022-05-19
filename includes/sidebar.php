<?php 
$query = "select *from brands where status";
$sql = "select *from categories where status";
$result = $con->query($query);
$result_cat = $con->query($sql);
?>
<div class="sidebar">
    <ul class="sidebar__list">
        <li class="sidebar__list-item" id="toggle1">
            <a href="#" class="sidebar__list-link">Danh mục </a>
            <i class="fas fa-chevron-down" id="arrow1"></i>
        </li>
        <?php foreach($result_cat as $cat):?>
                <li class="sidebar__list-item showcat"><a href="?option=show_product_cat&cat_id=<?php echo $cat['cat_id'];?>" class="sidebar__list-link"><?php echo $cat['name'];?></a></li>
        <?php endforeach;?>
        <li class="sidebar__list-item">
            <a href="#" class="sidebar__list-link" id="toggle2">Hãng sản xuất </a>
            <i class="fas fa-chevron-down" id="arrow2"></i>
        </li>
        <?php foreach($result as $brand):?>
        <li class="sidebar__list-item showbrand"><a href="?option=show_product_brand&brand_id=<?php echo $brand['brand_id'];?>" class="sidebar__list-link"><?php echo $brand['name'];?></a></li>
        <?php endforeach;?>
        <li class="sidebar__list-item">
            <a href="#" class="sidebar__list-link">Dịch vụ </a>
        </li>
        <li class="sidebar__list-item">
            <a href="#" class="sidebar__list-link">Liên hệ </a>
        </li>
    </ul>
</div>