<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$ten_menu = trim($_POST['ten']);
	$ten_menu = str_replace("'", "&#39;", $ten_menu);
	$loai_menu = $_POST['loai_menu'];
	$noi_dung = $_POST['noi_dung'];
	$noi_dung = str_replace("'", "&#39;", $noi_dung);
	
	if($ten_menu != "") {
		$conn = mysqli_connect("localhost", "root", "", "ban_hang");

		// Kiểm tra kết nối
		if (!$conn) {
			die("Kết nối không thành công: " . mysqli_connect_error());
		}

		// Thiết lập bảng mã kết nối
		mysqli_query($conn, 'SET NAMES "UTF8"');

		$query = "INSERT INTO menu_ngang (ten, noi_dung, loai_menu) VALUES ('$ten_menu', '$noi_dung', '$loai_menu')";

		if (mysqli_query($conn, $query)) {
			$_SESSION['loai_menu_wr8'] = $loai_menu;
		} else {
			echo "Lỗi: " . $query . "<br>" . mysqli_error($conn);
		}

		// Đóng kết nối
		mysqli_close($conn);
	}
	else {
		thong_bao_html("Tên menu chưa được điền vào");
	}
?>
