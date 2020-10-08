<?php
    include "../../../lib/DataProvider.php";
    
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $ten = $_POST["txtTenSanPham"];
        $hang = $_POST["cmbHang"];
        $loai = $_POST["cmbLoai"];
        $hinh = $_FILES["fImg"]["name"];

        move_uploaded_file($_FILES["fImg"]["tmp_name"], "../../../images/".$hinh);

        $giaNhap = $_POST["txtGiaNhap"];
        $giaBan = $_POST["txtGiaBan"];
        $giaUuDai = $_POST["txtGiaUuDai"];
        $slTon = $_POST["txtslTon"];
        $slBan = $_POST["txtslBan"];
        $mota = $_POST["txtMoTa"];

        $ngayNhap = date("Y-m-d H:i:s");

        $sql = "UPDATE SanPham
                SET TenSanPham = '$ten', MaHangSanXuat = $hang, MaLoaiSanPham = $loai, NgayNhap = '$ngayNhap', HinhURL = '$hinh',
                GiaNhap = $giaNhap, GiaBan = $giaBan, GiaUuDai = $giaUuDai,SoLuongTon = $slTon, SoLuongBan = $slBan, MoTa = '$mota' 
                WHERE MaSanPham = $id";

        DataProvider::ExecuteQuery($sql);
        DataProvider::ChangeURL("../../index.php?c=2");
    }
    
?>