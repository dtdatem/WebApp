<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['trang_chi_tiet_gio_hang'] = "co";
$id = $_GET['id'];

$conn = mysqli_connect("localhost", "root", "", "ban_hang");

if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}

$tv = "SELECT * FROM san_pham WHERE id='$id'";
$tv_1 = mysqli_query($conn, $tv);

if ($tv_1) {
    $tv_2 = mysqli_fetch_array($tv_1);

    if ($tv_2) {
        $link_anh = "hinh_anh/san_pham/" . $tv_2['hinh_anh'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .product-container {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            overflow: hidden; /* Thêm thuộc tính overflow để ẩn phần chạy ra khỏi container */
        }

        .product-image {
            max-width: 100%;
            height: auto;
            transition: transform 0.3s; /* Thêm transition cho hiệu ứng phóng to */
        }

        .product-container:hover .product-image {
            transform: scale(1.2); /* Phóng to khi hover vào container */
        }

        /* Các phần CSS khác giữ nguyên */
        .product-title {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }

        .product-price {
            font-size: 18px;
            font-weight: bold;
            color: #e44d26;
            margin-top: 10px;
        }

        .quantity-input {
            width: 80px;
        }

        .add-to-cart-btn {
            margin-top: 20px;
            background-color: #e44d26;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-to-cart-btn:hover {
            background-color: #e2441f;
        }

        .product-description {
            margin-top: 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="product-container">
                <img src="<?= $link_anh ?>" alt="Product Image" class="product-image">
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-container">
                <h2 class="product-title"><?= $tv_2['ten'] ?></h2>
                <div class="product-price"><?= number_format($tv_2['gia'], 0, ",", ".") ?> VNĐ</div>
                <form>
                    <input type="hidden" name="thamso" value="gio_hang">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <div class="form-group">
                        <label for="quantity">Số lượng:</label>
                        <input type="text" name="so_luong" class="form-control quantity-input" value="1">
                    </div>
                    <select name="size" class="form-control">
                            <option value="S">S</option>
                            <option value="X">X</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                    </select>
                    <button type="submit" class="btn btn-primary add-to-cart-btn">Thêm vào giỏ hàng</button>
                </form>
                <div class="product-description">
                    <?= $tv_2['noi_dung'] ?>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php
    } else {
        echo "Không có dữ liệu trả về từ truy vấn.";
    }
} else {
    echo "Lỗi trong quá trình thực hiện truy vấn: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
