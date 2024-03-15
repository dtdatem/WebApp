<?php 
	if(!isset($bien_bao_mat)){exit();}
	$conn = mysqli_connect("localhost", "root", "", "ban_hang");

	if (!$conn) {
	    die("Kết nối không thành công: " . mysqli_connect_error());
	}

	$id = $_GET['id'];
	$tv = "SELECT * FROM slideshow WHERE id='$id'";
	$tv_1 = mysqli_query($conn, $tv);
	$tv_2 = mysqli_fetch_array($tv_1);

	$link_hinh = "../hinh_anh/slideshow/" . $tv_2['hinh'];
	if(is_file($link_hinh)) {
		unlink($link_hinh);
	}

	$tv = "DELETE FROM slideshow WHERE id = $id";
	mysqli_query($conn, $tv);

	mysqli_close($conn);
?>
