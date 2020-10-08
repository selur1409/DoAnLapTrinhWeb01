<div class="container">
    <section>
        <div class="container fixDisplay">
            <h2>Quản lý giỏ hàng</h2>
            <div class="row">      
                <div id="quanlygiohang">
                    <table>
                        <tr>
                            <th width="40">STT</th>
                            <th width="200">Tên sản phẩm</th>
                            <th width="60">Hình</th>
                            <th width="100">Giá</th>
                            <th width="50">Số lượng</th>
                            <th width="100">Thao tác</th>
                        </tr>
                        <?php
                            $tongGia = 0;
                            if(isset($_SESSION["GioHang"]))
                            {
                                $soSanPham = count($gioHang->listProduct);
                                $stt = 1;
                                for($i = 0; $i < $soSanPham; $i++)
                                {
                                    $id = $gioHang->listProduct[$i]->id;
                                    $sql = "SELECT * FROM SanPham WHERE MaSanPham = $id";

                                    $result = DataProvider::ExecuteQuery($sql);
                                    $row = mysqli_fetch_array($result);

                                    $gia = $row["GiaUuDai"];
                                    if($gia > 0)
                                        $gia = $row["GiaUuDai"];
                                    else
                                    {
                                        $gia = $row["GiaBan"];
                                    }

                                    ?>
                                        <form name="frmGioHang" action="pages/GioHang/xlCapNhapGioHang.php" onsubmit="return KiemTraSL();" method="post">
                                            <tr>
                                                <td><?php echo $stt++; ?></td>
                                                <td>
                                                    <?php echo $row["TenSanPham"]; ?>
                                                </td>
                                                <td align="center">
                                                    <img src="images/<?php echo $row["HinhURL"]; ?>" width="50">                              
                                                </td>
                                                <td>
                                                    <?php
                                                        echo $gia;
                                                    ?>
                                                </td>
                                                <td>
                                                    <input type="hidden" id="txtslTon" name="txtslTon" value="<?php echo $row["SoLuongTon"] ?>">
                                                    <input type="text" id="txtSL" name="txtSL" value="<?php echo $gioHang->listProduct[$i]->num; ?>" width="45" size="5">
                                                    <input type="hidden" name="hdID" value="<?php echo $gioHang->listProduct[$i]->id; ?>">
                                                </td>
                                                <td>
                                                    <input type="submit" value="Cập nhật số lượng">
                                                    <a href="pages/GioHang/xlXoa.php?id=<?php echo $row["MaSanPham"]; ?>">Xóa</a>
                                                </td>   
                                            </tr>
                                        </form>
                                    <?php
                                    $tongGia += $gia * $gioHang->listProduct[$i]->num;
                                }
                            }
                                $_SESSION["TongGia"] = $tongGia;
                        ?>
                    </table>
                    <div class="pprice">
                        Tổng thành tiền: <span><?php echo $tongGia; ?> đ</span>
                    </div >
                    <a href="pages/GioHang/xlDatHang.php">
                        <img src="img/datmua.png" width="150">
                    </a>
                    <div><i id="err" style="color:red;"></i></div>

                    <script type="text/javascript">
                        function KiemTraSL()
                        {
                            var slTon = document.getElementById("txtslTon");
                            var slCapNhat = document.getElementById("txtSL");
                            var err = document.getElementById("err");
                            if(slCapNhat.value > slTon.value)
                            {
                                err.innerHTML = "Số lượng sản phẩm trong còn lại không đủ, Vui lòng xem lại !";
                                return false;
                            }
                            else
                            {
                                err.innerHTML = "";
                                return true;
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </section>
</div>
