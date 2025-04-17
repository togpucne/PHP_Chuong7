<?php
    if(!class_exists('cDatHang')){
        include './model/cDatHang.php';
    }    

    $p = new cDatHang();
    $ten = $_POST['ten'];
    $hodem = $_POST['hodem'];
    $diachi = $_POST['diachi'];
    $diachinhanhang = $_POST['diachinhanhang'];
    $dienthoai = $_POST['dienthoai'];
    if(empty($ten) || empty($hodem) || empty($diachi) || empty($diachinhanhang) || empty($dienthoai)){
        echo '
        <script>alert("Vui lòng nhập đầy đủ thông tin");
            history.back();
        </script>
        ';
        return;

    }

    $result = $p-> cTaiKhoan($ten, $hodem, $diachi, $diachinhanhang, $dienthoai);
    if(!$result){
        echo '
        <script>alert("Bạn chưa có tài khoản");
            history.back();
        </script>
        ';
        return;
        
    }else{
        echo '
        <script>alert("Lưu tài khoản thành công ");
           window.location.href="index.php?act=muaHang"
        </script>
        ';
        return;
    }
   



?>