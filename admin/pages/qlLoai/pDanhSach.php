<div class="btnAdd">
    <a href="index.php?c=5&a=3">
        <img src="images/new.png">
    </a>
    <form class="formS" action="index.php?c=10" method="POST">
        <input type="text" name="txtSearch" id="txtSearch" placeholder="Tìm kiếm loại sản phẩm">
        <button type="submit" name="btnSearch" id="btnSearch"><img src="../img/iconSearch.png" id="iconSearch" width="25x"></button>
    </form>
</div>


<table cellspacing="0" border="1" style="text-align: center;">
    <tr>
        <th width="50">STT</th>
        <th width="200">Tên loại sản phẩm</th>
        <th width="100">Tình trạng</th>
        <th width="150">Thao tác</th>
    </tr>
    <?php
        $sql = "SELECT * from LoaiSanPham";
        $result = DataProvider::ExecuteQuery($sql);
        $i = 1;
        while ($row = mysqli_fetch_array($result))
        {
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row["TenLoaiSanPham"]; ?></td>
                    <td>
                        <?php
                            if($row["BiXoa"] == 1)
                                echo "<img src='images/locked.png' />";
                            else
                                echo "<img src='images/active.png' />";

                        ?>
                    </td>
                    <td>
                        <a href="pages/qlLoai/xlKhoa.php?id=<?php echo $row["MaLoaiSanPham"] ?>">
                            <img src='images/lock.png' />
                        </a>
                        <a href="index.php?c=5&a=2&id=<?php echo $row["MaLoaiSanPham"] ?>">
                            <img src='images/edit.png' />
                        </a>
                    </td>
                </tr>
            <?php
        }
    ?>
</table>