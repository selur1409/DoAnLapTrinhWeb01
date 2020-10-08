<div class="login">
    <h1>LOGIN</h1>
    <form action="modules/xlDangNhap.php" id="frmLogin" class="box" onsubmit="return KiemTra();" method="POST">
        <input type="text" name="txtUS" id="txtUS" placeholder="Username">
        <i id="errUS"></i>
        <input type="password" name="txtPS" id="txtPS" placeholder="Password">
        <i id="errPS"></i>
        <input type="submit" name="btnSubmit" value="Login">
    </form>

    <script type="text/javascript">
    function KiemTra()
    {
        var ten = document.getElementById("txtUS");
        var err = document.getElementById("errUS");
        if(ten.value == "")
        {
            err.innerHTML = "Tên đăng nhập không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";

        var ten = document.getElementById("txtPS");
        var err = document.getElementById("errPS");
        if(ten.value == "")
        {
            err.innerHTML = "Mật khẩu không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";
    }
    </script>
</div>