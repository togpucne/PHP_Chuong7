<?php
    if(!class_exists('cSanPham')){
        include './model/cSanPham.php';
    }

    if(!class_exists('mUploadFile')){
        include './model/mUploadFile.php';
    }
    $p = new cSanPham();
    $idsp = $_GET['idsp'];
    $hinh = $p->searchDB($idsp);
    if(!$hinh){
        echo '<script>alert("Không thấy sản phẩm");
            history.back();
        </script>';
        return;
    }
    $fullUrl = '';

    foreach($hinh as $index){
        $fullUrl = $index['hinh'] . '';

    }
    $basePath = "http://localhost/PHP/Chuong_7/";
    $filePath = str_replace($basePath, "", $fullUrl);
    

    $file = new mUploadFile();
    
    
    $result1 = $file->xoaFile($filePath);
    if(!$result1){
        echo '<script>alert("Xóa hình thất bại ");
        history.back();
    </script>';
    return;
    }


    $idsp = $_GET['idsp'];
    $result = $p->deleteDB($idsp);
    if($result){
        echo '<script>alert("Xóa sản phẩm thành công");
            history.back();
        </script>';
        return;
    }else{
        echo '<script>alert("Xóa sản phẩm không thành công");
            history.back();
        </script>';
        return;
    }



?>