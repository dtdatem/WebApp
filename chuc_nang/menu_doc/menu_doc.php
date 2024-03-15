<head>
    <!-- Thư viện Bootstrap CSS, JS và jQuery -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <style>
        .custom-button {
            background-color: #b3d1ff; /* Đổi màu nền của button */
            color: #262626; /* Đổi màu chữ của button */
            margin-top: 8px;
            border: none;
        }
        .custom-button:hover {
        background-color: #99c2ff; /* Màu nền khi hover */
        color: #ffffff; /* Màu chữ khi hover */
        }
    </style>
</head>
<body>

<?php
    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect("localhost", "root", "", "ban_hang");

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    $tv = "SELECT * FROM menu_doc ORDER BY id";
    $tv_1 = mysqli_query($conn, $tv);

    echo '<div class="container">';
    echo '<button class="btn btn-primary custom-button" type="button" data-toggle="collapse" data-target="#allMenus" aria-expanded="false" aria-controls="allMenus">';
    echo 'Danh Mục';
    echo '</button>';
    echo '<div class="collapse" id="allMenus">';
    echo '<div class="card card-body">';

    while ($tv_2 = mysqli_fetch_array($tv_1)) {
        $link = "?thamso=xuat_san_pham&id=" . $tv_2['id'];
        echo '<a href="' . $link . '">' . $tv_2['ten'] . '</a><br>';
    }

    echo '</div>';
    echo '</div>';
    echo '</div>';

    // Đóng kết nối
    mysqli_close($conn);
?>

</body>
