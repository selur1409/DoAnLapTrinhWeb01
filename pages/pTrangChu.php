<div class="container">
<section>
    <div class="container fixDisplay">
        <h2>Sản phẩm mới nhất</h2>
        <div class="row">
            <?php
                $sql = "SELECT * FROM SanPham sp WHERE BiXoa = 0 ORDER BY NgayNhap DESC LIMIT 0, 8";
                $result = DataProvider::ExecuteQuery($sql);
                while($row = mysqli_fetch_array($result))
                {
                    ?>
                        <div class="col-xs col-sm-6 col-md-3">
                            <a href="index.php?a=3&id=<?php echo $row["MaSanPham"]; ?>"><img src="images/<?php echo $row["HinhURL"]; ?>"/></a>
                            <div class="pname"><?php echo $row["TenSanPham"]; ?></div>
                            
                            <?php 
                                $giaUuDai = $row["GiaUuDai"];
                                if($giaUuDai != 0)
                                {
                                    ?>
                                        <div class="pprice"><strike>Giá: <?php echo $row["GiaBan"]; ?>đ</strike></div>
                                        <div class="pGiaUuDai">Giá: <?php echo $row["GiaUuDai"]; ?>đ</div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                        <div class="pBinhThuong">Giá: <?php echo $row["GiaBan"]; ?>đ</div>
                                    <?php
                                }
                            ?>

                            <div class="action">
                                <a href="index.php?a=3&id=<?php echo $row["MaSanPham"]; ?>">Xem Chi Tiết</a>
                            </div>
                        </div>
                        
                    <?php
                }
            ?>
        </div>
        <h2>Sản phẩm bán chạy nhất</h2>
        <div class="row">
            <?php
                $sql = "SELECT * FROM SanPham WHERE BiXoa = 0 ORDER BY SoLuongBan DESC LIMIT 0, 8";
                $result = DataProvider::ExecuteQuery($sql);
                while($row = mysqli_fetch_array($result))
                {
                    ?>
                        <div class="col-xs col-sm-6 col-md-3">
                        <a href="index.php?a=3&id=<?php echo $row["MaSanPham"]; ?>"><img src="images/<?php echo $row["HinhURL"]; ?>"/></a>
                        <div class="pname"><?php echo $row["TenSanPham"]; ?></div>
                        <?php 
                            $giaUuDai = $row["GiaUuDai"];
                            if($giaUuDai != 0)
                            {
                                ?>
                                    <div class="pprice"><strike>Giá: <?php echo $row["GiaBan"]; ?>đ</strike></div>
                                    <div class="pGiaUuDai">Giá: <?php echo $row["GiaUuDai"]; ?>đ</div>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <div class="pBinhThuong">Giá: <?php echo $row["GiaBan"]; ?>đ</div>
                                <?php
                            }
                        ?>

                            
                            <div class="action">
                                <a href="index.php?a=3&id=<?php echo $row["MaSanPham"]; ?>">Xem Chi Tiết</a>
                            </div>
                        </div>
                        
                    <?php
                }
            ?>
        </div>
    </div>

    <div class="container fixDisplay">
        <h2>HÃNG SẢN XUẤT</h2>
        <div class="row">
            <?php
                $sql = "SELECT * FROM HangSanXuat WHERE BiXoa = 0";
                $result = DataProvider::ExecuteQuery($sql);
                while($row = mysqli_fetch_array($result))
                {
                    ?>
                        <div class="col-md-4 home">
                            <img src="img/<?php echo $row["LogoURL"]; ?>" />
                            <div class="pname"><?php echo $row["TenHangSanXuat"]; ?></div>
                            <a href="index.php?a=4&id=<?php echo $row["MaHangSanXuat"]; ?>">Xem</a>
                        </div>
                    <?php
                }
            ?>
        </div>
        <h2>CÁC LOẠI SẢN PHẨM THÔNG DỤNG</h2>
        <div class="row">
            <?php
                $sql = "SELECT * FROM LoaiSanPham WHERE BiXoa = 0";
                $result = DataProvider::ExecuteQuery($sql);
                while($row = mysqli_fetch_array($result))
                {
                    ?>
                        <div class="col-md-4 home">
                            <div class="pname"><?php echo $row["TenLoaiSanPham"]; ?></div>
                            <a href="index.php?a=5&id=<?php echo $row["MaLoaiSanPham"]; ?>">Xem</a>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</section>
</div>
