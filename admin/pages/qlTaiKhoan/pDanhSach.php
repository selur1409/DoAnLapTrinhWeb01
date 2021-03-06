<div class="btnAdd">
    <form class="formS" action="index.php?c=9" method="POST">
        <input type="text" name="txtSearch" id="txtSearch" placeholder="Tìm kiếm tài khoản">
        <button type="submit" name="btnSearch" id="btnSearch"><img src="../img/iconSearch.png" id="iconSearch" width="25x"></button>
    </form>
</div>

<table cellspacing="0" border="" style="text-align: center;">
    <tr>
        <th width="75">Mã tài khoản</th>
        <th width="150">Tên đăng nhập</th>
        <th width="150">Tên hiển thị</th>
        <th width="200">Địa chỉ</th>
        <th width="130">Điện thoại</th>
        <th width="200">Email</th>
        <th width="75">Tình trạng</th>
        <th width="130">Loại tài khoản</th>
        <th width="100">Thao tác</th>
    </tr>
    <?php
        $sql = "SELECT t.MaTaiKhoan, t.TenDangNhap, t.TenHienThi, t.DiaChi, t.DienThoai, t.Email, t.BiXoa, l.TenLoaiTaiKhoan 
                FROM TaiKhoan t, LoaiTaiKhoan l WHERE t.MaLoaiTaiKhoan = l.MaLoaiTaiKhoan";
        $result = DataProvider::ExecuteQuery($sql);
        while ($row = mysqli_fetch_array($result))
        {
            ?>
                <tr>
                    <td><?php echo $row["MaTaiKhoan"]; ?></td>
                    <td><?php echo $row["TenDangNhap"]; ?></td>
                    <td><?php echo $row["TenHienThi"]; ?></td>
                    <td><?php echo $row["DiaChi"]; ?></td>
                    <td><?php echo $row["DienThoai"]; ?></td>
                    <td><?php echo $row["Email"]; ?></td>
                    <td>
                        <?php
                            if($row["BiXoa"] == 1)
                                 echo "<img src='images/locked.png' />";
                            else
                                echo "<img src='images/active.png' />";
                        ?>
                    </td>
                    <td><?php echo $row["TenLoaiTaiKhoan"]; ?></td>
                    <td>
                        <a href="pages/qlTaiKhoan/xlKhoa.php?id=<?php echo $row["MaTaiKhoan"] ?>">
                            <img src="images/lock.png">
                        </a>
                        <a href="index.php?c=1&a=2&id=<?php echo $row["MaTaiKhoan"] ?>">
                            <img src="images/edit.png">
                        </a>
                    </td>
                </tr>
            <?php
        }
    ?>
</table>