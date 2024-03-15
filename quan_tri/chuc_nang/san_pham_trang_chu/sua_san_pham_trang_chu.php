<?php 
	if(!isset($bien_bao_mat)){exit();}
	$conn = mysqli_connect("localhost", "root", "", "ban_hang");

	if (!$conn) {
	    die("Kết nối không thành công: " . mysqli_connect_error());
	}

	for($i=1;$i<=10;$i++)
	{
		$ten_select="select_".$i;
		$ten_input="input_".$i;
		$ten_id="id_".$i;
		if(isset($_POST[$ten_id]))
		{
			$id=$_POST[$ten_id];
			$trang_chu=$_POST[$ten_select];
			$sap_xep_trang_chu=$_POST[$ten_input];

			$tv="UPDATE san_pham SET 
					trang_chu='$trang_chu',
					sap_xep_trang_chu='$sap_xep_trang_chu' 
					WHERE id='$id';
			";
			mysqli_query($conn, $tv);
		}
	}

	mysqli_close($conn);
?>
