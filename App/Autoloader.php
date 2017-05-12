<?php
class Autoloader
{
    function __autoload($className)
    {
        $fileName = $className . '.php';
        echo $fileName;
        $fileArr = explode("\\", $fileName);

        if (!empty($fileArr[0])){
            switch ($fileArr[0]) {
                case 'TodoList':
                    // TODO: сделать переключение между моделями и контроллерами
                    if ($fileArr[1] == "Controllers") {
                        $folder = "src/Controllers";
                    } else {
                        $folder = "src/Models";
                    }
                    $file = ROOT_PATH . $folder . DS . $fileArr[2];
                    require_once $file;
                    //echo $file ;
                    break;
                case '':
                    $folder = "App";
                    $file = ROOT_PATH;
                    echo $file;
                default:

                    $folder = "vendor";
                    break;
            }
        } else {
            $folder = "App";
            $file = ROOT_PATH;
            //echo $file ;
            //require_once $file;
        }



        /*if (strpos($fileName, 'Controller.php')) {

        }
//        echo $fileName . "\n";
        $expArr = explode(DS, $className); // TODO: хотим посмотреть какой там корневой неймспейс
//        echo $expArr[0];
        /* TODO: тут нужно разрешить подключение файлов с другими namespace */
        /*if ($expArr[0] == 'TodoList') {
            $file = str_replace(DS, '\\', $fileName);
        } else {
            $file = 'src' . DS . join('\\', array_slice($expArr, 1));
        }

        $file = ROOT_PATH . $file;
        //echo $file . "\n";
        if (!file_exists($file))
        {
            return false;
        }
        include ($file);*/
    }

}



    /*function spl_autoload_register($className)
    {
        $fileName = strtolower($className) . '.php';
        $expArr = explode('_', $className);
        if (empty($expArr[1]) OR $expArr[1] == 'Base')
        {
            $folder = 'classes';
        } else
        {
            switch (strtolower($expArr[0]))
            {
                case 'controller':
                    $folder = 'cotrollers';
                    break;
                case 'model':
                    $folder = 'models';
                    break;
                default:
                    $folder = 'classes';
                    break;
            }
        }

        $file = SITE_PATH . $folder . DS . $fileName;
        if (!file_exists($file))
        {
            return false;
        }
        include ($file);
        return true;
    }*/