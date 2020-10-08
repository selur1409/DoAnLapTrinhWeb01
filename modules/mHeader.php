<div class="container-fluid">
    <header class="container">
        <nav class="navbar navbar-default" role="navigation">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" id="logo-nameShop">
                    <img src="img/logo.png" id="logoHeader" height="65px">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <div class="search">
                    <form action="index.php?a=9" method="POST">
                        <input type="text" name="txtSearch" id="txtSearch" placeholder="Tìm kiếm sản phẩm">
                        <button type="submit" name="btnSearch" id="btnSearch"><img src="img/iconSearch.png" id="iconSearch" width="25x"></button>
                    </form>
                    
                </div>

                <div class="menu">
                    <ul>
                        <li><a href="index.php">TRANG CHỦ</a></li>
                        <li>
                            <a href="index.php?a=2">SẢN PHẨM</a>
                            <ul class="sub-menu">
                                <?php 
                                    $sql = "SELECT * FROM LoaiSanPham Where BiXoa = 0";
                                    $result = DataProvider::ExecuteQuery($sql);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        ?>
                                            <li><a href="index.php?a=5&id=<?php echo $row["MaLoaiSanPham"]; ?>"><?php echo $row["TenLoaiSanPham"]?></a></li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </li>
                        <li><a href="index.php?a=2">HÃNG SẢN XUẤT</a>
                            <ul class="sub-menu-hang">
                                <?php 
                                    $sql = "SELECT * FROM HangSanXuat Where BiXoa = 0";
                                    $result = DataProvider::ExecuteQuery($sql);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        ?>
                                            <li><a href="index.php?a=4&id=<?php echo $row["MaHangSanXuat"]; ?>"><?php echo $row["TenHangSanXuat"]?></a></li>
                                        <?php
                                    }
                                ?>
                            </ul>
                    
                        </li>
                        <li><a href="index.php?a=5">LIÊN HỆ</a></li>
      
                </div>


                <?php
                    if(isset($_SESSION["MaTaiKhoan"]))
                    {
                        ?>
                            <div class="DangXuat_GioHang">
                                <span>Hello, <?php echo $_SESSION["TenHienThi"]; ?></span> 
                                <a href="modules/xlDangXuat.php">Đăng xuất</a>
                                <a href="index.php?a=6">
                                    <img src="img/manage_shopping.png" height="40" />
                                </a>
                            </div>
                        <?php
                            $id = $_SESSION["MaTaiKhoan"];
                            $sql = "SELECT MaLoaiTaiKhoan FROM TaiKhoan WHERE MaTaiKhoan = $id";
                            $result = DataProvider::ExecuteQuery($sql);
                            $row = mysqli_fetch_array($result);
                            if($row["MaLoaiTaiKhoan"] == 2)
                            {
                                DataProvider::ChangeURL("admin/index.php");
                            }
                    }
                    else
                    {
                        ?>       
                        <div id="Login-SignUp">
                            <a href="index.php?a=7">Đăng Nhập</a>
                            <a href="index.php?a=8">Đăng Ký</a>
                        </div>
                        <?php
                    }
                ?>
                
            </div><!-- /.navbar-collaps"e -->
        </nav>
    </header>
</div>