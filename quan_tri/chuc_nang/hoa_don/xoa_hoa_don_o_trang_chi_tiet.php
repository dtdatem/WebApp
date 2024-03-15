<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$id = $_GET['id'];
	$trang = $_GET['trang'];

	$conn = mysqli_connect("localhost", "root", "", "ban_hang");

	if (!$conn) {
	    die("Kết nối không thành công: " . mysqli_connect_error());
	}

	$tv = "DELETE FROM hoa_don WHERE id = $id ";
	mysqli_query($conn, $tv);

	mysqli_close($conn);

	$link = "?thamso=hoa_don&trang=$trang";
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Xóa hóa đơn</title>
	</head>
	<body>
		<script type="text/javascript" >
			window.location="<?php echo $link; ?>";
		</script>
	</body>
</html>
<?php 
	exit();
?>
