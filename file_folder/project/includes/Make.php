<?php
class Make{
    public static function createFile($parentDir, $filename, $data=''){
        $path = _DATA_DIR.'/'.$parentDir.'/'.$filename;
        file_put_contents($path, $data);
    }
}