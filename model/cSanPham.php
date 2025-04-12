<?php
    if(!class_exists('cNguoiDung')){
        include './model/cKetNoi.php';
    }
    class cSanPham{
        public function getDB(){
            $p = new cKetNoi();
            $conn = $p->ketNoi();
            $sql = "SELECT * FROM sanpham"; 
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }


        }

        public function searchDB($idsp){
            $p = new cKetNoi();
            $conn = $p->ketNoi();
            $sql = "SELECT * FROM sanpham where idsp = '$idsp'"; 
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }


        }
        
        public function insertDB($tensp, $gia, $hinh, $mota, $giamgia,$iddm, $soLuong ){
            $p = new cKetNoi();
            $conn = $p->ketNoi();
            $sql = " INSERT INTO sanpham(tensp, gia, mota, giamgia, iddm, hinh, soLuong) 
            VALUES('$tensp', '$gia', '$mota', '$giamgia', '$iddm', '$hinh', '$soLuong')"; 
            $result = $conn->query($sql);
            if($result){
                return true;
            }else{
                return false;
            }


        }

        public function updateDB($idsp,$tensp, $gia, $hinh, $mota, $giamgia,$iddm, $soLuong ){
            $p = new cKetNoi();
            $conn = $p->ketNoi();
            $sql = " UPDATE  sanpham 
            SET tensp = '$tensp', gia = '$gia', mota = '$mota', giamgia = '$giamgia', iddm = '$iddm', hinh = '$hinh', soLuong = '$soLuong'
            WHERE idsp = '$idsp'";
            
            
            $result = $conn->query($sql);
            if($result){
                return true;
            }else{
                return false;
            }


        }

        public function deleteDB($idsp){
            $p = new cKetNoi();
            $conn = $p->ketNoi();
            $sql = "DELETE FROM sanpham where idsp ='$idsp'"; 
            $result = $conn->query($sql);
            if($result){
                return true;
            }else{
                return false;
            }


        }


        public function getCongTy(){
            $p = new cKetNoi();
            $sql = "SELECT * FROM danhmuc";
            $conn = $p->ketNoi();
            $result = $conn->query($sql);
            if($result->num_rows>0){
                return $result;
            }else{
                return false;
            }
        }

        public function getDbOfType($type){
            $p = new cKetNoi();
            $conn = $p->ketNoi();
            $sql = "SELECT * FROM sanpham where iddm = '$type'"; 
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }


        }

        public function getDetailsProduct($idsp){
            $p = new cKetNoi();
            $conn = $p->ketNoi();
            $sql = "SELECT * FROM sanpham where idsp = '$idsp'"; 
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }


        }

 

        
    }

?>