<?php
if (!isset($bien_bao_mat)) {
    exit();
}

// Kết nối đến MySQLi
$conn = mysqli_connect("localhost", "root", "", "ban_hang");

if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}

$noi_dung = $_POST['noi_dung'];
$noi_dung = mysqli_real_escape_string($conn, $noi_dung);

$tv = "UPDATE quang_cao SET html = '$noi_dung' WHERE vi_tri='phai'";
mysqli_query($conn, $tv);

// Đóng kết nối
mysqli_close($conn);
?>
