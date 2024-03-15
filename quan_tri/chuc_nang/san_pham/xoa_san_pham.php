<?php
if (!isset($bien_bao_mat)) {
    exit();
}

$id = $_GET['id'];

// Kết nối đến cơ sở dữ liệu MySQLi
$conn = mysqli_connect("localhost", "root", "", "ban_hang");

if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}

$tv = "select * from san_pham where id='$id'";
$tv_1 = mysqli_query($conn, $tv);
$tv_2 = mysqli_fetch_array($tv_1);

$link_hinh = "../hinh_anh/san_pham/" . $tv_2['hinh_anh'];
if (is_file($link_hinh)) {
    unlink($link_hinh);
}

$tv = "DELETE FROM san_pham WHERE id = $id";
mysqli_query($conn, $tv);

// Đóng kết nối
mysqli_close($conn);
?>
