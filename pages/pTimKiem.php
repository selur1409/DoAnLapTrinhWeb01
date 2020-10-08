<div class="container">
    <section>
        <div class="container fixDisplay">
            <h2>Tìm kiếm Sản phẩm</h2>
            <div class="row">
                <?php
                    if(isset($_REQUEST["btnSearch"]))
                        $search = $_POST["txtSearch"];
                    if(empty($search))
                    {
                        echo "Vui lòng nhập kí tự";    
                    }
                    else
                    {
                        $sql = "SELECT * FROM SanPham where TenSanPham like '%$search%'";        
                        $result = DataProvider::ExecuteQuery($sql);
                    
                        // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                        if ($search != "") 
                        {
                            // Dùng $num để đếm số dòng trả về.
                            echo "Kết quả trả về với từ khóa '<b>$search</b>'<br>";
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                <div class="col-xs col-sm-6 col-md-3">
                                    <img src="images/<?php echo $row["HinhURL"]; ?>" />
                                    <div class="pname"><?php echo $row["TenSanPham"]; ?></div>
                                    <div class="pprice">Giá: <?php echo $row["GiaBan"]; ?>đ</div>
                                    <div class="action">
                                        <a href="index.php?a=3&id=<?php echo $row["MaSanPham"]; ?>">Chi Tiết</a>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        
                        else{
                            echo "Không tìm thấy kết quả";
                        }
                    }               
                ?>
            </div>
        </div>
    </section>
</div>