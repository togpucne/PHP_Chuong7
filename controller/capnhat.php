

<div class="inner-right">
                    <?php
                        if(!class_exists('cGioHang')){
                            include './model/cGioHang.php';
                        }

                        $p = new cGioHang();
                        $idsp= $_GET['idsp'];
                        $soluong = $_GET['soluong'];
                        if($soluong <= 0){
                            echo '<script>alert("Số lượng phải lớn hơn 0");
                            history.back();
                        </script>';
                            return ;
                        }

                        $gia  = 0;
                        $giamgia = 0;
                 

                        $result1 = $p->getSPGioHang($idsp);
                        if($result1){
                            while($row= $result1->fetch_assoc()){
                                $gia = $row['gia'];
                                $giamgia = $row['giamgia'];
                                

                            }
                        }
                        $tongtien = $soluong *  ($giamgia );



                        $result = $p->updateGioHang($idsp, $soluong, $tongtien );
                        if($result){
                            echo '<script>alert("Cập nhật thành công");
                                history.back();
                            </script>';
                        }else{
                            echo '<script>alert("Cập nhật thất bại");
                            history.back();
                        </script>'; 
                        }
                    
                    ?>
                    
                </div>
            </main>