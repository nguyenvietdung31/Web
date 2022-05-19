<?php 
$con = new MySQLi('localhost','root','','db_tbvt');
// lấy tất cả bảng trong database
$tables = array();
$result = $con->query("SHOW TABLES");

while($row = mysqli_fetch_row($result)){
    $tables[] = $row[0];
}
$return = '';
foreach($tables as $table){
    $sql = "select *from ".$table;
    $result = $con->query($sql);
    // Số cột
    $num_fields = mysqli_num_fields($result);
    $return .= 'DROP TABLE'.$table.';';
    $sqltable = "SHOW CREATE TABLE ".$table;

    $s = $con->query($sqltable);
    // trả về hàng hiện tại 
    $row2 = mysqli_fetch_row($s);
    $return .= "\n\n".$row2[1].";\n\n";
    // echo var_dump($return);
    for($i = 0; $i < $num_fields; $i++){
        while($row = mysqli_fetch_row($result)){
            $return .= "INSERT INTO ".$table." VALUES(";
            for($j = 0; $j < $num_fields; $j++){
                // chèn vào chuỗi chứa " hoặc '
                $row[$j] = addslashes($row[$j]);
                if(isset($row[$j])){
                    $return .='"'.$row[$j].'"';
                }else{
                    $return .='""';
                }
                if($j < $num_fields-1){$return .=',';}

                }
                $return .= ");\n";
            }
        }
        $return .="\n\n\n";
    }
// Lưu file 
$handle = fopen('backup.sql','w+');
fwrite($handle,$return);
fclose($handle);
echo "Backup thành công !!!";
?>