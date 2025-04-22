<div class="inner-right">
    <center>
        <h2>Mua hàng </h2>
    </center>
    <!-- Address  -->
    <div class="address">
    <h5>* Địa chỉ nhận hàng</h5>
    <table width="100%" border="1">
        <tr>
            <th width="30%">Họ tên & Điện thoại</th>
            <th width="60%">Địa chỉ</th>
            <th width="10%">Tác vụ</th>
        </tr>
        <?php
        if (!class_exists('xuLyTaiKhoan')) {
            include './controller/xuLyTaiKhoan.php';
        }
        if(!class_exists('mGioHang')){
            include './model/mGioHang.php';
        }
    
        $mGioHang = new mGioHang();
        $total = $mGioHang->toTalPrice();

        $p = new xuLyTaiKhoan();
        $result = $p->cXuLyTaiKhoan();

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . ($row['hodem'] ?? '') . ' ' . ($row['ten'] ?? '') . '<br>(+84) ' . ($row['dienthoai'] ?? '') . '</td>';
                echo '<td>'.$row['diachinhanhang'].'</td>';
                echo '<td><a href="index.php?act=thongtindathang">Thay đổi</a></td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="3">Không tìm thấy thông tin tài khoản! ';
            echo '<a href="index.php?act=thongtindathang">Thêm thông tin nhận hàng</a>';
            echo '</td></tr>';
        }
        ?>
    </table>
</div>

    <!-- End Address  -->



    <!-- Product List  -->
    <div class="product-list">
        <h5>* Sản phẩm</h5>
        <?php
        if (!class_exists('cGioHang')) {
            include './model/cGioHang.php';
        }
        $p = new cGioHang();
        $idkh = $_COOKIE['idkh'];
        if (!isset($idkh)) {
            return;
        }

        $result = $p->getGioHang($idkh);

        if ($result && mysqli_num_rows($result) > 0) {
            echo '<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: center; border-collapse: collapse;">';
            echo '<tr style="background-color: #f2f2f2;">
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá gốc</th>
                    <th>Giá giảm</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                   
                  </tr>';

            $stt = 1;
            while ($row = mysqli_fetch_assoc($result)) {

                $tongtien = ( $row['giamgia']) * $row['soluong'];
                echo '<tr>';
                echo '<td>' . $stt++ . '</td>';
                echo '<td><img src="' . $row['hinhanh'] . '" alt="' . $row['tensp'] . '" width="60"></td>';
                echo '<td>' . $row['tensp'] . '</td>';
                echo '<td>' . number_format($row['gia'], 0, ',', '.') . ' VND</td>';
                echo '<td>' . number_format($row['giamgia'], 0, ',', '.') . ' VND</td>';
                $id_input = 'qty_' . $row['idsp'];
                echo '<td>' . $row['soluong'] . '</td>';

                echo '<td>' . number_format($tongtien, 0, ',', '.') . ' VND</td>';



                echo '</tr>';

                $list_idsp[] = $row['idsp']; 
                $idsp_string = implode(',', $list_idsp);


            }
            echo '</table>';
            echo '<h3>Tổng tiền: '. number_format($total, 0, ',', '.').' VND</h3>';

            echo '<center style="margin-top: 30px">
            <a href="index.php?act=xuLyMuaHang&idsp=' . $idsp_string . '" class="btn btn-warning">Đặt hàng</a>
          </center>';
            } else {
            echo '<p>Giỏ hàng của bạn đang trống.</p>';
        }
        ?>
        <!-- End Product List  -->

    </div>



</div>
</main>