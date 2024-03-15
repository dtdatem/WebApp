<?php 
	if(!isset($bien_bao_mat)){exit();}
	$conn = mysqli_connect("localhost", "root", "", "ban_hang");

	if (!$conn) {
	    die("Kết nối không thành công: " . mysqli_connect_error());
	}

	$id = $_GET['id'];
	$tv = "SELECT * FROM slideshow WHERE id='$id' ";
	$tv_1 = mysqli_query($conn, $tv);
	$tv_2 = mysqli_fetch_array($tv_1);
	$ten_anh = $tv_2['hinh'];
	$lien_ket = $tv_2['lien_ket'];
	$link_hinh = "../hinh_anh/slideshow/" . $tv_2['hinh'];
	$link_dong = "?thamso=quan_ly_slideshow";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$lien_ket_post = $_POST['lien_ket'];
		$ten_anh_post = $_POST['ten_anh'];

		// Xử lý khi có sự thay đổi
		if ($lien_ket_post != $lien_ket) {
			$lien_ket = mysqli_real_escape_string($conn, $lien_ket_post);
			$tv = "UPDATE slideshow SET lien_ket='$lien_ket' WHERE id='$id'";
			mysqli_query($conn, $tv);
		}

		if ($_FILES['hinh_anh']['size'] > 0) {
			// Xử lý khi có thay đổi hình ảnh
			$ten_anh_moi = $_FILES['hinh_anh']['name'];
			$duong_dan_anh_moi = "../hinh_anh/slideshow/" . $ten_anh_moi;
			move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $duong_dan_anh_moi);

			// Xóa hình cũ
			unlink("../hinh_anh/slideshow/" . $ten_anh);

			// Cập nhật tên hình mới
			$tv = "UPDATE slideshow SET hinh='$ten_anh_moi' WHERE id='$id'";
			mysqli_query($conn, $tv);
		}

		// Chuyển hướng sau khi sửa
		header("Location: $link_dong");
		exit();
	}
?>

<form action="" method="post" enctype="multipart/form-data" >
	<table width="990px" >
		<tr>
			<td width="180px" ><b style="color:blue;font-size:20px" >Sửa slideshow</b><br><br> </td>
			<td width="810px" align="right" >
				<a href="<?php echo $link_dong; ?>" class="lk_a1" style="margin-right:30px" >Đóng</a>
			</td>
		</tr>
		<tr>
			<td >Liên kết : </td>
			<td >
				<input style="width:400px;margin-top:3px;margin-bottom:3px;" name="lien_ket" value="<?php echo $lien_ket; ?>" >
			</td>
		</tr>
		<tr>
			<td valign="top" >Hình ảnh : </td>
			<td>
				<img src='<?php echo $link_hinh; ?>' style='width:600px' > 
				<br><br>
				<input type="file" name="hinh_anh" >
				<input type="hidden" name="ten_anh" value="<?php echo $ten_anh; ?>" >
				<br><br>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<br>
				<input type="submit" name="bieu_mau_sua_slideshow" value="Sửa" style="width:200px;height:50px;font-size:24px" >
			</td>
		</tr>
	</table>
</form>

<?php 
	mysqli_close($conn);
?>
