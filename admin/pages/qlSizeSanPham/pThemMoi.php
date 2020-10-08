<form action="pages/qlSizeSanPham/xlThemMoi.php" method="post" class="themSanPham" onsubmit="return KiemTra();">
    

    <div class="thongtinsize">
        <h1 class="title">Thông tin cơ bản</h1>   
        
        
        <div>
            <span>Mã SP-Tên SP</span>
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

        <div>
            <span>Loại size:</span>
            <select name="cmbSize" class="optSP">
                <?php
                    $sql = "SELECT * FROM Size WHERE BiXoa = 0";
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


        

        <div>
            <span>Số lượng tồn: </span>
            <input type="text" name="txtslTon" id="txtslTon">
            <i id="errslTon"></i>
        </div>

        <div>
            <span>Số lượng bán: </span>
            <input type="text" name="txtslBan" id="txtslBan">
            <i id="errslBan"></i>
        </div>
        
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

