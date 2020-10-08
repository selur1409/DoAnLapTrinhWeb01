<?php
    if(!isset($_GET["id"]))
        DataProvider::ChangURL("index.php?c=404");
    
    $id = $_GET["id"];
    $sql = "SELECT s.MaSanPham, s.TenSanPham, s.HinhURL, s.GiaNhap, s.GiaBan, s.NgayNhap, s.SoLuongTon, s.SoLuongBan, s.SoLuocXem,
            s.MoTa, s.BiXoa, l.TenLoaiSanPham, s.MaHangSanXuat, h.TenHangSanXuat, s.MaLoaiSanPham, s.GiaUuDai
            FROM SanPham s, LoaiSanPham l, HangSanXuat h
            WHERE s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaHangSanXuat = h.MaHangSanXuat AND s.MaSanPham = $id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
?>
<form action="pages/qlSanPham/xlCapNhat.php" method="post" class="capNhatSanPham" onsubmit="return KiemTra();" enctype="multipart/form-data">
    <div class="hinh">
        <h1 class="title">Ảnh</h1>
        <div class="hinhSanPham">
            <img src="../images/<?php echo $row["HinhURL"]; ?> ">
            <input type="file"  name="fImg" id="fImg">
            <p><i>Định dạng ảnh: .jpg, .jepg, .png và có dung lượng nhỏ hơn 500kb</i></p>
        </div>
    </div>

    <div class="thongTinCoBan">
        <h1 class="title">Thông tin cơ bản</h1>     
        <div>
            <span>Tên sản phẩm: </span>
            <input type="text" name="txtTenSanPham" id="txtTenSanPham"value=<?php echo $row["TenSanPham"]; ?>>
            <i id="errTen"></i>
        </div>

        <div>
            <span>Số lượng tồn: </span>
            <input type="text" name="txtslTon" id="txtslTon" value="<?php echo $row["SoLuongTon"]; ?>">
            <i id="errslTon"></i>
        </div>

        <div>
            <span>Số lượng bán: </span>
            <input type="text" name="txtslBan" id="txtslBan" value="<?php echo $row["SoLuongBan"]; ?>">
            <i id="errslBan"></i>
        </div>
        <div>
            <span>Loại sản phẩm:</span>
            <select name="cmbLoai" class="optSP">
                <?php
                    $sql = "SELECT * FROM LoaiSanPham WHERE BiXoa = 0";
                    $result = DataProvider::ExecuteQuery($sql);
                    while($row1 = mysqli_fetch_array($result))
                    {
                        ?>
                            <option value="<?php echo $row1["MaLoaiSanPham"]; ?>" <?php if($row["MaLoaiSanPham"] == $row1["MaLoaiSanPham"]) echo "selected"; ?>>
                                        <?php echo $row1["TenLoaiSanPham"]; ?>
                            </option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <div>
            <span>Hãng sản xuất:</span>
            <select name="cmbHang" class="optSP" >
                <?php
                    $sql = "SELECT * FROM HangSanXuat WHERE BiXoa = 0";
                    $result= DataProvider::ExecuteQuery($sql);
                    while($row1 = mysqli_fetch_array($result))
                    {
                        ?>
                            <option value="<?php echo $row1["MaHangSanXuat"]; ?>"
                                        <?php if($row["MaHangSanXuat"] == $row1["MaHangSanXuat"]) echo "selected"; ?>
                            >
                                        <?php echo $row1["TenHangSanXuat"]; ?>
                            </option>
                        <?php
                    }
                ?>
            </select>
        </div>   
    </div>



    <div class="thongTinGiaoDich">
        <h1 class="title">Thông tin giao dịch</h1>
        <div>
            <span>Giá nhập:</span>
            <input type="text" name="txtGiaNhap" id="txtGiaNhap" value="<?php echo $row["GiaNhap"]; ?>">
            <i id="errGiaNhap"></i>
        </div>

        <div>
            <span>Giá bán:</span>
            <input type="text" name="txtGiaBan" id="txtGiaBan" value="<?php echo $row["GiaBan"];?>">
            <i id="errGiaBan"></i>
        </div>
        <div>
            <span>Giá ưu đãi:</span>
            <input type="text" name="txtGiaUuDai" id="txtGiaUuDai" value="<?php echo $row["GiaUuDai"];?>">
            <i id="errGiaUuDai"></i>
        </div>
    </div>

    <div class="divMoTa">
        <span>Mô tả: </span> <br>
        <textarea name="txtMoTa" id="txtMoTa"><?php echo $row["MoTa"]; ?></textarea>
    </div>

    
    <div class="sub">
        <input type="hidden" name="id" value="<?php echo $row["MaSanPham"]; ?>">
        <input type="submit" id="btnSubmit" value="Cập nhật">
    </div>

</form>

<script type="text/javascript">
    function KiemTra()
    {
        var ten = document.getElementById("txtTenSanPham");
        var err = document.getElementById("errTen");
        if(ten.value == "")
        {
            err.innerHTML = "Tên sản phẩm không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";


        var ten = document.getElementById("txtslTon");
        var err = document.getElementById("errslTon");
        if(ten.value == "")
        {
            err.innerHTML = "Số lượng không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";


        var ten = document.getElementById("txtslBan");
        var err = document.getElementById("errslBan");
        if(ten.value == "")
        {
            err.innerHTML = "Số lượng không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";



        var ten = document.getElementById("txtGiaNhap");
        var err = document.getElementById("errGiaNhap");
        if(ten.value == "")
        {
            err.innerHTML = "Giá sản phẩm không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";



        var ten = document.getElementById("txtGiaBan");
        var err = document.getElementById("errGiaBan");
        if(ten.value == "")
        {
            err.innerHTML = "Giá sản phẩm không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";



        var ten = document.getElementById("txtGiaUuDai");
        var err = document.getElementById("errGiaUuDai");
        if(ten.value == "")
        {
            err.innerHTML = "Giá sản phẩm không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";

        return true;
    }
</script>

