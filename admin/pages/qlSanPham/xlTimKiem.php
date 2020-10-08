<div class="container">
    <section>
        <div class="container">
            <h2>Tìm kiếm sản phẩm</h2>
            <div class="row">
                <div class="btnAdd">
                    <a href="index.php?c=2&a=3">
                        <img src="images/new.png">
                    </a>
                    <form class="formS" action="index.php?c=8" method="POST">
                        <input type="text" name="txtSearch" id="txtSearch" placeholder="Tìm kiếm sản phẩm">
                        <button type="submit" name="btnSearch" id="btnSearch"><img src="../img/iconSearch.png" id="iconSearch" width="25x"></button>
                    </form>
                </div>
                <table cellspacing="0" border="1" style="text-align: center;"> 
                    <tr >
                        <th width="50">STT</th>
                        <th width="120">Tên sản phẩm</th>
                        <th width="100">Hình</th>
                        <th width="100">Giá nhập</th>
                        <th width="100">Giá bán</th>
                        <th width="100">Giá ưu đãi</th>
                        <th width="100">Ngày nhập</th>
                        <th width="80">Số lượng tồn</th>
                        <th width="80">Số lượng bán</th>
                        <th width="80">Số lược xem</th>
                        <th width="100">Loại</th>
                        <th width="100">Hãng</th>
                        <th width="100">Mô tả</th>
                        <th width="100">Trạng thái</th>
                        <th width="100">Thao tác</th>

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
                            $sql = "SELECT * FROM SanPham s, LoaiSanPham l, HangSanXuat h
                                WHERE s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaHangSanXuat = h.MaHangSanXuat  AND TenSanPham like '%$search%' ORDER BY s.MaSanPham DESC";      
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
                                    <td><?php echo $row["TenSanPham"]; ?></td>
                                    <td>
                                        <img src="../images/<?php echo $row["HinhURL"]; ?>" width="60px">
                                    </td>
                                    <td><?php echo $row["GiaNhap"]; ?></td>
                                    <td><?php echo $row["GiaBan"]; ?></td>
                                    <td><?php echo $row["GiaUuDai"]; ?></td>
                                    <td><?php echo $row["NgayNhap"]; ?></td>
                                    <td><?php echo $row["SoLuongTon"]; ?></td>
                                    <td><?php echo $row["SoLuongBan"]; ?></td>
                                    <td><?php echo $row["SoLuocXem"]; ?></td>
                                    <td><?php echo $row["TenLoaiSanPham"]; ?></td>
                                    <td><?php echo $row["TenHangSanXuat"]; ?></td>
                                    <td>
                                        <div id="<?php echo "mt".$i; ?>">
                                            <?php
                                                if(strlen($row["MoTa"]) > 40)
                                                {
                                                    $sMoTa = substr($row["MoTa"], 0, 40)."...";

                                                    echo $sMoTa;
                                                        ?>
                                                            <a href="<?php echo "#mt".$i; ?>" onclick="return displayFullDis(<?php echo $i; ?>)">Xem</a>
                                            <?php
                                                }
                                                    if(strlen($row["MoTa"]) <= 40)
                                                    {
                                                        $sMoTa = $row["MoTa"];
                                                        echo $sMoTa;
                                                    }

                                            ?>

                                        </div>
                                        <div id="<?php echo "fullMoTa".$i; ?>" style="display: none;">
                                            <?php echo $row["MoTa"]; ?>
                                            <br><a href="<?php echo "#fullMoTa".$i; ?>" onclick="return hiddenFullDis(<?php echo $i; ?>)">Thu</a>
                                        </div>
                                                
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
                                        <a href="pages/qlSanPham/xlKhoa.php?id=<?php echo $row["MaSanPham"] ?>">
                                            <img src="images/lock.png">
                                        </a>
                                        <a href="index.php?c=2&a=2&id=<?php echo $row["MaSanPham"] ?>">
                                            <img src="images/edit.png">
                                        </a>
                                    </td>
                                </tr>
                            <?php
                        }
                    
                            }
                            
                            else{
                                echo "Không tìm thấy kết quả";
                            }
                        }               
                    ?>
                </table>
                    
                <script type="text/javascript">
                    function displayFullDis(i)
                    {
                        var m = document.getElementById("mt" + i);
                        m.style.display = "none";
                    
                        var f = document.getElementById("fullMoTa" + i);
                        f.style.display = "block";
                    }
                
                    function hiddenFullDis(i)
                    {
                        var m = document.getElementById("mt" + i);
                        m.style.display = "block";

                        var f = document.getElementById("fullMoTa" + i);
                        f.style.display = "none";
                    }
                </script>
            </div>
        </div>
    </section>
</div>