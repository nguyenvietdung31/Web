<?php
if(isset($_POST["Import"])){
		

		echo $filename=$_FILES["file"]["tmp_name"];
		
		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
	    
	          //It wiil insert a row to our subject table from our csv file`
	           $sql = "INSERT into members (`username`, `password`, `fullname`,`mobile`, `address`, `email`,`status`) 
	            	values('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]')";
	          $result = $con->query($sql);
				if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						</script>";
				}

	         }
	         fclose($file);
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";
			
		 }
	}	 
?>
<div class="form-container">
    <div class="head">Tải dữ liệu lên </div>
    <hr class="horiz">
    <div class="div1">
        <form  method="post" enctype = "multipart/form-data">
            <div class="form-content">
                <div class="inputdetails">
                    <span class="labels">CSV/Excel File:</span>
                    <input type="file" name="file">
                </div>
            </div>
            <div class="btn">
                <input type="submit" name="Import"  value="Tải lên" data-loading-text="Loading...">
                <a href="?option=show_member" >&lt;&lt;Trở lại </a>
            </div>
        </form>

    </div>
</div>