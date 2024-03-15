<?php
    $id = $_GET['id'];

    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect("localhost", "root", "", "ban_hang");

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    $tv = "SELECT * FROM menu_ngang WHERE id='$id'";
    $tv_1 = mysqli_query($conn, $tv);
    $tv_2 = mysqli_fetch_array($tv_1);

    echo "<h1>" . $tv_2['ten'] . "</h1>";
    echo $tv_2['noi_dung'];

    // Đóng kết nối
    mysqli_close($conn);
?>
