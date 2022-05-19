<div class="content">
    <div class="grid">
        <div class="content__top">
            <?php 
                if(isset($_GET['option'])){
                    switch($_GET['option']){
                        case 'ordersuccess':
                            include "views/ordersuccess.php";
                            break;
                        case 'home':
                            include "views/home.php";
                            break;
                        case 'show_products':
                            include 'views/show_products.php';
                            break;
                        case 'list_product':
                            include "views/list_product.php";
                            break;
                        case 'product_detail':
                            include "views/product_detail.php";
                            break;
                        case 'show_product_brand':
                            include "views/product_brand.php";
                            break;
                        case 'show_product_cat':
                            include "views/product_cat.php";
                            break;
                        case 'search'
                        case 'login':
                            include "views/login.php";
                            break;
                        case 'logout':
                            // huỷ session đi
                            unset($_SESSION['member']);
                            header('location:?option=home');
                            break;
                        case 'change_password':
                            include "views/change_password.php";
                            break;
                        case 'edit_profile':
                            include 'views/edit_profile.php';
                            break;
                        case 'register':
                            include "views/register.php";
                            break;
                        case 'about':
                            include "views/about.php";
                            break;
                        case 'cart':
                            include "views/cart.php";
                            break;
                        case 'order':
                            include "views/order.php";
                            break;
                    }
                }else{
                    include "views/home.php";
                }
            ?>
        </div>
    </div>
</div>