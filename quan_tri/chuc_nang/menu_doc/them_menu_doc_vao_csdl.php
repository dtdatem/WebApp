<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$ten_menu = trim($_POST['ten']);
		$ten_menu = str_replace("'","&#39;",$ten_menu);

		if ($ten_menu != "") {
			$conn = mysqli_connect("localhost", "root", "", "ban_hang");

			if (!$conn) {
			    die("Kết nối không thành công: " . mysqli_connect_error());
			}

			$tv="
			INSERT INTO menu_doc (ten) 
			VALUES ('$ten_menu');
			";

			mysqli_query($conn, $tv);

			mysqli_close($conn);
		} else {
			thong_bao_html("Tên menu chưa được điền vào");
		}
	}
?>
