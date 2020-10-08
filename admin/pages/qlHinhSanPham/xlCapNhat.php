<?php
    include "../../../lib/DataProvider.php";
    
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $hinh = $_FILES["fImg"]["name"];
        move_uploaded_file($_FILES["fImg"]["tmp_name"], "../../../images/".$hinh);
        $ngayNhap = date("Y-m-d H:i:s");

        $sql = "UPDATE HinhSanPham
                SET HinhSanPhamURL = '$hinh'
                WHERE MaHinhSanPham = $id";

        DataProvider::ExecuteQuery($sql);
        DataProvider::ChangeURL("../../index.php?c=4");
    }
    
?>