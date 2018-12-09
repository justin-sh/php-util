<?php
    require_once('src/Logger.class.php');

    Logger::debug("debug test!");
    Logger::info("debug test!");
    Logger::warn("debug test!");

    Logger::debug(array('One'=>1));

    $m = "x";
    $m .= '1';
    echo $m . PHP_EOL;
    $level = 'debug';
    echo date('Y-m-d H:m:s'), PHP_EOL;
    list($msec, $sec) = explode(' ', microtime());

    echo str_pad((int)($msec * 1000), 3, '0', STR_PAD_LEFT), '=', $sec, PHP_EOL;
    echo str_pad($level, 8) . '||' . PHP_EOL;
