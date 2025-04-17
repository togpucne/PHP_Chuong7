<?php
    if(!class_exists('cDatHang')){
        include './model/cDatHang.php';
    }    

    $p = new cDatHang();

    if(!class_exists('cNguoiDung')){
        include './model/cNguoiDung.php';
    }
    $ten = '';
    $hodem = '';
    $diachi = '';
    $diachinhanhang ='';
    $dienthoai = '';
    
    $nguoidung = new cNguoiDung();
    $idkh = $_COOKIE['idkh'];
    $resultNguoiDung = $nguoidung->mTaiKhoan($idkh);
    if(!$resultNguoiDung){
        echo '<script>
        alert("Bạn cần thêm địa chỉ mua hàng!");
        history.back();
        </script>';
        return;
    }

    if($resultNguoiDung->num_rows>0){
        while($row = $resultNguoiDung->fetch_assoc()){
            $ten = $row['ten'];
            $hodem = $row['hodem'];
            $diachi = $row['diachi'];
            $diachinhanhang = $row['diachinhanhang'];
            $dienthoai = $row['dienthoai'];
           

        }
    }



  
    $idkh = $_COOKIE['idkh'];

    $result1 = $p->cDatHangNe();
    if(!$result1){
        echo '
        <script>alert("Lưu đặt hàng ko thành công");
            // history.back();
        </script>
        ';
        return;
        
    }


    $result2 = $p->cDatHangChiTiet($result1, $idkh);
    if(!$result2){
        echo '
        <script>alert("Đặt hàng chi tiết không thành công");
            // history.back();
        </script>
        ';
        return;
        
    }else{
        echo '
        <script>alert("Đặt hàng thành công");
        window.location.href="index.php";
        </script>
        ';
    }






?>