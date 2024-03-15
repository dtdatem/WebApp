<?php 
	if(!isset($bien_bao_mat)){exit();}
	$conn = mysqli_connect("localhost", "root", "", "ban_hang");

	if (!$conn) {
	    die("Kết nối không thành công: " . mysqli_connect_error());
	}

	for($i=1;$i<=10;$i++)
	{
		$ten_select="select_".$i;
		$ten_id="id_".$i;
		if(isset($_POST[$ten_id]))
		{
			$id=mysqli_real_escape_string($conn, $_POST[$ten_id]);
			$noi_bat=mysqli_real_escape_string($conn, $_POST[$ten_select]);
			$tv="UPDATE san_pham SET noi_bat='$noi_bat' WHERE id='$id'";
			mysqli_query($conn, $tv);
		}
	}

	mysqli_close($conn);
?>
