<?php
class Load{

    private $parentPath = null;

    public function scanDir($parentDir=''){
        if (empty($parentDir)){
            $path = _DATA_DIR;
        }else{
            $path = _DATA_DIR.'/'.$parentDir;
        }

        $this->parentPath = $path;

        $dataScan = scandir($path);


        if (isset($dataScan[0])){
            unset($dataScan[0]);
        }

        if (isset($dataScan[1])){
            unset($dataScan[1]);
        }

        return $dataScan;
    }

    public function isType($path){
        if (is_dir($path)){
            return 'folder';
        }

        return 'file';
    }

    public function getPath($fileName){
        $path = $this->parentPath;
        $path = $path.'/'.$fileName;
        return $path;
    }

    public function getTypeIcon($fileName){

        $path = $this->getPath($fileName);

        return ($this->isType($path)=='folder')?'<i class="fa fa-folder-o" aria-hidden="true"></i>':'<i class="fa fa-file" aria-hidden="true"></i>';
    }

    public function getSize($fileName, $unit=''){

        $path = $this->getPath($fileName);

        if ($this->isType($path)!=='folder'){

            $size = filesize($path);

            return round($size/1024, 2).' '.$unit;
        }

        return 'Thư mục';
    }

    public function getTimeModify($fileName, $format='d/m/Y H:i:s'){
        $path = $this->getPath($fileName);

        $time = filectime($path);

        if (!empty($time)) {
            $date = date($format, $time);
            return $date;
        }

        return '';
    }

    public function getPermission($fileName){
        $path = $this->getPath($fileName);

        $result = fileperms($path);

        $result = sprintf('%o', $result);

        $result = substr($result, -4);

        return $result;
    }
}













