<?php
error_reporting(0);
$con = new MySQLi('localhost','root','','db_tbvt');
$sql="select * from members";
$result = $con->query($sql);
?>
<div class="print-order"  style="position: fixed; z-index:99; background:#e7e7ed;top:0;left:0;right:0; 
 margin-bottom:4px;border:1px solid #ccc; width:100%; margin:0 auto;   height:100%;">
 <a id ="noprint" href="?option=show_member">Trở lại </a>
    <div class="print-wrap" style="max-width:700px; margin:0 auto;">
    <table>
        <thead>
            <th>ID</th>
            <th>USERNAME</th>
            <th>FULLNAME</th>
            <th>MOBILE</th>
            <th>ADDRESS</th>
            <th>EMAIL</th>
            <th>STATUS</th>
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
    </div>
</div>
<script>
    window.print();
</script>
