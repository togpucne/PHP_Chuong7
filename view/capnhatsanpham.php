
<div class="inner-right" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
    <center><h4>Chi tiết sản phẩm</h4></center>
    <?php
    if (!class_exists('cSanPham')) {
        include './model/cSanPham.php';
    }
    $p = new cSanPham();
    if (isset($_GET['idsp'])) {
        $idsp = $_GET['idsp'];
        $result = $p->getDetailsProduct($idsp);
        if (!$result) {
            echo 'Sủa sản phẩm';
        }
       
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<form action="index.php?act=capnhatsanphamAdmin&idsp=' . $row['idsp'] .'" method="post" enctype="multipart/form-data">';  
        echo '<div class="product-info">';
        
        echo '<div class="inner-left">';
        echo '<img src="' . $row['hinh'] . '" alt="' . $row['tensp'] . '" style="max-width: 200px;"><br>';
        echo '<input type="file" name="file"><br>';
        echo '</div>';
        
        echo '<div class="inner-right">';
        echo 'Tên sản phẩm: <input type="text" name="tensp" value="' .$row['tensp'] . '"><br>';
        echo 'Giá khuyến mãi: <input type="number" name="giamgia" value="' . $row['giamgia'] . '"><br>';
        echo 'Giá gốc: <input type="number" name="gia" value="' . $row['gia'] . '"><br>';
        echo 'Công ty: ';
        echo '<select name="congty" id="congty">';
        if (!class_exists('cSanPham')) {
            include './model/cSanPham.php';
        }
        $p = new cSanPham();
        $congty = $p->getCongTy();

        foreach ($congty as $index ) {
            echo "<option value='" . $index['iddm'] . "'>" . $index['tendanhmuc'] . "</option>";
        }
        echo '</select><br>';

        
        echo 'Mô tả:<br> <textarea name="mota" rows="4" cols="50">' .$row['mota'] . '</textarea><br>';
        echo 'Số lượng: <input type="number" name="soLuong" value="' . $row['soLuong'] . '" min="1" style="padding: 5px; border-radius: 5px; border: 1px solid #ccc;"><br>';
        
    
        

       echo '<input type="submit" name="btnSubmit" value="Cập nhật sản phẩm" style="padding: 8px; border-radius: 5px; border: 1px solid #ccc;">';

        

        echo '</div>'; 
        echo '</div>'; 
        echo '</form>';
    }
}
   
       
    }
    ?>
    </div>
    </main>