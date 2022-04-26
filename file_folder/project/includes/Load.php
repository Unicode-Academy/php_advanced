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
}













