<?php

function handleUrl(&$module=null, &$action=null){

    global $routes;

//    echo '<pre>';
//    print_r($routes);
//    echo '</pre>';

    $url = trim($_GET['url'], '/');

    //Xử lý thanh thế routes

    if (!empty($routes)){
        foreach ($routes as $key => $value){
            $pattern = '~^'.$key.'$~i';

            if (preg_match($pattern, $url)){

                $url = preg_replace($pattern, $value, $url);
                break;
            }
        }
    }

    $urlArr = array_filter(explode('/', $url));

    if (!empty($urlArr[0])){
        $module = $urlArr[0];
        unset($urlArr[0]);
    }

    if (!empty($urlArr[1])){
        $action = $urlArr[1];
        unset($urlArr[1]);
    }

    $urlArr = array_values($urlArr);

    return $urlArr;
}

function getParam($index=0){
    $urlArr = handleUrl();
    if (isset($urlArr[$index])){
        return $urlArr[$index];
    }
}

function getContentView($view, $data=[], $extType='tpl'){
    global $module;

    $pathView = _DIR_ROOT.'/modules/'.$module.'/views/'.$view.'.'.$extType;

    if (file_exists($pathView)){
        $contentView = file_get_contents($pathView);
        return $contentView;
    }

    return false;

}

function render($view, $data=[], $extType='tpl'){

    if (!empty($data)){
        extract($data);
    }

    $contentView = getContentView($view, $data, $extType);

    preg_match_all('~{{\s*(.+?)\s*}}~s', $contentView, $matches);

    if (!empty($matches[1])){
        foreach ($matches[1] as $key => $value){
            //echo $matches[0][$key].'<br/>';
            $contentView = str_replace($matches[0][$key], '<?php echo '.$value.'; ?>', $contentView);
        }
    }

    eval(" ?> $contentView <?php ");

    //echo $contentView;
}

function getMsg($msg){
    return '<div style="border: 1px solid red; padding: 10px;">'.$msg.'</div>';
}





