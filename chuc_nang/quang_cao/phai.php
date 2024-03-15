<br>Quảng cáo <br><br>
<?php 
    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect("localhost", "root", "", "ban_hang");

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    $tv = "SELECT html FROM quang_cao WHERE vi_tri='phai'";
    $tv_1 = mysqli_query($conn, $tv);

    // Kiểm tra truy vấn có thành công hay không
    if ($tv_1) {
        $tv_2 = mysqli_fetch_array($tv_1);

        // Kiểm tra xem có dữ liệu trả về hay không
        if ($tv_2) {
            echo $tv_2['html'];
        } else {
            echo "Không có dữ liệu trả về từ truy vấn.";
        }
    } else {
        echo "Lỗi trong quá trình thực hiện truy vấn: " . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
?>
