<?php
    function __autoload($className)
    {
        $fileName = strtolower($className) . '.blade.php';
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
    }

$reistry = new Registry;