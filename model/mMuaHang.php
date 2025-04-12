<?php
    if(!class_exists('cNguoiDung')){
        include './model/cKetNoi.php';
    }
    class mMuaHang {
        public function thongKeMuaHang() {
            $p = new cKetNoi();
            $conn = $p->ketNoi();
            $sql = "SELECT dh.ngaydathang as ngaydat, sum(ct.soLuong) as tongSoLuong
                    FROM dathang_chitiet ct, dathang dh
                    WHERE ct.iddh = dh.iddh
                    GROUP BY dh.ngaydathang";
            $result = $conn->query($sql);
            if ($result) {
                $data = [];
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            } else {
                return false;
            }
        }
    }
    
?>