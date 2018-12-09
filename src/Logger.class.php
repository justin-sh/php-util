<?php
date_default_timezone_set('UTC');
class Logger{
    private static function emmit($msg, $level){
        list($msec, $sec) = explode(' ', microtime());
        $m = '[ ' . date('Y-m-d H:m:s') . '.' . str_pad((int)($msec * 1000), 3, '0', STR_PAD_LEFT);
        $m .= ' ' . str_pad($level, 6) . str_pad(gettype($msg), 6) . ' ] ';
        if(is_string($msg)){
            $m .= $msg;
        }else{
            $m .= json_encode($msg);
        }

        error_log($m);
    }

    public static function debug($msg){
        self::emmit($msg, 'DEBUG');
    }

    public static function info($msg){
        self::emmit($msg, 'INFO');
    }

    public static function warn($msg){
        self::emmit($msg, 'WARN');
    }
}
