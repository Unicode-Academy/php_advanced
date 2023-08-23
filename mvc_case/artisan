<?php
if (!empty($_SERVER['argv'][1])) {

    //Create controller
    if ($_SERVER['argv'][1] == 'make:controller') {
        if (!empty($_SERVER['argv'][2])) {

            //Get controller name
            $controllerName = $_SERVER['argv'][2];

            //check controller exist
            if (!file_exists('app/controllers/' . $controllerName . '.php')) {
                $data = file_get_contents('core/console/controller.tpl');

                $data = str_replace('{controllerName}', $controllerName, $data);

                file_put_contents('app/controllers/' . $controllerName . '.php', $data);

                echo "\033[32mTạo controller $controllerName thành công \033[0m\n";

            } else {
                echo "\033[31mController $controllerName đã tồn tại \033[0m\n";
            }
        }
    }

    //Delete controller
    if ($_SERVER['argv'][1] == 'delete:controller') {
        if (!empty($_SERVER['argv'][2])) {

            //Get controller name
            $controllerName = $_SERVER['argv'][2];

            if (file_exists('app/controllers/' . $controllerName . '.php')) {
                unlink('app/controllers/' . $controllerName . '.php');
                echo "\e[32mXoá controller $controllerName thành công\e[0m\n";
            } else {
                echo "\e[31mController $controllerName không tồn tại \e[0m\n";
            }
        }
    }

    //Make model
    if ($_SERVER['argv'][1] == 'make:model') {
        if (!empty($_SERVER['argv'][2])) {
            $modelName = $_SERVER['argv'][2];

            if (!file_exists('app/models/' . $modelName . '.php')) {
                $data = file_get_contents('core/console/model.tpl');

                $data = str_replace('{modelName}', $modelName, $data);

                file_put_contents('app/models/' . $modelName . '.php', $data);

                echo "\033[32mTạo model $modelName thành công \033[0m\n";

            } else {
                echo "\033[31mModel $modelName đã tồn tại \033[0m\n";
            }
        }
    }

    //Delete Model
    if ($_SERVER['argv'][1] == 'delete:model') {
        if (!empty($_SERVER['argv'][2])) {

            $modelName = $_SERVER['argv'][2];

            if (file_exists('app/models/' . $modelName . '.php')) {
                unlink('app/models/' . $modelName . '.php');
                echo "\e[32mXoá model $modelName thành công\e[0m\n";
            } else {
                echo "\e[31mModel $controllerName không tồn tại \e[0m\n";
            }
        }
    }

    //Middleware Create
    if ($_SERVER['argv'][1] == 'make:middleware') {
        if (!empty($_SERVER['argv'][2])) {
            $middlewareName = $_SERVER['argv'][2];

            if (!file_exists('app/middlewares/' . $middlewareName . '.php')) {
                $data = file_get_contents('core/console/middleware.tpl');

                $data = str_replace('{middlewareName}', $middlewareName, $data);

                file_put_contents('app/middlewares/' . $middlewareName . '.php', $data);

                echo "\033[32mTạo middleware $middlewareName thành công \033[0m\n";

            } else {
                echo "\033[31mMiddleware $middlewareName đã tồn tại \033[0m\n";
            }
        }
    }

    //Middleware Remove
    if ($_SERVER['argv'][1] == 'delete:middleware') {
        if (!empty($_SERVER['argv'][2])) {

            $middlewareName = $_SERVER['argv'][2];

            if (file_exists('app/middlewares/' . $middlewareName . '.php')) {
                unlink('app/middlewares/' . $middlewareName . '.php');
                echo "\e[32mXoá middleware $middlewareName thành công\e[0m\n";
            } else {
                echo "\e[31mMiddleware $middlewareName không tồn tại \e[0m\n";
            }
        }
    }
}