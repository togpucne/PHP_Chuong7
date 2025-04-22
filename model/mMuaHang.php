<?php
  if(!class_exists('cKetNoi')){
    include './model/cKetNoi.php';
  }

 class mMuaHang{
  public function thongKeMuaHang() {
  $p = new cKetNoi();
  $conn = $p->ketNoi();
  $sql = "SELECT ngaydathang as ngaydat, SUM(soluong) as tongSoLuong 
          FROM dathang_chitiet 
          JOIN dathang ON dathang_chitiet.iddh = dathang.iddh 
          GROUP BY ngaydathang";
  $result = $conn->query($sql);

  if ($result && $result->num_rows > 0) {
      return $result;
  }

  return false;
}

 }
?>