<h1 class="tieude">Quản lý size sản phẩm</h1>
<?php
    $a = 1;
    if(isset($_GET["a"]))
        $a = $_GET["a"];
    
        switch($a){
            case 1:
                include "pages/qlSizeSanPham/pDanhSach.php";
                break;
            case 2:
                include "pages/qlSizeSanPham/pCapNhat.php";
                break;
            case 3:
                include "pages/qlSizeSanPham/pThemMoi.php";
                break;
            default:
                include "pages/pError.php";
                break;
        }
?>