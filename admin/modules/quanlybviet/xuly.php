<?php
include('../../config/config.php');

// Kiểm tra nếu có dữ liệu được gửi từ form
if (isset($_POST["thembv"])) {
    $tenbv = $_POST["tieudebaiviet"];
    $noidungbv = $_POST["noidungbaiviet"];
    $nguon_url=$_POST["nguon_url"];
    $danhmuc = $_POST["danhmuc"];

    // Xử lý hình ảnh
    $hinhanh = $_FILES["hinhanh"]["name"];
    $hinhanh_tmp = $_FILES["hinhanh"]["tmp_name"];
    $hinhanh = time() . '_' . $hinhanh;

    // Chuẩn bị câu truy vấn INSERT
    $sql_them = "INSERT INTO tbl_baiviet(tieudebaiviet, noidungbaiviet,nguon_url, hinhanh, id_danhmuc) 
                 VALUES ('$tenbv', '$noidungbv','$nguon_url', '$hinhanh', '$danhmuc')";

    // Thực hiện truy vấn INSERT
    mysqli_query($mysqli, $sql_them);

    // Di chuyển hình ảnh đến thư mục uploads
    move_uploaded_file($hinhanh_tmp, "uploads/" . $hinhanh);

    // Chuyển hướng về trang quản lý bài viết
    header('Location:../../index.php?action=quanlybviet&id=002&query=them');
} elseif (isset($_POST["suabaiviet"])) {
    // SỬA
    $idbaiviet = $_GET['idbaiviet'];
    $tenbv = $_POST["tieudebaiviet"];
    $noidungbv = $_POST["noidungbaiviet"];
    $nguon_url=$_POST["nguon_url"];

    // Kiểm tra và xử lý hình ảnh
    $hinhanh = $_FILES["hinhanh"]["name"];
    $hinhanh_tmp = $_FILES["hinhanh"]["tmp_name"];
    $hinhanh = time() . '_' . $hinhanh;

    // Kiểm tra nếu có hình ảnh được tải lên
    if ($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, "uploads/" . $hinhanh);

        // Cập nhật thông tin bài viết
        $sql_update = "UPDATE tbl_baiviet SET tieudebaiviet='$tenbv', noidungbaiviet='$noidungbv',nguon_url='$nguon_url', hinhanh='$hinhanh' WHERE id_baiviet='$idbaiviet'";
    } else {
        // Cập nhật thông tin bài viết (không thay đổi hình ảnh)
        $sql_update = "UPDATE tbl_baiviet SET tieudebaiviet='$tenbv', noidungbaiviet='$noidungbv', nguon_url='$nguon_url' WHERE id_baiviet='$idbaiviet'";
    }

    // Thực hiện truy vấn UPDATE
    mysqli_query($mysqli, $sql_update);

    // Chuyển hướng về trang quản lý bài viết
    header('Location:../../index.php?action=quanlybviet&id=002&query=them');
} else {
    // XÓA
    $idbaiviet = $_GET['idbaiviet'];

    // Xóa hình ảnh
    $sql_select = "SELECT * FROM tbl_baiviet WHERE id_baiviet ='$idbaiviet' LIMIT 1";
    $query_select = mysqli_query($mysqli, $sql_select);

    while ($row = mysqli_fetch_array($query_select)) {
        unlink('uploads/' . $row['hinhanh']);
    }

    // Xóa bài viết
    $sql_xoa = "DELETE FROM tbl_baiviet WHERE id_baiviet='$idbaiviet'";
    mysqli_query($mysqli, $sql_xoa);

    // Chuyển hướng về trang quản lý bài viết
    header('Location:../../index.php?action=quanlybviet&id=002&query=them');
}
?>
