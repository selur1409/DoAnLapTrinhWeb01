<div class="container">
    <section>
        <div class="container">
            <h2>Tìm kiếm hãng sản xuất</h2>
            <div class="row">
                <div class="btnAdd">
                    <a href="index.php?c=6&a=3">
                        <img src="images/new.png">
                    </a>
                    <form class="formS" action="index.php?c=11" method="POST">
                        <input type="text" name="txtSearch" id="txtSearch" placeholder="Tìm kiếm hãng sản xuất">
                        <button type="submit" name="btnSearch" id="btnSearch"><img src="../img/iconSearch.png" id="iconSearch" width="25x"></button>
                    </form>
                </div>
                <table cellspacing="0" border="1" style="text-align: center;"> 
                    <tr>
                        <th width="50">STT</th>
                        <th width="200">Tên hãng sản xuất</th>
                        <th width="100">Tình trạng</th>
                        <th width="150">Thao tác</th>
                    </tr>
                    <?php
                        if(isset($_REQUEST["btnSearch"]))
                            $search = $_POST["txtSearch"];
                        if(empty($search))
                        {
                            echo "Vui lòng nhập kí tự";    
                        }
                        else
                        {
                            $sql = "SELECT * from HangSanXuat WHERE TenHangSanXuat like '%$search%'";
                            $result = DataProvider::ExecuteQuery($sql);
                            $i = 1;
                            // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                            if ($search != "") 
                            {
                                // Dùng $num để đếm số dòng trả về.
                                echo "Kết quả trả về với từ khóa '<b>$search</b>'<br>";
                                while ($row = mysqli_fetch_array($result))
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row["TenHangSanXuat"]; ?></td>
                                            <td>
                                                <?php
                                                    if($row["BiXoa"] == 1)
                                                        echo "<img src='images/locked.png' />";
                                                    else
                                                        echo "<img src='images/active.png' />";
                                
                                                ?>
                                            </td>
                                            <td>
                                                <a href="pages/qlHang/xlKhoa.php?id=<?php echo $row["MaHangSanXuat"] ?>">
                                                    <img src='images/lock.png' />
                                                </a>
                                                <a href="index.php?c=6&a=2&id=<?php echo $row["MaHangSanXuat"] ?>">
                                                    <img src='images/edit.png' />
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "Không tìm thấy kết quả";
                            }
                        }               
                    ?>
                </table>
            </div>
        </div>
    </section>
</div>