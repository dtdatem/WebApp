<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$id = $_GET['id'];

	$conn = mysqli_connect("localhost", "root", "", "ban_hang");

	// Kiểm tra kết nối
	if (!$conn) {
		die("Kết nối không thành công: " . mysqli_connect_error());
	}

	// Thiết lập bảng mã kết nối
	mysqli_query($conn, 'SET NAMES "UTF8"');

	$query = "DELETE FROM menu_ngang WHERE id = $id";

	if (mysqli_query($conn, $query)) {
		echo "Xóa thành công";
	} else {
		echo "Lỗi: " . $query . "<br>" . mysqli_error($conn);
	}

	// Đóng kết nối
	mysqli_close($conn);
?>
