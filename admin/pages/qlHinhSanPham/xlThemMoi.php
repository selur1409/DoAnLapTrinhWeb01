<?php
    include "../../../lib/DataProvider.php";
    
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $hinh = $_FILES["fImg"]["name"];
        $choose = $_POST["radio"];
        
        move_uploaded_file($_FILES["fImg"]["tmp_name"], "../../../images/".$hinh);


        $sql = "INSERT INTO HinhSanPham(MaSanPham, HinhSanPhamURL, BiXoa)
                VALUES($id, '$hinh', 0)";

        DataProvider::ExecuteQuery($sql);
        if($choose == "continue")
            DataProvider::ChangeURL("../../index.php?c=4&a=3");
        DataProvider::ChangeURL("../../index.php?c=4");
    }
    
?>