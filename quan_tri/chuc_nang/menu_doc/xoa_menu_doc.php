<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$id=$_GET['id'];
	$conn = mysqli_connect("localhost", "root", "", "ban_hang");

	if (!$conn) {
	    die("Kết nối không thành công: " . mysqli_connect_error());
	}

	$tv="select count(*) from san_pham where thuoc_menu='$id' ";
	$tv_1=mysqli_query($conn, $tv);
	$tv_2=mysqli_fetch_array($tv_1);

	if($tv_2[0]==0) {
		$truy_van_xoa="DELETE FROM menu_doc WHERE id = $id ";
		mysqli_query($conn, $truy_van_xoa);
	} else {
		thong_bao_html("Menu này vẫn còn dữ liệu nên không thể xóa");
	}

	mysqli_close($conn);
?>
