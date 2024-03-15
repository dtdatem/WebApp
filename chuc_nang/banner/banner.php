<?php 
    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect("localhost", "root", "", "ban_hang");

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    $tv = "SELECT * FROM banner LIMIT 0,1";

    // Sử dụng hàm mysqli_query với tham số là kết nối và câu truy vấn
    $tv_1 = mysqli_query($conn, $tv);

    // Kiểm tra truy vấn có thành công hay không
    if ($tv_1) {
        $tv_2 = mysqli_fetch_array($tv_1);

        // Kiểm tra xem có dữ liệu trả về hay không
        if ($tv_2) {
            $link_hinh = "hinh_anh/banner/" . $tv_2['hinh'];

            // Kiểm tra xem đường dẫn hình ảnh có tồn tại hay không
            if (file_exists($link_hinh)) {
                echo "<img src='" . $link_hinh . "' width='" . $tv_2['rong'] . "' height='" . $tv_2['cao'] . "' >";
            } else {
                echo "Hình ảnh không tồn tại.";
            }
        } else {
            echo "Không có dữ liệu trả về từ truy vấn.";
        }
    } else {
        echo "Lỗi trong quá trình thực hiện truy vấn: " . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
?>
