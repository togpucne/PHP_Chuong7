<?php 
if (!class_exists('cSanPham')) {
    include './model/cSanPham.php';
}
if (!class_exists('mUploadFile')) {
    include './model/mUploadFile.php';
}

$p = new cSanPham();
$file = new mUploadFile();

$idsp = $_GET['idsp'];
$tensp = $_POST['tensp'];
$gia = $_POST['gia'];
$giamgia = $_POST['giamgia'];
$mota = $_POST['mota'];
$soLuong = $_POST['soLuong'];
$iddm = isset($_POST['congty']) ? $_POST['congty'] : null;
$hinh = null;
$result2 = $p->getDetailsProduct($idsp);
if($result2->num_rows>0){
    while($row = $result2->fetch_assoc()){
        $hinh = $row['hinh'];
    }

}


if (!empty($_FILES['file']['name']) && !empty($_FILES['file']['tmp_name'])) {
    $name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    $newName = $file->changeName($name);
    $hinh = $file->removeFile($newName, $tmp_name);

    if (!$hinh) {
        echo '<script>alert("Thay đổi ảnh không thành công");</script>';
        return;
    }
}

$result = $p->updateDB($idsp, $tensp, $gia, $hinh, $mota, $giamgia, $iddm, $soLuong);

if ($result) {
    echo '<script>alert("Cập nhật sản phẩm thành công"); history.back();</script>';
    return;
} else {
    echo '<script>alert("Cập nhật thất bại");</script>';
}
?>
