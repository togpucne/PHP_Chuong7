<?php
    if(!class_exists('cKetNoi')){
        include './cKetNoi.php';
    }

    class mGioHang{
        public function toTalPrice(){
            $p = new cKetNoi();
            $conn = $p->ketNoi();
            $idkh = $_COOKIE['idkh'] ? $_COOKIE['idkh'] : 0;
            $sql = "SELECT tongtien FROM giohang WHERE idkh = $idkh";
            $result = $conn->query($sql);
            $total = 0;
            
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $total += $row['tongtien'];

                }
                return $total;
            }
            return false;



    
        }


        public function deleteSPGioHang($idsp){
            $p = new cKetNoi();
            $conn = $p->ketNoi();
            $sql = "DELETE FROM giohang where idsp ='$idsp'"; 
            $result = $conn->query($sql);
            if($result){
                return true;
            }else{
                return false;
            }


        }

    }




?>