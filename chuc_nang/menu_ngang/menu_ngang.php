<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Ngang</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        .menu_ngang {
            background-color: #333;
            overflow: hidden;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .menu_ngang a {
            float: left;
            display: block;
            color: #ffffff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .menu_ngang a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Định dạng phần tìm kiếm */
        .search-container {
            float: right;
            margin-top: 12px;
            margin-right: 12px;
        }

        .search-input {
            padding: 8px;
            border: 2px solid #ccc;
            border-radius: 25px;
            outline: none;
            box-sizing: border-box;
        }

        .search-icon {
            margin-left: 5px;
            background-color: #cccccc;
            border: none;
            color: #fff;
            border-radius: 25px;
            padding: 8px 12px;
            cursor: pointer;
        }

        /* Định dạng phần giỏ hàng */
        .cart-container {
            float: right;
            /*margin-top: 8px;*/
            margin-right: 16px;
        }

        .cart-icon {
            margin-left: 5px;
            background-color: #ffe6cc;
            border: none;
            color: #000;
            border-radius: 25px;
            padding: 3px 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect("localhost", "root", "", "ban_hang");

    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    $tv = "SELECT id, ten, loai_menu FROM menu_ngang ORDER BY id";
    $tv_1 = mysqli_query($conn, $tv);

    echo "<div class='menu_ngang'>";
    echo "<a href='index.php'>Trang chủ</a>";

    while ($tv_2 = mysqli_fetch_array($tv_1)) {
        if ($tv_2['loai_menu'] == "") {
            $link_menu = "?thamso=xuat_mot_tin&id=" . $tv_2['id'];
        }
        if ($tv_2['loai_menu'] == "san_pham") {
            $link_menu = "?thamso=xuat_san_pham_2";
        }

        echo "<a href='$link_menu'>";
        echo $tv_2['ten'];
        echo "</a>";
    }

    // Thêm phần giỏ hàng
    echo "<div class='cart-container'>";
    echo "<a href='?thamso=gio_hang' class='cart-icon'>&#128722;</a>";
    echo "</div>";

    // Thêm phần tìm kiếm
    echo "<div class='search-container'>";
    echo "<form>";
    echo "<input type='hidden' name='thamso' value='tim_kiem'>";
    echo "<input type='text' class='search-input' name='tu_khoa' placeholder='Tìm kiếm...'>";
    echo "<button type='submit' class='search-icon'>&#128269;</button>";
    echo "</form>";
    echo "</div>";

    echo "</div>";
    mysqli_close($conn);
?>

</body>
</html>
