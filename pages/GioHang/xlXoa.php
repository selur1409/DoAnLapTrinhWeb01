<?php
    session_start();
    include "../../lib/DataProvider.php";
    include "../../lib/ShoppingCart.php";
    
    if(isset($_GET["id"]))
    {
        $gioHang = unserialize($_SESSION["GioHang"]);
        $id = $_GET["id"];
        $gioHang->delete($id);
        $_SESSION["GioHang"] = serialize($gioHang);
        DataProvider::ChangeURL("../../index.php?a=6");
    }
    else
    {
        DataProvider::ChangeURL("../../index.php?a=404");
    }
?>
