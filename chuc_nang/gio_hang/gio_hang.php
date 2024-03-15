<?php
    if (session_status() === PHP_SESSION_NONE) {
        // Chỉ gọi session_start() nếu chưa có session nào đang hoạt động
        session_start();
    }

    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect("localhost", "root", "", "ban_hang");

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    if (isset($_GET['id']) && $_SESSION['trang_chi_tiet_gio_hang'] == "co") {
        $_SESSION['trang_chi_tiet_gio_hang'] = "huy_bo";

        if (isset($_SESSION['id_them_vao_gio'])) {
            $so = count($_SESSION['id_them_vao_gio']);
            $trung_lap = "khong";

            for ($i = 0; $i < count($_SESSION['id_them_vao_gio']); $i++) {
                if ($_SESSION['id_them_vao_gio'][$i] == $_GET['id']) {
                    $trung_lap = "co";
                    $vi_tri_trung_lap = $i;
                    break;
                }
            }

            if ($trung_lap == "khong") {
                $_SESSION['id_them_vao_gio'][$so] = $_GET['id'];
                $_SESSION['sl_them_vao_gio'][$so] = $_GET['so_luong'];
                $_SESSION['size_them_vao_gio'][$so] = $_GET['size'];
            }

            if ($trung_lap == "co") {
                $_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap] += $_GET['so_luong'];
            }
        } else {
            $_SESSION['id_them_vao_gio'][0] = $_GET['id'];
            $_SESSION['sl_them_vao_gio'][0] = $_GET['so_luong'];
            $_SESSION['size_them_vao_gio'][0] = $_GET['size'];
        }
    }

    $gio_hang = "khong";

    if (isset($_SESSION['id_them_vao_gio'])) {
        $so_luong = 0;

        for ($i = 0; $i < count($_SESSION['id_them_vao_gio']); $i++) {
            $so_luong += $_SESSION['sl_them_vao_gio'][$i];
        }

        if ($so_luong != 0) {
            $gio_hang = "co";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            width: 50px;
            padding: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .total {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .empty-cart {
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Giỏ hàng</h2>

        <?php if ($gio_hang == "khong"): ?>
            <p class="empty-cart">Không có sản phẩm trong giỏ hàng</p>
        <?php else: ?>
            <form action='' method='post'>
                <input type='hidden' name='cap_nhat_gio_hang' value='co'>
                <table>
                    <tr>
                        <th width='200px'>Tên</th>
                        <th width='150px'>Size</th>
                        <th width='150px'>Số lượng</th>
                        <th width='150px'>Đơn giá</th>
                        <th width='170px'>Thành tiền</th>
                    </tr>

                    <?php
                        $tong_cong = 0;

                        for ($i = 0; $i < count($_SESSION['id_them_vao_gio']); $i++) {
                            $tv = "SELECT id,ten,gia FROM san_pham WHERE id='" . $_SESSION['id_them_vao_gio'][$i] . "'";
                            $tv_1 = mysqli_query($conn, $tv);
                            $tv_2 = mysqli_fetch_array($tv_1);

                            $tien = $tv_2['gia'] * $_SESSION['sl_them_vao_gio'][$i];
                            $tong_cong += $tien;

                            $name_id = "id_" . $i;
                            $name_sl = "sl_" . $i;

                            if ($_SESSION['sl_them_vao_gio'][$i] != 0) {
                                echo "<tr>";
                                echo "<td>" . $tv_2['ten'] . "</td>";
                                echo "<td>" . $_SESSION['size_them_vao_gio'][$i] . "</td>"; 
                                echo "<td>";
                                echo "<input type='hidden' name='" . $name_id . "' value='" . $_SESSION['id_them_vao_gio'][$i] . "' >";
                                echo "<input type='text' name='" . $name_sl . "' value='" . $_SESSION['sl_them_vao_gio'][$i] . "' > ";
                                echo "</td>";
                                echo "<td>" . $tv_2['gia'] . "</td>";
                                echo "<td>" . $tien . "</td>";
                                echo "</tr>";
                            }
                        }
                    ?>

                    <tr>
                        <td>&nbsp;</td>
                        <td><input type='submit' value='Cập nhật'></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </form>

            <?php $tong_cong1 = $tong_cong + 30000?>
            <p class="total">Giá trị đơn hàng là: <?php echo number_format($tong_cong); ?> VNĐ</p>
            <p class="total">Phí vận chuyển là: 30,000 VNĐ</p>
            <p class="total">Tổng chi phí phải trả là: <?php echo number_format($tong_cong1); ?> VNĐ</p>
            <?php include("chuc_nang/gio_hang/bieu_mau_mua_hang.php"); ?>
        <?php endif; ?>

    </div>
</body>

</html>

<?php
    // Đóng kết nối
    mysqli_close($conn);
?>
