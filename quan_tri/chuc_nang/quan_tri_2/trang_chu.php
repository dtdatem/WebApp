<?php 
    if(!isset($bien_bao_mat)) { exit(); }
?>

<div class="admin-header">
    <div class="logo-container">
        <a href="index.php" class="logo">Admin Classic Chic Co</a>
    </div>

    <div class="menu-container">
        <a href="index.php" class="menu-link">Trang chủ</a>
        <a href="?thamso=menu_doc" class="menu-link">Menu dọc</a>
        <a href="?thamso=menu_ngang" class="menu-link">Menu ngang</a>
        <a href="?thamso=san_pham" class="menu-link">Sản phẩm</a>
        <a href="?thamso=hoa_don" class="menu-link">Hóa đơn</a>
    </div>

    <div class="logout-container">
        <a href="?thamso=thoat" class="menu-link">Thoát</a>
    </div>
</div>

<div class="content">
    <?php 
        include("chuc_nang/quan_tri_2/dieu_huong.php");
    ?>
</div>

<!-- <div class="footer">
    <table width="990px">
        <tr>
            <td width="445px" align="right">Cửa hàng :</td>
            <td width="445px">Classic Chic Co</td>
        </tr>
        <tr>
            <td align="right">Quản trị viên :</td>
            <td>Đỗ Tấn Đạt Em & Đỗ Minh Hoàng</td>
        </tr>
        <tr>
            <td align="right">Điện thoại :</td>
            <td>0855512303</td>
        </tr>
    </table>
</div> -->
<style type="text/css">
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
    }

    .admin-header {
        background-color: #333;
        padding: 10px 0;
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo-container {
        flex: 1;
    }

    .logo {
        font-size: 36px;
        color: #fff;
        text-decoration: none;
    }

    .menu-container {
        display: flex;
    }

    .menu-link {
       float: left;
            display: block;
            color: #ffffff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s;
            border-radius: 10px;
    }

    .menu-link:hover {
        background-color: #ddd;
        color: black;
    }

    .logout-container {
        margin-left: auto;
    }

    .content {
        margin-top: 20px;
    }

    .footer {
        margin-top: 20px;
    }

    .footer table {
        width: 990px;
    }

    .footer td {
        padding: 8px;
        text-align: center;
    }
</style>
