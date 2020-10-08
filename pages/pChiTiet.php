<div class="container">
<section>
    <?php
        if(isset($_GET["id"]))
            $id = $_GET["id"];
        else
            DataProvider::ChangeURL("index.php?a=404");
        $sql = "SELECT *
                FROM SanPham s, HangSanXuat h, LoaiSanPham l
                WHERE s.BiXoa = 0 AND s.MaHangSanXuat = h.MaHangSanXuat 
                                    AND s.MaLoaiSanPham = l.MaLoaiSanPham 
                                    AND s.MaSanPham = $id";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if($row == null)
            DataProvider::ChangeURL("index.php?a=404");
    ?>
    <div class="container fixDisplay">
        <div class="col-xs-12 col-md-8">
            <h2 id="titleChiTiet">Thông tin chi tiết sản phẩm</h2>
            <div class="row">
                <div class="chitietsp">
                    <div class="chitietleft">
                        <div id="chooseIMG">
                            <?php
                                    ?>
                                        <img src="images/<?php echo $row["HinhURL"]; ?>" onclick="ChangeIMG('<?php echo $row['HinhURL']; ?>')">
                                    <?php
                                    $sql = "SELECT h.MaHinhSanPham, h.HinhSanPhamURL 
                                    FROM HinhSanPham h, SanPham s 
                                    WHERE h.MaSanPham = s.MaSanPham AND h.MaSanPham = $id";
                                    $result = DataProvider::ExecuteQuery($sql);
                                    $i = 0;
                                    while($rowHinh = mysqli_fetch_array($result))
                                    {
                                        if($i < 3)
                                        {
                                            ?>
                                                <img src="images/<?php echo $rowHinh["HinhSanPhamURL"]; ?>" onclick="ChangeIMG('<?php echo $rowHinh['HinhSanPhamURL']; ?>')" />
                                            <?php
                                        }
                                        $i++;
                                    }
                            ?>

                        </div>
                        <img id="bigImg" src="images/<?php echo $row["HinhURL"]; ?>"/>
                        
                    </div>
                        <div class="chitietright">
                            <div class="chitietright_1">
                                <div>
                                    <span class="label">Tên sản phẩm: </span>
                                    <span class="productname"><?php echo $row["TenSanPham"]; ?></span>
                                </div>
                                <?php 
                                    $giaUuDai = $row["GiaUuDai"];
                                    if($giaUuDai != 0)
                                    {
                                        ?>
                                            <div>
                                                <strike>
                                                    <span class="label">Giá gốc: </span>
                                                    <span class="price"><?php echo $row["GiaBan"]; ?><u>đ</u></span>
                                                </strike>
                                            </div>
                                            <div>
                                                <span class="label">Giá đang giảm: </span>
                                                <span class="price"><?php echo $row["GiaUuDai"]; ?><u>đ</u></span>
                                            </div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                            <span class="label">Giá: </span>
                                            <span class="price"><?php echo $row["GiaBan"]; ?><u>đ</u></span>
                                        <?php
                                    }
                                ?>
                                
                            </div>
                        
                            <div class="chitietright_2">

                                <div id="divSize">
                                    <span class="label">Size: </span>
                                    <select name="id" class="optSize">
                                        <?php
                                            $sql = "SELECT sSP.MaSize, s.LoaiSize
                                                    FROM SizeSanPham sSP, Size s
                                                    WHERE sSP.MaSize = s.MaSize AND sSP.MaSanPham = $id";
                                            $result = DataProvider::ExecuteQuery($sql);
                                            while($row1 = mysqli_fetch_array($result))
                                            {
                                                ?>
                                                    <option value="<?php echo $row1["MaSize"]; ?>">
                                                                <?php echo $row1["LoaiSize"]; ?>
                                                    </option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                                <div id="divSoLuong">
                                    <div>
                                        <span class="label">Số lượng còn lại: </span>
                                        <span class="data"><?php echo $row["SoLuongTon"]; ?> sản phẩm</span>
                                    </div>
                                    <div>
                                        <span class="label">Số lượng đã bán: </span>
                                        <span class="data"><?php echo $row["SoLuongBan"]; ?> sản phẩm</span>
                                    </div>
                                    <div>
                                        <span class="label">Số lượt xem: </span>
                                        <span class="data"><?php echo $row["SoLuocXem"] + 1; ?> lượt</span>
                                    </div>
                                </div>
                                
                            </div>


                            <div>
                                <span class="label">Hãng sản xuất: </span>
                                <span class="factory"><a href="index.php?a=4&id=<?php echo $row["MaHangSanXuat"]; ?>"><?php echo $row["TenHangSanXuat"]; ?></a></span>
                            </div>
                            <div>
                                <span class="label">Loại sản phẩm: </span>
                                <span class="data"><a href="index.php?a=5&id=<?php echo $row["MaLoaiSanPham"]; ?>"><?php echo $row["TenLoaiSanPham"]; ?></a></span>
                            </div>
                            

                            <?php 
                                $slTon = $row["SoLuongTon"];
                                if($slTon > 0)
                                {
                                    if(isset($_SESSION["MaTaiKhoan"]))
                                    {
                                        ?>
                                        <div id="btnThemVaoGioHang">
                                            <a href="index.php?a=6&id=<?php echo $row["MaSanPham"]; ?>">Thêm Vào Giỏ Hàng</a>
                                        </div>   
                                    <?php   
                                    }
                                    else
                                    {
                                    ?>
                                    <div id="btnThemVaoGioHang">
                                        <a href="index.php?a=7">Thêm Vào Giỏ Hàng</a>
                                    </div>
                                    <?php   
                                    }
                                }
                                else
                                {
                                    ?>
                                        <div id="hetHang">Hết hàng rồi bạn ơi đợt đợt sau nhé !</div>
                                    <?php
                                }
                            ?>

                                        
                            
                    </div>

                    <div id="moTaSP">
                            <p class="ttl">Mô tả</p>
                            <p id="ndMoTa"><?php echo $row["MoTa"]; ?></p>
                    </div>
                </div>
                <?php
                    $SoLuocXem = $row["SoLuocXem"] + 1;
                    $sql = "UPDATE SanPham SET SoLuocXem = $SoLuocXem
                            WHERE MaSanPham = $id";
                    DataProvider::ExecuteQuery($sql);
                ?>
            </div>

            <h4>WRITE COMMENT <span class="glyphicon glyphicon-pencil"></span> </h4>
            <form action="pages/xlComment.php" role="form" onsubmit="return KiemTraCMT()" method="POST">
                <div class="form-group">
                    <textarea name="txtMoTa" id="txtMoTa" class="form-control" rows="3" style="resize: none"></textarea>
                    <i id="errCMT"></i>
                </div>


                <?php
                    if(isset($_SESSION["MaTaiKhoan"]))
                    {
                        ?>
                            <input type="hidden" name="idTaiKhoan" value="<?php echo $_SESSION["MaTaiKhoan"]; ?>">
                        <?php
                    }
                    else
                    {
                        ?>
                        <input type="hidden" name="idTaiKhoan" value="<?php echo -1; ?>">
                        <?php
                    }
                ?>
                
                <input type="hidden" name="idSanPham" value="<?php echo $row["MaSanPham"]; ?>">
                <button type="submit" class="btn btn-primary">SENT</button>
            </form>



            <div class="row-cmt">
                <h4>TOP COMMENT</h4>

                <?php
                    $sql = "SELECT tk.HinhURL, tk.TenHienThi, bl.NoiDung, bl.NgayBinhLuan
                    FROM BinhLuan bl, TaiKhoan tk, SanPham sp 
                    WHERE bl.MaSanPham=sp.MaSanPham AND bl.MaTaiKhoan=tk.MaTaiKhoan AND bl.MaSanPham=$id";
                    $result =  DataProvider::ExecuteQuery($sql);
                    while($row2 = mysqli_fetch_array($result))
                    {
                        ?>
                            <div class="chitietcmt">
                                <div class="left-cmt">
                                    <img src="img/<?php echo $row2["HinhURL"]; ?>" />
                                </div>
                                <div class="right-cmt">
                                    <div>
                                        <span class="nguoi-cmt" ><?php echo $row2["TenHienThi"]; ?></span>
                                    </div>
                                    <div>
                                        <textarea class="noidung" rows="auto" style="resize: none" disabled><?php echo $row2["NoiDung"]; ?></textarea>
                                    </div>
                                    <div class="ngay-cmt">
                                        <span class="ngay"><?php echo $row2["NgayBinhLuan"]; ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                ?>

            </div>
        </div>
        

        <script type="text/javascript">
            function KiemTraCMT()
            {
                var cmt = document.getElementById("txtMoTa");
                var err = document.getElementById("errCMT");
                if(cmt.value == "")
                {
                    err.innerHTML = "Bình luận không dược rỗng";
                    err.style.color = "red";
                    cmt.focus();
                    return false;
                }
                else
                {
                    err.innerHTML = "";
                }
                return true;
            }

            function ChangeIMG(hinhurl)
            {
                document.getElementById('bigImg').src="images/" + hinhurl;
            }
        </script>


        
        <h2>Sản phẩm liên quan</h2>
        <?php
            $maLoai =  $row["MaLoaiSanPham"];
            $sql = "SELECT * FROM SanPham 
            WHERE BiXoa = 0 AND MaLoaiSanPham = $maLoai 
            ORDER BY NgayNhap DESC LIMIT 0, 8";
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

