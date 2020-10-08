<div class="btnAdd">
    <form class="formS" action="index.php?c=12" method="POST">
        <input type="text" name="txtSearch" id="txtSearch" placeholder="Tìm kiếm đơn đặt hàng">
        <button type="submit" name="btnSearch" id="btnSearch"><img src="../img/iconSearch.png" id="iconSearch" width="25x"></button>
    </form>
</div>
<table cellspacing="0" border="1" style="text-align: center;">
    <tr>
        <th width="50">STT</th>
        <th width="150">Mã đơn đặt hàng</th>
        <th width="100">Ngày lập</th>
        <th width="150">Khách hàng</th>
        <th width="120">Tình trạng</th>
        <th width="100">Thao tác</th>

    </tr>
    <?php
        $sql = "SELECT d.MaDonDatHang, d.NgayLap, d.MaTinhTrang, t.TenHienThi, tt.TenTinhTrang
        FROM DonDatHang d, TaiKhoan t, TinhTrang tt WHERE d.MaTaiKhoan = t.MaTaiKhoan AND d.MaTinhTrang = tt.MaTinhTrang
        ORDER BY d.MaTinhTrang, d.NgayLap";
        $result = DataProvider::ExecuteQuery($sql);
        $i = 1;
        while ($row = mysqli_fetch_array($result))
        {
            $c = "";
            switch($row["MaTinhTrang"]){
                case 2:
                    $c = "classGiaoHang";
                    break;
                case 3:
                    $c = "classThanhToan";
                    break;
                case 4:
                    $c = "classHuy";
                    break;
            }
            ?>
                <tr class="<?php echo $c; ?>">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row["MaDonDatHang"]; ?></td>
                    <td><?php echo $row["NgayLap"]; ?></td>
                    <td><?php echo $row["TenHienThi"]; ?></td>
                    <td><?php echo $row["TenTinhTrang"]; ?></td>
                    <td>
                        <a href="index.php?c=7&a=2&id=<?php echo $row["MaDonDatHang"] ?>">
                            <img src="images/edit.png">
                        </a>
                    </td>
                </tr>
            <?php
        }
    ?>
</table>