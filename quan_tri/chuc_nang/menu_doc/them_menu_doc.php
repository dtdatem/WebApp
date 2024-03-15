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
<form action="" method="post">
	<table width="990px" >
		<tr>
			<td colspan="2" ><b style="color:blue;font-size:20px" >Thêm menu dọc</b><br><br> </td>
			
		</tr>
		<tr>
			<td width="150px" >Tên : </td>
			<td width="840px">
				<input style="width:400px;margin-top:3px;margin-bottom:3px;" name="ten" value="" >
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<br>
				<input type="submit" name="bieu_mau_them_menu_doc" value="Thêm menu" style="width:200px;height:50px;font-size:24px" >
			</td>
		</tr>
	</table>
</form>
