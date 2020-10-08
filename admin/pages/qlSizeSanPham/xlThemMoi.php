<?php
    include "../../../lib/DataProvider.php";
    
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $size = $_POST["cmbSize"];
        $slTon = $_POST["txtslTon"];
        $slBan = $_POST["txtslBan"];
        $choose = $_POST["radio"];

        $ngayNhap = date("Y-m-d H:i:s");

        $sql = "INSERT INTO SizeSanPham(MaSanPham, MaSize, NgayNhap, SoLuongTon, SoLuongBan, BiXoa)
                VALUES($id, $size, '$ngayNhap', $slTon, $slBan, 0)";

        DataProvider::ExecuteQuery($sql);
        
    }
    if($choose == "continue")
       DataProvider::ChangeURL("../../index.php?c=3&a=3");
    DataProvider::ChangeURL("../../index.php?c=3");
?>