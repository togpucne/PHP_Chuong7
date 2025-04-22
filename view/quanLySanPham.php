    <div class="inner-right">
        <center>
            <h5>Tạo sản phẩm </h5>
        </center>


        <div class="table" style="margin: 0 auto; width: 100%; max-width: 600px;">
            <?php
            echo "<form action='index.php?act=themsanpham' method= 'POST' enctype='multipart/form-data'>";

            ?>
            <table border="1" cellpadding="8">
                <thead>
                    <tr>
                        <th>Thông tin</th>
                        <th>Nhập liệu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Chọn công ty</td>
                        <td>
                            <select name="congty" id="congty">


                                <?php
                                if (!class_exists('cSanPham')) {
                                    include './model/cSanPham.php';
                                }
                                $p = new cSanPham();
                                $congty = $p->getCongTy();

                                foreach ($congty as $row) {
                                    echo "<option value='" . $row['iddm'] . "'>" . $row['tendanhmuc'] . "</option>";
                                }


                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td><input type="text" name="tensp" placeholder="Nhập tên sản phẩm" required></td>
                    </tr>
                    <tr>
                        <td>Nhập giá</td>
                        <td><input type="number" name="gia" placeholder="Giá" required></td>
                    </tr>
                    <tr>
                        <td>Nhập mô tả</td>
                        <td><textarea name="mota" rows="2" placeholder="Mô tả sản phẩm"></textarea></td>
                    </tr>
                    <tr>
                        <td>Nhập giảm giá</td>
                        <td><input type="number" name="giamgia" placeholder="% giảm giá"></td>
                    </tr>
                    <tr>
                        <td>Nhập số lượng</td>
                        <td><input type="number" name="soluong" placeholder="Số lượng sản phẩm"></td>
                    </tr>
                    <tr>
                        <td>Hình ảnh</td>
                        <td><input type="file" name="file"></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td colspan="2"><input type="submit" name="btnSubmit" value="Tạo sản phẩm"></td>
                    </tr>
                </tbody>
            </table>
            <?php
            echo '</form>';
            ?>



        </div>
        <center>
            <h5>Quản lý sản phẩm </h5>
        </center>
        <?php
        if (!class_exists('cSanPham')) {
            include './model/cSanPham.php';
        }
        $sanpham = new cSanPham();
        $result = $sanpham->getDB();

        if ($result->num_rows > 0) {
            echo '<table style="margin: 0 auto; width: 100%; max-width: 700px;">';
            echo ' <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                       <th>Tên sản phẩm </th>
                        <th>Giá gốc</th>
                        <th>Giá giảm </th>
                        <th>Mô tả</th>
                        <th>Số lượng </th>
                        <th>Hành động</th>


                       
                       
                    </tr>
                </thead>
                <tbody>';
            $index = 1;
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $index . '</td>';

                echo '<td><img src="' . $row['hinh'] . '" width="100" height="100" alt="Hình ảnh">
                  
                </td>';
                echo '<td>' . $row['tensp'] . '</td>';
                echo '<td>' . number_format($row['gia'], 0, ',', '.')  . '</td>';
                echo '<td>' .   number_format($row['giamgia'], 0, ',', '.')   . '</td>';
                echo '<td>' . $row['mota'] . '</td>';
                echo '<td>' . $row['soLuong'] . '</td>';
                echo '<td>
                    <a href="index.php?act=capnhatsanpham&idsp=' . $row['idsp'] . '" class="btn btn-primary">Sửa</a>
                    <a href="index.php?act=xoasanpham&idsp=' . $row['idsp'] . '" class = "btn btn-warning">Xóa</a>
                </td>';

                echo '</tr>';
                $index += 1;
            }
            echo '</tbody>';
            echo '</table>';
        }


        ?>


    </div>
    </main>