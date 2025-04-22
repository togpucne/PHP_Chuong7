<?php
  if(!class_exists('cKetNoi')){
    include './model/cKetNoi.php';
  }

 class mKhachHang{
    public function getInformationCustomer(){
        $p = new cKetNoi();
        $conn = $p->ketNoi();
        $idkh = isset($_COOKIE['idkh']) ? $_COOKIE['idkh'] : 0;
        $sql = "SELECT * from khachhang where iduser = '$idkh'
        ";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            return $result;
        }else{
            return false;
        }

    }
 }
?>