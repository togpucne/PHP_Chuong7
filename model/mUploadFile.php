<?php
    class mUploadFile{
        public function createUpload(){
            $uploads = 'uploads/';
            if(!is_dir($uploads)){
                mkdir($uploads, 0777, true);
            }
        }

        public function maxSize($size, $maxsize){
            if($size > $maxsize){
                return false;
            }else{
                return true;
            }
        }

        public function pathInfo($name){
            $variable = ['png', 'jpg', 'jpeg', 'gif'];
            $valueName = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            if(!in_array($valueName, $variable )){
                return false;
            }else{
                return true;
            }
        }

        public function changeName($name){
            $valueName = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $newName = 'uploads/' .uniqid('_img', true) .'.' .$valueName;
            return $newName;
        }

        public function removeFile($name, $tmp){
            $valueName = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $newName = 'uploads/' .uniqid('_img', true) .'.' .$valueName;
            if(move_uploaded_file($tmp , $newName)){
                return $newName;
            }else{
                return false;
            }

        }

        public function xoaFile($filePath){
            if(file_exists($filePath)){
                if(unlink($filePath)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }

        }

        
        


    }





?>