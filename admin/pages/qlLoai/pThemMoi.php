<form action="pages/qlLoai/xlThemMoi.php" method="get" onsubmit="return KiemTra()">
    <fieldset class="fie">
        <legend class="leg">Thêm mới loại sản phẩm</legend>
        <div class="nd">
            <span>Tên loại sản phẩm:</span>
            <input type="text" name="txtTen" id="txtTen">
            <input type="submit" class="btnSubmit" value="Thêm mới">
        </div>
        <div id="error"></div>
    </fieldset>
</form>
<script type="text/javascript">
    function KiemTra()
    {
        var ten = document.getElementById("txtTen");
        var err = document.getElementById("error");
        if(ten.value == "")
        {
            err.innerHTML = "Tên loại không được rỗng";
            ten.focus;
            return false;
        }
        else
            err.innerHTML = "";
        
        return true;
    }
</script>