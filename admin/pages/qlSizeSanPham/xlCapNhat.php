<?php
    include "../../../lib/DataProvider.php";
    
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $size = $_POST["cmbSize"];
        $slTon = $_POST["txtslTon"];
        $slBan = $_POST["txtslBan"];

        $ngayNhap = date("Y-m-d H:i:s");

        $sql = "UPDATE SizeSanPham
                SET MaSize = $size, NgayNhap = '$ngayNhap',
                SoLuongTon = $slTon, SoLuongBan = $slBan
                WHERE MaSanPham = $id";

        DataProvider::ExecuteQuery($sql);
        DataProvider::ChangeURL("../../index.php?c=3");
    }
?>