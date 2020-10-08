<div class="container">
<section>
    <div class="container fixDisplay">
        <h2>Sản phẩm theo hãng</h2>
        <?php
            if(isset($_GET["id"]))
                $id = $_GET["id"];
            else
                DataProvider::ChangeURL("index.php?a=404");


            $sql = "SELECT * FROM SanPham WHERE BiXoa = 0 AND MaHangSanXuat = $id";
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
                            <a href="index.php?a=3&id=<?php echo $row["MaSanPham"]; ?>">Chi Tiết</a>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
</section>
</div>