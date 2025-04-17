<?php
  if(!class_exists('cKetNoi')){
    include './model/cKetNoi.php';
  }

 class mMuaHang{
    public function thongKeMuaHang(){
        $p = new cKetNoi();
        $conn = $p->ketNoi();
        $sql = "SELECT dh.ngaydathang as ngaydat , sum(ct.soLuong) as tongSoLuong
        FROM dathang_chitiet ct, dathang dh 
        WHERE ct.iddh = dh.iddh
        GROUP BY dh.ngaydathang
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