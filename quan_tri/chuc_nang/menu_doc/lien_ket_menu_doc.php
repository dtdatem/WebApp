<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<div style="width:990px;text-align:left" >
	<a href="?thamso=them_menu_doc" class="lk_c2" >Thêm menu dọc</a><br>
	<a href="?thamso=quan_ly_menu_doc" class="lk_c2" >Quản lý menu dọc</a><br>
</div>

<?php
	$conn = mysqli_connect("localhost", "root", "", "ban_hang");

	if (!$conn) {
	    die("Kết nối không thành công: " . mysqli_connect_error());
	}

	// Thực hiện các truy vấn MySQLi tại đây

	mysqli_close($conn);
?>
