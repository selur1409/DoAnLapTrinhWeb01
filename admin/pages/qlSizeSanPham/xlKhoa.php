<?php
    include "../../../lib/DataProvider.php";
    
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];

        $sql = "SELECT COUNT(*) FROM SizeSanPham WHERE MaChiTietSanPham = $id";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if($row[0] == 0)
        {
            $sql = "DELETE FROM SizeSanPham WHERE MaChiTietSanPham = $id";
        }
        else
        {
            $sql = "UPDATE SizeSanPham SET BiXoa = 1 - BiXoa WHERE MaChiTietSanPham = $id";
        }

        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=3");
?>