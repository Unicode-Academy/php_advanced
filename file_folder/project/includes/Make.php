<?php
class Make{
    public static function createFile($parentDir, $filename, $data=''){
        $path = _DATA_DIR.'/'.$parentDir.'/'.$filename;
        file_put_contents($path, $data);
    }

    public static function createFolder($parentDir, $folderName){
        $path = _DATA_DIR.'/'.$parentDir.'/'.$folderName;
        mkdir($path);
    }

    public static function rename($parentDir, $old, $name){
        $oldPath = _DATA_DIR.'/'.$parentDir.'/'.$old;
        $newPath = _DATA_DIR.'/'.$parentDir.'/'.$name;
        rename($oldPath, $newPath);
    }
}