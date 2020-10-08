<link rel="stylesheet" href="css/styleSignUp.css">
<form action="pages/TaoTaiKhoan/xlTaoTaiKhoan.php" class="box" onsubmit="return KiemTra();" method="POST">
    <h1>Tạo tài khoản mới</h1>
    <div>
        <input type="text" name="us" id="us" placeholder="Tên đăng nhập">
        <span class="err" id="eUS"></span>
    </div>
    <div>
        <input type="password" name="ps" id="ps" placeholder="Mât Khẩu">
        <span class="err" id="ePS"></span>
    </div>
    <div>
        <input type="password" name="rps" id="rps" placeholder="Nhập Lại Mật Khẩu">
        <span class="err" id="eRPS"></span>
    </div>
    <div>
        <input type="text" id="name" name="name" placeholder="Tên hiển thị">
        <span class="err" id="eNAME"></span>
    </div>
    <div>
        <input type="text" id="add" name="add" placeholder="Địa chỉ">
        <span class="err" id="eADD"></span>
    </div>
    <div>
        <input type="text" id="tel" name="tel" placeholder="Điện thoại">
        <span class="err" id="eTEL"></span>
    </div>
    <div>
        <input type="text" id="mail" name="mail" placeholder="Mail">
        <span class="err" id="eMAIL"></span>
    </div>
    <div>
        <input type="submit" value="Đăng ký">
    </div>
</form>

<script type="text/javascript">
    function KiemTra()
    {
        var control = document.getElementById('us');
        var err = document.getElementById('eUS');
        if(control.value == "")
        {
            control.focus();
            err.innerHTML="Tên đăng nhập không được rỗng";
            return false;
        }
        else
        {
            err.innerHTML = "";
        }

        control = document.getElementById("ps");
        err = document.getElementById('ePS');
        if(control.value == "")
        {
             control.focus();
             err.innerHTML="Mật khẩu không được rỗng";
             return false;
        }
         else
        {
            err.innerHTML = "";
        }

        // control1 = document.getElementById("rps");
        // err = document.getElementById('ePRS');
        // if(control.value != control1.value)
        // {
        //     control1.focus();
        //     err.innerHTML="Nhập lại mật khẩu không trùng";
        //     return false;
        // }
        // else
        // {
        //     err.innerHTML = "";
        // }




        control = document.getElementById("name");
        err = document.getElementById('eNAME');
        if(control.value == "")
        {
            control.focus();
            err.innerHTML="Tên hiển thị không được rỗng";
            return false;
        }
        else
        {
            err.innerHTML = "";
        }

        control = document.getElementById("add");
        err = document.getElementById('eADD');
        if(control.value == "")
        {
            control.focus();
            err.innerHTML="Địa chỉ không được rỗng";
            return false;
        }
        else
        {
            err.innerHTML = "";
        }

        control = document.getElementById("tel");
        err = document.getElementById('eTEL');
        if(control.value == "")
        {
            control.focus();
            err.innerHTML="Số điện thoại không được rỗng";
            return false;
        }
        else
        {
            err.innerHTML = "";
        }

        control = document.getElementById("mail");
        err = document.getElementById('eMAIL');
        if(control.value == "")
        {
            control.focus();
            err.innerHTML="Email không được rỗng";
            return false;
        }
        else
        {
            err.innerHTML = "";
        }
        return true;
    }
</script>

<?php
    if(isset($_GET["err"]))
    {
        ?>
            <div>
                <script type="text/javascript">
                    var control = document.getElementById('us');
                    var err = document.getElementById('eUS');
                    control.focus();
                    err.innerHTML="Tên đăng nhập đã tồn tại";
                </script>

            </div>
        <?php
    }
?>

