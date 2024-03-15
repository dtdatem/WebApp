<?php 
    if (!isset($bien_bao_mat)) {
        exit();
    }
?>
<?php 
    $id = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "ban_hang");

    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    $tv = "SELECT * FROM hoa_don WHERE id='$id' ";
    $tv_1 = mysqli_query($conn, $tv);
    $tv_2 = mysqli_fetch_array($tv_1);
    $ten_nguoi_mua = $tv_2['ten_nguoi_mua'];
    $email = $tv_2['email'];
    $dien_thoai = $tv_2['dien_thoai'];
    $dia_chi = $tv_2['dia_chi'];
    $noi_dung = $tv_2['noi_dung'];
    $hang_duoc_mua = $tv_2['hang_duoc_mua'];
    $link_dong = "?thamso=hoa_don&&trang=".$_GET['trang'];
    $link_xoa = "?xoa_hoa_don_o_trang_chi_tiet=co&id=".$id."&trang=".$_GET['trang'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
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

        .total {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .empty-cart {
            color: #777;
        }

        .info-table {
            margin-top: 30px;
        }

        .info-table td {
            padding: 10px;
        }

        .info-table td:first-child {
            font-weight: bold;
            width: 180px;
        }

        .action-link {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        .action-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Chi tiết đơn hàng</h2>

        <table>
            <tr>
                <td width="250px"><b style="color:blue;font-size:20px" >Sản phẩm được đặt hàng</b><br><br> </td>	
                <td width="740px" align="right">
                    <a href="<?php echo $link_dong; ?>" class="action-link">Đóng</a>
                </td>		
            </tr>
            <tr>
                <td align="left" colspan="2">
                    <table>
                        <tr>
                            <th width="100px">STT</th>
                            <th width="300px">Tên</th>
                            <th width="180px">Size</th>
                            <th width="180px">Giá bán</th>
                            <th width="110px">Số lượng</th>
                            <th width="200px">Tổng cộng</th>
                        </tr>
                        <?php 
                            $m = explode("[|||||]",$hang_duoc_mua);	
                            $tong_lon = 0;
                            for($i=0; $i<count($m); $i++)
                            {
                                if(isset($m[$i]))
                                {
                                    if($m[$i]!="")
                                    {
                                        $stt = $i + 1;
                                        $m_2 = explode("[|||]",$m[$i]);
                                        while (count($m_2) < 3) {
                                            $m_2[2] = isset($_SESSION['size_them_vao_gio'][$i]) ? $_SESSION['size_them_vao_gio'][$i] : 'S';
                                        }
                                        $id_sp = $m_2[0];
                                        $sl_sp = $m_2[1];
                                        $size_sp = $m_2[2];
                                        $tv_sp = "SELECT id,ten,gia FROM san_pham WHERE id='$id_sp' ";
                                        $tv_sp_1 = mysqli_query($conn, $tv_sp);
                                        $tv_sp_2 = mysqli_fetch_array($tv_sp_1);
                                        $ten = $tv_sp_2['ten'];
                                        $gia = $tv_sp_2['gia'];
                                        $gia_duoc_dinh_dang = number_format($gia,0,",",".");
                                        $tong = $gia * $sl_sp;
                                        $tong_duoc_dinh_dang = number_format($tong,0,",",".");
                                        $tong_lon = $tong_lon + $tong;
                                        if($sl_sp != 0)
                                        {
                                        ?>
                                            <tr>
                                                <td><?php echo $stt; ?></td>
                                                <td><?php echo $ten; ?></td>
                                                <td><?php echo $size_sp; ?></td>
                                                <td><?php echo $gia_duoc_dinh_dang; ?></td>
                                                <td><?php echo $sl_sp; ?></td>
                                                <td><?php echo $tong_duoc_dinh_dang; ?></td>
                                            </tr>
                                        <?php
                                        }								
                                    }
                                }
                                
                            }
                        ?>
                        <tr>
                            <td colspan="5">
                                <br><br>
                                <br><br>
                                Tiền vận chuyển là : <b> 30,000 VNĐ</b>
                                <br><br>
                                Tổng tiền của đơn hàng là : 
                                <?php 
                                    $tong_lon = $tong_lon + 30000;
                                    $tong_lon_duoc_dinh_dang = number_format($tong_lon,0,",",".");
                                    echo "<b>".$tong_lon_duoc_dinh_dang." VNĐ</b>";
                                ?>  
                                <br><br>
                            </td>
                        </tr>
                    </table>
                </td>		
            </tr>
        </table>

        <table class="info-table" width="990px">
            <tr>
                <td><b style="color:blue;font-size:20px" >Thông tin người mua</b><br><br> </td>
                <td align="right">&nbsp;</td>
            </tr>
            <tr height="30px">
                <td>Tên người mua : </td>
                <td><?php echo $ten_nguoi_mua; ?></td>
            </tr>
            <tr height="30px">
                <td>Email : </td>
                <td><?php echo $email; ?></td>
            </tr>		
            <tr height="30px">
                <td>Điện thoại : </td>
                <td><?php echo $dien_thoai; ?></td>
            </tr>
            <tr height="30px">
                <td valign="top">Địa chỉ : </td>
                <td><?php echo $dia_chi; ?></td>
            </tr>
            <tr height="30px">
                <td valign="top">Nội dung : </td>
                <td><?php echo $noi_dung; ?></td>
            </tr>
            <tr height="30px">
                <td>&nbsp;</td>
                <td><a href="<?php echo $link_xoa; ?>" class="action-link">Xóa</a></td>
            </tr>
        </table>
    </div>
</body>

</html>

<?php
    // Đóng kết nối
    mysqli_close($conn);
?>
