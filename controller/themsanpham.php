<?php
if(!class_exists('cSanPham')){
    include './model/cSanPham.php';
}
if(!class_exists('mUploadFile')){
    include './model/mUploadFile.php';
}

$sanpham = new cSanPham();

$tensp = $_POST['tensp'];
$gia = $_POST['gia'];
$mota = $_POST['mota'];
$giamgia = $_POST['giamgia'];
$iddm = $_POST['congty'];
if(empty($iddm)){
    echo '<script>alert("Bạn chưa chọn danh mục sản phẩm!"); history.back();</script>';
    return;
}
$soLuong = $_POST['soluong'];

$p = new mUploadFile();
$p->createUpload();
$name = $_FILES['file']['name'];
$changeName = $p->changeName($name);

$tmp_name = $_FILES['file']['tmp_name'];
$result1 = $p->removeFile($changeName, $tmp_name);

if(!$result1){
    echo '<script>alert("Hình ảnh không được bỏ trống !"); history.back();</script>';
    return;
}

$hinh =  'http://localhost/PHP/Chuong_7/' .$result1;



if(empty($tensp) || empty($gia)){
    echo '<script>alert("Tên sản phẩm, giá không được bỏ trống !"); history.back();</script>';
    return;
}

$result = $sanpham->insertDB($tensp, $gia, $hinh, $mota, $giamgia,$iddm, $soLuong );

if($result){
    echo '<script>alert("Thêm sản phẩm thành công"); history.back();</script>';
}else{
    echo '<script>alert("Thêm không thành công"); history.back();</script>';
}
?>