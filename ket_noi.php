<?php
    $conn = mysqli_connect("localhost", "root", "", "ban_hang");

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    // Chọn cơ sở dữ liệu
    mysqli_select_db($conn, "ban_hang");

    // Thiết lập bảng mã kết nối
    mysqli_query($conn, 'SET NAMES "UTF8"');
?>
