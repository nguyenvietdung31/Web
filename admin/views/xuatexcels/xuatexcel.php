<?php
error_reporting(0);
$con = new MySQLi('localhost','root','','db_tbvt');
$sql="select * from members";
$result = $con->query($sql);
?>
<div class="print-order"  style="position: fixed;top:0;left:0;right:0 bottom:0; 
 margin-bottom:4px; width:100%; margin:0 auto;   height:100%;">
 <a id ="noprint" href="?option=show_member">Trở lại </a>
    <!-- <div class="print-wrap" style="max-width:700px; margin:0 auto;"> -->
    <table>
        <thead>
            <th>MÃ</th>
            <th>TÊN ĐĂNG NHẬP</th>
            <th>HỌ VÀ TÊN</th>
            <th>SỐ ĐIỆN THOẠI</th>
            <th>ĐỊA CHỈ</th>
            <th>EMAIL</th>
            <th>TRẠNG THÁI</th>
        </thead>
        <tbody>
            <?php foreach($result as $key):?>
                <tr>
                    <td data-label="MÃ"><?php echo $key['member_id']; ?></td>
                    <td data-label="TÊN ĐĂNG NHẬP"><?php echo $key['username']; ?></td>
                    <td data-label="HỌ TÊN"><?php echo $key['fullname']; ?></td>
                    <td data-label="SỐ ĐIỆN THOẠI"><?php echo $key['mobile']; ?></td>
                    <td data-label="ĐỊA CHỈ"><?php echo $key['address']; ?></td>
                    <td data-label="EMAIL"><?php echo $key['email']; ?></td>
                    <td data-label="TRẠNG THÁI "><?php echo $key['status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- </div> -->
</div>
<?php
header("Content-Type:application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=download.xls");
mysqli_close($con);
?>
<script>
    var ex = document.getElementById('export');
    var header = document.getElementById('header');
    var sidebar = document.getElementById('sidebar');
    ex.onclick = function(){
        header.style.display = 'none';
        sidebar.style.display = 'none'; 
        window.print();
    }
</script>

  
