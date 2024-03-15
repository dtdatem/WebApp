<?php 
    if(!isset($bien_bao_mat)) { exit(); }
?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-image: url('hinh_anh/blueee.jpg'); /* Đặt đường dẫn đến hình ảnh nền */
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .login-container {
        background-color: rgba(255, 255, 255, 0.8); /* Sử dụng rgba để thêm độ trong suốt cho khung đăng nhập */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    table {
        width: 100%;
    }

    td {
        padding: 10px;
        text-align: right;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<div class="login-container">
    <h2>Classic Chic Co</h2>
    <form method="post">
        <table>
            <tr>
                <td>Tài khoản :</td>
                <td><input name="ky_danh" required></td>
            </tr>
            <tr>
                <td>Mật khẩu :</td>
                <td><input type="password" name="mat_khau" required></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="hidden" name="dang_nhap_quan_tri" value="dang_nhap_quan_tri">
                    <input type="submit" value="Đăng nhập">
                </td>
            </tr>
        </table>
    </form>
</div>
