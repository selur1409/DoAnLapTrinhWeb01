<?php
    include "../../../lib/DataProvider.php";
    if(isset($_POST["txtTenSanPham"]))
    {
        $ten = $_POST["txtTenSanPham"];
        $hang = $_POST["cmbHang"];
        $loai = $_POST["cmbLoai"];
        $slTon = $_POST["txtslTon"];
        $giaNhap = $_POST["txtGiaNhap"];
        $giaBan = $_POST["txtGiaBan"];
        $giaBan = $_POST["txtGiaBan"];
        $giaUuDai = $_POST["txtGiaUuDai"];
        $moTa = $_POST["txtMoTa"];
        $choose = $_POST["radio"];

        $ngayNhap = date("Y-m-d H:i:s");

        $hinh = $_FILES["fImg"]["name"];
        move_uploaded_file($_FILES["fImg"]["tmp_name"], "../../../images/".$hinh);
        $sql = "INSERT INTO SanPham(TenSanPham, HinhURL, GiaNhap, GiaBan, GiaUuDai, NgayNhap, SoLuongTon, SoLuongBan, SoLuocXem, MoTa, MaLoaiSanPham, MaHangSanXuat, BiXoa)
                       Values('$ten', '$hinh', $giaNhap, $giaBan, $giaUuDai, '$ngayNhap', $slTon, 0, 0, '$moTa', $loai, $hang, 0) ";
        DataProvider::ExecuteQuery($sql);
    }
    if($choose == "continue")
       DataProvider::ChangeURL("../../index.php?c=2&a=3");
    DataProvider::ChangeURL("../../index.php?c=2");
?>