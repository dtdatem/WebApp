<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$ten_menu = trim($_POST['ten']);
	$ten_menu = str_replace("'", "&#39;", $ten_menu);
	$loai_menu = $_POST['loai_menu'];
	$noi_dung = $_POST['noi_dung'];
	$noi_dung = str_replace("'", "&#39;", $noi_dung);
	$id = $_GET['id'];
	
	// Kết nối CSDL
	$conn = mysqli_connect("localhost", "root", "", "ban_hang");

	// Kiểm tra kết nối
	if (!$conn) {
	    die("Kết nối không thành công: " . mysqli_connect_error());
	}

	// Chọn cơ sở dữ liệu
	mysqli_select_db($conn, "ban_hang");

	// Thiết lập bảng mã kết nối
	mysqli_query($conn, 'SET NAMES "UTF8"');

	if($ten_menu != "") {
		$tv = "
		UPDATE menu_ngang SET 
		ten = '$ten_menu',
		noi_dung = '$noi_dung',
		loai_menu = '$loai_menu' 
		WHERE id = $id;
		";
		mysqli_query($conn, $tv);
	}
	else {
		thong_bao_html("Tên menu chưa được điền vào");
	}

	// Đóng kết nối
	mysqli_close($conn);
?>
