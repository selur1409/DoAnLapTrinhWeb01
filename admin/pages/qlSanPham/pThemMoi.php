<form action="pages/qlSanPham/xlThemMoi.php" method="post" class="themSanPham" onsubmit="return KiemTra();" enctype="multipart/form-data">
    <div>
        <div class="hinh">
            <h1 class="title">Ảnh</h1>
            <div class="hinhSanPham">
                <img src="images/noimage.gif">
                <input type="file"  name="fImg" id="fImg">
                <p><i>Định dạng ảnh: .jpg, .jepg, .png và có dung lượng nhỏ hơn 500kb</i></p>
            </div>
        </div>
    </div>


    <div class="thongTinCoBan">
        <h1 class="title">Thông tin cơ bản</h1>
        <div>
            <span>Tên sản phẩm: </span>
            <input type="text" name="txtTenSanPham" id="txtTenSanPham">
            <i id="errTen"></i>
        </div>

        <div>
            <span>Số lượng tồn: </span>
            <input type="text" name="txtslTon" id="txtslTon">
            <i id="errslTon"></i>
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
                            <option value="<?php echo $row1["MaLoaiSanPham"]; ?>">
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
                            <option value="<?php echo $row1["MaHangSanXuat"]; ?>">
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
            <input type="text" name="txtGiaNhap" id="txtGiaNhap">
            <i id="errGiaNhap"></i>
        </div>

        <div>
            <span>Giá bán:</span>
            <input type="text" name="txtGiaBan" id="txtGiaBan">
            <i id="errGiaBan"></i>
        </div>

        <div>
            <span>Giá ưu đãi:</span>
            <input type="text" name="txtGiaUuDai" id="txtGiaUuDai">
            <i id="errGiaUuDai"></i>
        </div>

    </div>

    <div class="divMoTa">
        <span>Mô tả: </span> <br>
        <textarea name="txtMoTa" id="txtMoTa" placeholder="Nhập thông tin mô tả"></textarea>
    </div>
    
    <div class="sub">
        <div class="rdChoose">
            Sau khi thêm dữ liệu: &nbsp;
            <input type="radio" name="radio" checked = "checked" value="continue"> Tiếp tục thêm sản phẩm
            <input type="radio" name="radio" value="list"> Hiển thị danh sách sản phẩm<br>
        </div>
    </div>

    <div class="sub">
        <input type="submit" id="btnSubmit" value="Thêm">
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
