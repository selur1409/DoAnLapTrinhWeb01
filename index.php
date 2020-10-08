<?php
    session_start();
    include "lib/DataProvider.php";

    $_SESSION["path"] = $_SERVER["REQUEST_URI"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www/w3/org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>JFF SHOP</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/styleLogin.css">
    <link rel="stylesheet" type="text/css" href="css/styleMenuHeader.css" />
    <link rel="stylesheet" type="text/css" href="css/styleCTSanPham.css">
    <link rel="stylesheet" type="text/css" href="css/styleSanPham.css">
    <link rel="stylesheet" type="text/css" href="css/styleGioHang.css">
    <link rel="stylesheet" type="text/css" href="css/stylefooter.css">


    <script src="jQuery/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
    <div id="wrapper">
        <?php
            include "modules/mHeader.php";
        ?>
        <div id="content">
            <?php
                $a = 1;
                if(isset($_GET["a"]) == true)
                    $a = $_GET["a"];
                switch($a)
                {
                    case 1:
                        include "pages/pIndex.php";
                        break;
                    case 2:
                        include "pages/pSanPham.php";
                        break;
                    case 3:
                        include "pages/pChiTiet.php";
                        break;
                    case 4:
                        include "pages/pSanPhamTheoHang.php";
                        break;
                    case 5:
                        include "pages/pSanPhamTheoLoai.php";
                        break;    
                    case 6:
                        include "pages/GioHang/pIndex.php";
                        break;
                    case 7:
                        include "pages/pLogin.php";
                        break;
                    case 8:
                        include "pages/TaoTaiKhoan/pIndex.php";
                        break;
                    case 9:
                        include "pages/pTimKiem.php";
                        break;
                    case 10:
                        include "pages/GioHang/pThongBaoDanhSachThanhCong.php";
                        break;
                    default:
                        include "pages/pError.php";
                        break;
                }
            ?>
        </div>
        <?php 
            include "modules/mFooter.php"; 
        ?>
    </div>
</body>
</html>