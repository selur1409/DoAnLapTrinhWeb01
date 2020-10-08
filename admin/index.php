<?php
    session_start();
    include "../lib/DataProvider.php";


    if(!isset($_SESSION["MaLoaiTaiKhoan"]) || $_SESSION["MaLoaiTaiKhoan"] != 2)
        DataProvider::ChangeURL("../index.php");

    $c = 1;
    if(isset($_GET["c"]))
        $c = $_GET["c"];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phân hệ quản lý</title>
    
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styleqlSanPham.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleSearch.css">

    <script src="../jQuery/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="header">
        <a href="index.php">
            HỆ THỐNG QUẢN LÍ SẢN PHẨM JFF SHOP
        </a>
    </div>
    <div id="menu">
        <?php 
            include "modules/mLogin.php";
            include "modules/mMenu.php";
        ?>
    </div>
    <div id="content">
        <?php
            switch($c){
                case 1:
                    include "pages/qlTaiKhoan/pIndex.php";
                    break;
                case 2:
                    include "pages/qlSanPham/pIndex.php";
                    break;
                case 3:
                    include "pages/qlSizeSanPham/pIndex.php";
                    break;
                case 4:
                    include "pages/qlHinhSanPham/pIndex.php";
                    break;
                case 5:
                    include "pages/qlLoai/pIndex.php";
                    break;
                case 6:
                    include "pages/qlHang/pIndex.php";
                    break;
                case 7:
                    include "pages/qlDonDatHang/pIndex.php";
                    break;
                case 8:
                    include "pages/qlSanPham/xlTimKiem.php";
                    break;
                case 9:
                    include "pages/qlTaiKhoan/xlTimKiem.php";
                    break;
                case 10:
                    include "pages/qlLoai/xlTimKiem.php";
                    break;
                case 11:
                    include "pages/qlHang/xlTimKiem.php";
                    break;
                case 12:
                    include "pages/qlDonDatHang/xlTimKiem.php";
                    break;
                case 13:
                    include "pages/qlSizeSanPham/xlTimKiem.php";
                    break;
                case 14:
                    include "pages/qlHinhSanPham/xlTimKiem.php";
                    break;
                default:
                    include "pages/pError.php";
                    break;
            }
        ?>
    </div>
    <div id="footer">
        &copy; Design by JFF team
    </div>
</body>
</html>
