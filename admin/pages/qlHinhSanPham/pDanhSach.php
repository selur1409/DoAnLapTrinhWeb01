<div class="btnAdd">
    <a href="index.php?c=4&a=3">
        <img src="images/new.png">
    </a>
    <form class="formS" action="index.php?c=14" method="POST">
        <input type="text" name="txtSearch" id="txtSearch" placeholder="Tìm kiếm sản phẩm">
        <button type="submit" name="btnSearch" id="btnSearch"><img src="../img/iconSearch.png" id="iconSearch" width="25x"></button>
    </form>
</div>

<table cellspacing="0" border="1" style="text-align: center;"> 
    <tr >
        <th width="50">STT</th>
        <th width="100">Mã sản phẩm</th>
        <th width="120">Tên sản phẩm</th>
        <th width="100">Hình</th>
        <th width="100">Trạng thái</th>
        <th width="100">Thao tác</th>

    </tr>
    <?php
        $sql = "SELECT h.MaSanPham, h.MaHinhSanPham,s.TenSanPham, h.HinhSanPhamURL, h.BiXoa FROM HinhSanPham h, SanPham s
                WHERE h.MaSanPham = s.MaSanPham
                ORDER BY s.MaSanPham DESC";
        $result = DataProvider::ExecuteQuery($sql);
        $i = 1;
        while ($row = mysqli_fetch_array($result))  
        {
            ?>
                <tr>
                    
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row["MaSanPham"]; ?></td>
                    <td><?php echo $row["TenSanPham"]; ?></td>
                    <td>
                        <img src="../images/<?php echo $row["HinhSanPhamURL"]; ?>" width="60px">
                    </td>                    
                    <td>    
                        <?php
                            if($row["BiXoa"] == 1)
                                echo "<img src='images/locked.png' />";
                            else
                                echo "<img src='images/active.png' />";
                        ?>
                    </td>
                    <td>
                        <a href="pages/qlHinhSanPham/xlKhoa.php?id=<?php echo $row["MaHinhSanPham"] ?>">
                            <img src="images/lock.png">
                        </a>
                        <a href="index.php?c=4&a=2&id=<?php echo $row["MaHinhSanPham"] ?>">
                            <img src="images/edit.png">
                        </a>
                    </td>
                </tr>
            <?php
        }
    ?>
</table>