<?php
    session_start();
    include "../../lib/DataProvider.php";
    include "../../lib/ShoppingCart.php";

    if(isset($_SESSION["GioHang"]))
    {
        $gioHang = unserialize($_SESSION["GioHang"]);
        $maTaiKhoan = $_SESSION["MaTaiKhoan"];

        date_default_timezone_get("Asia/Ho_Chi_Minh");
        $ngayLap = date("Y-m-d H:i:s");
        $ngayLapTam = date("Y-m-d");
        $maTinhTrang = 1;
        $tongGia = $_SESSION["TongGia"];

        $sql = "SELECT MaDonDatHang FROM DonDatHang WHERE NgayLap like '$ngayLapTam' ORDER BY MaDonDatHang DESC LIMIT 1";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        $r = "081012003";
        $sttMaDonDatHang = 0;
        if($row != null)
        {
            $sttMaDonDatHang = substr($row["MaDonDatHang"], 6, 3);
        }
        $sttMaDonDatHang += 1;
        $sttMaDonDatHang = sprintf("%03s", $sttMaDonDatHang);
        $maDonDatHang = date("d").date("m").substr(date("Y"), 2, 2).$sttMaDonDatHang;
        $sql = "INSERT INTO DonDatHang(MaDonDatHang, NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang) 
                VALUES ('$maDonDatHang', '$ngayLap', $tongGia, $maTaiKhoan, $maTinhTrang)";
        DataProvider::ExecuteQuery($sql);   
        
        
        // Xử lý thêm chi tiết đơn hàng
        $soLuongSanPham = count($gioHang->listProduct);
        for($i = 0; $i < $soLuongSanPham; $i++)
        {
            $id = $gioHang->listProduct[$i]->id;
            $sl = $gioHang->listProduct[$i]->num;
            
            $sql = "SELECT GiaBan, GiaUuDai, SoLuongTon FROM SanPham WHERE MaSanPham = $id";
            $result = DataProvider::ExecuteQuery($sql);
            $row = mysqli_fetch_array($result);
            
            $sttChiTietDonDatHang = sprintf("%02s", $i);
            $maChiTietDonDatHang = $maDonDatHang.$sttChiTietDonDatHang;

            $soLuongTonHienTai = $row["SoLuongTon"];
            $giaSanPham = $row["GiaBan"];
            $giaUuDai = $row["GiaUuDai"];

            if($giaUuDai != 0)
            {
                $sql = "INSERT INTO ChiTietDonDatHang(MaChiTietDonDatHang, SoLuong, GiaBan, MaDonDatHang, MaSanPham) 
                    VALUES ('$maChiTietDonDatHang', '$sl', '$giaUuDai', '$maDonDatHang', $id)";
                DataProvider::ExecuteQuery($sql);
            }
            else
            {
                $sql = "INSERT INTO ChiTietDonDatHang(MaChiTietDonDatHang, SoLuong, GiaBan, MaDonDatHang, MaSanPham) 
                    VALUES ('$maChiTietDonDatHang', '$sl', '$giaSanPham', '$maDonDatHang', $id)";
                DataProvider::ExecuteQuery($sql);
            }

            $sql = "UPDATE SanPham 
                    SET SoLuongTon = SoLuongTon - $sl
                    WHERE MaSanPham = $id";
            DataProvider::ExecuteQuery($sql);

            $sql = "UPDATE SanPham 
                    SET SoLuongBan = SoLuongBan + $sl
                    WHERE MaSanPham = $id";
            DataProvider::ExecuteQuery($sql);
        }
        unset($_SESSION["GioHang"]);
       DataProvider::ChangeURL("../../index.php?a=10&sub=2");
    }   
    DataProvider::ChangeURL("../../index.php?a=404");
?>