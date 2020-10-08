<form action="pages/qlHinhSanPham/xlThemMoi.php" method="post" class="capNhatHinhSanPham" onsubmit="return KiemTra();" enctype="multipart/form-data">
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


    <div class="thongtinhinh">
        <h1 class="title">Thông tin cơ bản</h1>


        <div>
            <span>Mã - Tên SP:</span>
            <select name="id" class="optSP">
                <?php
                    $sql = "SELECT MaSanPham, TenSanPham FROM SanPham WHERE BiXoa = 0";
                    $result = DataProvider::ExecuteQuery($sql);
                    while($row = mysqli_fetch_array($result))
                    {
                        ?>
                            <option value="<?php echo $row["MaSanPham"]; ?>">
                                        <?php echo $row["MaSanPham"]; ?> - <?php echo $row["TenSanPham"]; ?>
                            </option>
                        <?php
                    }
                ?>
            </select>
        </div>
        
    <div class="sub">
        <div class="rd-Choose">
            <input type="radio" name="radio" checked = "checked" value="continue"> Tiếp tục thêm sản phẩm<br>
            <input type="radio" name="radio" value="list"> Hiển thị danh sách SP<br>
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
