<?php
    if(!class_exists('cNguoiDung')){
        include './model/cNguoiDung.php';
    }
    
    class xuLyTaiKhoan{
        public function cXuLyTaiKhoan(){

            $p = new cNguoiDung();
            $idkh = $_COOKIE['idkh'];
            if(empty($idkh)){
                echo "<script>
                alert('Bạn cần đăng nhập!');
                window.location.href = 'index.php?act=dangnhap';
                </script>";
            return;
        }
        $result = $p->mTaiKhoan($idkh);
        if(!$result){
          
            return;
        }else{
            return $result;

        }
        
        
    }
    }



?>