<?php
class Autoloader
{
    function __autoload($className)
    {
        $fileName = $className . '.php';

        $fileArr = explode("\\", $fileName);
        //echo $fileArr[0] . '<br/>';
        if (!empty($fileArr[0])) {
            switch ($fileArr[0]) {
                case 'TodoList':
                    if ($fileArr[1] == "Controllers") {
                        $folder = "src/Controllers";
                        $class = $fileArr[2];
                    } else {
                        $folder = "src/Models";
                        $classFile = explode("_", $fileArr[2]);
                        $class = $classFile[0] . $classFile[1];
                    }
                    $file = SITE_PATH . '/' . $folder . DS . $class;
                    require_once $file;
                    break;
                default:
                    $folder = "App";
                    $file = SITE_PATH . DS . $folder . DS;
                    switch ($className)
                    {
                        case 'App':
                            $file .= "Core.php";
                            break;
                        case 'Router':
                            $file = SITE_PATH . DS . $folder . DS . "Router.php";
                            break;
                    }
                    require_once $file;
                    break;
            }
        }
    }
}