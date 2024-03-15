<?php 
	if (!isset($bien_bao_mat)) {
		exit();
	}
?>

<style type="text/css">
	.menu-container {
		display: flex;
	}

	.menu-column {
		width: 50%;
	}

	.link {
		text-decoration: none;
		color: black;
		font-size: 18px;
		line-height: 30px;
		display: block;
		padding: 10px;
		border: 1px solid #ccc;
		transition: background-color 0.3s, color 0.3s;
	}

	.link:hover {
		background-color: #75a3a3;
		color: #fff;
	}

	.link-container {
		margin-bottom: 20px;
	}

	.link-container h2 {
		font-size: 24px;
		color: #333;
		margin-bottom: 10px;
	}

	.link-container .link {
		margin-bottom: 5px;
	}

	.link-container .link:last-child {
		margin-bottom: 0;
	}
</style>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		var links = document.querySelectorAll('.link');

		links.forEach(function(link) {
			link.addEventListener('mouseenter', function() {
				this.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.1)';
			});

			link.addEventListener('mouseleave', function() {
				this.style.boxShadow = 'none';
			});
		});
	});
</script>

<div class="menu-container">
	<div class="menu-column">
		<div class="link-container">
			<h2>Thêm mới</h2>
			<a href="?thamso=them_menu_ngang" class="link">Thêm menu ngang</a>
			<a href="?thamso=them_menu_doc" class="link">Thêm menu dọc</a>
			<a href="?thamso=them_san_pham" class="link">Thêm sản phẩm</a>
		</div>

		<div class="link-container">
			<h2>Quản lý</h2>
			<a href="?thamso=quan_ly_menu_ngang" class="link">Quản lý menu ngang</a>
			<a href="?thamso=quan_ly_menu_doc" class="link">Quản lý menu dọc</a>
			<a href="?thamso=quan_ly_san_pham" class="link">Quản lý sản phẩm</a>
			<a href="?thamso=hoa_don" class="link">Quản lý hóa đơn</a>
		</div>
	</div>

	<div class="menu-column">
		<div class="link-container">
			<h2>Sản phẩm và Trang chủ</h2>
			<a href="?thamso=san_pham_trang_chu" class="link">Sản phẩm trang chủ</a>
			<a href="?thamso=san_pham_noi_bat" class="link">Sản phẩm nổi bật</a>
			<a href="?thamso=slideshow" class="link">Slideshow</a>
		</div>

		<div class="link-container">
			<h2>Thay đổi</h2>
			<a href="?thamso=sua_banner" class="link">Thay đổi banner</a>
			<a href="?thamso=sua_footer" class="link">Thay đổi footer</a>
			<a href="?thamso=sua_quang_cao_trai" class="link">Thay đổi quảng cáo trái</a>
			<a href="?thamso=sua_quang_cao_phai" class="link">Thay đổi quảng cáo phải</a>
			<a href="?thamso=sua_thong_tin_quan_tri" class="link">Thay đổi thông tin quản trị</a>
		</div>
	</div>
</div>
