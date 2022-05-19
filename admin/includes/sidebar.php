<?php 
$chuaxuly = mysqli_num_rows($con->query("select *from orders where status =1 "));
$dangxuly = mysqli_num_rows($con->query("select *from orders where status =2 "));
$daxuly = mysqli_num_rows($con->query("select *from orders where status =3 "));
$huy = mysqli_num_rows($con->query("select *from orders where status =4 "));
?>
<div class="sidebar" id="sidebar">
                <div class="sidebar-main">
                    <div class="sidebar-item">
                        <a href="#!" class="sidebar-link">
                            <span class="sidebar-title">Thành viên</span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="sidebar-drop-list">
                            <div class="sidebar-drop-item">
                                <a href="?option=show_member">Danh sách </a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <a href="#!" class="sidebar-link">
                            <span class="sidebar-title">Sản phẩm </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="sidebar-drop-list">
                            <div class="sidebar-drop-item">
                                <a href="?option=list_products">Danh sách </a>
                            </div>
                            <div class="sidebar-drop-item">
                                <a href="?option=add_product">Thêm mới </a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <a href="#!" class="sidebar-link">
                            <span class="sidebar-title">Thương hiệu </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="sidebar-drop-list">
                            <div class="sidebar-drop-item">
                                <a href="?option=list_brand">Danh sách </a>
                            </div>
                            <div class="sidebar-drop-item">
                                <a href="?option=add_brand">Thêm mới </a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <a href="#!" class="sidebar-link">
                            <span class="sidebar-title">Danh mục </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="sidebar-drop-list">
                            <div class="sidebar-drop-item">
                                <a href="?option=list_cat">Danh sách </a>
                            </div>
                            <div class="sidebar-drop-item">
                                <a href="?option=add_cat">Thêm mới </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="sidebar-item">
                        <a href="?option=list_order" class="sidebar-link">
                            <span class="sidebar-title">Đơn hàng  </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="sidebar-drop-list">
                            <div class="sidebar-drop-item">
                                <a href="?option=order&status=1" class="sub-link">Đơn hàng chưa xử lý (<?=$chuaxuly;?>)</a>
                            </div>
                            <div class="sidebar-drop-item">
                                <a href="?option=order&status=2" class="sub-link">Đơn hàng đang xử lý (<?=$dangxuly;?>) </a>
                            </div>
                            <div class="sidebar-drop-item">
                                <a href="?option=order&status=3" class="sub-link">Đơn hàng đã xử lý (<?=$daxuly;?>)</a>
                            </div>
                            <div class="sidebar-drop-item">
                                <a href="?option=order&status=4" class="sub-link">Đơn hàng huỷ (<?=$huy;?>) </a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="sidebar-item">
                        <a href="index.php?option=list_comment" class="sidebar-link">
                            <span class="sidebar-title">Bình luận </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                    </div> -->
                    <div class="sidebar-item">
                        <a href="#!" class="sidebar-link">
                            <span class="sidebar-title">Cơ sở dữ liệu </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="sidebar-drop-list">
                            <div class="sidebar-drop-item">
                                <a href="?option=export_database">Xuất database</a>
                            </div>
                            <div class="sidebar-drop-item">
                                <a href="?option=import_database">Thêm database </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>