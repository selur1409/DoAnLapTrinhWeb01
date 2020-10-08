<form action="pages/qlTaiKhoan/xlCapNhat.php" method="get">
    <fieldset class="fie">
        <legend class="leg">Cập nhật thông tin tài khoản</legend>
        <?php
            if(isset($_GET["id"]))
            {
                $id = $_GET["id"];
                $sql = "SELECT TenDangNhap, MaLoaiTaiKhoan FROM TaiKhoan WHERE MaTaiKhoan = $id";
                $result = DataProvider::ExecuteQuery($sql);
                $row = mysqli_fetch_array($result);
                $TenDangNhap = $row["TenDangNhap"];
                $MaLoaiTaiKhoan = $row["MaLoaiTaiKhoan"];
            }
        ?>
        <div class="nd">
            <span>Tên đăng nhập: </span>
            <?php echo $TenDangNhap; ?>
        </div>
        <div class="nd">
            <span>Loại tài khoản: </span>
            <select name="cmbLoaiTaiKhoan">
                <?php 
                    $sql = "SELECT * FROM LoaiTaiKhoan";
                    $result = DataProvider::ExecuteQuery($sql);
                    while($row = mysqli_fetch_array($result))
                    {
                        if($row["MaLoaiTaiKhoan"] == $MaLoaiTaiKhoan)
                            echo "<option value='".$row["MaLoaiTaiKhoan"]."' selected>".$row["TenLoaiTaiKhoan"]."</option>";    
                        else
                            echo "<option value='".$row["MaLoaiTaiKhoan"]."'>".$row["TenLoaiTaiKhoan"]."</option>";
                    }
                ?>
            </select>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
        <div class="nd">
            <input type="submit" class="btnSubmit" value="Cập nhật">
        </div>
    </fieldset>
</form>