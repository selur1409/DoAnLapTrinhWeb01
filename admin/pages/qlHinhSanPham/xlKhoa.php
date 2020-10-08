<?php
    include "../../../lib/DataProvider.php";
    
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];

        $sql = "SELECT COUNT(*) FROM HinhSanPham WHERE MaHinhSanPham = $id";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if($row[0] == 0)
        {
            $sql = "DELETE FROM HinhSanPham WHERE MaHinhSanPham = $id";
        }
        else
        {
            $sql = "UPDATE HinhSanPham SET BiXoa = 1 - BiXoa WHERE MaHinhSanPham = $id";
        }

        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=4");
?>