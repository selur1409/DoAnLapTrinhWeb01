<?php
    include "../lib/DataProvider.php";
    if(isset($_POST["idSanPham"]))
    {
        $idTaiKhoan = $_POST["idTaiKhoan"];
        if($idTaiKhoan > 0 )
        {
            $idSanPham = $_POST["idSanPham"];
            $idTaiKhoan = $_POST["idTaiKhoan"];
            $comment = $_POST["txtMoTa"];
            $ngayNhap = date("Y-m-d H:i:s");

            $sql = "INSERT INTO BinhLuan(NoiDung, NgayBinhLuan, MaSanPham, MaTaiKhoan) 
                    Values('$comment', '$ngayNhap', $idSanPham, $idTaiKhoan)";
            DataProvider::ExecuteQuery($sql);
            DataProvider::ChangeURL("../index.php?a=3&id=$idSanPham");
        }
        else
        {
            DataProvider::ChangeURL("../index.php?a=7");
        }
    }
    DataProvider::ChangeURL("../index.php?a=404");
?>