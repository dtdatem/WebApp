<style>
    .product-table {
        margin-top: 12px;
        border-collapse: collapse;
        width: 100%;
        border-radius: 6px;
        border: 1px solid #ddd; /* Màu sắc của khung viền */
        
    }

    .product-table td {
        border: 1px solid #ddd; /* Màu sắc của khung viền */
        padding: 8px;
        text-align: center;
        border-radius: 6px;
        border: none;
    }

    .product-name {
        color: black;
    }
</style>

<?php 
    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect("localhost", "root", "", "ban_hang");

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    $tv = "SELECT id, ten, gia, hinh_anh, thuoc_menu FROM san_pham WHERE trang_chu='co' ORDER BY sap_xep_trang_chu DESC LIMIT 0,15";
    $tv_1 = mysqli_query($conn, $tv);

    echo "<table class='product-table'>";

    while ($tv_2 = mysqli_fetch_array($tv_1)) {
        echo "<tr>";

        for ($i = 1; $i <= 3; $i++) {
            echo "<td>";

            if ($tv_2 != false) {
                $link_anh = "hinh_anh/san_pham/" . $tv_2['hinh_anh'];
                $link_chi_tiet = "?thamso=chi_tiet_san_pham&id=" . $tv_2['id'];
                $gia = $tv_2['gia'];
                $gia = number_format($gia, 0, ",", ".");

                echo "<a href='$link_chi_tiet' >";
                echo "<img src='$link_anh' width='150px' >";
                echo "</a>";
                echo "<br>";
                echo "<br>";
                echo "<a href='$link_chi_tiet' class='product-name' >";
                echo $tv_2['ten'];
                echo "</a>";
                echo "<div style='margin-top:5px' >";
                echo $gia;
                echo "</div>";
                echo "<br>";
            } else {
                echo "&nbsp;";
            }

            echo "</td>";

            if ($i != 3) {
                $tv_2 = mysqli_fetch_array($tv_1);
            }
        }

        echo "</tr>";
    }

    echo "</table>";

    // Đóng kết nối
    mysqli_close($conn);
?>
