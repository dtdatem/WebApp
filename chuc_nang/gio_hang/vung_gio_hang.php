<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<br>
<?php 
	$so_luong=0;
	if(isset($_SESSION['id_them_vao_gio']))
	{
		for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
		{
			$so_luong=$so_luong+$_SESSION['sl_them_vao_gio'][$i];
		}
	}
?>
<a href="?thamso=gio_hang">
    <span style="color: black; margin-left: 20px;">
        <i class="fas fa-shopping-cart"></i> Giỏ hàng
    </span>
</a>
(<?php echo $so_luong; ?>)
<br><br>

