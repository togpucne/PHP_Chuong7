<div class="inner-right">
    <center style="margin: 20px 0px;"><h2>Thông tin cá nhân</h2></center>
    <?php 
        if(!class_exists("mKhachHang")){
            include './model/mKhachHang.php';
        }
        $khachHang = new mKhachHang();
        $result = $khachHang->getInformationCustomer();
        if($result){
            while($row = $result->fetch_assoc()){

           
            echo '<form action="index.php?act=xuLyDatHang" method="post" style="display: flex; flex-direction: column; gap: 10px; padding: 10px;">
            <label for="hodem">Họ & Đệm:</label>
            <input type="text" id="hodem" name="hodem" '.' value="'.$row['hodem'] .'" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Nhập họ & đệm">

            <label for="ten">Tên:</label>
            <input type="text" id="ten" name="ten" '.' value="'.$row['ten'] .'" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Nhập tên">

            <label for="diachi">Địa chỉ:</label>
            <input type="text" id="diachi" name="diachi" '.' value="'.$row['diachi'] .'" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Nhập địa chỉ">

            <label for="diachinhanhang">Địa chỉ nhận hàng:</label>
            <input type="text" id="diachinhanhang" name="diachinhanhang" '.' value="'.$row['diachinhanhang'] .'" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Nhập địa chỉ nhận hàng">

            <label for="dienthoai">Điện thoại:</label>
            <input type="tel" id="dienthoai" name="dienthoai"  '.' value="'.$row['dienthoai'] .'" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Nhập số điện thoại">
            

            <input type="submit" value="Đặt hàng" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #ccc; cursor: pointer;">
        </form>'; }

        }else{

       

        echo '<form action="index.php?act=xuLyDatHang" method="post" style="display: flex; flex-direction: column; gap: 10px; padding: 10px;">
            <label for="hodem">Họ & Đệm:</label>
            <input type="text" id="hodem" name="hodem" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Nhập họ & đệm">

            <label for="ten">Tên:</label>
            <input type="text" id="ten" name="ten" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Nhập tên">

            <label for="diachi">Địa chỉ:</label>
            <input type="text" id="diachi" name="diachi" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Nhập địa chỉ">

            <label for="diachinhanhang">Địa chỉ nhận hàng:</label>
            <input type="text" id="diachinhanhang" name="diachinhanhang" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Nhập địa chỉ nhận hàng">

            <label for="dienthoai">Điện thoại:</label>
            <input type="tel" id="dienthoai" name="dienthoai" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Nhập số điện thoại">
            

            <input type="submit" value="Xác nhận" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #ccc; cursor: pointer;">
        </form>';

    }
    ?>
</div>
</main>