<style>
    #new-products {
        border: 1px solid #ccc;
        padding: 10px;
        margin: 10px;
        background-color: #e6e6e6; 
        border-radius: 6px; 
    }

    .product-container {
        text-align: center;
        display: inline-block;
        margin: 10px;
        padding: 10px; /* Thêm padding cho container */
        border: 1px solid #ddd; /* Đường viền mảnh xung quanh container */
        border-radius: 6px; 
        background-color: #fff; /* Màu nền của container */
    }

    .product-container img {
        max-width: 100%;
        height: auto;
    }
</style>


<br><br>
<div id="new-products">
    Sản phẩm mới <br><br>
    <center>
        <?php 
            // Kết nối đến cơ sở dữ liệu
            $conn = mysqli_connect("localhost", "root", "", "ban_hang");

            // Kiểm tra kết nối
            if (!$conn) {
                die("Kết nối không thành công: " . mysqli_connect_error());
            }

            $tv = "SELECT id, ten, hinh_anh FROM san_pham ORDER BY id DESC LIMIT 0,3";
            $tv_1 = mysqli_query($conn, $tv);

            while ($tv_2 = mysqli_fetch_array($tv_1)) {
                $link_anh = "hinh_anh/san_pham/" . $tv_2['hinh_anh'];
                $link_chi_tiet = "?thamso=chi_tiet_san_pham&id=" . $tv_2['id'];

                echo "<div class='product-container'>";
                echo "<a href='$link_chi_tiet'>";
                echo "<img src='$link_anh' alt='Product Image'>";
                echo "</a>";
                echo "<br><br>";
                echo $tv_2['ten'];
                echo "<br>";
                echo "<br>";
                echo "</div>";
            }

            // Đóng kết nối
            mysqli_close($conn);
        ?>
    </center>
</div>
