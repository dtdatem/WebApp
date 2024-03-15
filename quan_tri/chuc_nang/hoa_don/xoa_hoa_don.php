<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$id = $_GET['id'];

	$conn = mysqli_connect("localhost", "root", "", "ban_hang");

	if (!$conn) {
	    die("Kết nối không thành công: " . mysqli_connect_error());
	}

	$tv = "DELETE FROM hoa_don WHERE id = $id ";
	mysqli_query($conn, $tv);

	mysqli_close($conn);
?>
