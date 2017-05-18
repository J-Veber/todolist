<?php
class Autoloader
{
    function __autoload($className)
    {
        $fileName = $className . '.php';
//        echo $fileName . '<br/>';
        $fileArr = explode("\\", $fileName);

        if (!empty($fileArr[0])) {
            switch ($fileArr[0]) {
                case 'TodoList':
                    // TODO: сделать переключение между моделями и контроллерами
                    if ($fileArr[1] == "Controllers") {
                        $folder = "src/Controllers";
                        $class = $fileArr[2];
                    } else {
                        $folder = "src/Models";
                        $classFile = explode("_", $fileArr[2]);
                        $class = $classFile[0] . $classFile[1];
                    }
                    $file = ROOT_PATH . $folder . DS . $class;
                    require_once $file;
                    //echo $file ;
                    break;
                //case '':
                    /*echo "1234";
                    $folder = "App";
                    $file = ROOT_PATH . "../";
                    $file = ROOT_PATH . $folder . DS . $fileArr[2];
                    echo $file;*/
                default:
                    $folder = "App";
                    $file = ROOT_PATH . $folder . DS . "Core.php";
                    require_once $file;
                    //echo $file;
                    break;
            }
        } else {
            $folder = "App";
            $file = ROOT_PATH;
            //echo $file ;
            //require_once $file;
        }

    }
}