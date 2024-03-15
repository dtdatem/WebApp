<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$ten_menu = trim($_POST['ten']);
	$ten_menu = str_replace("'","&#39;",$ten_menu);
	$id = $_GET['id'];

	if ($ten_menu != "") {
		$conn = mysqli_connect("localhost", "root", "", "ban_hang");

		if (!$conn) {
		    die("Kết nối không thành công: " . mysqli_connect_error());
		}

		$tv="
		UPDATE menu_doc SET 
		ten = '$ten_menu'
		WHERE id = $id;
		";

		mysqli_query($conn, $tv);

		mysqli_close($conn);
	} else {
		thong_bao_html("Tên menu chưa được điền vào");
	}
?>
