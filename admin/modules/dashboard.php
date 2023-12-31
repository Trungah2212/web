<p class="font-size-24 mg-5">Welcome to dasboard!</p>
<?php
//đếm danh mục
$sql_dem_danhmuc = "SELECT COUNT(*) AS dem FROM tbl_danhmuc";
$query_dem_danhmuc = $mysqli->query($sql_dem_danhmuc);
// đếm sản phẩm
$sql_dem_sanpham = "SELECT COUNT(*) AS dem FROM tbl_sanpham";
$query_dem_sanpham = $mysqli->query($sql_dem_sanpham);
//dem danh muc bai viet
$sql_dem_danhmucbv = "SELECT COUNT(*) AS dem FROM tbl_danhmucbv";
$query_dem_danhmucbv = $mysqli->query($sql_dem_danhmucbv);
//dem bai viet
$sql_dem_baiviet = "SELECT COUNT(*) AS dem FROM tbl_baiviet";
$query_dem_baiviet = $mysqli->query($sql_dem_baiviet);
//dem don hang
$sql_dem_donhang = "SELECT COUNT(*) AS dem FROM tbl_giohang";
$query_dem_donhang = $mysqli->query($sql_dem_donhang);


?>
<!-- 
    //Hiển thị số lượng danh mục -->
<div class="flex-container flex-wrap bg-dash">
    <?php
    if ($query_dem_danhmuc) {
        $result = $query_dem_danhmuc->fetch_assoc();
        $soLuongDanhMuc = $result['dem'];
    ?>

        <div class="info-box fex-1">
            <span class="info-box-icon bg-aqua"><i class="ti-layout-grid2"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Danh mục sản phẩm</span><br>
                <span class="info-box-number"><?php echo $soLuongDanhMuc  ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>

        </a>
    <?php
    }
    ?>


    <!-- //Hiển thị số lượng sản phẩm -->
    <?php
    if ($query_dem_sanpham) {
        $result = $query_dem_sanpham->fetch_assoc();
        $soLuongSanPham = $result['dem'];
    ?>
        <div class="info-box fex-1">
            <span class="info-box-icon bg-green"><i class="ti-package"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Sản phẩm</span><br>
                <span class="info-box-number"><?php echo $soLuongSanPham ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        </a>
    <?php
    }
    ?>


    <!-- //Hiển thị số lượng tin tức -->
    <?php
    if ($sql_dem_danhmucbv) {
        $result = $query_dem_danhmucbv->fetch_assoc();
        $soLuongDanhMucBaiViet = $result['dem'];
    ?>
        <div class="info-box fex-1">
            <span class="info-box-icon bg-yellow"><i class="ti-book"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Danh mục bài viết</span><br>
                <span class="info-box-number"><?php echo $soLuongDanhMucBaiViet ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        </a>
    <?php
    }
    ?>


    <!-- //hiển thị số lương bài viết -->
    <?php
    if ($sql_dem_baiviet) {
        $result = $query_dem_baiviet->fetch_assoc();
        $soLuongBaiViet = $result['dem'];
    ?>

        <div class="info-box fex-1">
            <span class="info-box-icon bg-red"><i class="ti-write"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Bài viết</span><br>
                <span class="info-box-number"><?php echo $soLuongBaiViet ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        </a>
    <?php
    }
    ?>


    <!--hiển thị số lương don hang -->
    <?php
    if ($sql_dem_donhang) {
        $result = $query_dem_donhang->fetch_assoc();
        $soLuongDonHang = $result['dem'];
    ?>
        <div class="info-box mg-10">
            <span class="info-box-icon bg-azure"><i class="ti-shopping-cart-full"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Đơn hàng</span><br>
                <span class="info-box-number"><?php echo $soLuongDonHang ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        </a>
    <?php
    }
    ?>

    <!-- <div class="img-dashboard mg-10">
        <img src="./img/dash-img.jpg" alt="" width="100%">
    </div> -->

    <div class="img-dashboard-2">
        <img src="./img/dash-img-2.jpg" alt="" width="50%">
    </div>

</div>