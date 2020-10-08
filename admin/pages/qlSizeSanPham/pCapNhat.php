<?php
    if(!isset($_GET["id"]))
        DataProvider::ChangURL("index.php?c=404");
    
    $id = $_GET["id"];
    $sql = "SELECT size.MaSanPham, s.TenSanPham, size.SoLuongTon, size.SoLuongBan, size.MaSize 
    FROM SizeSanPham size, SanPham s 
    WHERE size.MaSanPham = s.MaSanPham AND size.MaSanPham = $id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
?>
<form action="pages/qlSizeSanPham/xlCapNhat.php" method="post" class="capNhatSanPham" onsubmit="return KiemTra();">
    

    <div class="thongtinsize">
        <h1 class="title">Thông tin cơ bản</h1>   
        <div>
            <span>Mã sản phẩm: </span>
            <input type="text" name="txtMaSanPham" disabled id="txtMaSanPham"value=<?php echo $row["MaSanPham"];?>>
            <i id="errTen"></i>
        </div>  
        <div>
            <span>Tên sản phẩm: </span>
            <input type="text" name="txtTenSanPham" disabled id="txtTenSanPham"value=<?php echo $row["TenSanPham"]; ?>>
            <i id="errTen"></i>
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
                            <option value="<?php echo $row1["MaSize"]; ?>" <?php if($row["MaSize"] == $row1["MaSize"]) echo "selected"; ?>>
                                        <?php echo $row1["LoaiSize"]; ?>
                            </option>
                        <?php
                    }
                ?>
            </select>
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

