<?php
    if(!isset($_GET["id"]))
        DataProvider::ChangURL("index.php?c=404");
    
    $id = $_GET["id"];
    $sql = "SELECT h.MaHinhSanPham, h.MaSanPham, s.TenSanPham, h.HinhSanPhamURL 
    FROM HinhSanPham h, SanPham s WHERE h.MaSanPham = s.MaSanPham AND h.MaHinhSanPham = $id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
?>
<form action="pages/qlHinhSanPham/xlCapNhat.php" method="post" class="capNhatHinhSanPham" onsubmit="return KiemTra();" enctype="multipart/form-data">
    <div class="hinh">
        <h1 class="title">Ảnh</h1>
        <div class="hinhSanPham">
            <img src="../images/<?php echo $row["HinhSanPhamURL"]; ?> ">
            <input type="file"  name="fImg" id="fImg">
            <p><i>Định dạng ảnh: .jpg, .jepg, .png và có dung lượng nhỏ hơn 500kb</i></p>
        </div>
    </div>

    <div class="thongtinhinh">
        <h1 class="title">Thông tin cơ bản</h1>    
        <div>
            <span>Mã sản phẩm: </span>
            <input type="text" name="txtMaSanPham" disabled id="txtMaSanPham"value=<?php echo $row["MaSanPham"]; ?>>
            <i id="errTen"></i>
        </div> 
        <div>
            <span>Tên sản phẩm: </span>
            <input type="text" name="txtTenSanPham" disabled id="txtTenSanPham"value=<?php echo $row["TenSanPham"]; ?>>
            <i id="errTen"></i>
        </div>


  

    
    <div class="sub">
        <input type="hidden" name="id" value="<?php echo $row["MaHinhSanPham"]; ?>">
        <input type="submit" id="btnSubmit" style="padding-top:0;" value="Cập nhật">
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

